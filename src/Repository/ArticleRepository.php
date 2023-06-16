<?php
namespace App\Repository;
use App\Entity\Article;

class ArticleRepository
{

public function findAll(): array
    {
        $list = [];
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("SELECT * FROM article");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Article($line["name"], $line["description"], $line["id_category"], $line["id"]);
        }

        return $list;
    }

    /**
     * Méthode permettant de récupérer un article spécifique en se basant sur son id
     * Si aucun article n'existe pour cet id dans la base de données, on renvoie null
     * 
     * @param int $id L'id de l'article que l'on souhaite récupérer
     * @return Article|null L'article correspondant à l'id spécifié, ou null s'il n'existe pas
     */
    public function findByCategoryId(int $id): array
    {
        $list = [];
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("SELECT * FROM article WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[]= new Article($line["name"], $line["description"], $line["id_category"], $line["id"]);
        }

        return $list;
    }

    /**
     * Méthode qui va prendre une instance de Article en argument et va la transformer en requête INSERT INTO pour 
     * la faire persister en base de données
     * Très important d'utiliser des :placeholder dans la requête et des bindValue afin d'éviter les injections SQL 
     * (le fait d'avoir des chaînes de caractères contenant du code qui pourrait être exécuté par SQL à notre insu)
     * 
     * @param Article $article L'article que l'on souhaite faire persister (qui n'aura donc pas d'id au début de la méthode, car pas encore dans la bdd)
     */
    public function persist(Article $article)
    {
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("INSERT INTO article (name, description, id_category) VALUES (:name, :description, :id_category)");
        $query->bindValue(':name', $article->getName());
        $query->bindValue(':description', $article->getDescription());
        $query->bindValue(':id_category', $article->getCategoryId());

        $query->execute();

        // On assigne l'id auto incrémenté à l'instance de l'article afin que l'objet soit complet après le persist
        $article->setId($connection->lastInsertId());
    }
}

