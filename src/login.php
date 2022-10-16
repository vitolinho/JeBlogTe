<?php

session_start();

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');

    $req = "SELECT * FROM utilisateurs WHERE email = '$email'";

    $statement = $pdo->prepare($req);

    $statement->execute();

    if($statement->rowCount() > 0)
    {
        $data = $statement->fetchAll();
        if(password_verify($pass, $data[0]["password"]))
        {
            header('Location: homepage.php');
            $_SESSION['email'] = $email;
            exit();
        }
        else{
            header('Location: index-wrong-user-pass.php');
            exit();
        }
    }
    else
    {
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $req = "INSERT INTO utilisateurs SET email = '$email', password = '$pass', admin = false;";

        $statement = $pdo->prepare($req);

        $statement->execute();

        header('Location: user-created.php');
        exit();
    }
}
?>