<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220811210344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottle ADD bottle_stopper_id INT DEFAULT NULL, ADD storage_instruction_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A9553ED441B0 FOREIGN KEY (bottle_stopper_id) REFERENCES bottle_stopper (id)');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A9556E5FEA1B FOREIGN KEY (storage_instruction_id) REFERENCES storage_instruction (id)');
        $this->addSql('CREATE INDEX IDX_ACA9A9553ED441B0 ON bottle (bottle_stopper_id)');
        $this->addSql('CREATE INDEX IDX_ACA9A9556E5FEA1B ON bottle (storage_instruction_id)');
        $this->addSql('ALTER TABLE wine ADD bio_id INT DEFAULT NULL, ADD grape_variety_id INT DEFAULT NULL, ADD wine_detail_id INT DEFAULT NULL, ADD abv_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64689A99E1B9 FOREIGN KEY (bio_id) REFERENCES bio (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468ED00A18A FOREIGN KEY (grape_variety_id) REFERENCES grape_variety (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64684159FF48 FOREIGN KEY (wine_detail_id) REFERENCES wine_detail (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646846CCBA13 FOREIGN KEY (abv_id) REFERENCES abv (id)');
        $this->addSql('CREATE INDEX IDX_560C64689A99E1B9 ON wine (bio_id)');
        $this->addSql('CREATE INDEX IDX_560C6468ED00A18A ON wine (grape_variety_id)');
        $this->addSql('CREATE INDEX IDX_560C64684159FF48 ON wine (wine_detail_id)');
        $this->addSql('CREATE INDEX IDX_560C646846CCBA13 ON wine (abv_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A9553ED441B0');
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A9556E5FEA1B');
        $this->addSql('DROP INDEX IDX_ACA9A9553ED441B0 ON bottle');
        $this->addSql('DROP INDEX IDX_ACA9A9556E5FEA1B ON bottle');
        $this->addSql('ALTER TABLE bottle DROP bottle_stopper_id, DROP storage_instruction_id');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64689A99E1B9');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468ED00A18A');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64684159FF48');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646846CCBA13');
        $this->addSql('DROP INDEX IDX_560C64689A99E1B9 ON wine');
        $this->addSql('DROP INDEX IDX_560C6468ED00A18A ON wine');
        $this->addSql('DROP INDEX IDX_560C64684159FF48 ON wine');
        $this->addSql('DROP INDEX IDX_560C646846CCBA13 ON wine');
        $this->addSql('ALTER TABLE wine DROP bio_id, DROP grape_variety_id, DROP wine_detail_id, DROP abv_id');
    }
}
