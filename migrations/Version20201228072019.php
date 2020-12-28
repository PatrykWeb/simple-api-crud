<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201228072019 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE app_card (id INT AUTO_INCREMENT NOT NULL, customer_id INT DEFAULT NULL, date_time DATETIME NOT NULL, UNIQUE INDEX UNIQ_133ABD739395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_product (card_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_84508EDB4ACC9A20 (card_id), INDEX IDX_84508EDB4584665A (product_id), PRIMARY KEY(card_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_customer (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(100) NOT NULL, phone_number VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_product (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(150) NOT NULL, title VARCHAR(100) NOT NULL, price INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_card ADD CONSTRAINT FK_133ABD739395C3F3 FOREIGN KEY (customer_id) REFERENCES app_customer (id)');
        $this->addSql('ALTER TABLE card_product ADD CONSTRAINT FK_84508EDB4ACC9A20 FOREIGN KEY (card_id) REFERENCES app_card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_product ADD CONSTRAINT FK_84508EDB4584665A FOREIGN KEY (product_id) REFERENCES app_product (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card_product DROP FOREIGN KEY FK_84508EDB4ACC9A20');
        $this->addSql('ALTER TABLE app_card DROP FOREIGN KEY FK_133ABD739395C3F3');
        $this->addSql('ALTER TABLE card_product DROP FOREIGN KEY FK_84508EDB4584665A');
        $this->addSql('DROP TABLE app_card');
        $this->addSql('DROP TABLE card_product');
        $this->addSql('DROP TABLE app_customer');
        $this->addSql('DROP TABLE app_product');
    }
}
