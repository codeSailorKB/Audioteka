<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200516081558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("INSERT INTO `product` (`id`, `title`, `price`) VALUES (NULL, 'The Godfather', '59.99')");
        $this->addSql("INSERT INTO `product` (`id`, `title`, `price`) VALUES (NULL, 'Steve Jobs', '49.95'), (NULL, 'The Return of Sherlock Holmes', '39.99')");
        $this->addSql("INSERT INTO `product` (`id`, `title`, `price`) VALUES (NULL, 'The Little Prince', '29.99'), (NULL, 'I Hate Myselfie!', '19.99')");
        $this->addSql("INSERT INTO `product` (`id`, `title`, `price`) VALUES (NULL, 'The Trial', '9.99')");

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
