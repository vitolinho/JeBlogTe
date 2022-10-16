<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se connecter</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap');

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        h1{
            font-family: 'Playfair Display', serif;
            text-align: center;
            font-size: 42px;
            margin-bottom: 20px;
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

        button{
            margin: 10px 0 10px 0;
            background-color: #b2dffc;
            border: none;
            color: white;
            padding: 6px;
            cursor: pointer;
            border-radius: 4px ;
        }

        button:hover{
            background-color: #0095f6;
            cursor: pointer;
        }

        input{
            border: none;
            padding: 2px;
            width: 300px;
        }

        div{
            font-size: 24px;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        a{
            text-decoration: none;
            font-size: 24px;
            color: black;
        }

        span{
            text-decoration: underline;
        }

        .container{
            padding: 20px;
            background-color: #f1f1f1;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
        }
    </style>
</head>
<body>
    <h1>JeBlogTe</h1>
    <div class="container">
        <div>Votre compte à bien été crée !</div>
        <a href="index.php"><span>Se connecter</span> ➡</a>
</div>
</body>
</html>