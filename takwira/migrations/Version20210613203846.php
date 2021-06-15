<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210613203846 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition ADD organisateurs_id INT NOT NULL');
        $this->addSql('ALTER TABLE competition ADD CONSTRAINT FK_B50A2CB1BAC09095 FOREIGN KEY (organisateurs_id) REFERENCES organisateur (id)');
        $this->addSql('CREATE INDEX IDX_B50A2CB1BAC09095 ON competition (organisateurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competition DROP FOREIGN KEY FK_B50A2CB1BAC09095');
        $this->addSql('DROP INDEX IDX_B50A2CB1BAC09095 ON competition');
        $this->addSql('ALTER TABLE competition DROP organisateurs_id');
    }
}
