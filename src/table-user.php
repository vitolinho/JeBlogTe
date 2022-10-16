<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table utilisateurs</title>
    <style>
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
            flex-direction:column ;
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
<h1>les utilisateurs</h1>
<table border="1px">
    <thead>
    <tr>
        <th>user_id</th>
        <th>email</th>
        <th>password</th>
        <th>admin</th>

    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?=$user["user_id"]?></td>
            <td><?=$user["email"]?></td>
            <td><?=$user["password"]?></td>
            <td><?=$user["admin"]?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</body>
</html>