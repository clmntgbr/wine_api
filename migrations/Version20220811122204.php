<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220811122204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE capacity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appellation ADD format_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE bottle ADD capacity_id INT DEFAULT NULL, ADD format_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A95566B6F0BA FOREIGN KEY (capacity_id) REFERENCES capacity (id)');
        $this->addSql('CREATE INDEX IDX_ACA9A95566B6F0BA ON bottle (capacity_id)');
        $this->addSql('ALTER TABLE domain ADD format_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE wine ADD color_id INT DEFAULT NULL, ADD format_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64687ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('CREATE INDEX IDX_560C64687ADA1FB5 ON wine (color_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A95566B6F0BA');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64687ADA1FB5');
        $this->addSql('DROP TABLE capacity');
        $this->addSql('DROP TABLE color');
        $this->addSql('ALTER TABLE domain DROP format_name');
        $this->addSql('ALTER TABLE appellation DROP format_name');
        $this->addSql('DROP INDEX IDX_ACA9A95566B6F0BA ON bottle');
        $this->addSql('ALTER TABLE bottle DROP capacity_id, DROP format_name');
        $this->addSql('DROP INDEX IDX_560C64687ADA1FB5 ON wine');
        $this->addSql('ALTER TABLE wine DROP color_id, DROP format_name');
    }
}
