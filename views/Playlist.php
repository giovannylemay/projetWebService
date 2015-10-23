<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/main.css" />
        <link rel="start" title="Accueil" href="index.php" />
        <link rel="icon" type="image/png" href="../img/favicon.ico" />
    </head>
    <body>>

        <?php include_once('menu.php'); ?>

        <div class="container">
            <div class="row-centered">

                <div class="col-md-12 col-centered">

                    <div class="list-book">

                        <h1>Liste des livres</h1>

                        <br>

                        <button id="popup" type="button" class="btn btn-default"  data-toggle="modal" data-target="#Share">Partager cette playlist</button>

                        <br><br>

                        <ul class="list-group" id="listBook"></ul>


                        <h1>Ajouter un livre</h1>
                        <br>

                        <table id="listBook" class="table table-striped" style="text-align:center">
                            <tr>
                                <th style="width:140px;text-align:center">
                                    ID
                                </th>
                                <th style="width:140px;text-align:center">
                                    Titre
                                </th>
                                <th style="width:140px;text-align:center">
                                    Taille
                                </th>
                                <th style="width:140px;text-align:center">
                                    Durée   
                                </th>    
                                <th style="width:140px;text-align:center">
                                    Lien     
                                </th>   
                                <th style="width:140px;text-align:center">
                                    Ajouter     
                                </th>   
                            </tr>

                        </table>
                        <br>


                    </div>


                </div> <!-- /col-centered -->

            </div> <!-- /row-centered -->
        </div> <!-- /container -->

        <div id="Share" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Choisir un utilisateur avec qui partager</h4>
                    </div>
                    <label for="lien">Users </label>
                    <SELECT name="users" size="1" id="listUsers">

                    </SELECT>
                    <input type="submit" id="valShare"/>
                </div>

            </div>
        </div>

        <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/common.js"></script>

    </body>

    <script type="text/javascript">
        function addBook(idBook) {
            var idBook = idBook;
            var idPlaylist = Url.get.id;
            
            if (confirm("Voulez-vous ajouter ce livre à cette playlist ?")) { // Clic sur OK
                $.ajax({// ajax
                    url: WS_ADD_BELONG,
                    data : {'idBook' : idBook, 'idPlaylist' : idPlaylist},
                    type: 'GET',
                    success: function (data) {// si la requête est un succès
                        alert("Le livre a été ajouté");
                        window.location = "Playlist.php";
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
                    }
                });
            }
        }


        $(document).ready(function () {
            
            $.ajax({
                url: WS_URL_GET_ALLBOOKFORPLAYLIST,
                type: 'GET',
                success: function (response)
                {
                    var obj = jQuery.parseJSON(response);
                    for (var i = 0; i < obj.length; i++) {
                        $("table#listBook").append(
                                "<tr><td> " + obj[i].idBook+ "</td>" +
                                "<td> " + obj[i].title + "</td>" +
                                "<td> " + obj[i].size + "</td>" +
                                "<td> " + obj[i].duration + "</td>" +
                                "<td> " + obj[i].lien + "</td>" +
                                "<td> <div class='button'><input type='button' id='" + obj[i].idBook + "' value='Ajouter' class='btn btn-success' onclick='addBook(this.id)'></div> </td>" +
                                "</tr>");
                    }
                },
                error: function () {
                    alert('Probl�me rencontr� dans le r�seau.');
                }
            });

            $.ajax({
                url: WS_URL_ALL_USER,
                type: 'GET',
                success: function (response)
                {
                    var obj = jQuery.parseJSON(response);
                    for (var i = 0; i < obj.length; i++) {
                        $('#listUsers').append('<OPTION value=' + obj[i].idUser + '> ' + obj[i].name + ' - ' + obj[i].firstname + '</OPTION>');
                    }
                },
                error: function () {
                    alert('Probl�me rencontr� dans le r�seau.');
                }
            });

            if (Url.get.id) {
                var id = Url.get.id;
                $.ajax({
                    url: WS_URL_GET_BOOK + id,
                    type: 'POST',
                    success: function (response)
                    {
                        var obj = jQuery.parseJSON(response);
                        for (var i = 0; i < obj.length; i++) {
                            $('#listBook').append('<label for="titre">Titre : ' + obj[i].name + ' <br><label for="genre">Genre : ' + obj[i].kind + ' <br><label for="series">Serie : ' + obj[i].series + ' <br><label for="auteur">Auteur : ' + obj[i].author + ' <br> <audio controls="controls"><source src="' + obj[i].lien + '" type="audio/mp3" />Votre navigateur n est pas compatible</audio><br>');
                        }
                    },
                    error: function () {
                        alert('Probl�me rencontr� dans le r�seau.');
                    }
                });
            } else {
                $.ajax({
                    url: WS_URL_GET_ALLBOOK,
                    type: 'POST',
                    success: function (response)
                    {
                        var obj = jQuery.parseJSON(response);
                        for (var i = 0; i < obj.length; i++) {
                            $('#listBook').append(' <br/><label for="titre">Titre : ' + obj[i].title + ' <br><label for="genre">Genre : ' + obj[i].kind + ' <br><label for="series">Serie : ' + obj[i].series + ' <br><label for="auteur">Auteur : ' + obj[i].author + ' <br> </label></label><audio controls="controls"><source src="' + obj[i].lien + '" type="audio/mp3" />Votre navigateur n est pas compatible</audio></br>');

                        }
                    },
                    error: function () {
                        alert('Probl�me rencontr� dans le r�seau.');
                    }
                });
            }

            $('#buttonBook').click(function () {

            })

        });

        $('#valShare').click(function () {
            var id = Url.get.id;
            var idUserShared = $('#listUsers').val();
            $.ajax({
                url: WS_URL_SHARE,
                type: 'GET',
                data: {'idUserShared': idUserShared, 'idP': id},
                success: function (response)
                {
                    //alert(response);
                    alert("Partage validé");
                },
                error: function () {
                    alert('Probl�me rencontr� dans le r�seau.');
                }
            });
        })


    </script>

</html>