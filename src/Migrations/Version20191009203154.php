<?php

declare(strict_types=1);

namespace FBMS\Contas\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009203154 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE faturas_compras (fatura_id INT NOT NULL, compra_id INT NOT NULL, INDEX IDX_16DCB890F711B04 (fatura_id), INDEX IDX_16DCB890F2E704D7 (compra_id), PRIMARY KEY(fatura_id, compra_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE faturas_compras ADD CONSTRAINT FK_16DCB890F711B04 FOREIGN KEY (fatura_id) REFERENCES Fatura (id)');
        $this->addSql('ALTER TABLE faturas_compras ADD CONSTRAINT FK_16DCB890F2E704D7 FOREIGN KEY (compra_id) REFERENCES Compra (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE faturas_compras');
    }
}
