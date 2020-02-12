<?php
require('../../db/dbcon.php');

$firstname = $lastname = $email = '';
$firstnameErr = $lastnameErr = $emailErr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['firstname'])) {
        $firstnameErr = 'Firstname is required';
    } else {
        $firstname = test_input($_POST['firstname']);
    }

    if (empty($_POST['lastname'])) {
        $lastnameErr = 'Lastname is required';
    } else {
        $lastname = test_input($_POST['lastname']);
    }

    if (empty($_POST['email'])) {
        $emailErr = 'Email address is required';
    } else {
        $email = test_input($_POST['email']);
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('$firstname', '$lastname', '$email')");
        $conn = null;
        header('Location: index.php');
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

require('layouts/_header.php')

?>
<h2>Add Guest Information</h2>
<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
    <label for="firstname">Firstname*</label>
    <br>
    <input type="text" name="firstname" class="px-4 py-2 form-control" value="<?= $firstname ?>" id="firstname">
    <span class="error"><?= $firstnameErr ?></span>
    <br><br>

    <label for="lastname">Lastname*</label>
    <br>
    <input type="text" name="lastname" class="px-4 py-2 form-control" value="<?= $lastname ?>" id="lastname">
    <span class="error"> <?='<span style="font-style: italic;text-decoration:underline;">'. $lastnameErr .'</span>' ?></span>
    <br><br>

    <label for="email">Email address*</label>
    <br>
    <input type="text" name="email" value="<?= $email ?>" class="px-4 py-2 form-control" id="email">
    <span class="error"> <?= $emailErr ?></span>
    <br><br>

    <div style="display:flex; align-content: center; align-items: center">
        <input type="submit" name="submit" value="Submit" class="submit-btn">
        <a href="index.php" style="margin-left: 20px;">Cancel</a>
    </div>

</form>
<?php require('layouts/_footer.php') ?>
