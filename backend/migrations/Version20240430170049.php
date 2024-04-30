<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240430170049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE form_reservation (id INT AUTO_INCREMENT NOT NULL, voyage_id INT DEFAULT NULL, nombre_voyageur INT NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_B5A3D94468C9E5AF (voyage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE form_reservation ADD CONSTRAINT FK_B5A3D94468C9E5AF FOREIGN KEY (voyage_id) REFERENCES voyage (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE form_reservation DROP FOREIGN KEY FK_B5A3D94468C9E5AF');
        $this->addSql('DROP TABLE form_reservation');
    }
}
