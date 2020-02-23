<?php require 'layouts/header.php';

if (!$session->is_signed_in()) {
    redirect_to('../login.php');
}

$url = basename(__FILE__, '.php');
$student = new Students();
$studentNo = $name = $gender = $birthday = $age = $address = $gradeLevel = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentNo = isset($_POST['studentNo']) ? $_POST['studentNo'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $gradeLevel = isset($_POST['gradeLevel']) ? $_POST['gradeLevel'] : '';

    if ($student::student_number_exists($studentNo)) {
        $session->message('<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Failed!</strong> Student number is already exists or used! Please confirm your student number.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');

    } else {
        $res = $student->saveStudent($studentNo, $name, $gender, $birthday, $age, $address, $gradeLevel);

        if ($res) {
            $session->message('<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Successfully added a new student info.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
            redirect_to('students.php');
        }
    }
}
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
                <a href="students.php">Students</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4>Student Information</h4>
                        </div>
                        <?php if ($session->message()) echo $session->message() ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Student No.</label>
                                <input type="text" name="studentNo" placeholder="Enter Student Number"
                                       class="form-control" value="<?= $studentNo ?: '20023' ?>">
                            </div>
                            <div class="form-group">
                                <label for="gradeLevel">Grave Level</label>
                                <select class="form-control" name="gradeLevel" id="gradeLevel">
                                    <option value="12" <?= ($gradeLevel === '12') ? 'selected' : '' ?>>Grade 12</option>
                                    <option value="11" <?= ($gradeLevel === '11') ? 'selected' : '' ?>>Grade 11</option>
                                    <option value="10" <?= ($gradeLevel === '10') ? 'selected' : '' ?>>Grade 10</option>
                                    <option value="9" <?= ($gradeLevel === '9') ? 'selected' : '' ?>>Grade 9</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter name" class="form-control"
                                       value="<?= $name ?: 'Johnny Bruce'?>">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="m" <?= ($gradeLevel === 'm') ? 'selected' : '' ?>>Male</option>
                                    <option value="f" <?= ($gradeLevel === 'f') ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="text" name="birthday" placeholder="Enter Birthday" class="form-control"
                                       value="<?= $birthday ?:'02/10/2000' ?>">
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" name="age" placeholder="Enter age" class="form-control"
                                       value="<?= $age ?:'18' ?>">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control"
                                          placeholder="Enter the current place" rows="10"><?= $address ?:'Valencia City Bukidnon' ?></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Submit" name="submit" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <?php require 'layouts/footer.php' ?>

