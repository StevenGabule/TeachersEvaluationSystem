<?php

class Subjects extends DB_Object
{
    protected static $db_table = 'tblsubjects';
    protected static $db_table_fields = array(
        'id',
        'subject'
    );

    public $id;
    public $subject;

    public function saveSubject($subject)
    {
        global $db;
        $sql = "INSERT INTO tblsubjects VALUES(null, '$subject')";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }

    public function updateSubject($id, $subject)
    {
        global $db;
        $sql = "UPDATE tblsubjects SET subject='$subject' WHERE id = $id";
        if ($db->query($sql)) {
            $this->id = $db->the_insert_id();
            return true;
        }
        return false;
    }
}


