<?php

class Users extends DB_Object
{
    protected static $db_table = 'tblusers';
    protected static $db_table_fields = array(
        'id',
        'name',
        'email',
        'password',
        'role_type',
        'date_registered'
    );

    public $id;
    public $name;
    public $email;
    public $password;
    public $role_type;
    public $date_registered;

    public function SaveUsers($name, $email, $password)
    {
        global $db;
        $sql = 'INSERT INTO ' . self::$db_table . " (name, email, password, role_type, date_registered) values ('$name', '$email', '$password','1', now())";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }

    public static function Login($email, $password)
    {
        global $db;
        $email = $db->escape_string($email);
        $password = $db->escape_string($password);
        $password = md5($password);

        $sql = 'SELECT * FROM ' . self::$db_table . " WHERE email = '{$email}' AND password='{$password}'";
        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function email_exists($email)
    {
        global $db;
        $sql = 'SELECT * FROM ' . self::$db_table . " WHERE email = '$email'";
        $result = $db->query($sql);
        return (int)mysqli_num_rows($result) === 1;
    }
}


