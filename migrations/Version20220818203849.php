<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220818203849 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abv ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE appellation ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE arrangement ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE award ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE bio ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE bottle ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE bottle_stopper ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE cellar ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE country ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE domain ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE grape_variety ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE region ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE storage_instruction ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE style ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
        $this->addSql('ALTER TABLE wine ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL, CHANGE status_id status_id INT NOT NULL');
        $this->addSql('ALTER TABLE wine_detail ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE region DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE domain DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE bio DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE appellation DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE bottle_stopper DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE award DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE style DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE abv DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE bottle DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE storage_instruction DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE country DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE arrangement DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE wine_detail DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE wine DROP created_at, DROP updated_at, CHANGE status_id status_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE grape_variety DROP created_at, DROP updated_at');
        $this->addSql('ALTER TABLE cellar DROP created_at, DROP updated_at');
    }
}
