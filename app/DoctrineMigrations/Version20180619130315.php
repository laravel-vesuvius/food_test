<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180619130315 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE production_capacity (id INT AUTO_INCREMENT NOT NULL, product_group_id INT DEFAULT NULL, production_unit_id INT NOT NULL, time_unit_id INT NOT NULL, amount INT NOT NULL, INDEX IDX_4D9F0A9035E4B3D0 (product_group_id), INDEX IDX_4D9F0A90EDA8FDD0 (production_unit_id), INDEX IDX_4D9F0A90AC3AD16B (time_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_group (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE production_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(32) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE production_capacity ADD CONSTRAINT FK_4D9F0A9035E4B3D0 FOREIGN KEY (product_group_id) REFERENCES product_group (id)');
        $this->addSql('ALTER TABLE production_capacity ADD CONSTRAINT FK_4D9F0A90EDA8FDD0 FOREIGN KEY (production_unit_id) REFERENCES production_unit (id)');
        $this->addSql('ALTER TABLE production_capacity ADD CONSTRAINT FK_4D9F0A90AC3AD16B FOREIGN KEY (time_unit_id) REFERENCES time_unit (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE production_capacity DROP FOREIGN KEY FK_4D9F0A9035E4B3D0');
        $this->addSql('ALTER TABLE production_capacity DROP FOREIGN KEY FK_4D9F0A90EDA8FDD0');
        $this->addSql('ALTER TABLE production_capacity DROP FOREIGN KEY FK_4D9F0A90AC3AD16B');
        $this->addSql('DROP TABLE production_capacity');
        $this->addSql('DROP TABLE product_group');
        $this->addSql('DROP TABLE production_unit');
        $this->addSql('DROP TABLE time_unit');
    }
}
