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
                <h1 id="title">Ajouter</h1>
                <label for="login">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value="" placeholder="Entrez votre nom" />

                <br>

                <label for="login">Prenom</label>
                <input type="text" id="prenom" name="prenom" class="form-control" value="" placeholder="Entrez votre prenom" />

                <br>

                <label for="login">Email</label>
                <input type="text" id="email" name="email" class="form-control" value="" placeholder="Entrez votre email" />

                <br>

                <label for="login">Mot de passe</label>
                <input type="password" id="mdp" name="mdp" class="form-control" value="" placeholder="Entrez votre mot de passe" />

                <br>

                <label for="login">V?rification mot de passe</label>
                <input type="password" id="mdp2" name="mdp" class="form-control" value="" placeholder="Entrez votre mot de passe" />

                <br>

                <br><br>
                <div id="button">
                    <input id = "button" type="submit" value="Valider" class="btn btn-primary">
                </div>
            </div>

        </div>


    </div> <!--/row-centered -->
</div> <!--/container -->


<script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript">

    $('#button').click(function(){
        if($('#nom').val() === '' || $('#prenom').val() === '' || $('#email').val() === '' || $('#mdp').val() === '' || $('#mdp2').val() === ''){
            alert('Vous devez entrer tous les champs');
        }else{
            if($('#mdp').val() === $('#mdp2').val()){
                $.ajax({
                    url: WS_ADD_ADMIN ,
                    type: 'GET',
                    async: false,
                    data: { 'nom': $('#nom').val(),
                        'prenom': $('#prenom').val(),
                        'email': $('#email').val(),
                        'mdp': $('#mdp').val()
                    },
                    success: function (data) {
                        alert("Ajout effectu?");
                        document.location.href = "index.php";
                    },
                    error: function (msg) {
                        console.log(msg.responseType);
                        console.log('Probl?me rencontr? dans le r?seau.');
                    }

                });
            }else{
                alert('Les deux mots de passe ne sont pas similaires');
            }
        };
    });

</script>
</body>
</html>
