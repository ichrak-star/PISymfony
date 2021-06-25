<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210623165725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture ADD publication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8938B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F8938B217A7 ON picture (publication_id)');
        $this->addSql('ALTER TABLE video ADD publication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C38B217A7 ON video (publication_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8938B217A7');
        $this->addSql('DROP INDEX IDX_16DB4F8938B217A7 ON picture');
        $this->addSql('ALTER TABLE picture DROP publication_id');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C38B217A7');
        $this->addSql('DROP INDEX IDX_7CC7DA2C38B217A7 ON video');
        $this->addSql('ALTER TABLE video DROP publication_id');
    }
}
