<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une playlist</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="start" title="Accueil" href="index.php" />
    <link rel="icon" type="image/png" href="../img/favicon.ico" />
</head>
<body>


<?php include_once('menu.php'); ?>

<div class="container">
    <div class="row-centered">


        <div class="col-md-12 col-xs-12 col-centered vcenter">


            <div class="login">
                <h1 id="titre">Ajouter une playlist</h1>
                <label for="nom">Nom * </label>
                <input type="text" id="name" name="name" class="form-control" value="" placeholder="Entrez le nom">

                <br><br>
                <div id="button">
                    <input id="valFormPlaylist" type="submit" value="Valider" class="btn btn-primary">
                </div>
            </div>

        </div>


    </div> <!--/row-centered -->
</div> <!--/container -->



<script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript">
$( document ).ready(function() {
    $('#valFormPlaylist').click(function(){
       if ($('#name').val() === ""){
           alert('Vous devez entrer tous les champs');
       }else{
           $.ajax({
               url: WS_ADD_PLAYLIST,
               type:'GET',
               async: false,
               data : { 'name' : $('#name').val(), 'idUser' : <?php echo $_SESSION['monUserCo'][0]->idUser ?> },
               success: function(data){
                   alert(data);
                   alert('Ajout effectu�');
               },
               error: function(msg){
                   console.log('Probl�me rencontr� dans le r�seau.');
               }
           });
       }
    });
    });


</script>