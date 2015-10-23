<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="../css/main.css" />
        <link rel="start" title="Gestion des utilisateurs" href="gestionUser.php" />
        <link rel="icon" type="image/png" href="../img/favicon.ico" />
    </head>
    <body>


        <?php include_once('menu.php'); ?>
        <div class="container">
            <div class="row-centered">

                <div class="col-md-12 col-centered">

                    <div class="list-book">

                        <h1>Liste des utilisateurs</h1>

                        <br>

                        <table id="listUser" class="table table-striped" style="text-align:center">
                            <tr>
                                <th style="width:140px;text-align:center">
                                    ID
                                </th>
                                <th style="width:140px;text-align:center">
                                    Nom
                                </th>
                                <th style="width:140px;text-align:center">
                                    Prénom
                                </th>
                                <th style="width:140px;text-align:center">
                                    Email
                                </th>
                                <th style="width:140px;text-align:center">
                                    Mot de passe
                                </th>
                                <th style="width:140px;text-align:center">
                                    Supprimer
                                </th>
                            </tr>

                        </table>
                        <br>

                    </div>


                </div> <!-- /col-centered -->

            </div> <!-- /row-centered -->
        </div> <!-- /container -->



        <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/common.js"></script>

    </body>

    <script type="text/javascript">
        function removeUser(idUser) {
            var idUser = idUser;
            
            if (confirm("Voulez-vous supprimer cet utilisateur ?")) { // Clic sur OK
                $.ajax({// ajax
                    url: WS_REMOVE_USER,
                    data : {'idUser' : idUser},
                    type: 'GET',
                    success: function (data) {// si la requête est un succès
                        alert("L'utilsateur a été supprimé");
                        window.location = "gestionUser.php";
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
                    }
                });
            }
        }

        $(document).ready(function () {
            $.ajax({
                url: WS_URL_ALL_USER,
                type: 'GET',
                success: function (response)
                {
                    var obj = jQuery.parseJSON(response);
                    for (var i = 0; i < obj.length; i++) {
                        $("table#listUser").append(
                                "<tr><td> " + obj[i].idUser + "</td>" +
                                "<td> " + obj[i].name + "</td>" +
                                "<td> " + obj[i].firstname + "</td>" +
                                "<td> " + obj[i].email + "</td>" +
                                "<td> " + obj[i].password + "</td>" +
                                "<td> <div class='button'><input type='button' id='" + obj[i].idUser + "' value='Supprimer' class='btn btn-danger' onclick='removeUser(this.id)'></div> </td>" +
                                "</tr>");
                    }
                },
                error: function () {
                    alert('Probl�me rencontr� dans le r�seau.');
                }
            });
        });
    </script>

</html>