<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210628205232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competion DROP FOREIGN KEY FK_D1893F52A76ED395');
        $this->addSql('DROP INDEX IDX_D1893F52A76ED395 ON competion');
        $this->addSql('ALTER TABLE competion DROP user_id');
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD510AF82B655');
        $this->addSql('ALTER TABLE matche DROP FOREIGN KEY FK_9FCAD510C5C32E87');
        $this->addSql('DROP INDEX IDX_9FCAD510C5C32E87 ON matche');
        $this->addSql('DROP INDEX IDX_9FCAD510AF82B655 ON matche');
        $this->addSql('ALTER TABLE matche DROP competion_id, DROP staduim_id');
        $this->addSql('ALTER TABLE picture DROP FOREIGN KEY FK_16DB4F8938B217A7');
        $this->addSql('DROP INDEX IDX_16DB4F8938B217A7 ON picture');
        $this->addSql('ALTER TABLE picture DROP publication_id');
        $this->addSql('ALTER TABLE publication DROP FOREIGN KEY FK_AF3C6779A76ED395');
        $this->addSql('DROP INDEX IDX_AF3C6779A76ED395 ON publication');
        $this->addSql('ALTER TABLE publication DROP user_id');
        $this->addSql('ALTER TABLE team DROP FOREIGN KEY FK_C4E0A61FFD997C2B');
        $this->addSql('DROP INDEX IDX_C4E0A61FFD997C2B ON team');
        $this->addSql('ALTER TABLE team DROP matche_id');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3A76ED395');
        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3FD997C2B');
        $this->addSql('DROP INDEX IDX_97A0ADA3A76ED395 ON ticket');
        $this->addSql('DROP INDEX IDX_97A0ADA3FD997C2B ON ticket');
        $this->addSql('ALTER TABLE ticket DROP user_id, DROP matche_id');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649296CD8AE');
        $this->addSql('DROP INDEX IDX_8D93D649296CD8AE ON user');
        $this->addSql('ALTER TABLE user DROP team_id');
        $this->addSql('ALTER TABLE video DROP FOREIGN KEY FK_7CC7DA2C38B217A7');
        $this->addSql('DROP INDEX IDX_7CC7DA2C38B217A7 ON video');
        $this->addSql('ALTER TABLE video DROP publication_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competion ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competion ADD CONSTRAINT FK_D1893F52A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_D1893F52A76ED395 ON competion (user_id)');
        $this->addSql('ALTER TABLE matche ADD competion_id INT DEFAULT NULL, ADD staduim_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD510AF82B655 FOREIGN KEY (staduim_id) REFERENCES staduim (id)');
        $this->addSql('ALTER TABLE matche ADD CONSTRAINT FK_9FCAD510C5C32E87 FOREIGN KEY (competion_id) REFERENCES competion (id)');
        $this->addSql('CREATE INDEX IDX_9FCAD510C5C32E87 ON matche (competion_id)');
        $this->addSql('CREATE INDEX IDX_9FCAD510AF82B655 ON matche (staduim_id)');
        $this->addSql('ALTER TABLE picture ADD publication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE picture ADD CONSTRAINT FK_16DB4F8938B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_16DB4F8938B217A7 ON picture (publication_id)');
        $this->addSql('ALTER TABLE publication ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE publication ADD CONSTRAINT FK_AF3C6779A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_AF3C6779A76ED395 ON publication (user_id)');
        $this->addSql('ALTER TABLE team ADD matche_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE team ADD CONSTRAINT FK_C4E0A61FFD997C2B FOREIGN KEY (matche_id) REFERENCES matche (id)');
        $this->addSql('CREATE INDEX IDX_C4E0A61FFD997C2B ON team (matche_id)');
        $this->addSql('ALTER TABLE ticket ADD user_id INT DEFAULT NULL, ADD matche_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3FD997C2B FOREIGN KEY (matche_id) REFERENCES matche (id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3A76ED395 ON ticket (user_id)');
        $this->addSql('CREATE INDEX IDX_97A0ADA3FD997C2B ON ticket (matche_id)');
        $this->addSql('ALTER TABLE user ADD team_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649296CD8AE FOREIGN KEY (team_id) REFERENCES team (id)');
        $this->addSql('CREATE INDEX IDX_8D93D649296CD8AE ON user (team_id)');
        $this->addSql('ALTER TABLE video ADD publication_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE video ADD CONSTRAINT FK_7CC7DA2C38B217A7 FOREIGN KEY (publication_id) REFERENCES publication (id)');
        $this->addSql('CREATE INDEX IDX_7CC7DA2C38B217A7 ON video (publication_id)');
    }
}
