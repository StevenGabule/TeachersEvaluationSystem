<?php

class Database {
    public $connection;

    public function __construct()
    {
        $this->open_connection();
    }

    public function open_connection()
    {
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(mysqli_connect_errno()) {
            die('Database failed to connect' . mysqli_error($this->connection));
        }
    }

    public function query($sql)
    {
        return mysqli_query($this->connection, $sql);
    }

    private function confirm_query($result)
    {
        if(!$result) {
            die("Query Failed");
        }
    }

    public function escape_string($string)
    {
        return mysqli_real_escape_string($this->connection, $string);
    }

    public function the_insert_id()
    {
        return mysqli_insert_id($this->connection);
    }

    public function loadResultList($key='' ) {
        $cur = $this->executeQuery();

        $array = array();
        while ($row = mysqli_fetch_object( $cur )) {
            if ($key) {
                $array[$row->$key] = $row;
            } else {
                $array[] = $row;
            }
        }
        mysqli_free_result( $cur );
        return $array;
    }

    public function setQuery($sql='') {
        $this->sql_string=$sql;
    }

    public function executeQuery() {
        return mysqli_query($this->connection, $this->sql_string);
    }
}

$db = new Database();
