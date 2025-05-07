<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250507174835 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE projet (
                id SERIAL NOT NULL,
                client_id INT NOT NULL,
                name VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                status VARCHAR(255) NOT NULL,
                start_date DATE NOT NULL,
                end_date DATE DEFAULT NULL,
                created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL,
                updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL,
                PRIMARY KEY(id)
            )
        SQL);
        $this->addSql(<<<'SQL'
            CREATE INDEX IDX_50159CA919EB6921 ON projet (client_id)
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN projet.created_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            COMMENT ON COLUMN projet.updated_at IS '(DC2Type:datetime_immutable)'
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE projet ADD CONSTRAINT FK_Projet_Client
            FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE SCHEMA public
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE projet DROP CONSTRAINT FK_Projet_Client
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE projet
        SQL);
    }
}
