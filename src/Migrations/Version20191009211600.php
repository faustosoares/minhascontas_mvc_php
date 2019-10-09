<?php

declare(strict_types=1);

namespace FBMS\Contas\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191009211600 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faturas_compras DROP FOREIGN KEY FK_16DCB890F2E704D7');
        $this->addSql('ALTER TABLE faturas_compras DROP FOREIGN KEY FK_16DCB890F711B04');
        $this->addSql('ALTER TABLE faturas_compras ADD CONSTRAINT FK_16DCB890F2E704D7 FOREIGN KEY (compra_id) REFERENCES Compra (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE faturas_compras ADD CONSTRAINT FK_16DCB890F711B04 FOREIGN KEY (fatura_id) REFERENCES Fatura (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE faturas_compras DROP FOREIGN KEY FK_16DCB890F711B04');
        $this->addSql('ALTER TABLE faturas_compras DROP FOREIGN KEY FK_16DCB890F2E704D7');
        $this->addSql('ALTER TABLE faturas_compras ADD CONSTRAINT FK_16DCB890F711B04 FOREIGN KEY (fatura_id) REFERENCES Fatura (id)');
        $this->addSql('ALTER TABLE faturas_compras ADD CONSTRAINT FK_16DCB890F2E704D7 FOREIGN KEY (compra_id) REFERENCES Compra (id)');
    }
}
