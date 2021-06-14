<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210613104346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprises ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprises ADD CONSTRAINT FK_56B1B7A99D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_56B1B7A99D86650F ON entreprises (user_id_id)');
        $this->addSql('ALTER TABLE rendez_vous ADD user_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT FK_65E8AA0A9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_65E8AA0A9D86650F ON rendez_vous (user_id_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE entreprises DROP CONSTRAINT FK_56B1B7A99D86650F');
        $this->addSql('DROP INDEX IDX_56B1B7A99D86650F');
        $this->addSql('ALTER TABLE entreprises DROP user_id_id');
        $this->addSql('ALTER TABLE rendez_vous DROP CONSTRAINT FK_65E8AA0A9D86650F');
        $this->addSql('DROP INDEX IDX_65E8AA0A9D86650F');
        $this->addSql('ALTER TABLE rendez_vous DROP user_id_id');
    }
}
