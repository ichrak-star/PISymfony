<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614140244 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe ADD entreneurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE equipe ADD CONSTRAINT FK_2449BA1553E0CDA0 FOREIGN KEY (entreneurs_id) REFERENCES entreneur (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2449BA1553E0CDA0 ON equipe (entreneurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE equipe DROP FOREIGN KEY FK_2449BA1553E0CDA0');
        $this->addSql('DROP INDEX UNIQ_2449BA1553E0CDA0 ON equipe');
        $this->addSql('ALTER TABLE equipe DROP entreneurs_id');
    }
}
