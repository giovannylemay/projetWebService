<!DOCTYPE html>
<?php session_start(); ?>
<html>
<head>
    <title></title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="start" title="Accueil" href="accueil.php " />
    <link rel="icon" type="image/png" href="../img/favicon.ico" />
</head>
<body>

    <?php include_once('menu.php'); ?>


    <div class="container">
        <div class="row-centered">

            <div class="col-md-12 col-centered">

                <h1>Bienvenue</h1>
                <?php echo var_dump($_SESSION); ?>
                <?php echo var_dump($_SESSION['monUserCo'][0]->isAdmin); ?>

            </div> <!-- /col-centered -->

        </div> <!-- /row-centered -->
    </div> <!-- /container -->


    <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/common.js"></script>
    <script type="text/javascript">

    </script>
</body>

</html>
