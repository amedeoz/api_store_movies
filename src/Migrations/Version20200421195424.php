<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200421195424 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE genres (id INT AUTO_INCREMENT NOT NULL, movies_id INT DEFAULT NULL, type VARCHAR(30) DEFAULT NULL, INDEX IDX_A8EBE51653F590A4 (movies_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movies (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, poster VARCHAR(255) NOT NULL, relase_date DATE NOT NULL, duration VARCHAR(15) NOT NULL, description LONGTEXT NOT NULL, url_trailer LONGTEXT NOT NULL, week_number VARCHAR(2) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weeks (id INT AUTO_INCREMENT NOT NULL, movies_id INT NOT NULL, number_week INT NOT NULL, INDEX IDX_803157D253F590A4 (movies_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
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
