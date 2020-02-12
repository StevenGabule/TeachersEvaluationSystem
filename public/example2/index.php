<?php include_once('../../db/dbcon.php') ?>
<?php include_once('layouts/_header.php') ?>

<h1>Guest Information</h1>
<a href="add.php" class="btn btn-add px-4 py-3 rounded">Add New Guest</a>
<br>

<table>
    <tr style="background:#2D3748;color: white;">
        <th class="px-4 py-2">Id</th>
        <th class="px-4 py-2">Firstname</th>
        <th class="px-4 py-2">Lastname</th>
        <th class="px-4 py-2">Email</th>
        <th class="px-4 py-2">Action</th>
    </tr>

    <?php
        $stmt = $conn->query('SELECT id, firstname, lastname, email FROM MyGuests ORDER BY id desc');
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); ?>

    <?php while ($row = $stmt->fetch()) : ?>
        <tr class="bg-gray-100">
            <td class='px-4 py-2 border text-capitalize'><?= $row['id'] ?></td>
            <td class='px-4 py-2 border text-capitalize'><?= $row['firstname'] ?></td>
            <td class='px-4 py-2 border text-capitalize'><?= $row['lastname'] ?></td>
            <td class='px-4 py-2 border text-capitalize'><?= $row['email'] ?></td>
            <td class='px-4 py-2 border text-capitalize'>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['id'] ?>">Delete</a>
            </td>
        </tr>
    <?php endwhile; $conn = null;?>
</table>

<?php include_once('layouts/_footer.php'); ?>
