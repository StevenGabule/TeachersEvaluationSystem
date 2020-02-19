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
}


