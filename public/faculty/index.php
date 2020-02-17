<?php require('../../include/init.php');
if (!$session->is_signed_in()) {
    redirect_to('../login.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Faculty Dashboard</h1>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium alias aliquam amet aperiam consequatur culpa eligendi eos ipsum maiores obcaecati odio quia, reiciendis, repellat similique, unde vitae? Deleniti, nam!</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ad consequatur cumque distinctio dolores, necessitatibus nisi? Eligendi facilis, hic ipsum iste laudantium maxime mollitia nobis quisquam ratione reprehenderit, saepe vel!</p>
</body>
</html>
