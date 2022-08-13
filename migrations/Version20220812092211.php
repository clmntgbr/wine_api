<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220812092211 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wine_arrangement (wine_id INT NOT NULL, arrangement_id INT NOT NULL, INDEX IDX_F503567928A2BD76 (wine_id), INDEX IDX_F5035679C5CAAFBC (arrangement_id), PRIMARY KEY(wine_id, arrangement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_award (wine_id INT NOT NULL, award_id INT NOT NULL, INDEX IDX_AA91737B28A2BD76 (wine_id), INDEX IDX_AA91737B3D5282CF (award_id), PRIMARY KEY(wine_id, award_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_style (wine_id INT NOT NULL, style_id INT NOT NULL, INDEX IDX_1377E5F628A2BD76 (wine_id), INDEX IDX_1377E5F6BACD6074 (style_id), PRIMARY KEY(wine_id, style_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_grape_variety (wine_id INT NOT NULL, grape_variety_id INT NOT NULL, INDEX IDX_A741197828A2BD76 (wine_id), INDEX IDX_A7411978ED00A18A (grape_variety_id), PRIMARY KEY(wine_id, grape_variety_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine_arrangement ADD CONSTRAINT FK_F503567928A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_arrangement ADD CONSTRAINT FK_F5035679C5CAAFBC FOREIGN KEY (arrangement_id) REFERENCES arrangement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_award ADD CONSTRAINT FK_AA91737B28A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_award ADD CONSTRAINT FK_AA91737B3D5282CF FOREIGN KEY (award_id) REFERENCES award (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_style ADD CONSTRAINT FK_1377E5F628A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_style ADD CONSTRAINT FK_1377E5F6BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_grape_variety ADD CONSTRAINT FK_A741197828A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_grape_variety ADD CONSTRAINT FK_A7411978ED00A18A FOREIGN KEY (grape_variety_id) REFERENCES grape_variety (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A95548198056');
        $this->addSql('DROP INDEX IDX_ACA9A95548198056 ON bottle');
        $this->addSql('ALTER TABLE bottle DROP vintage_id');
        $this->addSql('ALTER TABLE wine ADD vintage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646848198056 FOREIGN KEY (vintage_id) REFERENCES vintage (id)');
        $this->addSql('CREATE INDEX IDX_560C646848198056 ON wine (vintage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine_arrangement DROP FOREIGN KEY FK_F503567928A2BD76');
        $this->addSql('ALTER TABLE wine_arrangement DROP FOREIGN KEY FK_F5035679C5CAAFBC');
        $this->addSql('ALTER TABLE wine_award DROP FOREIGN KEY FK_AA91737B28A2BD76');
        $this->addSql('ALTER TABLE wine_award DROP FOREIGN KEY FK_AA91737B3D5282CF');
        $this->addSql('ALTER TABLE wine_style DROP FOREIGN KEY FK_1377E5F628A2BD76');
        $this->addSql('ALTER TABLE wine_style DROP FOREIGN KEY FK_1377E5F6BACD6074');
        $this->addSql('ALTER TABLE wine_grape_variety DROP FOREIGN KEY FK_A741197828A2BD76');
        $this->addSql('ALTER TABLE wine_grape_variety DROP FOREIGN KEY FK_A7411978ED00A18A');
        $this->addSql('DROP TABLE wine_arrangement');
        $this->addSql('DROP TABLE wine_award');
        $this->addSql('DROP TABLE wine_style');
        $this->addSql('DROP TABLE wine_grape_variety');
        $this->addSql('ALTER TABLE bottle ADD vintage_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A95548198056 FOREIGN KEY (vintage_id) REFERENCES vintage (id)');
        $this->addSql('CREATE INDEX IDX_ACA9A95548198056 ON bottle (vintage_id)');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646848198056');
        $this->addSql('DROP INDEX IDX_560C646848198056 ON wine');
        $this->addSql('ALTER TABLE wine DROP vintage_id');
    }
}
