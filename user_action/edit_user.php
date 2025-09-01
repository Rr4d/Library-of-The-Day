<?php
include '../connection/connection.php';

$id = $_GET['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id=$user_id");
$user = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE users SET name='$name', username='$username', password='$password' WHERE user_id=$user_id";
    } else {
        $sql = "UPDATE users SET name='$name', username='$username' WHERE user_id=$user_id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: view_users.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        Name: <input type="text" name="name" value="<?= $user['name'] ?>" required><br><br>
        Username: <input type="text" name="username" value="<?= $user['username'] ?>" required><br><br>
        Password: <input type="password" name="password"><br><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
