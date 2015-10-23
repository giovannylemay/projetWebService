<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Authentification</title>
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
                        <h1 id="title">Connexion</h1>
                        <label for="login">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="" placeholder="Entrez votre email" />

                        <br>

                        <label for="login">Mot de passe</label>
                        <input type="password" id="mdp" name="mdp" class="form-control" value="" placeholder="Entrez votre mot de passe" />

                        <br>


                        <br><br>
                        <div id="button">
                            <input id = "button" type="submit" value="Connexion" class="btn btn-primary" onclick="Login()">
                        </div>
                    </div>

                </div>


            </div> <!--/row-centered -->
        </div> <!--/container -->


        <script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/common.js"></script>
        <script type="text/javascript">
            function Login() {
                 var URL = "../php/ControllerWS.php"; // on recuperer l' adresse du lien
                $.ajax({// ajax
                    url: URL, // url de la page Ã  charger
                    cache: false, // pas de mise en cache
                    data : "ws=" + "user" +  "&action="+ "login" + "&email=" + document.getElementById("email").value + "&password=" + document.getElementById("mdp").value,
                    dataType: 'text',
                    type: 'GET',
                    success: function (data) {// si la requÃªte est un succÃ¨s
                        if (data === "false") {
                            alert("le mot de passe ou l'identifiant n'est pas correct");
                        } else {
                            window.location = "accueil.php";
                        }
                    },
                    error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
                    }
                });
                return false; // on desactive le lien
                }

        </script>
    </body>
</html>
