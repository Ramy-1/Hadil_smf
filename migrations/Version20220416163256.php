<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220416163256 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE panier_plat');
        $this->addSql('DROP INDEX IDX_8ECAEAD4F77D927C ON command');
        $this->addSql('ALTER TABLE command ADD confirmed TINYINT(1) NOT NULL, DROP panier_id, CHANGE id_produit plat_id INT NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8ECAEAD4D73DB560 ON command (plat_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE panier_plat (panier_id INT NOT NULL, plat_id INT NOT NULL, INDEX IDX_D4DE877EF77D927C (panier_id), INDEX IDX_D4DE877ED73DB560 (plat_id), PRIMARY KEY(panier_id, plat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4D73DB560');
        $this->addSql('DROP INDEX UNIQ_8ECAEAD4D73DB560 ON command');
        $this->addSql('ALTER TABLE command ADD panier_id INT DEFAULT NULL, DROP confirmed, CHANGE plat_id id_produit INT NOT NULL');
        $this->addSql('CREATE INDEX IDX_8ECAEAD4F77D927C ON command (panier_id)');
    }
}
