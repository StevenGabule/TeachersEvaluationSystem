<?php
include('../../db/dbcon.php');
$id = $_GET['id'];
$conn->exec("DELETE FROM MyGuests WHERE id=$id");
$conn= null;
header('Location: index.php');
