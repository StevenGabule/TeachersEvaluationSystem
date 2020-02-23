<?php

class Accounts extends DB_Object
{
    protected static $db_table = 'tblusers';
    protected static $db_table_fields = array(
        'id',
        'role_number',
        'name',
        'email',
        'password',
        'birthday',
        'address',
        'gradeLevel',
        'date_register'
    );

    public $id;
    public $studentNo;
    public $name;
    public $gender;
    public $age;
    public $address;
    public $role_number;
    public $birthday;
    public $gradeLevel;
    public $date_register;

    public function saveStudent($studentNo, $name, $gender, $birthday, $age, $address, $gradeLevel)
    {
        global $db;
        $sql = "INSERT INTO tblstudents(studentNo, name, gender, birthday, age, address, gradeLevel, date_register) VALUES ($studentNo, '$name', '$gender','$birthday', '$age', '$address' , '$gradeLevel', now())";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }
    public function updateStudent($id, $studentNo, $name, $gender, $birthday, $age, $address, $gradeLevel)
    {
        global $db;
        $sql = "UPDATE tblstudents SET name ='$name', studentNo='$studentNo' , gender='$gender',birthday='$birthday', age='$age', address='$address', gradeLevel='$gradeLevel' where id = $id";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }

    public static function student_number_exists($studentNumber) {
        global $db;
        $sql = "SELECT studentNo FROM tblstudents WHERE studentNo = '$studentNumber'";
        $result = $db->query($sql);
        return mysqli_num_rows($result) === 1;
    }
}


