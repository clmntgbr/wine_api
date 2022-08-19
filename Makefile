#!/usr/bin/env bash

DOCKER_COMPOSE = docker-compose -p wine

CONTAINER_NGINX = $$(docker container ls -f "name=wine_nginx" -q)
CONTAINER_PHP = $$(docker container ls -f "name=wine_php" -q)
CONTAINER_DB = $$(docker container ls -f "name=wine_database" -q)

NGINX = docker exec -ti $(CONTAINER_NGINX)
PHP = docker exec -ti $(CONTAINER_PHP)
DATABASE = docker exec -ti $(CONTAINER_DB)

COLOR_RESET			= \033[0m
COLOR_ERROR			= \033[31m
COLOR_INFO			= \033[32m
COLOR_COMMENT		= \033[33m
COLOR_TITLE_BLOCK	= \033[0;44m\033[37m

help:
	@printf "${COLOR_TITLE_BLOCK}Makefile${COLOR_RESET}\n"
	@printf "\n"
	@printf "${COLOR_COMMENT}Usage:${COLOR_RESET}\n"
	@printf " make [target]\n\n"
	@printf "${COLOR_COMMENT}Available targets:${COLOR_RESET}\n"
	@awk '/^[a-zA-Z\-\_0-9\@]+:/ { \
		helpLine = match(lastLine, /^## (.*)/); \
		helpCommand = substr($$1, 0, index($$1, ":")); \
		helpMessage = substr(lastLine, RSTART + 3, RLENGTH); \
		printf " ${COLOR_INFO}%-16s${COLOR_RESET} %s\n", helpCommand, helpMessage; \
	} \
	{ lastLine = $$0 }' $(MAKEFILE_LIST)

## Kill all containers
kill:
	@$(DOCKER_COMPOSE) kill $(CONTAINER) || true

## Build containers
build:
	@$(DOCKER_COMPOSE) build --pull --no-cache

## Start containers
start:
	@$(DOCKER_COMPOSE) up -d
	@echo "site is available here: https://wine.traefik.me"
	@echo "admin is available here: https://wine.traefik.me/admin"

## Stop containers
stop:
	@$(DOCKER_COMPOSE) down

restart: stop start

## Entering php shell
php:
	@$(DOCKER_COMPOSE) exec php sh

## Entering nginx shell
nginx:
	@$(DOCKER_COMPOSE) exec nginx sh

## Entering database shell
database:
	@$(DOCKER_COMPOSE) exec database sh

## Composer install
install:
	$(PHP) composer install

## Composer update
update:
	$(PHP) composer update

## Drop database
drop:
	$(PHP) bin/console doctrine:database:drop --if-exists --force

## Create database
create:
	$(PHP) bin/console doctrine:database:create --if-not-exists

## Load fixtures
fixture:
	$(PHP) bin/console hautelook:fixtures:load --env=dev --no-interaction

## Making migration file
migration:
	$(PHP) bin/console make:migration

## Applying migration
migrate:
	$(PHP) bin/console doctrine:migration:migrate --no-interaction

## Init project
init: install update drop create migrate fixture

jwt:
	@$(DOCKER_COMPOSE) exec php sh -c 'set -e && apk add openssl && bin/console lexik:jwt:generate-keypair --overwrite'

## Init db
init-db: drop create migrate fixture
