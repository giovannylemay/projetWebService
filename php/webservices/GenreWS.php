<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_KIND = 'listing';
const ADD_KIND = 'register';
const SQL_GET_KIND = 'SELECT idKind, name, definition FROM kind';

    class GenreWS Implements IWebService{

        public function DoGet()
        {
            return $this->DoPost();
        }

        public function DoPost()
        {
            if (!isset($_GET[PARAM_ACTION]))
                Helper::ThrowAccessDenied();

            switch ($_GET[PARAM_ACTION])
            {

                case GET_KIND:
                    return $this->getKind();
                case ADD_KIND:
                    return $this->addKind();
                default:
                    Helper::ThrowAccessDenied();
                    break;
            }
        }

        public function getKind(){
            MySQL::Execute(SQL_GET_KIND);

            return MySQL::GetResult()->fetchAll();
        }

        public function addKind(){
            if (!isset($_GET['name']) || !isset($_GET['definition']))
                Helper::ThrowAccessDenied();

            MySQL::Execute("INSERT INTO kind(name, definition) VALUES ('".$_GET['name']."','".$_GET['definition']."')");

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
/**
 * Created by PhpStorm.
 * User: gomel_000
 * Date: 21/10/2015
 * Time: 09:02
 */