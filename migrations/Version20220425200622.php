<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425200622 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE panier_command ADD CONSTRAINT FK_74702E55F77D927C FOREIGN KEY (panier_id) REFERENCES panier (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE panier_command ADD CONSTRAINT FK_74702E5533E1689A FOREIGN KEY (command_id) REFERENCES command (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4F77D927C');
        $this->addSql('ALTER TABLE command DROP FOREIGN KEY FK_8ECAEAD4D73DB560');
        $this->addSql('ALTER TABLE panier_command DROP FOREIGN KEY FK_74702E55F77D927C');
        $this->addSql('ALTER TABLE panier_command DROP FOREIGN KEY FK_74702E5533E1689A');
    }
}
