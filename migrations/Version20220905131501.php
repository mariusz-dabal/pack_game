<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220905131501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dopamine_password (id INT NOT NULL, start TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, finish TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created TIMESTAMP DEFAULT CURRENT_TIMESTAMP, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN dopamine_password.start IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN dopamine_password.finish IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN dopamine_password.created IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE dopamine_password');
    }
}
