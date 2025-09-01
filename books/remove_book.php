<?php
include '../connection/connection.php';

$id = $_GET['book_id'] ?? null;

if ($id) {
    $id = intval($id);
    $stmt = $conn->prepare("DELETE FROM books WHERE book_id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Book removed successfully'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<script>alert('ID not found'); window.location.href='index.php';</script>";
}
?>