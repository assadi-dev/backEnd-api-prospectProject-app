<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210613103623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entreprises DROP CONSTRAINT fk_56b1b7a960bb6fe6');
        $this->addSql('DROP INDEX idx_56b1b7a960bb6fe6');
        $this->addSql('ALTER TABLE entreprises DROP auteur_id');
        $this->addSql('ALTER TABLE rendez_vous DROP CONSTRAINT fk_65e8aa0a60bb6fe6');
        $this->addSql('DROP INDEX idx_65e8aa0a60bb6fe6');
        $this->addSql('ALTER TABLE rendez_vous DROP auteur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE entreprises ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE entreprises ADD CONSTRAINT fk_56b1b7a960bb6fe6 FOREIGN KEY (auteur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_56b1b7a960bb6fe6 ON entreprises (auteur_id)');
        $this->addSql('ALTER TABLE rendez_vous ADD auteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE rendez_vous ADD CONSTRAINT fk_65e8aa0a60bb6fe6 FOREIGN KEY (auteur_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_65e8aa0a60bb6fe6 ON rendez_vous (auteur_id)');
    }
}
