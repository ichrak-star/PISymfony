<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210614115344 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche ADD stadeid_id INT NOT NULL');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD510D15CFB44 FOREIGN KEY (stadeid_id) REFERENCES stade (id)');
        $this->addSql('CREATE INDEX IDX_9FCAD510D15CFB44 ON matche (stadeid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD510D15CFB44');
        $this->addSql('DROP INDEX IDX_9FCAD510D15CFB44 ON matche');
        $this->addSql('ALTER TABLE matche DROP stadeid_id');
    }
}
