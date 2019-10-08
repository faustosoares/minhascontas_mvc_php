<?php

declare(strict_types=1);

namespace FBMS\Contas\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191008182053 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE Fatura (id INT AUTO_INCREMENT NOT NULL, cartao_id INT DEFAULT NULL, mes INT NOT NULL, ano INT NOT NULL, diaFechamento INT NOT NULL, INDEX IDX_5D4AC1E52AF522B5 (cartao_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE Fatura ADD CONSTRAINT FK_5D4AC1E52AF522B5 FOREIGN KEY (cartao_id) REFERENCES Cartao (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE Fatura');
    }
}
