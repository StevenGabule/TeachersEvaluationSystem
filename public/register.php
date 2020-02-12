<?php
require '../include/init.php';

$name = $email = $password = $confirm_password = '';
$user = new Users();
global $db;
if (isset($_POST['register'])) {
    $name = clean($_POST['name']);
    $password = clean($_POST['password']);
    $confirm_password = clean($_POST['confirm_password']);
    $email = clean($_POST['email']);

    if ($confirm_password !== $password) {
        echo 'Password not matched!';
    } else {
        if ($user::email_exists($email)) {
            echo 'something one already take that email!';
        } else {
            try {
                $password = md5($password);
                if ($data = $user->SaveUsers($name, $email, $password)) {
                    redirect_to('/login.php');
                    $session->message('
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success</strong>  Create an successfully!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>');
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
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
    <title>Register</title>
</head>
<body>
<h1>Register Student</h1>
<form class="form-signin p-5" action="" method="post">
    <table>
        <tr>
            <td><label for="inputName">Name</label></td>
            <td><input type="text" id="inputName" name="name" class="form-control" value="<?= $name ?>"
                       placeholder="Enter name"
                       required autofocus maxlength="100"></td>
        </tr>

        <tr>
            <td><label for="inputEmail">Email address</label></td>
            <td><input type="text" id="inputEmail" name="email" class="form-control" value="<?= $email ?>"
                       placeholder="Enter email address"
                       required maxlength="100"></td>
        </tr>

        <tr>
            <td><label for="inputPassword">Password</label></td>
            <td><input type="password" id="inputPassword" name="password" class="form-control"
                       placeholder="Enter password" value="<?= $password ?>"
                       required maxlength="100"></td>
        </tr>

        <tr>
            <td><label for="inputPasswordConfirm">Confirm Password</label></td>
            <td><input type="password" id="inputPasswordConfirm" name="confirm_password" class="form-control"
                       placeholder="Confirm password" value="<?= $confirm_password ?>"
                       required></td>
        </tr>


        <tr>
            <td></td>
            <td>
                <button type="submit" name="register">Register</button>
            </td>
        </tr>

        <tfoot>
        <tr>
            <td></td>
            <td><p class="text-muted pt-1">&copy; <?= date('Y') ?></p></td>
        </tr>
        </tfoot>
    </table>

</form>
</body>
</html>
