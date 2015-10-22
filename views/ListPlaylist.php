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


            </div>


            <div class="list-playlist">

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

</body>

<script type="text/javascript">

    $(document).ready(function(){
            $.ajax({
                url: WS_URL_GET_LISTPLAYLISTADMIN,
                type:'GET',
                success: function(response)
                {
                    var obj = jQuery.parseJSON(response);
                    for(var i = 0; i < obj.length;i++){
                        $('#listPlaylistAdmin').append('<a href="Playlist.php?id='+ obj[i].idPlaylist +'" class="list-group-item" title="">'+ obj[i].name +'</a>');
                    }
                },
                error: function(){
                    alert('Problème rencontré dans le réseau.');
                }
            })

    });

    $(document).ready(function(){
        $.ajax({
            url: WS_URL_GET_LISTPLAYLIST + $_SESSION['monUserCo'],
            type:'GET',
            success: function(response)
            {
                var obj = jQuery.parseJSON(response);
                for(var i = 0; i < obj.length;i++){
                    $('#listPlaylist').append('<a href="Playlist.php?id='+ obj[i].idPlaylist +'" class="list-group-item" title="">'+ obj[i].name +'</a>');
                }
            },
            error: function(){
                alert('Problème rencontré dans le réseau.');
            }
        })

    });




</script>

</html>
