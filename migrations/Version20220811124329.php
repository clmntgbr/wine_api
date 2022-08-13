<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220811124329 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE appellation DROP FOREIGN KEY FK_187A5B98115F0EE5');
        $this->addSql('DROP INDEX IDX_187A5B98115F0EE5 ON appellation');
        $this->addSql('ALTER TABLE appellation DROP domain_id, DROP format_name');
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0BF92F3E70');
        $this->addSql('DROP INDEX IDX_A7A91E0BF92F3E70 ON domain');
        $this->addSql('ALTER TABLE domain DROP country_id, DROP format_name');
        $this->addSql('ALTER TABLE wine ADD domain_id INT DEFAULT NULL, ADD region_id INT DEFAULT NULL, ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468115F0EE5 FOREIGN KEY (domain_id) REFERENCES appellation (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646898260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_560C6468115F0EE5 ON wine (domain_id)');
        $this->addSql('CREATE INDEX IDX_560C646898260155 ON wine (region_id)');
        $this->addSql('CREATE INDEX IDX_560C6468F92F3E70 ON wine (country_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646898260155');
        $this->addSql('DROP TABLE region');
        $this->addSql('ALTER TABLE domain ADD country_id INT DEFAULT NULL, ADD format_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0BF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_A7A91E0BF92F3E70 ON domain (country_id)');
        $this->addSql('ALTER TABLE appellation ADD domain_id INT DEFAULT NULL, ADD format_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE appellation ADD CONSTRAINT FK_187A5B98115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id)');
        $this->addSql('CREATE INDEX IDX_187A5B98115F0EE5 ON appellation (domain_id)');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468115F0EE5');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468F92F3E70');
        $this->addSql('DROP INDEX IDX_560C6468115F0EE5 ON wine');
        $this->addSql('DROP INDEX IDX_560C646898260155 ON wine');
        $this->addSql('DROP INDEX IDX_560C6468F92F3E70 ON wine');
        $this->addSql('ALTER TABLE wine DROP domain_id, DROP region_id, DROP country_id');
    }
}
