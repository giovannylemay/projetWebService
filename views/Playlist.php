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


<div class="container">
    <div class="row-centered">

        <div class="col-md-12 col-centered">

            <div class="list-book">

                <h1>Liste des livres</h1>

                <br>

                <ul class="list-group" id="listBook"><ul>


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
        var id = Url.get.id;
        $.ajax({

                url: WS_URL_GET_BOOK + id,
                type:'POST',
                success: function(response)
                {
                    var obj = jQuery.parseJSON(response);
                    for(var i = 0; i < obj.length;i++){
                       $('#listBook').append('<audio controls="controls"><source src="' + obj[i].lien + '" type="audio/mp3" />Votre navigateur n est pas compatible</audio>');
                    }
                },
                error: function(){
            alert('Problème rencontré dans le réseau.');
        }
            });

        $('#buttonBook').click(function(){

        })

    });




</script>

</html>