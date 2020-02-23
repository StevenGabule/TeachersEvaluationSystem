<?php

require_once '../../../vendor/autoload.php';
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'SaitEvaluationSystem';

$faker = Faker\Factory::create();
$conn = new mysqli($servername, $username, $password, $db);
/*
$sql = 'TRUNCATE TABLE tblstudents';
if ($conn->query($sql) === TRUE) {
    echo 'Table truncate successfully';
} else {
    echo 'Table truncate failed: ' . $conn->error;
}

$sql2 = 'TRUNCATE TABLE tblusers';
if ($conn->query($sql2) === TRUE) {
    echo 'Table truncate successfully';
} else {
    echo 'Table truncate failed: ' . $conn->error;
}

$sql4 = 'TRUNCATE TABLE tblsurvey';
if ($conn->query($sql4) === TRUE) {
    echo 'Table truncate successfully';
} else {
    echo 'Table truncate failed: ' . $conn->error;
}*/

for ($i = 1; $i < 50; $i++) {
    $studentNo = $faker->numberBetween(801, 900);
    $name = $faker->name;
    $age = $faker->numberBetween(15, 20);
    $address = $faker->address;
    $email = $faker->safeEmail;
    $gradeLevel = 12;
    $password = md5('password');
    $birthday = $faker->dateTimeThisCentury->format('Y-m-d');
    $teacher_id = 4;
    $subject_id = 1;
    $k1 = 4;# $faker->numberBetween(1,5);
    $k2 = 4; # $faker->numberBetween(1,5);
    $k3 = 4; # $faker->numberBetween(1,5);
    $k4 = 4; # $faker->numberBetween(1,5);
    $k5 = 4; # $faker->numberBetween(1,5);

    $ts1 = 4; # $faker->numberBetween(1,5);
    $ts2 = 4; # $faker->numberBetween(1,5);
    $ts3 = 4; # $faker->numberBetween(1,5);
    $ts4 = 4; # $faker->numberBetween(1,5);
    $ts5 = 4; # $faker->numberBetween(1,5);
    $ts6 = 4; # $faker->numberBetween(1,5);
    $ts7 = 4; # $faker->numberBetween(1,5);
    $ts8 = 4; # $faker->numberBetween(1,5);
    $ts9 = 4; # $faker->numberBetween(1,5);

    $cm1 = 4; # $faker->numberBetween(1,5);
    $cm2 = 4; # $faker->numberBetween(1,5);
    $cm3 = 4; # $faker->numberBetween(1,5);
    $cm4 = 4; # $faker->numberBetween(1,5);
    $cm5 = 4; # $faker->numberBetween(1,5);
    $cm6 = 4; # $faker->numberBetween(1,5);

    $p1 = 4; # $faker->numberBetween(1,5);
    $p2 = 4; # $faker->numberBetween(1,5);
    $p3 = 4; # $faker->numberBetween(1,5);
    $p4 = 4; # $faker->numberBetween(1,5);
    $p5 = 4; # $faker->numberBetween(1,5);
    $p6 = 4; # $faker->numberBetween(1,5);
    $p7 = 4; # $faker->numberBetween(1,5);
    $p8 = 4; # $faker->numberBetween(1,5);
    $p9 = 4; # $faker->numberBetween(1,5);
    $p10 = 4; # $faker->numberBetween(1,5);

    $sm1 = 4; # $faker->numberBetween(1,5);
    $sm2 = 4; # $faker->numberBetween(1,5);
    $sm3 = 4; # $faker->numberBetween(1,5);
    $sm4 = 4; # $faker->numberBetween(1,5);

    $comments = $faker->sentence;
    $suggestions = $faker->sentence;

    $sql1 = "INSERT INTO tblstudents (studentNo, name, birthday, age, address, gradeLevel, date_register) VALUES('$studentNo', '$name', '$birthday', '$age','$address', '$gradeLevel', now())";
    $conn->query($sql1);
    $student_id = $conn->insert_id;

    $sqlUser = "INSERT INTO tblusers(id, role_number, name, email, password, role_type, date_registered) VALUES (null, '$studentNo', '$name', '$email', '$password', 2, now())";
    $conn->query($sqlUser);

    $sql2 = 'INSERT INTO tblsurvey (teacher_id, subject_id, student_id, k1, k2, k3, k4, k5, ts1, ts2, ts3, ts4, ts5, ts6, ts7, ts8, ts9, cm1, cm2, cm3, cm4, cm5, cm6, p1, p2, p3, p4, p5, p6, p7, p8, p9, p10, sm1, sm2, sm3, sm4, comments, suggestions, date_evaluation) ';
    $sql2 .= " VALUES ($teacher_id, '$subject_id', '$student_id','$k1','$k2','$k3','$k4','$k5','$ts1','$ts2','$ts3','$ts4','$ts5','$ts6','$ts7','$ts8','$ts9','$cm1','$cm2','$cm3','$cm4','$cm5','$cm6','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$sm1' ,'$sm2','$sm3','$sm4', '$comments', '$suggestions', now())";
    $conn->query($sql2);
}


