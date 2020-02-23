<?php require 'layouts/header.php';

if (!$session->is_signed_in()) {
    redirect_to('../login.php');
}

$url = basename(__FILE__, '.php');
$id = $_GET['id'];
$student = Students::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentNo = $_POST['studentNo'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $gradeLevel = $_POST['gradeLevel'];
    $res = $student->updateStudent($id, $studentNo, $name, $gender, $birthday, $age, $address, $gradeLevel);

    if ($res) {
        $session->message('<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Successfully updated student info.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect_to('students.php');
    } else {
        echo 'WTF?';
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
                <a href="survey.php">Surveys</a>
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
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="name">Student No.</label>
                                <input type="text" name="studentNo" placeholder="Enter Student Number"
                                       class="form-control" value="<?= $student->studentNo?>">
                            </div>
                            <div class="form-group">
                                <label for="gradeLevel">Grade Level</label>
                                <select class="form-control" name="gradeLevel" id="gradeLevel">
                                    <option value="12" <?= ($student->gradeLevel === '12') ? 'selected' : ''; ?>>Grade 12</option>
                                    <option value="11" <?= ($student->gradeLevel === '11') ? 'selected' : ''; ?>>Grade 11</option>
                                    <option value="10" <?= ($student->gradeLevel === '10') ? 'selected' : ''; ?>>Grade 10</option>
                                    <option value="9" <?= ($student->gradeLevel === '9') ? 'selected' : ''; ?>>Grade 9</option>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter name" class="form-control" value="<?= $student->name?>">
                            </div>

                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option value="m" <?= ($student->gender=== 'm') ? 'selected' : '' ?>>Male</option>
                                    <option value="f" <?= ($student->gender=== 'f') ? 'selected' : '' ?>>Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="birthday">Birthday</label>
                                <input type="text" name="birthday" placeholder="Enter Birthday" class="form-control" value="<?= $student->birthday ?>">
                            </div>

                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="text" name="age" placeholder="Enter age" class="form-control" value="<?= $student->age?>">
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control"
                                          placeholder="Enter the current place" rows="10"><?= $student->address?></textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <?php require 'layouts/footer.php' ?>

