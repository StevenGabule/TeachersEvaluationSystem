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
    public $role_number;
    public $date_registered;

    public function SaveUsers($name, $email, $password, $role_number, $roleType = 1)
    {
        global $db;
        $password = md5($password);
        $sql = "INSERT INTO tblusers (name, email,role_number, password, role_type, date_registered) values ('$name', '$email','$role_number', '$password','$roleType', now())";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }

    public function UpdateUsers($id, $name, $email, $role_number, $roleType = 1)
    {
        global $db;
        $sql = "UPDATE  tblusers SET name='$name', email= '$email', role_number = '$role_number',  role_type='$roleType' WHERE id = $id";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }

    public static function Login($role_number, $password)
    {
        global $db;
        $role_number = $db->escape_string($role_number);
        $password = $db->escape_string($password);
        $password = md5($password);

        $sql = "SELECT * FROM  tblusers WHERE role_number = '{$role_number}' AND password='{$password}'";
        $the_result_array = self::find_by_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function roleNumber_exists($roleNumber)
    {
        global $db;
        $sql = "SELECT * FROM tblusers WHERE role_number = '$roleNumber'";
        $result = $db->query($sql);
        return (int)mysqli_num_rows($result) === 1;
    }
}


