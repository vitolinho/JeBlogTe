<?php

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST") {
    $title = filter_input(INPUT_POST, "title");
    $content = filter_input(INPUT_POST, "content");
    $written_by = $_SESSION['email'];

    if($title && $content){

        $pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');

        $statement = $pdo->prepare("INSERT INTO articles SET title = '$title', content = '$content', written_by = '$written_by'");

        $statement->execute();

        header('Location: homepage.php');
        exit();
    }
} else{}
?> <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un article</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font-family: sans-serif;
            height: 100vh;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #74EBD5;
            background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
        }

        h1 {
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-size: 42px;
            margin-bottom: 10px;
        }

        h2{
            font-size: 30px;
            font-weight: 400;
        }

        .button{
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

        input{
            border: none;
            padding: 2px;
            width: 300px;
        }

        .titre{
            margin-top: 10px;
            margin-bottom: 10px;
        }

        a{
            text-decoration: none;
            font-size: 20px;
            color: black;
            position: absolute;
            top: 25px;
            left: 25px;
        }

        span{
            text-decoration: underline;
        }
    </style>
</head>
<body>
<h1>JeBlogTe</h1>
<h2>Ajouter un article</h2>
<form method="POST">
    <div class="titre">
        <input type="text" id="title" name="title" placeholder="Votre Titre (ne mettez pas ces caractères ,;/:!') "><br>
    </div>

    <div class="contenu">
        <input type="text" id="content" name="content" placeholder="Votre article (ne mettez pas ces caractères ,;/:!') "/><br>
    </div>

    <input type="submit" value="Poster l'article sur JeBlogTe" class="button"/>
</form>
<a href="homepage.php">⬅ <span>retourner à l'acceuil</span></a>
</body>
</html>
