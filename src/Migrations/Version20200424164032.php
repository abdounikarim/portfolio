<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200424164032 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, started DATE NOT NULL, ended DATE DEFAULT NULL, description LONGTEXT NOT NULL, INDEX IDX_590C1033DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience_skill (experience_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_3D6F986146E90E27 (experience_id), INDEX IDX_3D6F98615585C142 (skill_id), PRIMARY KEY(experience_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(20) NOT NULL, INDEX IDX_5E3DE4773DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, started DATE NOT NULL, ended DATE DEFAULT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_2FB3D0EE3DA5256D (image_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_skill (project_id INT NOT NULL, skill_id INT NOT NULL, INDEX IDX_4D68EDE9166D1F9C (project_id), INDEX IDX_4D68EDE95585C142 (skill_id), PRIMARY KEY(project_id, skill_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE experience ADD CONSTRAINT FK_590C1033DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE experience_skill ADD CONSTRAINT FK_3D6F986146E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE experience_skill ADD CONSTRAINT FK_3D6F98615585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE skill ADD CONSTRAINT FK_5E3DE4773DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EE3DA5256D FOREIGN KEY (image_id) REFERENCES image (id)');
        $this->addSql('ALTER TABLE project_skill ADD CONSTRAINT FK_4D68EDE9166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE project_skill ADD CONSTRAINT FK_4D68EDE95585C142 FOREIGN KEY (skill_id) REFERENCES skill (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE experience_skill DROP FOREIGN KEY FK_3D6F986146E90E27');
        $this->addSql('ALTER TABLE experience_skill DROP FOREIGN KEY FK_3D6F98615585C142');
        $this->addSql('ALTER TABLE project_skill DROP FOREIGN KEY FK_4D68EDE95585C142');
        $this->addSql('ALTER TABLE project_skill DROP FOREIGN KEY FK_4D68EDE9166D1F9C');
        $this->addSql('ALTER TABLE experience DROP FOREIGN KEY FK_590C1033DA5256D');
        $this->addSql('ALTER TABLE skill DROP FOREIGN KEY FK_5E3DE4773DA5256D');
        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EE3DA5256D');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE experience_skill');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE skill');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_skill');
        $this->addSql('DROP TABLE image');
    }
}
