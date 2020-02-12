<?php
include('../../db/dbcon.php');
$conn->exec('UPDATE MyGuests SET lastname=\'Doe\' WHERE id=2');
$conn= null;

