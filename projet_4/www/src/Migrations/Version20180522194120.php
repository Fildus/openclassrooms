<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180522194120 extends AbstractMigration
{
    /**
     * @param Schema $schema
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE fares (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE calendar (id INT AUTO_INCREMENT NOT NULL, day DATE NOT NULL, opened TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE visitors (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, birthday DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, total INT NOT NULL, order_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, order_id INT DEFAULT NULL, visitor_id INT DEFAULT NULL, fare_id INT DEFAULT NULL, fare_type TINYINT(1) NOT NULL, date DATE NOT NULL, discount TINYINT(1) NOT NULL, INDEX IDX_54469DF48D9F6D38 (order_id), UNIQUE INDEX UNIQ_54469DF470BEE6D (visitor_id), INDEX IDX_54469DF4A048D2E2 (fare_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF48D9F6D38 FOREIGN KEY (order_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF470BEE6D FOREIGN KEY (visitor_id) REFERENCES visitors (id)');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A048D2E2 FOREIGN KEY (fare_id) REFERENCES fares (id)');
    }

    /**
     * @param Schema $schema
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Migrations\AbortMigrationException
     */
    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF4A048D2E2');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF470BEE6D');
        $this->addSql('ALTER TABLE tickets DROP FOREIGN KEY FK_54469DF48D9F6D38');
        $this->addSql('DROP TABLE fares');
        $this->addSql('DROP TABLE calendar');
        $this->addSql('DROP TABLE visitors');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE tickets');
    }
}
