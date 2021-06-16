<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616193755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commentaire_responsable_publication (commentaire_id INT NOT NULL, responsable_publication_id INT NOT NULL, INDEX IDX_1A97FA16BA9CD190 (commentaire_id), INDEX IDX_1A97FA1671A673C0 (responsable_publication_id), PRIMARY KEY(commentaire_id, responsable_publication_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE commentaire_responsable_publication ADD CONSTRAINT FK_1A97FA16BA9CD190 FOREIGN KEY (commentaire_id) REFERENCES commentaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commentaire_responsable_publication ADD CONSTRAINT FK_1A97FA1671A673C0 FOREIGN KEY (responsable_publication_id) REFERENCES responsable_publication (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commentaire_responsable_publication');
    }
}
