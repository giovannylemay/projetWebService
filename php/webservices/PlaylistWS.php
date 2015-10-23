<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_PLAYLIST_ADMIN = 'listing';
const GET_PLAYLIST = 'listingPlaylist';
const ADD_SHARE = 'share';
const SQL_GET_PLAYLIST_ADMIN = 'SELECT Playlist.name, Playlist.idPlaylist, Playlist.dateCreation FROM PlayList INNER JOIN USER ON USER.idUser = PLAYLIST.idUser  WHERE USER.isAdmin = 1';
const SQL_GET_PLAYLIST = 'SELECT Playlist.name as playlist, Playlist.idPlaylist, Playlist.dateCreation, User.name as user FROM PlayList INNER JOIN USER ON USER.IDUSER = PLAYLIST.IDCREATOR WHERE Playlist.idUser =';
const ADD_PLAYLIST = 'add';
const ADD_BELONG = 'addBelong';


    class PlaylistWS implements IWebService {

        public function DoGet()
        {
            return $this->DoPost();
        }

        public function DoPost()
        {
            //Helper::CheckLogin();

            if (!isset($_GET[PARAM_ACTION]))
                Helper::ThrowAccessDenied();

            switch ($_GET[PARAM_ACTION])
            {
                case GET_PLAYLIST_ADMIN:
                    return $this->getPlaylistAdmin();
                case GET_PLAYLIST:
                    return $this->getPlaylist();
                case ADD_PLAYLIST:
                    return $this->addPlaylist();
                case ADD_SHARE:
                    return $this->share();
                case ADD_BELONG:
                    return $this->addBelong();
                default:
                    Helper::ThrowAccessDenied();
                    break;
            }
        }


        public function getPlaylistAdmin(){
            MySQL::Execute(SQL_GET_PLAYLIST_ADMIN);


            return MySQL::GetResult()->fetchAll();
        }


        public function getPlaylist(){
            if(!isset($_GET['id']))
                Helper::ThrowAccessDenied();

            MySQL::Execute(SQL_GET_PLAYLIST.$_GET['id']);

            return MySQL::GetResult()->fetchAll();
        }
        
        public function addPlaylist(){
            if(!isset($_GET['name']) || !isset($_GET['idUser']))
                Helper::ThrowAccessDenied();

            date_default_timezone_set('Europe/Paris');
            $name = $_GET['name'];
            $today = date('y-m-d');
            $id = $_GET['idUser'];
            
            MySQL::Execute("INSERT INTO playlist(name, dateCreation, idUser, idCreator) VALUES ('$name','$today','$id','$id')");

            return true;
            
        }
        
        public function addBelong(){
            if(!isset($_GET['idBook']) || !isset($_GET['idPlaylist']))
                Helper::ThrowAccessDenied();
            
            $idBook = $_GET['idBook'];
            $idPlaylist = $_GET['idPlaylist'];
            
            MySQL::Execute("INSERT INTO belong(idBook, idPlaylist) VALUES ('$idBook','$idPlaylist')");

            return true;
            
        }

        public function share(){
            if(!isset($_GET['idUserShared']) || !isset($_GET['idP']))
                Helper::ThrowAccessDenied();

            MySQL::Execute("SELECT * FROM Playlist WHERE idPlaylist =".$_GET['idP']);

            $playlistShared = MySQL::GetResult()->fetchAll();

            $namePlaylistShared = $playlistShared[0]->name;
            $datePlaylistShared = $playlistShared[0]->dateCreation;
            $idCreatorPlaylistShared = $playlistShared[0]->idCreator;
            $idUser = $_GET['idUserShared'];

            MySQL::Execute("INSERT INTO playlist(name, dateCreation, idUser, idCreator) VALUES('$namePlaylistShared', '$datePlaylistShared','$idUser', '$idCreatorPlaylistShared' )");

            return true;
        }

        public function DoPut()
        {
            Helper::ThrowAccessDenied();
        }

        public function DoDelete()
        {
            Helper::ThrowAccessDenied();
        }



    }
?>