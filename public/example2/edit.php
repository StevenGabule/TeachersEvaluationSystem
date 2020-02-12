<?php

require('../../db/dbcon.php');
$firstname = $lastname = $email= '';
$firstnameErr = $lastnameErr = $emailErr = '';

$id = $_GET['id'];
$stmt = $conn->query("SELECT id, firstname, lastname, email FROM MyGuests where id = $id");
$stmt->execute();
$user = $stmt->fetch();

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

    if (empty($_POST['email'])){
        $emailErr = 'Email address is required';
    } else {
        $email = test_input($_POST['email']);
        $conn->exec("UPDATE MyGuests SET firstname = '$firstname', lastname='$lastname', email = '$email' where id = $id");
        $conn = null;
        header('Location: index.php');
    }
}

function test_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
require('layouts/_header.php')
?>
    <h2>Update Guest Information</h2>
    <form action="" method="post">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" class="px-4 py-2 form-control" value="<?=$user['firstname']?>" id="firstname">
        <br><br>

        <label for="lastname">Lastname</label>
        <input type="text" name="lastname" value="<?=$user['lastname']?>" class="px-4 py-2 form-control" id="lastname">
        <br><br>

        <label for="email">Email address</label>
        <input type="text" name="email" value="<?=$user['email']?>" id="email" class="px-4 py-2 form-control">
        <br><br>

        <div style="display:flex; align-content: center; align-items: center">
            <input type="submit" name="submit" value="Update" class="submit-btn">
            <a href="index.php" style="margin-left: 20px;">Cancel</a>
        </div>
    </form>
<?php require ('layouts/_footer.php')?>
