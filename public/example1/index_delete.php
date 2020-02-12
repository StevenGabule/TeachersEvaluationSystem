<?php
include('../../db/dbcon.php');
$conn->exec('DELETE FROM MyGuests WHERE id=3');
$conn= null;

