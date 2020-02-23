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
                        <div class="card-title">Survey</div>
                        <table class="table table-sm" id="table-survey">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Teacher</th>
                                <th>Subject</th>
                                <th>Student Name</th>
                                <th>Date </th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php

                            global $db;
                            $sql = "select tblsurvey.id, tblteachers.name as 'teacherName', 
                                    tblsubjects.subject, tblusers.name as 'studentName', tblsurvey.date_evaluation FROM tblsurvey 
                                    INNER JOIN tblteachers ON tblteachers.id = tblsurvey.teacher_id 
                                    INNER JOIN tblsubjects on tblsubjects.id = tblsurvey.subject_id 
                                    INNER JOIN tblusers on tblusers.id = tblsurvey.student_id";
                            $result = $db->query($sql);
                            if (mysqli_num_rows($result) > 0) {
                                $val=1;
                                while ($row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?= $val ?></td>
                                        <td><?= ucwords($row['teacherName']) ?></td>
                                        <td><?= ucwords($row['subject']) ?></td>
                                        <td><?= ucwords($row['studentName']) ?></td>
                                        <td><?= $row['date_evaluation'] ?></td>
                                        <td>
                                            <a href="?<?= $row['id'] ?>" class="btn-link">View</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $val++;
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
        $(document).ready( function () {
            $('#table-survey').DataTable();
        } );
    </script>
