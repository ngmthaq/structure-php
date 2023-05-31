<?php

final class Database
{
    protected PDO $conn;
    protected array $values;
    protected string $sql;

    public function __construct()
    {
        $dbHost = $_ENV["DB_HOST"];
        $dbPort = $_ENV["DB_PORT"];
        $dbUsername = $_ENV["DB_USERNAME"];
        $dbPassword = $_ENV["DB_PASSWORD"];
        $dbTableName = $_ENV["DB_TABLE_NAME"];
        $conn = new PDO("mysql:host=$dbHost;port=$dbPort;dbname=$dbTableName", $dbUsername, $dbPassword);
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
                writeLog("db", $msg);
                return $stm;
            }
            $msg = "SQL: $this->sql, params: " . json_encode($this->values) . ", message: Cannot create PDOStatement";
            writeLog("db", $msg, LOG_STATUS_ERROR);
            return false;
        } catch (\Throwable $th) {
            $msg = "SQL: $this->sql, params: " . json_encode($this->values) . ", message: " . $th->getMessage();
            writeLog("db", $msg, LOG_STATUS_ERROR);
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
        writeLog("db", "BEGIN TRANSACTION");
        $this->conn->beginTransaction();
    }

    public function commit()
    {
        writeLog("db", "COMMIT TRANSACTION");
        $this->conn->commit();
    }

    public function rollBack()
    {
        writeLog("db", "ROLLBACK TRANSACTION");
        $this->conn->rollBack();
    }
}
