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
<body>


<div class="container">
    <div class="row-centered">

        <div class="col-md-12 col-centered">

            <div class="list-playlist">

                <h1>Liste des playlist administrateur</h1>

                <br>

                <ul class="list-group" id="listPlaylistAdmin"><ul>

                <br>

                <h1>Liste des playlist personnelles</h1>

                <br>

                <ul class="list-group" id="listPlaylistPerso"><ul>

            </div>

        </div> <!-- /col-centered -->

    </div> <!-- /row-centered -->
</div> <!-- /container -->



<script type="text/javascript" src="../js/library/jquery/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="../js/library/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/common.js"></script>
<script type="text/javascript" src="js/playlist.js"></script>
<script type="text/javascript">

    $(document).ready(function(){

        var playlist = getplaylistadmin();

        $.each(playlist, function(key, value){
            $('#listPlaylistAdmin').append('<a href="Playlist.php?id='+ idPlaylist +'" class="list-group-item" title="' + description + '">'+ nom +'</a>');
        });

     /*   var playlist = getplaylistPerso();

        $.each(playlist, function(key, value){
            $('#listPlaylistPerso').append('<a href="Playlist.php?id='+ idPlaylist +'" class="list-group-item" title="' + description + '">'+ nom +'</a>');
        });*/


    });

</script>
</body>

</html>
