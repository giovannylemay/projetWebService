<?php
require_once('IWebService.php');
require_once('database/db_connect.php');

const GET_PLAYLIST_ADMIN = 'listing';
const SQL_GET_PLAYLIST_ADMIN = 'SELECT * FROM PlayList INNER JOIN USER ON USER.idUser = PLAYLIST.idUser WHERE USER.isAdmin = 1';

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

                default:
                    Helper::ThrowAccessDenied();
                    break;
            }
        }

        public function getPlaylistAdmin(){
            MySQL::Execute(SQL_GET_ALL_SURVEY);

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