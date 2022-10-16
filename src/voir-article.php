<?php

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

$pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');

$statement = $pdo->prepare("SELECT * FROM articles WHERE article_id = :id");

$statement->execute([
    ":id" => $id
]);

$statement->setFetchMode(PDO::FETCH_ASSOC);

$article = $statement->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Voir article</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            height: 100vh;
            width: 100vw;
            font-family: sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #74EBD5;
            background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
        }

        .jeblogte{
            text-align: center;
            font-size: 42px;
            margin-bottom: 10px;
            font-family: 'Playfair Display', serif;
        }

        .container{
            background-color: #f1f1f1;
            height: 500px;
            width: 80%;
        }

        .article-titre{
            width: 100%;
            height: 20%;
            padding: 25px 0 0 20px;
            background-color: #e0e0e0;
            font-size: 24px;
        }

        .article-content{
            width: 100%;
            height: 70%;
            padding: 25px 0 0 20px;
            font-size: 24px;
        }

        .written-by{
            width: 100%;
            height: 10%;
            text-align: right;
            padding: 20px 20px 20px 0;
            font-size: 24px;
        }

        .titre-span{
            font-weight: bold;
            text-transform: capitalize;
        }

        .written-by-span{
            font-weight: bold;
        }

        a{
            text-decoration: none;
            font-size: 20px;
            color: black;
            position: absolute;
            top: 25px;
            left: 25px;
        }

        .retour-acceuil{
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1 class="jeblogte">JeBlogTe</h1>
<div class="container">
    <div class="article-titre">
        <h1><span class="titre-span"><?=$article["title"]?></span></h1>
    </div>

    <div class="article-content">
        <span><?=$article["content"]?></span>
    </div>

    <div class="written-by">
        <em>Écrit par : <span class="written-by-span"><?= $article["written_by"] ?></span></em>
    </div>
</div>
<a href="homepage.php">⬅ <span class="retour-acceuil">retourner à l'acceuil</span></a>
</body>
</html>
