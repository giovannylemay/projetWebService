<?php $currentPage = basename($_SERVER['REQUEST_URI'], '?' . $_SERVER['QUERY_STRING']); ?>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">PROJET WEB SERVICES</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php echo ($currentPage == 'accueil.php' ) ? 'class="active"' : ''; ?>><a href="accueil.php">Accueil</a></li>
                <li <?php echo ($currentPage == 'Listplaylist.php' ) ? 'class="active"' : ''; ?>><a href="Listplaylist.php">Playlist</a></li>
                <li <?php echo ($currentPage == 'formPlaylist.php' ) ? 'class="active"' : ''; ?>><a href="formPlaylist.php">Ajouter une playlist</a></li>
                <li <?php echo ($currentPage == 'formLivre.php' ) ? 'class="active"' : ''; ?>><a href="formLivre.php">Ajouter livre</a></li>
                <?php 
                    if($_SESSION['monUserCo'][0]->isAdmin === '1'){
                        echo '<li ';
                        echo ($currentPage == 'formLivre.php' ) ? 'class="active"' : '';
                        echo '><a href="gestionUser.php">Gestion utilsateurs</a></li>';
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <input type="button" class="btn btn-default navbar-btn" value="Deconnexion" onclick="Logout()"/>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<script>
    function Logout() {

        var URL = "../php/ControllerWS.php"; // on recuperer l' adresse du lien
        $.ajax({// ajax
            url: WS_LOGOUT,
            type: 'GET',
            success: function (data) {// si la requête est un succès
                if (data === "false") {
                    alert("deja d�connect�");
                } else {
                    window.location = "index.php";
                }

            },
            error: function (XMLHttpRequest, textStatus, errorThrows) { // erreur durant la requete
            }
        });
        return false; // on desactive le lien
    }
</script>