<?php

include_once('db_informations.php');

class MySQL {

    const DB_DATASOURCE_STRING = 'mysql:host=%s;port=%d;dbname=%s';

    private static $connection;
    private static $statement;

    public static function Prepare($command) {
        if (!isset(self::$connection))
            self::connect();

        self::$statement = self::$connection->prepare($command);

        return self::$statement;
    }

    public static function Execute($params) {
        if (isset(self::$statement))
            $result = self::$statement->execute($params);
        else {
            if (!isset(self::$connection))
                self::connect();

            self::$statement = self::$connection->query($params);
            $result = (self::$statement != false);
        }

        self::$statement->setFetchMode(PDO::FETCH_OBJ);

        return $result;
    }

    public static function Query($prepare, $execute) {
        if (isset($execute))
            self::Prepare($prepare);
        else
            $execute = $prepare;

        if (self::Execute($execute) == false)
            return false;

        return self::GetResult()->fetchAll();
    }

    public static function GetResult() {
        $result = self::$statement;
        self::$statement = null;

        return $result;
    }

    private static function connect() {
        global $DB_Host, $DB_Port, $DB_Name, $DB_User, $DB_Password;

        // We create the database connection.
        self::$connection = new PDO(sprintf(self::DB_DATASOURCE_STRING, $DB_Host, $DB_Port, $DB_Name), $DB_User, $DB_Password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    }

}
