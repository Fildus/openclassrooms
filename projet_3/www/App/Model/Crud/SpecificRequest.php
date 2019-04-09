<?php


namespace App\Model\Crud;


/**
 * Class SpecificRequest
 * @package App\Model\Crud
 */
class SpecificRequest
{
    private $pdo;

    /**
     * SpecificRequest constructor.
     * @param \PDO $pdo
     */
    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param array $data
     * @return \PDOStatement
     */
    public function readArticle(array $data): \PDOStatement
    {
        if (isset($data['id'])) {
            $sql = /** @lang fr */
                "
                SELECT
                  Articles.id               AS article_id,
                  Articles.title            AS article_title,
                  Articles.summary          AS article_summary,
                  Articles.content          AS article_content,
                  Articles.creation_date    AS article_creation_date,
                  Articles.visibility       AS article_visibility,
                  Articles.chapter_id       AS article_chapter_id,
                
                  Chapters.id               AS chapter_id,
                  Chapters.name             AS chapter_name,
                  Chapters.summary          AS chapter_summary,
                  Chapters.img              AS chapter_img,
                
                  Users.id                  AS users_id,
                  Users.pseudo              AS users_pseudo,
                  Users.email               AS users_email,
                  Users.password            AS users_password,
                  Users.content             AS users_content,
                  Users.creation_date       AS users_creation_date,
                  Users.rights              AS users_rights
                
                FROM Articles
                LEFT JOIN Users
                  ON Users.id = Articles.author_id
                LEFT JOIN Chapters
                  ON Chapters.id = Articles.chapter_id
                WHERE Articles.id = $data[id]
               ";
        }

        if (isset($data['page'], $data['limit'])) {
            $offset = $data['limit']*$data['page']-$data['limit'];
            $sql = /** @lang fr */
                "
                SELECT
                  Articles.id               AS article_id,
                  Articles.title            AS article_title,
                  Articles.content          AS article_content,
                  Articles.creation_date    AS article_creation_date,
                  Articles.visibility       AS article_visibility,
                
                  Chapters.id               AS chapter_id,
                  Chapters.name             AS chapter_name,
                  Chapters.summary          AS chapter_summary,
                  Chapters.img              AS chapter_img,
                
                  Users.id                  AS users_id,
                  Users.pseudo              AS users_pseudo,
                  Users.email               AS users_email,
                  Users.password            AS users_password,
                  Users.content             AS users_content,
                  Users.creation_date       AS users_creation_date,
                  Users.rights              AS users_rights
                
                FROM Articles
                LEFT JOIN Users
                  ON Users.id = Articles.author_id
                LEFT JOIN Chapters
                  ON Chapters.id = Articles.chapter_id
                WHERE Articles.id
                ORDER BY Articles.id LIMIT $data[limit] OFFSET $offset
        
                ";
        }

        return $this->pdo->query($sql);
    }

}