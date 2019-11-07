<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191104192514 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');


        $this->addSql('CREATE TABLE #mysql50#fos_group 2 (id INT UNSIGNED AUTO_INCREMENT NOT NULL, name VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, roles LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\') DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'Table \'\'docker_symfony4.#mysql50#fos_group 2\'\' doesn\'\'t exist in engine\' ');
        $this->addSql('CREATE TABLE #mysql50#fos_user 2 (id INT UNSIGNED AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, username_canonical VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, email VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, email_canonical VARCHAR(180) NOT NULL COLLATE utf8mb4_unicode_ci, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, last_login DATETIME DEFAULT \'NULL\', confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, password_requested_at DATETIME DEFAULT \'NULL\', roles LONGTEXT NOT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, date_of_birth DATETIME DEFAULT \'NULL\', firstname VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, lastname VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, website VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, biography VARCHAR(1000) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, gender VARCHAR(1) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, locale VARCHAR(8) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, timezone VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, phone VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, facebook_uid VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, facebook_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, facebook_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, twitter_uid VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, twitter_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, twitter_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, gplus_uid VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, gplus_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, gplus_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, two_step_code VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'Table \'\'docker_symfony4.#mysql50#fos_user 2\'\' doesn\'\'t exist in engine\' ');
        $this->addSql('CREATE TABLE #mysql50#notifications 2 (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, platform VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, token VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, title VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, body VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, data JSON NOT NULL COLLATE utf8mb4_bin COMMENT \'(DC2Type:json_array)\', status VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'Table \'\'docker_symfony4.#mysql50#notifications 2\'\' doesn\'\'t exist in engine\' ');
    }
}
