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
                <h1 id="title">Ajouter un livre</h1>
                <label for="login">Titre</label>
                <input type="text" id="title" name="title" class="form-control" value="" placeholder="Entrez le titre" />

                <br>

                <label for="password">Taille</label>
                <input type="text" id="taille" name="taille" class="form-control" value="" placeholder="Entrez la taille">

                <br>

                <label for="password">Durée</label>
                <input type="text" id="duree" name="duree" class="form-control" value="" placeholder="Entrez la durée">

                <SELECT name="genre" size="1" id="genre">

                </SELECT>

                <SELECT name="serie" size="1" id="serie">

                </SELECT>

                <SELECT name="auteur" size="1" id="auteur">

                </SELECT>

                <br><br>
                <div id="button">
                    <input type="submit" value="Valider" class="btn btn-primary">
                </div>
            </div>

        </div>


    </div> <!--/row-centered -->
</div> <!--/container -->


<script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript">

    $.ajax({
        url: "http://" + IP_ADDRESS + "/AGILE//php/ControllerWS.php?ws=genre&action=listing",
        dataType = 'json',
        type:'GET',
        async: false,
        success: function(data){
            $.each(data, function(key, value){

            });

        },
        error: function(msg){
            console.log(msg.responseType);
            console.log('Problème rencontré dans le réseau.');
        }
    });

</script>