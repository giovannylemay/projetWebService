<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_BOOK = 'book';
const ADD_BOOK = 'register';
const SQL_GET_BOOK = 'SELECT * FROM Book INNER JOIN belong ON belong.idBook = Book.idBook INNER JOIN Playlist ON playlist.idPlaylist = belong.idPlaylist WHERE belong.idPlaylist=';

    class BookWS implements IWebService {

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
                case ADD_BOOK:
                    return $this->addBook();

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

        public function addBook(){
            if (!isset($_GET['title']) || !isset($_GET['duree'])  || !isset($_GET['taille']) || !isset($_GET['lien']))
                Helper::ThrowAccessDenied();


            MySQL::Execute("INSERT INTO book(title, size, duration, lien, idKind, idSeries, idAuthor) VALUES ('".$_GET['title']."','".$_GET['taille']."','".$_GET['duree']."','".$_GET['lien']."','".$_GET['idGenre']."','".$_GET['idSeries']."','".$_GET['idAuteur']."')");

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