<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801073807 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TABLE example (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, relation1_id INTEGER DEFAULT NULL, property1 VARCHAR(255) NOT NULL, property2 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_6EEC9B9F2AE7F37E ON example (relation1_id)');
        $this->addSql('CREATE TABLE relation1 (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, relation_property1 VARCHAR(255) NOT NULL, relation_property2 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE relation2 (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, example_id INTEGER DEFAULT NULL, relation_property1 VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE INDEX IDX_15B7CE7EAB07C711 ON relation2 (example_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP TABLE example');
        $this->addSql('DROP TABLE relation1');
        $this->addSql('DROP TABLE relation2');
    }
}
