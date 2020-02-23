<?php require 'layouts/header.php';

if (!$session->is_signed_in()) {
    redirect_to('../login.php');
}

$url = basename(__FILE__, '.php');
$id = $_GET['id'];
$user = Users::find_by_id($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $role_number = $_POST['role_number'];
    $email = $_POST['email'];
    $roleType = $_POST['role_type'];

    $res = $user->UpdateUsers($id, $name, $email, $role_number, $roleType);

    if ($res) {
        $session->message('<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Successfully added a new users info.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
        redirect_to('accounts.php');
    } else {
        echO 'something went wrong!';
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
                <a href="survey.php">Accounts</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="card-title">
                            <h4>Account Information</h4>
                        </div>

                        <form action="" method="post">

                            <div class="form-group">
                                <label for="name">Role Number</label>
                                <input type="text" name="role_number" value="<?= $user->role_number?>" placeholder="Enter role number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" placeholder="Enter name" value="<?= $user->name?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" placeholder="Enter email" value="<?= $user->email?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="role_type">Role Type</label>
                                <select name="role_type" id="role_type" class="form-control">
                                    <option value="2" <?= $user->role_type == 2 ? 'selected' : ''?>>Student</option>
                                    <option value="1" <?= $user->role_type == 1 ? 'selected' : ''?>>Faculty</option>
                                    <option value="0" <?= $user->role_type == 0 ? 'selected' : ''?>>Administrator</option>
                                </select>
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
