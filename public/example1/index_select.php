<?php


include_once('TableRows.php');
include_once('../../db/dbcon.php');

$stmt = $conn->query('SELECT id, firstname, lastname FROM MyGuests ORDER BY lastname');
// set the resulting array to associative
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

echo "<table style='border: solid 1px black;'>";
echo '<tr>
          <th>Id</th>
          <th>Firstname</th>
          <th>Lastname</th>
      </tr>';
foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
    echo $v;
}

$conn = null;
echo '</table>';
