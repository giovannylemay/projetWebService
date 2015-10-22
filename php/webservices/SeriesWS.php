<?php
require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

const PARAM_ACTION = 'action';
const GET_SERIES = 'listing';
const ADD_SERIES = 'register';
const SQL_GET_SERIES = 'SELECT idSeries, name, detail FROM series';

class SeriesWS Implements IWebService{

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

            case GET_SERIES:
                return $this->getSeries();
            case ADD_SERIES:
                return $this->addSeries();
            default:
                Helper::ThrowAccessDenied();
                break;
        }
    }

    public function getSeries(){
        MySQL::Execute(SQL_GET_SERIES);

        return MySQL::GetResult()->fetchAll();
    }

    public function addSeries(){
        if (!isset($_GET['name']) || !isset($_GET['detail']))
            Helper::ThrowAccessDenied();

        MySQL::Execute("INSERT INTO series(name, detail) VALUES ('".$_GET['name']."','".$_GET['detail']."')");

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