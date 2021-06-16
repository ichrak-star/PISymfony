<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210616193307 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire ADD id_publication_id INT DEFAULT NULL, ADD ib_abonnee_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BC5D4AAA1 FOREIGN KEY (id_publication_id) REFERENCES publication (id)');
        $this->addSql('ALTER TABLE commentaire ADD CONSTRAINT FK_67F068BCC11B8386 FOREIGN KEY (ib_abonnee_id) REFERENCES abonnee (id)');
        $this->addSql('CREATE INDEX IDX_67F068BC5D4AAA1 ON commentaire (id_publication_id)');
        $this->addSql('CREATE INDEX IDX_67F068BCC11B8386 ON commentaire (ib_abonnee_id)');
        $this->addSql('ALTER TABLE publication ADD responsable_publication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C677971A673C0 FOREIGN KEY (responsable_publication_id) REFERENCES responsable_publication (id)');
        $this->addSql('CREATE INDEX IDX_AF3C677971A673C0 ON publication (responsable_publication_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BC5D4AAA1');
        $this->addSql('ALTER TABLE commentaire DROP FOREIGN KEY FK_67F068BCC11B8386');
        $this->addSql('DROP INDEX IDX_67F068BC5D4AAA1 ON commentaire');
        $this->addSql('DROP INDEX IDX_67F068BCC11B8386 ON commentaire');
        $this->addSql('ALTER TABLE commentaire DROP id_publication_id, DROP ib_abonnee_id');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C677971A673C0');
        $this->addSql('DROP INDEX IDX_AF3C677971A673C0 ON publication');
        $this->addSql('ALTER TABLE publication DROP responsable_publication_id');
    }
}
