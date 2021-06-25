<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210625211801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE portfolio_experience_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE portfolio_image_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE portfolio_project_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE portfolio_skill_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE portfolio_user_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE portfolio_experience (id INT NOT NULL, image_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, started DATE NOT NULL, ended DATE DEFAULT NULL, description TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_37B605713DA5256D ON portfolio_experience (image_id)');
        $this->addSql('CREATE TABLE experience_skill (experience_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(experience_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_3D6F986146E90E27 ON experience_skill (experience_id)');
        $this->addSql('CREATE INDEX IDX_3D6F98615585C142 ON experience_skill (skill_id)');
        $this->addSql('CREATE TABLE portfolio_image (id INT NOT NULL, name VARCHAR(255) NOT NULL, alt VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE portfolio_project (id INT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, started DATE NOT NULL, ended DATE DEFAULT NULL, link VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7906FF203DA5256D ON portfolio_project (image_id)');
        $this->addSql('CREATE TABLE project_skill (project_id INT NOT NULL, skill_id INT NOT NULL, PRIMARY KEY(project_id, skill_id))');
        $this->addSql('CREATE INDEX IDX_4D68EDE9166D1F9C ON project_skill (project_id)');
        $this->addSql('CREATE INDEX IDX_4D68EDE95585C142 ON project_skill (skill_id)');
        $this->addSql('CREATE TABLE portfolio_skill (id INT NOT NULL, image_id INT DEFAULT NULL, name VARCHAR(20) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_365CE323DA5256D ON portfolio_skill (image_id)');
        $this->addSql('CREATE TABLE portfolio_user (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_BDA291B3E7927C74 ON portfolio_user (email)');
        $this->addSql('ALTER TABLE portfolio_experience ADD CONSTRAINT FK_37B605713DA5256D FOREIGN KEY (image_id) REFERENCES portfolio_image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE experience_skill ADD CONSTRAINT FK_3D6F986146E90E27 FOREIGN KEY (experience_id) REFERENCES portfolio_experience (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE experience_skill ADD CONSTRAINT FK_3D6F98615585C142 FOREIGN KEY (skill_id) REFERENCES portfolio_skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portfolio_project ADD CONSTRAINT FK_7906FF203DA5256D FOREIGN KEY (image_id) REFERENCES portfolio_image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project_skill ADD CONSTRAINT FK_4D68EDE9166D1F9C FOREIGN KEY (project_id) REFERENCES portfolio_project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE project_skill ADD CONSTRAINT FK_4D68EDE95585C142 FOREIGN KEY (skill_id) REFERENCES portfolio_skill (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE portfolio_skill ADD CONSTRAINT FK_365CE323DA5256D FOREIGN KEY (image_id) REFERENCES portfolio_image (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE experience_skill DROP CONSTRAINT FK_3D6F986146E90E27');
        $this->addSql('ALTER TABLE portfolio_experience DROP CONSTRAINT FK_37B605713DA5256D');
        $this->addSql('ALTER TABLE portfolio_project DROP CONSTRAINT FK_7906FF203DA5256D');
        $this->addSql('ALTER TABLE portfolio_skill DROP CONSTRAINT FK_365CE323DA5256D');
        $this->addSql('ALTER TABLE project_skill DROP CONSTRAINT FK_4D68EDE9166D1F9C');
        $this->addSql('ALTER TABLE experience_skill DROP CONSTRAINT FK_3D6F98615585C142');
        $this->addSql('ALTER TABLE project_skill DROP CONSTRAINT FK_4D68EDE95585C142');
        $this->addSql('DROP SEQUENCE portfolio_experience_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE portfolio_image_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE portfolio_project_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE portfolio_skill_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE portfolio_user_id_seq CASCADE');
        $this->addSql('DROP TABLE portfolio_experience');
        $this->addSql('DROP TABLE experience_skill');
        $this->addSql('DROP TABLE portfolio_image');
        $this->addSql('DROP TABLE portfolio_project');
        $this->addSql('DROP TABLE project_skill');
        $this->addSql('DROP TABLE portfolio_skill');
        $this->addSql('DROP TABLE portfolio_user');
    }
}
