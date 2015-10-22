<?php

require_once('webservices/IWebService.php');
require_once('../database/db_connect.php');

session_start();
const PARAM_ACTION = 'action';
const LOGIN_USER = 'login';
const LOGOUT_USER = 'logout';
const ADD_USER = 'register';

class UserWS implements IWebService {

    public function DoGet() {
        return $this->DoPost();
    }

    public function DoPost() {
        if (!isset($_GET[PARAM_ACTION])){
            Helper::ThrowAccessDenied();
        }
        switch ($_GET[PARAM_ACTION]){
            case LOGIN_USER :
                return $this->login();
            case LOGOUT_USER:
                return $this->logout();
            case ADD_USER:
                return $this->addUser();
            default :
                Helper::ThrowAccessDenied();
        }
    }

    public function login() {
        $email = $_GET['email'];
        $password = $_GET['password'];

        $sql = "SELECT idUser, name, firstname, email, password, isAdmin FROM user WHERE email='" . $email . "' AND password='" . $password . "'";

        MySQL::Execute($sql);
        $verif = MySQL::GetResult()->fetchAll();

        $user = MySQL::GetResult()->fetch();

        if (count($verif) !== 0) {
            $_SESSION['Logged'] = 1;
            $_SESSION['monUserCo'] = $user;
            // var_dump($_SESSION['Logged']);
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        if (isset($_SESSION['Logged']) && $_SESSION['Logged'] !== 0){
            $_SESSION['Logged'] = 0;
            session_destroy();
            return true;
        }
        return false;
    }

    public function addUser(){

        if (!isset($_GET['nom']) || !isset($_GET['prenom']) || !isset($_GET['email']) || !isset($_GET['mdp']))
            Helper::ThrowAccessDenied();

        MySQL::Execute("INSERT INTO user(name, firstname, email, password) VALUES ('".$_GET['nom']."','".$_GET['prenom']."','".$_GET['email']."','".$_GET['mdp']."')");

        return true;

    }

    public function DoPut() {
        Helper::ThrowAccessDenied();
    }

    public function DoDelete() {
        Helper::ThrowAccessDenied();
    }

}