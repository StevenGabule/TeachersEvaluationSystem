<?php require 'layouts/header.php';
if (!$session->is_signed_in()) {
    redirect_to('../login.php');
}

$url = basename(__FILE__, '.php');
$students = Students::find_all();
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
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-lock"></i>
            <span class="ml-2">Logout</span></a>
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

                        <div class="card-title d-flex justify-content-between align-items-center">
                            <h4>Students</h4>
                            <a href="students_add.php" class="btn btn-sm btn-info">New Student</a>
                        </div>

                        <?php if($session->message()) echo $session->message() ?>

                        <table class="table table-bordered table-sm" id="table-teacher">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student No.</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Grade Level</th>
                                <th width="20%">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($students as $student) : ?>
                                <tr>
                                    <td><?= $student->id ?></td>
                                    <td class="text-capitalize"><?= $student->studentNo ?></td>
                                    <td class="text-capitalize"><?= $student->name ?></td>
                                    <td class="text-capitalize"><?= ($student->gender === 'm') ? 'Male' : 'Female'  ?></td>
                                    <td class="text-capitalize"><?= $student->gradeLevel ?></td>
                                    <td>
                                        <a href="students_edit.php?id=<?=$student->id?>" class="btn-link">Edit</a> |
                                        <a href="student_destroy.php?id=<?=$student->id?>" class="btn-link">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table><!-- end of table -->
                    </div><!-- end of card body -->
                </div><!-- end of card -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <?php require 'layouts/footer.php' ?>
    <script>
        $(document).ready( function () {
            $('#table-teacher').DataTable();
        } );
    </script>

