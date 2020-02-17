<?php require('../../include/init.php'); ?>
<?php
    if (!$session->is_signed_in()) {
        redirect_to('../login.php');
    }
    $session->logout();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Successful Survey</title>
</head>
<body>
<div class="container">
    <h3>Your survey has been processed.</h3>
    <p>Thank you for conducting the survey in your respective teacher and I will process and validate your entry.</p>
    <p>We will logout you in 5 seconds...</p>
</div>
<script>
    setTimeout(function() {
        window.location.href = "logout.php";
    }, 5000)
</script>
</body>
</html>
