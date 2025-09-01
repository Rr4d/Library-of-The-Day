<?php
include '../connection/connection.php';
$result = mysqli_query($conn, "SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>List of Users</title>
</head>
<body>
    <h2>List of users</h2>
    <a href="add_user.php">Add user</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['user_id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['username'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $row['user_id'] ?>">Edit</a> | 
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
