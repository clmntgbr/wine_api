<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220818134458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine CHANGE color_id color_id INT NOT NULL, CHANGE domain_id domain_id INT NOT NULL, CHANGE region_id region_id INT NOT NULL, CHANGE country_id country_id INT NOT NULL, CHANGE wine_detail_id wine_detail_id INT NOT NULL, CHANGE abv_id abv_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine CHANGE domain_id domain_id INT DEFAULT NULL, CHANGE region_id region_id INT DEFAULT NULL, CHANGE country_id country_id INT DEFAULT NULL, CHANGE color_id color_id INT DEFAULT NULL, CHANGE wine_detail_id wine_detail_id INT DEFAULT NULL, CHANGE abv_id abv_id INT DEFAULT NULL');
    }
}
