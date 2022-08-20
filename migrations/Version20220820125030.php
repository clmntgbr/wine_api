<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220820125030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottle ADD family_code VARCHAR(255) NOT NULL, ADD purchase_price DOUBLE PRECISION DEFAULT NULL, ADD comment LONGTEXT DEFAULT NULL, ADD purchase_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD empty_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD peak_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD alert_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottle DROP family_code, DROP purchase_price, DROP comment, DROP purchase_at, DROP empty_at, DROP peak_at, DROP alert_at');
    }
}
