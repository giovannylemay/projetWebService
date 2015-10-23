<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Ajouter un livre</title>
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
                <h1 id="titre">Ajouter un livre</h1>
                <label for="titre">Titre * </label>
                <input type="text" id="title" name="title" class="form-control" value="" placeholder="Entrez le titre">

                <br>

                <label for="taille">Taille * </label>
                <input type="text" id="taille" name="taille" class="form-control" value="" placeholder="Entrez la taille">

                <br>

                <label for="duree">Dur�e * </label>
                <input type="text" id="duree" name="duree" class="form-control" value="" placeholder="Entrez la dur�e">

                <br>

                <label for="lien">Lien * (à noter que le fichier doit être placé dans le dossier "upload" de l'application)</label>
                <input type="file" id="lien" />

                <br>

                <label for="lien">Genre </label>
                <SELECT name="genre" size="1" id="genre">

                </SELECT>
                <button type="button"  data-toggle="modal" data-target="#addGenre">Ajouter</button>

                <br><br>

                <label for="lien">Série </label>
                <SELECT name="series" size="1" id="series">

                </SELECT>
                <button type="button"  data-toggle="modal" data-target="#addSerie">Ajouter</button>

                <br><br>

                <label for="lien">Auteur</label>
                <SELECT name="auteur" size="1" id="auteur">

                </SELECT>
                <button type="button"  data-toggle="modal" data-target="#addAuteur">Ajouter</button>

                <br><br>
                <div id="button">
                    <input id="valForm" type="submit" value="Valider" class="btn btn-primary">
                </div>
            </div>


            <!-- MODAL -->
            <!-- GENRE -->
            <div id="addGenre" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajouter un genre</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="nameGenre" placeholder="Entrez un nom"><br><br>
                            <input type="text" id="defGenre" placeholder="Entrez une d�finition">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="valGenre" class="btn btn-default" data-dismiss="modal">Valider</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- MODAL -->
            <!-- SERIE -->
            <div id="addSerie" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajouter une s�rie</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="nameSerie" placeholder="Entrez un nom"><br><br>
                            <input type="text" id="detailSerie" placeholder="Entrez un d�tail">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="valSeries" class="btn btn-default" data-dismiss="modal">Valider</button>
                        </div>
                    </div>

                </div>
            </div>

            <!-- MODAL -->
            <!-- GENRE -->
            <div id="addAuteur" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Ajouter un auteur</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="nameAuteur" placeholder="Entrez un nom"><br><br>
                            <input type="text" id="prenomAuteur" placeholder="Entrez un prenom">
                        </div>
                        <div class="modal-footer">
                            <button type="button" id="valAuteur" class="btn btn-default" data-dismiss="modal">Valider</button>
                        </div>
                    </div>

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
        // Handler for .ready() called.
        Series();
        Kind();
        Author();
    });

    ///////////// Remplir liste d�roulante - Genre ////////////////////
    function Kind() {
        $.ajax({
            url: WS_GET_KIND,
            type: 'GET',
            success: function (data) {
                $('#genre').children().remove();
                var obj = jQuery.parseJSON(data);
                for (var i = 0; i < obj.length; i++) {
                    $('#genre').append('<OPTION value=' + obj[i].idKind + '> ' + obj[i].name + ' - ' + obj[i].definition + '</OPTION>');

                }


            },
            error: function (msg) {
                console.log(msg.responseType);
                console.log('Probl�me rencontr� dans le r�seau.');
            }
        });
    };


     ///////////// Remplir liste d�roulante - S�ries ////////////////////
    function Series(){
         $.ajax({
             url: WS_GET_SERIES,
             type:'GET',
             success: function(data){
                 $('#series').children().remove();
                 var obj = jQuery.parseJSON(data);
                 for(var i = 0; i < obj.length;i++){
                     $('#series').append('<OPTION value=' + obj[i].idSeries + '> ' +obj[i].name + ' - ' + obj[i].detail + '</OPTION>');

                 }


             },
             error: function(msg){
                 console.log(msg.responseType);
                 console.log('Probl�me rencontr� dans le r�seau.');
             }
         });
    };


    ///////////// Remplir liste d�roulante - Auteur ////////////////////
    function Author() {
        $.ajax({
            url: WS_GET_AUTEUR,
            type: 'GET',
            success: function (data) {
                $('#auteur').children().remove();
                var obj = jQuery.parseJSON(data);
                for (var i = 0; i < obj.length; i++) {

                    $('#auteur').append('<OPTION value=' + obj[i].idAuthor + '> ' + obj[i].name + '  - ' + obj[i].firstname + ' </OPTION>');

                }


            },
            error: function (msg) {
                console.log(msg.responseType);
                console.log('Probl�me rencontr� dans le r�seau.');
            }
        });
    };

    $('#valGenre').click(function(){
       if ($('#nameGenre').val() === "" || $('#defGenre').val() === ""){
           alert('Vous devez entrer tous les champs');
       }else{
           $.ajax({
               url: WS_ADD_KIND,
               type:'GET',
               async: false,
               data : { 'name' : $('#nameGenre').val(), 'definition' : $('#defGenre').val() },
               success: function(data){
                   alert('Ajout effectu�');
                   Kind();
               },
               error: function(msg){
                   console.log(msg.responseType);
                   console.log('Probl�me rencontr� dans le r�seau.');
               }
           });
       }
    });

    $('#valSeries').click(function(){
        if ($('#nameSerie').val() === "" || $('#detailSerie').val() === ""){
            alert('Vous devez entrer tous les champs');
        }else{
            $.ajax({
                url: WS_ADD_SERIES,
                type:'GET',
                async: false,
                data : { 'name' : $('#nameSerie').val(), 'detail' : $('#detailSerie').val() },
                success: function(data){
                    alert('Ajout effectu�');
                    Series();
                },
                error: function(msg){
                    console.log(msg.responseType);
                    console.log('Probl�me rencontr� dans le r�seau.');
                }
            });
        }
    });

    $('#valAuteur').click(function(){
        if ($('#nameAuteur').val() === "" || $('#prenomAuteur').val() === ""){
            alert('Vous devez entrer tous les champs');
        }else{
            $.ajax({
                url: WS_ADD_AUTEUR,
                type:'GET',
                async: false,
                data : { 'name' : $('#nameAuteur').val(), 'firstname' : $('#prenomAuteur').val() },
                success: function(data){
                    alert('Ajout effectu�');
                    Author();
                },
                error: function(msg){
                    console.log(msg.responseType);
                    console.log('Probl�me rencontr� dans le r�seau.');
                }
            });
        }
    });



    $('#valForm').click(function(){
       if ($('#title').val() === "" || $('#duree').val() === "" || $('#taille').val() === '' || $('#lien').val() === ''){
           alert('Remplir tous les champs avec *');
       }else{
           var lien = $('#lien').val().replace(/([|\[\]\/\\])/g, "\\\\");
           $.ajax({
               url: WS_ADD_BOOK,
               type:'GET',
               data : { 'title' : $('#title').val(), 'duree' : $('#duree').val(), 'taille' : $('#taille').val(), 'lien' : lien, 'idGenre' : $('#genre').val(), 'idSeries' : $('#series').val(), 'idAuteur' : $('#auteur').val()},
                success: function(data){
                    alert('Ajout effectu�');
                },
               error: function(msg){
                   console.log(msg.responseType);
                   console.log('Probl�me rencontr� dans le r�seau.');
               }
           });
           <?php
           // checking image
           /* if (($_FILES["image"]["type"] == "image/gif")
            or ($_FILES["image"]["type"] == "image/jpeg")
            or ($_FILES["image"]["type"] == "image/pjpeg")
            or ($_FILES["image"]["type"] == "image/png"))
            {
                if ($_FILES["image"]["error"] == 0)
                {
                    move_uploaded_file($_FILES["image"]["tmp_name"],
                    "upload/".$_FILES["image"]["name"]);

                }
                else
                {
                    echo "image upload failed";
                }
            }
            else
            {
                echo "file is not supported image";

            }
               //for audio
               if ($_FILES["audio"]["error"] == 0)
               {
                   move_uploaded_file($_FILES["audio"]["tmp_name"],
                       "upload/".$_FILES["audio"]["name"]);
               }
               else
               {
                   echo "audio upload failed";
               }*/
            ?>
       }
    });

</script>