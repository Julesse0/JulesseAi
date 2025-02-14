<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250213205548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data ADD message LONGTEXT NOT NULL, ADD response LONGTEXT DEFAULT NULL, DROP anime, DROP traduction');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data ADD anime VARCHAR(255) NOT NULL, ADD traduction VARCHAR(255) DEFAULT NULL, DROP message, DROP response, DROP timestamp');
    }
}
