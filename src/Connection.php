<?php


class Connection
{
    private static $connection;
    private $user;
    private $passwd;
    private $host;
    private $database;
    private $mysqli;

    private function __construct($user, $passwd, $host, $database)
    {
       $this->user = $user;
       $this->passwd = $passwd;
       $this->host = $host;
       $this->database = $database;
       $this->mysqli = new mysqli($this->host, $this->user, $this->passwd, $this->database, 3306);
    }

    public static function getInstance ($user, $passwd, $host, $database)
    {
        $instance = null;
        if(Connection::$connection != null){
            $instance = Connection::$connection;
        }else{
            $instance = new Connection($user,$passwd,$host,$database);
        }
        return $instance;
    }

    public function __get($name, $value)
    {
        $this->$name = $value;
    }

    public function __set($name)
    {
        return $this->$name;
    }
}