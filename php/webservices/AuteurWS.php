<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_AUTEUR = 'listing';
const ADD_AUTEUR = 'register';
const SQL_GET_AUTEUR = 'SELECT idAuthor, name, firstname FROM author';

class AuteurWS Implements IWebService{

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

            case GET_AUTEUR:
                return $this->getAuteur();
            case ADD_AUTEUR:
                return $this->addAuteur();
            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }

    public function getAuteur(){
        MySQL::Execute(SQL_GET_AUTEUR);

        return MySQL::GetResult()->fetchAll();
    }

    public function addAuteur(){
        if (!isset($_GET['name']) || !isset($_GET['firstname']))
            Helper::ThrowAccessDenied();

        MySQL::Execute("INSERT INTO author(name, firstname) VALUES ('".$_GET['name']."','".$_GET['firstname']."')");

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