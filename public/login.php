<?php
require '../include/init.php';

if (isset($_SESSION['id'], $_SESSION['role'])) {
    roleType($_SESSION['role']);
}
$role_number = $password = '';
if (isset($_POST['login'])) {
    $role_number = clean($_POST['role_number']);
    $password = clean($_POST['password']);
    $logged = Users::Login($role_number, $password);

    if ($logged) {
        $session->login($logged);
        $role = (int)$logged->role_type;
        roleType($role);
    } else {
        redirect_to('login.php');
        $session->message('<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>FAILED!</strong> Credentials not found, Please try again!.
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>');
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sait Evaluation System - Login Page</title>
    <link rel="stylesheet" href="admin/css/sb-admin.min.css">
    <style>
        body {
            background: #2C2C36;
        }

        .card {
            text-align: center;
            padding: 15px;
            width: 500px;
            margin: 10% auto auto;
            background: white;
        }
    </style>
</head>
<body>
<div class="card">
    <div class="card-body">

        <h1>Login</h1>

        <form class="form-signin p-5" action="" method="post">
            <?php if ($session->message()) echo $session->message() ?>
            <div class="form-group" style="display: flex;justify-content: center">
                <label for="inputRoleNumber">Student Number: </label>
                <input type="text" id="inputRoleNumber" name="role_number" value="<?= $role_number ?>"
                       class="form-control" placeholder="Enter role number"
                       required autofocus>
            </div>

            <div class="form-group" style="display: flex;justify-content: center">
                <label for="inputPassword">Password</label>
                <input type="password" id="inputPassword" name="password" value="<?= $password ?>"
                       class="form-control"
                       placeholder="Enter password" style="margin-left: 20px;"
                       required>
            </div>

            <button type="submit" name="login" class="btn btn-danger">Log-In</button>
        </form>
        <p class="text-muted">SAIT &copy; <?= date('Y') ?></p>
    </div>
</div>
</body>
</html>
