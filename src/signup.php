<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S'inscrire</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');
    </style>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1{
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-size: 42px;
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

        .container{
            padding: 20px;
            background-color: #f1f1f1;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        }

        button{
            margin: 10px 0 10px 0;
            background-color: #b2dffc;
            border: none;
            color: white;
            padding: 6px;
            border-radius: 4px;
        }

        button:hover{
            background-color: #0095f6;
        }

        .p-btn{
            text-align: center;
        }

        input{
            border: none;
            padding: 2px;
            width: 300px;
        }

        .email{
            margin-bottom: 10px;
            margin-top: 10px;
        }

        a{
            text-decoration: none;
            color: #0095f6;
        }
    </style>
</head>
<body>
<?php
$pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');

$statement = $pdo->prepare("SELECT * FROM utilisateurs");

$statement->execute();

$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <h1>JeBlogTe</h1>
    <form action="login.php" method="POST">
        <input type="text" name="email" placeholder="E-mail" class="email"><br>

        <input type="password" name="password" placeholder="Mot de passe"><br>

        <p class="p-btn"><button name="submit">S'inscrire</button></p>
    </form>
    <span>Vous avez un compte ? </span><a href="index.php">Connectez vous </a>
</div>
</body>
</html>