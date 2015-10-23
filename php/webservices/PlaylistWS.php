<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_PLAYLIST_ADMIN = 'listing';
const GET_PLAYLIST = 'listingPlaylist';
const SQL_GET_PLAYLIST_ADMIN = 'SELECT Playlist.name, Playlist.idPlaylist FROM PlayList INNER JOIN USER ON USER.idUser = PLAYLIST.idUser WHERE USER.isAdmin = 1';
const SQL_GET_PLAYLIST = 'SELECT Playlist.name, Playlist.idPlaylist FROM PlayList WHERE Playlist.idUser =';

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