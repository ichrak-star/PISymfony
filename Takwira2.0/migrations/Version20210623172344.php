<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623172344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket ADD matche_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3FD997C2B FOREIGN KEY (matche_id) REFERENCES matche (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3FD997C2B ON ticket (matche_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3FD997C2B');
        $this->addSql('DROP INDEX IDX_97A0ADA3FD997C2B ON ticket');
        $this->addSql('ALTER TABLE ticket DROP matche_id');
    }
}
