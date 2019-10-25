<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191022141849 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE image CHANGE user_id user_id INT DEFAULT NULL, CHANGE path path VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) DEFAULT NULL, CHANGE roles roles JSON NOT NULL, CHANGE password password VARCHAR(255) DEFAULT NULL, CHANGE first_name first_name VARCHAR(255) DEFAULT NULL, CHANGE last_name last_name VARCHAR(255) DEFAULT NULL, CHANGE bdate bdate DATETIME DEFAULT NULL, CHANGE city_id city_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL, CHANGE vk_id vk_id VARCHAR(255) DEFAULT NULL, CHANGE vk_token vk_token VARCHAR(255) DEFAULT NULL, CHANGE avatar_file_name avatar_file_name VARCHAR(255) DEFAULT NULL, CHANGE avatar_content_type avatar_content_type VARCHAR(255) DEFAULT NULL, CHANGE avatar_file_size avatar_file_size INT DEFAULT NULL, CHANGE avatar_updated_at avatar_updated_at DATETIME DEFAULT NULL, CHANGE phone phone VARCHAR(255) DEFAULT NULL, CHANGE vk_phone vk_phone VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL, CHANGE date_of_birth date_of_birth DATETIME DEFAULT NULL, CHANGE firstname firstname VARCHAR(64) DEFAULT NULL, CHANGE lastname lastname VARCHAR(64) DEFAULT NULL, CHANGE website website VARCHAR(64) DEFAULT NULL, CHANGE biography biography VARCHAR(1000) DEFAULT NULL, CHANGE gender gender VARCHAR(1) DEFAULT NULL, CHANGE locale locale VARCHAR(8) DEFAULT NULL, CHANGE timezone timezone VARCHAR(64) DEFAULT NULL, CHANGE phone phone VARCHAR(64) DEFAULT NULL, CHANGE facebook_uid facebook_uid VARCHAR(255) DEFAULT NULL, CHANGE facebook_name facebook_name VARCHAR(255) DEFAULT NULL, CHANGE facebook_data facebook_data JSON DEFAULT NULL, CHANGE twitter_uid twitter_uid VARCHAR(255) DEFAULT NULL, CHANGE twitter_name twitter_name VARCHAR(255) DEFAULT NULL, CHANGE twitter_data twitter_data JSON DEFAULT NULL, CHANGE gplus_uid gplus_uid VARCHAR(255) DEFAULT NULL, CHANGE gplus_name gplus_name VARCHAR(255) DEFAULT NULL, CHANGE gplus_data gplus_data JSON DEFAULT NULL, CHANGE token token VARCHAR(255) DEFAULT NULL, CHANGE two_step_code two_step_code VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE acl_object_identities CHANGE parent_object_identity_id parent_object_identity_id INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE acl_entries CHANGE object_identity_id object_identity_id INT UNSIGNED DEFAULT NULL, CHANGE field_name field_name VARCHAR(50) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE acl_entries CHANGE object_identity_id object_identity_id INT UNSIGNED DEFAULT NULL, CHANGE field_name field_name VARCHAR(50) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE acl_object_identities CHANGE parent_object_identity_id parent_object_identity_id INT UNSIGNED DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\', CHANGE date_of_birth date_of_birth DATETIME DEFAULT \'NULL\', CHANGE firstname firstname VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE lastname lastname VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE website website VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE biography biography VARCHAR(1000) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE gender gender VARCHAR(1) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE locale locale VARCHAR(8) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE timezone timezone VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE phone phone VARCHAR(64) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE facebook_uid facebook_uid VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE facebook_name facebook_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE facebook_data facebook_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE twitter_uid twitter_uid VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE twitter_name twitter_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE twitter_data twitter_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE gplus_uid gplus_uid VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE gplus_name gplus_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE gplus_data gplus_data LONGTEXT DEFAULT NULL COLLATE utf8mb4_bin, CHANGE token token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE two_step_code two_step_code VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE image CHANGE user_id user_id INT DEFAULT NULL, CHANGE path path VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE roles roles LONGTEXT NOT NULL COLLATE utf8mb4_bin, CHANGE password password VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE first_name first_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE last_name last_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE bdate bdate DATETIME DEFAULT \'NULL\', CHANGE city_id city_id INT DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT \'NULL\', CHANGE updated_at updated_at DATETIME DEFAULT \'NULL\', CHANGE vk_id vk_id VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE vk_token vk_token VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE avatar_file_name avatar_file_name VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE avatar_content_type avatar_content_type VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE avatar_file_size avatar_file_size INT DEFAULT NULL, CHANGE avatar_updated_at avatar_updated_at DATETIME DEFAULT \'NULL\', CHANGE phone phone VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci, CHANGE vk_phone vk_phone VARCHAR(255) DEFAULT \'NULL\' COLLATE utf8mb4_unicode_ci');
    }
}
