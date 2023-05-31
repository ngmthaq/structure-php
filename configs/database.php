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
        try {
            $stm = $this->conn->prepare($this->sql);
            if ($stm) {
                foreach ($this->values as $data) {
                    $param = $data["param"];
                    $value = $data["value"];
                    $type = $data["type"];
                    $stm->bindValue($param, $value, $type);
                }
                $stm->execute();
                $msg = "SQL: $this->sql, params: " . json_encode($this->values);
                write_log("db", $msg);
                return $stm;
            }
            $msg = "SQL: $this->sql, params: " . json_encode($this->values) . ", message: Cannot create PDOStatement";
            write_log("db", $msg, LOG_STATUS_ERROR);
            return false;
        } catch (\Throwable $th) {
            $msg = "SQL: $this->sql, params: " . json_encode($this->values) . ", message: " . $th->getMessage();
            write_log("db", $msg, LOG_STATUS_ERROR);
            return false;
        }
    }

    public function reset()
    {
        $this->sql = "";
        $this->values = [];
    }

    public function begin()
    {
        write_log("db", "BEGIN TRANSACTION");
        $this->conn->beginTransaction();
    }

    public function commit()
    {
        write_log("db", "COMMIT TRANSACTION");
        $this->conn->commit();
    }

    public function rollBack()
    {
        write_log("db", "ROLLBACK TRANSACTION");
        $this->conn->rollBack();
    }
}
