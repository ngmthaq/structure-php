<?php

final class Database
{
    protected PDO $conn;

    public function __construct()
    {
        $db_host = $_ENV["DB_HOST"];
        $db_port = $_ENV["DB_PORT"];
        $db_username = $_ENV["DB_USERNAME"];
        $db_password = $_ENV["DB_PASSWORD"];
        $db_table_name = $_ENV["DB_TABLE_NAME"];
        $conn = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_table_name", $db_username, $db_password);
        $this->conn = $conn;
    }
}
