<?php

class Teacher extends DB_Object
{
    protected static $db_table = 'tblteachers';
    protected static $db_table_fields = array(
        'id',
        'name',
        'bachelor',
        'date_register'
    );

    public $id;
    public $name;
    public $bachelor;
    public $date_register;

    public function saveTeacher($name, $bachelor)
    {
        global $db;
        $sql = "INSERT INTO tblteachers VALUES (null, '$name', '$bachelor', now())";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }
    public function editTeacher($id, $name, $bachelor)
    {
        global $db;
        $sql = "UPDATE tblteachers SET name ='$name', bachelor='$bachelor' where ID = $id";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }

    public static function SurveyResults()
    {
        global $db;
        $the_object_array = array();
        $sql = 'select tblsurvey.id, tblteachers.name, tblsubjects.subject, tblusers.name FROM tblsurvey 
                INNER JOIN tblteachers ON tblteachers.id = tblsurvey.teacher_id 
                INNER JOIN tblsubjects on tblsubjects.id = tblsurvey.subject_id 
                INNER JOIN tblusers on tblusers.id = tblsurvey.student_id';
        $result = $db->query($sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $the_object_array[] = static::instantiation($row);
            }
        }
        return $the_object_array;
//        $the_result_array = static::find_by_query($sql);
//        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
}


