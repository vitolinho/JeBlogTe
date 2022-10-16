<?php
session_start();

$pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');

$statement = $pdo->prepare("SELECT * FROM articles");

$statement->execute();

$articles = $statement->fetchAll(PDO::FETCH_ASSOC);

$user = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            width: 100vw;
            background-color: #74EBD5;
            background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
        }

        h1{
            font-family: 'Playfair Display', serif;
            font-size: 42px;
        }

        h2{
            font-size: 24px;
            font-weight: normal;
        }

        a{
            text-decoration: none;
            cursor: pointer;
            color: #0095f6;
        }

        .buttons{
            margin-top: 10px;
            display: flex;
            justify-content: space-around;
            flex-direction: row;
            gap: 20px;
        }

        .add{
            margin-right: 30px;
        }

        .logout{
            margin-left: 30px;
        }

        .button {
            margin: 10px 0 10px 0;
            background-color: #b2dffc;
            border: none;
            color: white;
            padding: 6px;
            cursor: pointer;
            border-radius: 4px ;
        }

        .button:hover{
            background-color: #0095f6;
            cursor: pointer;
        }

        table{
            width: 50%;
            height: 40%;
            border: 1px black;
            font-size: 24px;
        }

        .suppr-written-by{
            border: none;
        }
    </style>
</head>
<body>
<h1>JeBlogTe</h1></br>
<?php
if($user=='admin'){
    echo 'Coucou admin  🥰🥰! '; ?>
    <div class="buttons">
        <a class="add button" href="./ajt-article.php">Ajouter un article</a>
        <a class="logout button" href="deconnexion.php">Se déconnecter</a>
    </div>
<table border="1px">
    <thead>
    <tr>
        <th>Articles : </th>
        <th>Suppresion?</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($articles as $article): ?>
<tr>
    <td><a href="voir-article.php?id=<?= $article["article_id"]?>">
            <?= $article["title"]?>
        </a>
    </td>
    <td>
        <a href="suppr-article.php?id=<?=$article["article_id"]?>">
            Supprimer ❌
        </a>
    </td>
</tr>
<?php endforeach ?>
</tbody>
</table>
<?php
}
elseif($user!='admin'){
    echo 'Bienvenue ' . $user . ' 👋👋!'; ?>
    <div class="buttons">
        <a class="add button" href="./ajt-article.php">Ajouter un article</a>
        <a class="logout button" href="deconnexion.php">Se déconnecter</a>
    </div>
<table border="1px">
    <thead>
    <tr>
        <th>Articles : </th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($articles as $article): ?>
        <tr>
            <td><a href="voir-article.php?id=<?= $article["article_id"]?>">
                    <?= $article["title"]?>
                </a>
            </td>
            <?php
            if($user == $article["written_by"])
            {?>
            <td class="suppr-written-by">
                <a href="suppr-article.php?id=<?=$article["article_id"]?>">
                    Supprimer votre article ❌
                </a>
            </td>
            <?php
            }
            ?>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
<?php } ?>
</body>