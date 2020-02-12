<?php
require '../include/init.php';

if (isset($_SESSION['id'], $_SESSION['role'])) {
    roleType($_SESSION['role']);
}
$email = $password = '';
if (isset($_POST['login'])) {
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);
    $logged = Users::Login($email, $password);

    if ($logged) {
        $session->login($logged);
        $role = (int)$logged->role_type;
        roleType($role);
    } else {
        echo 'Credentials Invalid! Please try again!';
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
</head>
<body>
<h1>Login page</h1>
<?= $session->message() ?: '' ?>
<form class="form-signin p-5" action="" method="post">
    <table>
        <tr>
            <td><label for="inputEmail">Email address</label></td>
            <td><input type="text" id="inputEmail" name="email" value="<?= $email ?>" class="form-control" placeholder="Enter email address"
                       required autofocus></td>
        </tr>
        <tr>
            <td><label for="inputPassword">Password</label></td>
            <td><input type="password" id="inputPassword" name="password" value="<?= $password ?>" class="form-control"
                       placeholder="Enter password"
                       required></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" name="login">Log-In</button>
            </td>
        </tr>
        <tr>
            <td colspan="2">Don't have an account? <a href="register.php">Register here!</a></td>
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
