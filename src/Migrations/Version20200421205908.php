<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200421205908 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE IF NOT EXISTS genres (id INT AUTO_INCREMENT NOT NULL, movies_id INT DEFAULT NULL, type VARCHAR(30) DEFAULT NULL, INDEX IDX_A8EBE51653F590A4 (movies_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS movies (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(255) DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, poster VARCHAR(255) DEFAULT NULL, relase_date DATE DEFAULT NULL, duration VARCHAR(15) DEFAULT NULL, description LONGTEXT DEFAULT NULL, url_trailer LONGTEXT DEFAULT NULL, week_number VARCHAR(2) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE IF NOT EXISTS weeks (id INT AUTO_INCREMENT NOT NULL, movies_id INT NOT NULL, number_week INT NOT NULL, INDEX IDX_803157D253F590A4 (movies_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE genres ADD CONSTRAINT FK_A8EBE51653F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id)');
        $this->addSql('ALTER TABLE weeks ADD CONSTRAINT FK_803157D253F590A4 FOREIGN KEY (movies_id) REFERENCES movies (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE genres DROP FOREIGN KEY FK_A8EBE51653F590A4');
        $this->addSql('ALTER TABLE weeks DROP FOREIGN KEY FK_803157D253F590A4');
        $this->addSql('DROP TABLE genres');
        $this->addSql('DROP TABLE movies');
        $this->addSql('DROP TABLE weeks');
    }
}
