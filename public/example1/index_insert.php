<?php
require('../../db/dbcon.php');
$conn->exec("INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')");
echo 'New record created successfully';
$conn = null;
