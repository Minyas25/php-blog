<?php
require '../vendor/autoload.php';
$connection = new PDO("mysql:host=localhost:3306;dbname=project_blog", "root", "Minyas25");
$query = $connection->prepare("SELECT * FROM category");
$query->execute();
// foreach($query->fetchAll() as $line) {
//     echo $line['name'];
// }
