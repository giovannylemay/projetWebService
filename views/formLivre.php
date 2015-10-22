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

                <label for="duree">Durée * </label>
                <input type="text" id="duree" name="duree" class="form-control" value="" placeholder="Entrez la durée">

                <br>

                <label for="lien">Lien * </label>
                <input type="file" id="lien" />

                <br>

                <SELECT name="genre" size="1" id="genre">

                </SELECT>
                <button type="button"  data-toggle="modal" data-target="#addGenre">Ajouter</button>

                <br><br>

                <SELECT name="series" size="1" id="series">

                </SELECT>
                <button type="button"  data-toggle="modal" data-target="#addSerie">Ajouter</button>

                <br><br>

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
                            <input type="text" id="defGenre" placeholder="Entrez une définition">
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
                            <h4 class="modal-title">Ajouter une série</h4>
                        </div>
                        <div class="modal-body">
                            <input type="text" id="nameSerie" placeholder="Entrez un nom"><br><br>
                            <input type="text" id="detailSerie" placeholder="Entrez un détail">
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

    ///////////// Remplir liste déroulante - Genre ////////////////////
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
                console.log('Problème rencontré dans le réseau.');
            }
        });
    };


     ///////////// Remplir liste déroulante - Séries ////////////////////
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
                 console.log('Problème rencontré dans le réseau.');
             }
         });
    };


    ///////////// Remplir liste déroulante - Auteur ////////////////////
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
                console.log('Problème rencontré dans le réseau.');
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
                   alert('Ajout effectué');
                   Kind();
               },
               error: function(msg){
                   console.log(msg.responseType);
                   console.log('Problème rencontré dans le réseau.');
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
                    alert('Ajout effectué');
                    Series();
                },
                error: function(msg){
                    console.log(msg.responseType);
                    console.log('Problème rencontré dans le réseau.');
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
                    alert('Ajout effectué');
                    Author();
                },
                error: function(msg){
                    console.log(msg.responseType);
                    console.log('Problème rencontré dans le réseau.');
                }
            });
        }
    });

    $('#valForm').click(function(){
       if ($('#title').val() === "" || $('#duree').val() === "" || $('#taille').val() === '' || $('#lien').val() === ''){
           alert('Remplir tous les champs avec *');
       }else{
           var lien = $('#lien').val().replace(/([|\[\]\/\\])/g, "\\\\")
           $.ajax({
               url: WS_ADD_BOOK,
               type:'GET',
               data : { 'title' : $('#title').val(), 'duree' : $('#duree').val(), 'taille' : $('#taille').val(), 'lien' : lien, 'idGenre' : $('#genre').val(), 'idSeries' : $('#series').val(), 'idAuteur' : $('#auteur').val()},
                success: function(data){
                    alert('Ajout effectué');
                },
               error: function(msg){
                   console.log(msg.responseType);
                   console.log('Problème rencontré dans le réseau.');
               }
           });
       }
    });

</script>