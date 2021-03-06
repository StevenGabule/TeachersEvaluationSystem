<?php require 'layouts/header.php';

function chopExtension($filename)
{
    return substr($filename, 0, strrpos($filename, '.'));
}

$url = basename(__FILE__, '.php');
/*$surveys = Survey::SurveyResults();
var_dump($surveys);
die();*/
?>
<ul class="sidebar navbar-nav">

    <li class="nav-item <?= $url === 'index' ? 'active' : '' ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-cube"></i>
            <span class="ml-2">Dashboard</span>
        </a>
    </li>

    <li class="nav-item <?= $url === 'students' ? 'active' : '' ?>">
        <a class="nav-link" href="students.php">
            <i class="fas fa-fw fa-graduation-cap"></i>
            <span class="ml-2">Students</span></a>
    </li>
    <li class="nav-item <?= $url === 'survey' ? 'active' : '' ?>">
        <a class="nav-link" href="survey.php">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span class="ml-2">Surveys</span></a>
    </li>

    <li class="nav-item  <?= $url === 'teachers' ? 'active' : '' ?>">
        <a class="nav-link" href="teachers.php">
            <i class="fas fa-fw fa-chalkboard-teacher"></i>
            <span class="ml-2">Teachers</span></a>
    </li>
    <li class="nav-item <?= $url === 'subjects' ? 'active' : '' ?>">
        <a class="nav-link" href="subjects.php">
            <i class="fas fa-fw fa-chalkboard"></i>
            <span class="ml-2">Subjects</span></a>
    </li>
    <li class="nav-item <?= $url === 'accounts' ? 'active' : '' ?>">
        <a class="nav-link" href="accounts.php">
            <i class="fas fa-fw fa-users-cog"></i>
            <span class="ml-2">Accounts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-lock"></i>
            <span class="ml-2">Logout</span></a>
    </li>
</ul>

<div id="content-wrapper">

    <div class="container-fluid">

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="survey.php">Surveys</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="h5 pb-2 border-bottom">Students Survey</h5>
                        </div>
                        <table class="table table-sm" id="table-survey">
                            <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="20%">Student Name</th>
                                <th>Teacher</th>
                                <th>Average</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            global $db;
                            $sql = "select 
                                        tblsurvey.id, tblteachers.name as 'teacherName', 
                                        tblsubjects.subject, tblusers.name as 'studentName', 
                                        tblsurvey.date_evaluation,
                                        round(( (k1 + k2 + k3 + k4 + k5 ) / 25 / 100 * 100 + 
                                          (ts1 + ts2 + ts3 + ts4 + ts5 + ts6 + ts7 + ts7 + ts8 + ts9) / 45  / 100 * 100 + 
                                          (cm1 + cm2 + cm3 + cm4 + cm5 + cm6) / 30  / 100 * 100+ 
                                          (p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9 + p10) / 50  / 100 * 100+ 
                                          (sm1+ sm2+ sm3+ sm4) / 20 / 100 * 100),2) as 'TotalPoints'
                                    FROM tblsurvey 
                                    INNER JOIN tblteachers ON tblteachers.id = tblsurvey.teacher_id 
                                    INNER JOIN tblsubjects on tblsubjects.id = tblsurvey.subject_id 
                                    INNER JOIN tblusers on tblusers.id = tblsurvey.student_id";
                            $result = $db->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                $val = 1;
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?= $val++ ?></td>
                                        <td><?= ucwords($row['studentName']) ?></td>
                                        <td><?= ucwords($row['teacherName']) ?></td>
                                        <td><?= ($row['TotalPoints']) ?></td>
                                        <td><?= ucwords($row['subject']) ?></td>
                                        <td><?= $row['date_evaluation'] ?></td>
                                        <td>
                                            <a href="survey_show.php?<?= $row['id'] ?>" class="btn-link">View</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">
                        <div class="card-title">
                            <h5 class="h5 pb-2 border-bottom">Results in the survey</h5>
                        </div>
                        <table class="table table-sm" id="table-result-survey">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Teacher Name</th>
                                <th>Subject</th>
                                <th>Average Result</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            global $db;
                            $sql = 'select tblteachers.id,
                                           tblteachers.name,
                                           tblsubjects.subject,
                                           round(avg((k1 + k2 + k3 + k4 + k5) / 25 * 100 / 100 +
                                            (ts1 + ts2 + ts3 + ts4 + ts5 + ts6 + ts7 + ts7 + ts8 + ts9) / 45 * 100 / 100 +
                                            (cm1 + cm2 + cm3 + cm4 + cm5 + cm6) / 30 * 100 / 100 +
                                            (p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9 + p10) / 50 * 100 / 100 +
                                            (sm1 + sm2 + sm3 + sm4) / 20 * 100 / 100), 2) as totalAverage
                                    FROM tblsurvey
                                             INNER JOIN tblteachers ON tblteachers.id = tblsurvey.teacher_id
                                             INNER JOIN tblsubjects on tblsubjects.id = tblsurvey.subject_id
                                             INNER JOIN tblusers on tblusers.id = tblsurvey.student_id
                                    group by tblteachers.id, tblteachers.name, tblsubjects.subject';
                            $result = $db->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                $val = 1;
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?= $val++ ?></td>
                                        <td><?= ucwords($row['name']) ?></td>
                                        <td><?= ucwords($row['subject']) ?></td>
                                        <td><?= ucwords($row['totalAverage']) ?></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <?php require 'layouts/footer.php' ?>

    <script>
        $(document).ready(function () {
            $('#table-survey').DataTable();
            $('#table-result-survey').DataTable();
        });
    </script>
