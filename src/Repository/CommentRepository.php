<?php
namespace App\Repository;
use App\Entity\Comment;
class CommentRepository
{
    public function findAll(int $articleId): array
    {
        $list = [];
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("SELECT * FROM comment WHERE id_article = :articleId");
        $query->bindValue(':articleId', $articleId);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Comment($line["username"], $line["comment"], $line["id_article"], $line["id"]);
        }

        return $list;
    }

    public function persist(Comment $comment)
    {
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("INSERT INTO comment (username, comment, id_article) VALUES (:username, :comment, :id_article)");
        $query->bindValue(':username', $comment->getUsername());
        $query->bindValue(':comment', $comment->getComment());
        $query->bindValue(':id_article', $comment->getArticleId());

        $query->execute();

        $comment->setId($connection->lastInsertId());
    }

  

}
