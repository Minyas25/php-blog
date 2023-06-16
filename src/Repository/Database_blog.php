<?php
namespace App\Repository;
class Database_blog {
    public static function getConnection() {
        return new \PDO("mysql:host=localhost:3306;dbname=project_blog", "root", "Minyas25");
    }
}