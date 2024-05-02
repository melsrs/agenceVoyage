<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240502122610 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE form_reservation ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE form_reservation ADD CONSTRAINT FK_B5A3D944A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B5A3D944A76ED395 ON form_reservation (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE form_reservation DROP FOREIGN KEY FK_B5A3D944A76ED395');
        $this->addSql('DROP INDEX IDX_B5A3D944A76ED395 ON form_reservation');
        $this->addSql('ALTER TABLE form_reservation DROP user_id');
    }
}
