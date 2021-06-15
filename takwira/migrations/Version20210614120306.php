<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614120306 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche ADD competitionid_id INT NOT NULL');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD5102C22705E FOREIGN KEY (competitionid_id) REFERENCES competition (id)');
        $this->addSql('CREATE INDEX IDX_9FCAD5102C22705E ON matche (competitionid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD5102C22705E');
        $this->addSql('DROP INDEX IDX_9FCAD5102C22705E ON matche');
        $this->addSql('ALTER TABLE matche DROP competitionid_id');
    }
}
