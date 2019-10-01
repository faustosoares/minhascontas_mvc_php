<?php

declare(strict_types=1);

namespace FBMS\Contas\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191001184756 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Cartao DROP FOREIGN KEY FK_AF79092879231BC7');
        $this->addSql('DROP INDEX UNIQ_AF79092879231BC7 ON Cartao');
        $this->addSql('ALTER TABLE Cartao CHANGE titular titular_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Cartao ADD CONSTRAINT FK_AF790928F9F0FF64 FOREIGN KEY (titular_id) REFERENCES Pessoa (id)');
        $this->addSql('CREATE INDEX IDX_AF790928F9F0FF64 ON Cartao (titular_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE Cartao DROP FOREIGN KEY FK_AF790928F9F0FF64');
        $this->addSql('DROP INDEX IDX_AF790928F9F0FF64 ON Cartao');
        $this->addSql('ALTER TABLE Cartao CHANGE titular_id titular INT DEFAULT NULL');
        $this->addSql('ALTER TABLE Cartao ADD CONSTRAINT FK_AF79092879231BC7 FOREIGN KEY (titular) REFERENCES Pessoa (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AF79092879231BC7 ON Cartao (titular)');
    }
}
