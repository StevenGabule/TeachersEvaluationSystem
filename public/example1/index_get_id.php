<?php
include('../../db/dbcon.php');
$conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Jane', 'Doe', 'jane@example.com')");
$last_id = $conn->lastInsertId();
echo 'New record created successfully. Last inserted ID is: ' . $last_id;
$conn = null;
