<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if($id) {

    $pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');

    $statement = $pdo->prepare("DELETE FROM articles WHERE article_id = :id");

    $statement->execute([
        ':id'=>$id
    ]);
}

header('Location: homepage.php');
exit();