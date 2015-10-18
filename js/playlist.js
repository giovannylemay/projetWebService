function getplaylistadmin(){
    $.ajax({
        url: WS_URL_GET_LISTPLAYLISTADMIN,
        dataType:'json',
        type:'GET',
        success: function(data)
        {

        },
        error: function(){
            alert('Problème rencontré dans le réseau.');
        }
    })
}