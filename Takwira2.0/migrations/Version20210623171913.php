<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623171913 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche ADD competion_id INT DEFAULT NULL, ADD staduim_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD510C5C32E87 FOREIGN KEY (competion_id) REFERENCES competion (id)');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD510AF82B655 FOREIGN KEY (staduim_id) REFERENCES staduim (id)');
        $this->addSql('CREATE INDEX IDX_9FCAD510C5C32E87 ON matche (competion_id)');
        $this->addSql('CREATE INDEX IDX_9FCAD510AF82B655 ON matche (staduim_id)');
        $this->addSql('ALTER TABLE team ADD matche_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FFD997C2B FOREIGN KEY (matche_id) REFERENCES matche (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FFD997C2B ON team (matche_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD510C5C32E87');
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD510AF82B655');
        $this->addSql('DROP INDEX IDX_9FCAD510C5C32E87 ON matche');
        $this->addSql('DROP INDEX IDX_9FCAD510AF82B655 ON matche');
        $this->addSql('ALTER TABLE matche DROP competion_id, DROP staduim_id');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FFD997C2B');
        $this->addSql('DROP INDEX IDX_C4E0A61FFD997C2B ON team');
        $this->addSql('ALTER TABLE team DROP matche_id');
    }
}
