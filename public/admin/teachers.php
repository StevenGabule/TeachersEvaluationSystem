<?php require 'layouts/header.php';

function chopExtension($filename) {
    return substr($filename, 0, strrpos($filename, '.'));
}

$url = basename(__FILE__, '.php');
?>
<!-- Sidebar -->
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
</ul><!-- end of sidebar -->

<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="survey.php">Surveys</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Teachers</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <?php require 'layouts/footer.php' ?>

