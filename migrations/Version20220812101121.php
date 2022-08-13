<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220812101121 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wine_bio (wine_id INT NOT NULL, bio_id INT NOT NULL, INDEX IDX_FBA745C28A2BD76 (wine_id), INDEX IDX_FBA745C9A99E1B9 (bio_id), PRIMARY KEY(wine_id, bio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine_bio ADD CONSTRAINT FK_FBA745C28A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_bio ADD CONSTRAINT FK_FBA745C9A99E1B9 FOREIGN KEY (bio_id) REFERENCES bio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64689A99E1B9');
        $this->addSql('DROP INDEX IDX_560C64689A99E1B9 ON wine');
        $this->addSql('ALTER TABLE wine DROP bio_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine_bio DROP FOREIGN KEY FK_FBA745C28A2BD76');
        $this->addSql('ALTER TABLE wine_bio DROP FOREIGN KEY FK_FBA745C9A99E1B9');
        $this->addSql('DROP TABLE wine_bio');
        $this->addSql('ALTER TABLE wine ADD bio_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64689A99E1B9 FOREIGN KEY (bio_id) REFERENCES bio (id)');
        $this->addSql('CREATE INDEX IDX_560C64689A99E1B9 ON wine (bio_id)');
    }
}
