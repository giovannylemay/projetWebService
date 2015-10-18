var IP_ADDRESS = 'localhost';

// API URL
var WS_URL_GET_LISTPLAYLISTADMIN = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=playlist&action=listing';
var WS_URL_GET_BOOK = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=book&action=book&id=';



// Récupérer les GET de l'URL
// Utilisation : Url.get.NOMDUPARAMGET
// Ex: Url.get.id pour ?id=321563
var Url = {
    get get(){
        var vars= {};
        if(window.location.search.length!==0)
            window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value){
                key=decodeURIComponent(key);
                if(typeof vars[key]==="undefined") {vars[key]= decodeURIComponent(value);}
                else {vars[key]= [].concat(vars[key], decodeURIComponent(value));}
            });
        return vars;
    }
};
