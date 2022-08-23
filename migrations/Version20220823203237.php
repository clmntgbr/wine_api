<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220823203237 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE abv (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_58F9A5296BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appellation (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_187A5B986BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE arrangement (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_7E99C3B96BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE award (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_8A5B2EE76BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bio (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_DD206A7B6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bottle (id INT AUTO_INCREMENT NOT NULL, wine_id INT NOT NULL, capacity_id INT NOT NULL, bottle_stopper_id INT NOT NULL, storage_instruction_id INT NOT NULL, cellar_id INT NOT NULL, format_name VARCHAR(255) NOT NULL, family_code VARCHAR(255) NOT NULL, purchase_price DOUBLE PRECISION DEFAULT NULL, comment LONGTEXT DEFAULT NULL, purchase_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', empty_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', peak_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', alert_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_ACA9A95528A2BD76 (wine_id), INDEX IDX_ACA9A95566B6F0BA (capacity_id), INDEX IDX_ACA9A9553ED441B0 (bottle_stopper_id), INDEX IDX_ACA9A9556E5FEA1B (storage_instruction_id), INDEX IDX_ACA9A955D4A8C468 (cellar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bottle_stopper (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_620B456E6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE capacity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cellar (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, name VARCHAR(255) DEFAULT NULL, row INT NOT NULL, clmn INT NOT NULL, is_active TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_9CA01463A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE color (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_5373C9666BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE domain (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_A7A91E0B6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE grape_variety (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_ECDE22676BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_F62F1766BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, reference VARCHAR(50) NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE storage_instruction (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_712A18776BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE style (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_33BDB86A6BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(200) NOT NULL, username VARCHAR(200) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, is_enable TINYINT(1) NOT NULL, is_verified TINYINT(1) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vintage (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine (id INT AUTO_INCREMENT NOT NULL, appellation_id INT NOT NULL, domain_id INT NOT NULL, region_id INT NOT NULL, country_id INT NOT NULL, color_id INT NOT NULL, wine_detail_id INT NOT NULL, abv_id INT NOT NULL, vintage_id INT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, format_name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_560C64687CDE30DD (appellation_id), INDEX IDX_560C6468115F0EE5 (domain_id), INDEX IDX_560C646898260155 (region_id), INDEX IDX_560C6468F92F3E70 (country_id), INDEX IDX_560C64687ADA1FB5 (color_id), INDEX IDX_560C64684159FF48 (wine_detail_id), INDEX IDX_560C646846CCBA13 (abv_id), INDEX IDX_560C646848198056 (vintage_id), INDEX IDX_560C64686BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_arrangement (wine_id INT NOT NULL, arrangement_id INT NOT NULL, INDEX IDX_F503567928A2BD76 (wine_id), INDEX IDX_F5035679C5CAAFBC (arrangement_id), PRIMARY KEY(wine_id, arrangement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_award (wine_id INT NOT NULL, award_id INT NOT NULL, INDEX IDX_AA91737B28A2BD76 (wine_id), INDEX IDX_AA91737B3D5282CF (award_id), PRIMARY KEY(wine_id, award_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_style (wine_id INT NOT NULL, style_id INT NOT NULL, INDEX IDX_1377E5F628A2BD76 (wine_id), INDEX IDX_1377E5F6BACD6074 (style_id), PRIMARY KEY(wine_id, style_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_grape_variety (wine_id INT NOT NULL, grape_variety_id INT NOT NULL, INDEX IDX_A741197828A2BD76 (wine_id), INDEX IDX_A7411978ED00A18A (grape_variety_id), PRIMARY KEY(wine_id, grape_variety_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_bio (wine_id INT NOT NULL, bio_id INT NOT NULL, INDEX IDX_FBA745C28A2BD76 (wine_id), INDEX IDX_FBA745C9A99E1B9 (bio_id), PRIMARY KEY(wine_id, bio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_detail (id INT AUTO_INCREMENT NOT NULL, status_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, created_by VARCHAR(255) DEFAULT NULL, updated_by VARCHAR(255) DEFAULT NULL, INDEX IDX_D79F6AA16BF700BD (status_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE abv ADD CONSTRAINT FK_58F9A5296BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE appellation ADD CONSTRAINT FK_187A5B986BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE arrangement ADD CONSTRAINT FK_7E99C3B96BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE award ADD CONSTRAINT FK_8A5B2EE76BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE bio ADD CONSTRAINT FK_DD206A7B6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A95528A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id)');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A95566B6F0BA FOREIGN KEY (capacity_id) REFERENCES capacity (id)');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A9553ED441B0 FOREIGN KEY (bottle_stopper_id) REFERENCES bottle_stopper (id)');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A9556E5FEA1B FOREIGN KEY (storage_instruction_id) REFERENCES storage_instruction (id)');
        $this->addSql('ALTER TABLE bottle ADD CONSTRAINT FK_ACA9A955D4A8C468 FOREIGN KEY (cellar_id) REFERENCES cellar (id)');
        $this->addSql('ALTER TABLE bottle_stopper ADD CONSTRAINT FK_620B456E6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE cellar ADD CONSTRAINT FK_9CA01463A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE country ADD CONSTRAINT FK_5373C9666BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE domain ADD CONSTRAINT FK_A7A91E0B6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE grape_variety ADD CONSTRAINT FK_ECDE22676BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE region ADD CONSTRAINT FK_F62F1766BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE storage_instruction ADD CONSTRAINT FK_712A18776BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE style ADD CONSTRAINT FK_33BDB86A6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64687CDE30DD FOREIGN KEY (appellation_id) REFERENCES appellation (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646898260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C6468F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64687ADA1FB5 FOREIGN KEY (color_id) REFERENCES color (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64684159FF48 FOREIGN KEY (wine_detail_id) REFERENCES wine_detail (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646846CCBA13 FOREIGN KEY (abv_id) REFERENCES abv (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646848198056 FOREIGN KEY (vintage_id) REFERENCES vintage (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64686BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE wine_arrangement ADD CONSTRAINT FK_F503567928A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_arrangement ADD CONSTRAINT FK_F5035679C5CAAFBC FOREIGN KEY (arrangement_id) REFERENCES arrangement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_award ADD CONSTRAINT FK_AA91737B28A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_award ADD CONSTRAINT FK_AA91737B3D5282CF FOREIGN KEY (award_id) REFERENCES award (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_style ADD CONSTRAINT FK_1377E5F628A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_style ADD CONSTRAINT FK_1377E5F6BACD6074 FOREIGN KEY (style_id) REFERENCES style (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_grape_variety ADD CONSTRAINT FK_A741197828A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_grape_variety ADD CONSTRAINT FK_A7411978ED00A18A FOREIGN KEY (grape_variety_id) REFERENCES grape_variety (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_bio ADD CONSTRAINT FK_FBA745C28A2BD76 FOREIGN KEY (wine_id) REFERENCES wine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_bio ADD CONSTRAINT FK_FBA745C9A99E1B9 FOREIGN KEY (bio_id) REFERENCES bio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_detail ADD CONSTRAINT FK_D79F6AA16BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abv DROP FOREIGN KEY FK_58F9A5296BF700BD');
        $this->addSql('ALTER TABLE appellation DROP FOREIGN KEY FK_187A5B986BF700BD');
        $this->addSql('ALTER TABLE arrangement DROP FOREIGN KEY FK_7E99C3B96BF700BD');
        $this->addSql('ALTER TABLE award DROP FOREIGN KEY FK_8A5B2EE76BF700BD');
        $this->addSql('ALTER TABLE bio DROP FOREIGN KEY FK_DD206A7B6BF700BD');
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A95528A2BD76');
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A95566B6F0BA');
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A9553ED441B0');
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A9556E5FEA1B');
        $this->addSql('ALTER TABLE bottle DROP FOREIGN KEY FK_ACA9A955D4A8C468');
        $this->addSql('ALTER TABLE bottle_stopper DROP FOREIGN KEY FK_620B456E6BF700BD');
        $this->addSql('ALTER TABLE cellar DROP FOREIGN KEY FK_9CA01463A76ED395');
        $this->addSql('ALTER TABLE country DROP FOREIGN KEY FK_5373C9666BF700BD');
        $this->addSql('ALTER TABLE domain DROP FOREIGN KEY FK_A7A91E0B6BF700BD');
        $this->addSql('ALTER TABLE grape_variety DROP FOREIGN KEY FK_ECDE22676BF700BD');
        $this->addSql('ALTER TABLE region DROP FOREIGN KEY FK_F62F1766BF700BD');
        $this->addSql('ALTER TABLE storage_instruction DROP FOREIGN KEY FK_712A18776BF700BD');
        $this->addSql('ALTER TABLE style DROP FOREIGN KEY FK_33BDB86A6BF700BD');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64687CDE30DD');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468115F0EE5');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646898260155');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C6468F92F3E70');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64687ADA1FB5');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64684159FF48');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646846CCBA13');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646848198056');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64686BF700BD');
        $this->addSql('ALTER TABLE wine_arrangement DROP FOREIGN KEY FK_F503567928A2BD76');
        $this->addSql('ALTER TABLE wine_arrangement DROP FOREIGN KEY FK_F5035679C5CAAFBC');
        $this->addSql('ALTER TABLE wine_award DROP FOREIGN KEY FK_AA91737B28A2BD76');
        $this->addSql('ALTER TABLE wine_award DROP FOREIGN KEY FK_AA91737B3D5282CF');
        $this->addSql('ALTER TABLE wine_style DROP FOREIGN KEY FK_1377E5F628A2BD76');
        $this->addSql('ALTER TABLE wine_style DROP FOREIGN KEY FK_1377E5F6BACD6074');
        $this->addSql('ALTER TABLE wine_grape_variety DROP FOREIGN KEY FK_A741197828A2BD76');
        $this->addSql('ALTER TABLE wine_grape_variety DROP FOREIGN KEY FK_A7411978ED00A18A');
        $this->addSql('ALTER TABLE wine_bio DROP FOREIGN KEY FK_FBA745C28A2BD76');
        $this->addSql('ALTER TABLE wine_bio DROP FOREIGN KEY FK_FBA745C9A99E1B9');
        $this->addSql('ALTER TABLE wine_detail DROP FOREIGN KEY FK_D79F6AA16BF700BD');
        $this->addSql('DROP TABLE abv');
        $this->addSql('DROP TABLE appellation');
        $this->addSql('DROP TABLE arrangement');
        $this->addSql('DROP TABLE award');
        $this->addSql('DROP TABLE bio');
        $this->addSql('DROP TABLE bottle');
        $this->addSql('DROP TABLE bottle_stopper');
        $this->addSql('DROP TABLE capacity');
        $this->addSql('DROP TABLE cellar');
        $this->addSql('DROP TABLE color');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP TABLE grape_variety');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE storage_instruction');
        $this->addSql('DROP TABLE style');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vintage');
        $this->addSql('DROP TABLE wine');
        $this->addSql('DROP TABLE wine_arrangement');
        $this->addSql('DROP TABLE wine_award');
        $this->addSql('DROP TABLE wine_style');
        $this->addSql('DROP TABLE wine_grape_variety');
        $this->addSql('DROP TABLE wine_bio');
        $this->addSql('DROP TABLE wine_detail');
    }
}
