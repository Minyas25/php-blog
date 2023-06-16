<?php

namespace App\Repository;
use App\Entity\Category;
use App\Repository\Database_blog;

class CategoryRepository
{
    public function findAll(): array
    {
        $list = [];
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("SELECT * FROM category");

        $query->execute();

        foreach ($query->fetchAll() as $line) {
            $list[] = new Category($line["name"], $line["id"]);
        }

        return $list;
    }

    public function findById(int $id): ?Category
    {
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("SELECT * FROM category WHERE id=:id ");
        $query->bindValue(":id", $id);
        $query->execute();

        foreach ($query->fetchAll() as $line) {
            return new Category($line["name"], $line["id"]);
        }

        return null;
    }

    public function persist(Category $category)
    {
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("INSERT INTO category (name) VALUES (:name)");
        $query->bindValue(':name', $category->getName());

        $query->execute();

        $category->setId($connection->lastInsertId());
    }

    public function delete(int $id)
    {
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("DELETE FROM category WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
    }

    public function update(Category $category)
    {
        $connection = Database_blog::getConnection();

        $query = $connection->prepare("UPDATE category SET name=:name WHERE id=:id");
        $query->bindValue(':name', $category->getName());
        $query->bindValue(':id', $category->getId());

        $query->execute();
    }
}
