function getplaylistadmin(){
    $.ajax({
        url: WS_URL_GET_LISTPLAYLISTADMIN,
        dataType:'json',
        type:'GET',
        success: function(data)
        {

        },
        error: function(){
            alert('Probl�me rencontr� dans le r�seau.');
        }
    })
}