<?php
require('../../db/dbcon.php');

// prepare sql and bind parameters
$stmt = $conn->prepare('INSERT INTO MyGuests (firstname, lastname, email) VALUES (:firstname, :lastname, :email)');
$stmt->bindParam(':firstname', $firstname);
$stmt->bindParam(':lastname', $lastname);
$stmt->bindParam(':email', $email);

// insert a row
$firstname = 'John';
$lastname = 'Doe';
$email = 'john@example.com';
$stmt->execute();

// insert another row
$firstname = 'Mary';
$lastname = 'Moe';
$email = 'mary@example.com';
$stmt->execute();

// insert another row
$firstname = 'Julie';
$lastname = 'Dooley';
$email = 'julie@example.com';
$stmt->execute();

echo 'New records created successfully';
$conn = null;
