<?php


class Database
{
    private $user_name = 'root';
    private $password = '';
    private $localhost = 'localhost';
    private $database = 'pms';
    private $connection;

    public function __construct()
    {
        $conn = new mysqli($this->localhost, $this->user_name, $this->password, $this->database);
        $this->connection = $conn;
        return $conn;
    }

    public function makeQuery($sql)
    {
        return $this->connection->query($sql);
    }

    public function __destruct()
    {
        $this->connection->close();
    }
}
