<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220813072443 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468ED00A18A');
        $this->addSql('DROP INDEX IDX_560C6468ED00A18A ON wine');
        $this->addSql('ALTER TABLE wine DROP grape_variety_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine ADD grape_variety_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468ED00A18A FOREIGN KEY (grape_variety_id) REFERENCES grape_variety (id)');
        $this->addSql('CREATE INDEX IDX_560C6468ED00A18A ON wine (grape_variety_id)');
    }
}
