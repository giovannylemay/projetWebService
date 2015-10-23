<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_BOOK = 'book';
const ADD_BOOK = 'register';
const GET_ALL_BOOK = 'allBook';
const SQL_GET_BOOK = 'SELECT Kind.name as kind, series.name as series, author.name as author, Book.title as name, Book.lien as lien FROM Book INNER JOIN belong ON belong.idBook = Book.idBook INNER JOIN Playlist ON playlist.idPlaylist = belong.idPlaylist INNER JOIN kind ON kind.idKind = book.idKind inner join series ON series.idSeries = book.idSeries INNER JOIN author ON author.idAuthor=book.idAuthor WHERE belong.idPlaylist=';
const SQL_GET_ALLBOOK = 'SELECT book.title, book.lien, series.name as series, kind.name as kind, author.name as author FROM book INNER join kind on kind.idKind = book.idKind inner join series on series.idSeries = book.idSeries inner join author on author.idauthor = book.idauthor';
const GET_ALL_BOOK_FOR_PLAYLIST = "listing";
const SQL_ALL_BOOK_FOR_PLAYLIST = "SELECT idBook, title, size, duration, lien FROM book";

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
                case GET_ALL_BOOK:
                    return $this->getAllBook();
                case GET_ALL_BOOK_FOR_PLAYLIST:
                    return $this->getAllBookForPlaylist();
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

            $lien = $_GET['lien'];
            $nomFichier = substr($lien,14);
            $lienBDD = "../upload/".$nomFichier;

            MySQL::Execute("INSERT INTO book(title, size, duration, lien, idKind, idSeries, idAuthor) VALUES ('".$_GET['title']."','".$_GET['taille']."','".$_GET['duree']."','$lienBDD','".$_GET['idGenre']."','".$_GET['idSeries']."','".$_GET['idAuteur']."')");

            return true;
        }

        public function getAllBook(){

            MySQL::Execute(SQL_GET_ALLBOOK);

            return MySQL::GetResult()->fetchAll();
        }
        
        public function getAllBookForPlaylist() {

            MySQL::Execute(SQL_ALL_BOOK_FOR_PLAYLIST);

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