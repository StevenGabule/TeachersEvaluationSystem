<?php

class Survey extends DB_Object
{
    protected static $db_table = 'tblsurvey';
    protected static $db_table_fields = array(
        'id',
        'teacher_id',
        'subject_id',
        'student_id',
        'k1',
        'k2',
        'k3',
        'k4',
        'k5',
        'ts1',
        'ts2',
        'ts3',
        'ts4',
        'ts5',
        'ts6',
        'ts7',
        'ts8',
        'ts9',
        'cm1',
        'cm2',
        'cm3',
        'cm4',
        'cm5',
        'cm6',
        'p1',
        'p2',
        'p3',
        'p4',
        'p5',
        'p6',
        'p7',
        'p8',
        'p9',
        'p10',
        'sm1',
        'sm2',
        'sm3',
        'sm4',
        'comments',
        'suggestions',
        'date_evaluation',
    );

    public $id;
    public $teacher_id;
    public $subject_id;
    public $student_id;
    public $k1;
    public $k2;
    public $k3;
    public $k4;
    public $k5;
    public $ts1;
    public $ts2;
    public $ts3;
    public $ts4;
    public $ts5;
    public $ts6;
    public $ts7;
    public $ts8;
    public $ts9;
    public $cm1;
    public $cm2;
    public $cm3;
    public $cm4;
    public $cm5;
    public $cm6;
    public $p1;
    public $p2;
    public $p3;
    public $p4;
    public $p5;
    public $p6;
    public $p7;
    public $p8;
    public $p9;
    public $p10;
    public $sm1;
    public $sm2;
    public $sm3;
    public $sm4;
    public $comments;
    public $suggestions;
    public $date_evaluation;

    /**
     * @param int $teacher_id
     * @param int $subject_id
     * @param $student_id
     * @param $k1
     * @param $k2
     * @param $k3
     * @param $k4
     * @param $k5
     * @param $ts1
     * @param $ts2
     * @param $ts3
     * @param $ts4
     * @param $ts5
     * @param $ts6
     * @param $ts7
     * @param $ts8
     * @param $ts9
     * @param $cm1
     * @param $cm2
     * @param $cm3
     * @param $cm4
     * @param $cm5
     * @param $cm6
     * @param $p1
     * @param $p2
     * @param $p3
     * @param $p4
     * @param $p5
     * @param $p6
     * @param $p7
     * @param $p8
     * @param $p9
     * @param $p10
     * @param $sm1
     * @param $sm2
     * @param $sm3
     * @param $sm4
     * @param $comments
     * @param $suggestions
     * @return bool
     */
    public function SaveSurvey($teacher_id, $subject_id, $student_id, $k1, $k2, $k3, $k4, $k5, $ts1, $ts2, $ts3, $ts4, $ts5, $ts6, $ts7, $ts8, $ts9, $cm1, $cm2, $cm3, $cm4, $cm5, $cm6, $p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10, $sm1, $sm2, $sm3, $sm4, $comments, $suggestions)
    {
        global $db;
        $sql = "INSERT INTO tblsurvey (teacher_id, subject_id, student_id, k1, k2, k3, k4, k5, ts1, ts2, ts3, ts4, ts5, ts6, ts7, ts8, ts9, cm1, cm2, cm3, cm4, cm5, cm6, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, sm1, sm2, sm3, sm4, comments, suggestions, date_evaluation) VALUES ($teacher_id, '$subject_id', '$student_id','$k1','$k2','$k3','$k4','$k5','$ts1','$ts2','$ts3','$ts4','$ts5','$ts6','$ts7','$ts8','$ts9','$cm1','$cm2','$cm3','$cm4','$cm5','$cm6','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$sm1' ,'$sm2','$sm3','$sm4', '$comments', '$suggestions', now())";
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
        $sql = 'select tblsurvey.id, tblteachers.name as \'TeacherName\', tblsubjects.subject, tblusers.name FROM tblsurvey 
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


