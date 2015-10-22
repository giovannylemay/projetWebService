var IP_ADDRESS = 'localhost';

// API URL
var WS_URL_GET_LISTPLAYLISTADMIN = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=playlist&action=listing';
var WS_URL_GET_BOOK = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=book&action=book&id=';
var WS_GET_KIND = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=genre&action=listing';
var WS_GET_SERIES = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=series&action=listing';
var WS_GET_AUTEUR = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=auteur&action=listing';
var WS_ADD_KIND = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=genre&action=register';
var WS_ADD_SERIES = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=series&action=register';
var WS_ADD_AUTEUR = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=auteur&action=register';
var WS_ADD_BOOK = 'http://' + IP_ADDRESS + '/projetWebService/php/ControllerWS.php?ws=book&action=register';
var WS_ADD_USER =  "http://" + IP_ADDRESS + "/projetWebService/php/ControllerWS.php?ws=user&action=register"

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
