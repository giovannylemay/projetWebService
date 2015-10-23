<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Authentification</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="start" title="Accueil" href="index.php" />
    <link rel="icon" type="image/png" href="img/favicon.ico" />
    <style>
        .button{
            width: 30%;
            max-width: 500px;
            padding: 20px;
            margin: auto;
            margin-top: 50px;
            box-shadow: 0px 0px 2px #000;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row-centered">

        <div class="col-md-12 col-xs-12 col-centered vcenter">

            <div class="button">
                <h1><a href="connexion.php">Connexion</a></h1>
            </div>

            <div class="button">
                <h1><a href="formulaire.php">Inscription</a></h1>
            </div>

        </div>


    </div> <!--/row-centered -->
</div> <!--/container -->

<script type="text/javascript" src="js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
