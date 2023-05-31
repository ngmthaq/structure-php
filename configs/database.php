<?php

final class Database
{
    protected PDO $conn;

    protected array $values;

    protected string $sql;

    public function __construct()
    {
        $db_host = $_ENV["DB_HOST"];
        $db_port = $_ENV["DB_PORT"];
        $db_username = $_ENV["DB_USERNAME"];
        $db_password = $_ENV["DB_PASSWORD"];
        $db_table_name = $_ENV["DB_TABLE_NAME"];
        $conn = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_table_name", $db_username, $db_password);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn = $conn;
        $this->sql = "";
        $this->values = [];
    }

    public function setSql(string $string)
    {
        $this->sql = $string;
    }

    public function setValue(string|int $param, mixed $value, int $type = PDO::PARAM_STR)
    {
        $this->values[] = compact("param", "value", "type");
    }

    public function execute()
    {
        $stm = $this->conn->prepare($this->sql);
        if ($stm) {
            foreach ($this->values as $data) {
                $param = $data["param"];
                $value = $data["value"];
                $type = $data["type"];
                $stm->bindValue($param, $value, $type);
            }
            $stm->execute();
            return $stm;
        }
        return false;
    }

    public function reset()
    {
        $this->sql = "";
        $this->values = [];
    }

    public function begin()
    {
        $this->conn->beginTransaction();
    }

    public function commit()
    {
        $this->conn->commit();
    }

    public function rollBack()
    {
        $this->conn->rollBack();
    }
}
