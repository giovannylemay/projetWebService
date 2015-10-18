<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_BOOK = 'book';
const SQL_GET_BOOK = 'SELECT * FROM Musique INNER JOIN belong ON belong.idBook';

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

            switch ($_GET[PARAM_ACTION]){
                case GET_BOOK:
                    return $this->getBook();

                default:
                    Helper::ThrowAccessDenied();
                    break;
            }
        }

        public function getBook(){
            if(!isset($_GET['id']))
                Helper::ThrowAccessDenied();

            MySQL::Execute(SQL_GET_BOOK.$_GET['id']);

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