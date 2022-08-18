<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220818135852 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottle CHANGE wine_id wine_id INT NOT NULL, CHANGE cellar_id cellar_id INT NOT NULL, CHANGE capacity_id capacity_id INT NOT NULL, CHANGE bottle_stopper_id bottle_stopper_id INT NOT NULL, CHANGE storage_instruction_id storage_instruction_id INT NOT NULL');
        $this->addSql('ALTER TABLE wine CHANGE appellation_id appellation_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bottle CHANGE wine_id wine_id INT DEFAULT NULL, CHANGE capacity_id capacity_id INT DEFAULT NULL, CHANGE bottle_stopper_id bottle_stopper_id INT DEFAULT NULL, CHANGE storage_instruction_id storage_instruction_id INT DEFAULT NULL, CHANGE cellar_id cellar_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine CHANGE appellation_id appellation_id INT DEFAULT NULL');
    }
}
