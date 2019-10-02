<?php

declare(strict_types=1);

namespace FBMS\Contas\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191002194325 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Compra ADD categoria_id INT DEFAULT NULL, ADD cartao_id INT DEFAULT NULL, ADD pessoa_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Compra ADD CONSTRAINT FK_996D34C93397707A FOREIGN KEY (categoria_id) REFERENCES Categoria (id)');
        $this->addSql('ALTER TABLE Compra ADD CONSTRAINT FK_996D34C92AF522B5 FOREIGN KEY (cartao_id) REFERENCES Cartao (id)');
        $this->addSql('ALTER TABLE Compra ADD CONSTRAINT FK_996D34C9DF6FA0A5 FOREIGN KEY (pessoa_id) REFERENCES Pessoa (id)');
        $this->addSql('CREATE INDEX IDX_996D34C93397707A ON Compra (categoria_id)');
        $this->addSql('CREATE INDEX IDX_996D34C92AF522B5 ON Compra (cartao_id)');
        $this->addSql('CREATE INDEX IDX_996D34C9DF6FA0A5 ON Compra (pessoa_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Compra DROP FOREIGN KEY FK_996D34C93397707A');
        $this->addSql('ALTER TABLE Compra DROP FOREIGN KEY FK_996D34C92AF522B5');
        $this->addSql('ALTER TABLE Compra DROP FOREIGN KEY FK_996D34C9DF6FA0A5');
        $this->addSql('DROP INDEX IDX_996D34C93397707A ON Compra');
        $this->addSql('DROP INDEX IDX_996D34C92AF522B5 ON Compra');
        $this->addSql('DROP INDEX IDX_996D34C9DF6FA0A5 ON Compra');
        $this->addSql('ALTER TABLE Compra DROP categoria_id, DROP cartao_id, DROP pessoa_id');
    }
}
