<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616192006 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE abonnee DROP FOREIGN KEY FK_5211BACDA76B6C5F');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779A76B6C5F');
        $this->addSql('CREATE TABLE arbitre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, filiere VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE entreneur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipe (id INT AUTO_INCREMENT NOT NULL, entreneurs_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, nom_equipe VARCHAR(255) NOT NULL, nationalite VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2449BA1553E0CDA0 (entreneurs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE joueurs (id INT AUTO_INCREMENT NOT NULL, equipes_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, num_maillot INT NOT NULL, taille DOUBLE PRECISION NOT NULL, filiere VARCHAR(255) NOT NULL, niveau VARCHAR(255) NOT NULL, INDEX IDX_F0FD889D737800BA (equipes_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE personne (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE responsable_publication (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1553E0CDA0 FOREIGN KEY (entreneurs_id) REFERENCES entreneur (id)');
        $this->addSql('ALTER TABLE joueurs ADD CONSTRAINT FK_F0FD889D737800BA FOREIGN KEY (equipes_id) REFERENCES equipe (id)');
        $this->addSql('DROP TABLE profil');
        $this->addSql('DROP INDEX UNIQ_5211BACDA76B6C5F ON abonnee');
        $this->addSql('ALTER TABLE abonnee DROP id_profil_id');
        $this->addSql('ALTER TABLE commentaire ADD contenue LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE photo ADD id_publication_id INT DEFAULT NULL, ADD source VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B784185D4AAA1 FOREIGN KEY (id_publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_14B784185D4AAA1 ON photo (id_publication_id)');
        $this->addSql('DROP INDEX IDX_AF3C6779A76B6C5F ON publication');
        $this->addSql('ALTER TABLE publication ADD contenue VARCHAR(255) NOT NULL, DROP id_profil_id');
        $this->addSql('ALTER TABLE video ADD source VARCHAR(255) NOT NULL, ADD format VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1553E0CDA0');
        $this->addSql('ALTER TABLE joueurs DROP FOREIGN KEY FK_F0FD889D737800BA');
        $this->addSql('CREATE TABLE profil (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE arbitre');
        $this->addSql('DROP TABLE entreneur');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE joueurs');
        $this->addSql('DROP TABLE personne');
        $this->addSql('DROP TABLE responsable_publication');
        $this->addSql('ALTER TABLE abonnee ADD id_profil_id INT NOT NULL');
        $this->addSql('ALTER TABLE abonnee ADD CONSTRAINT FK_5211BACDA76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5211BACDA76B6C5F ON abonnee (id_profil_id)');
        $this->addSql('ALTER TABLE commentaire DROP contenue');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B784185D4AAA1');
        $this->addSql('DROP INDEX IDX_14B784185D4AAA1 ON photo');
        $this->addSql('ALTER TABLE photo DROP id_publication_id, DROP source');
        $this->addSql('ALTER TABLE publication ADD id_profil_id INT NOT NULL, DROP contenue');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779A76B6C5F FOREIGN KEY (id_profil_id) REFERENCES profil (id)');
        $this->addSql('CREATE INDEX IDX_AF3C6779A76B6C5F ON publication (id_profil_id)');
        $this->addSql('ALTER TABLE video DROP source, DROP format');
    }
}
