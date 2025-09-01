<?php include '../connection/connection.php'; ?>

<html>
<head>
    <title>Book List</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: white;
            background: #e74c3c;
            padding: 5px 10px;
            border-radius: 4px;
        }
        a:hover {
            background: #c0392b;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Library Book List</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Action</th>
        </tr>
        <?php
        $sql = "SELECT * FROM books";
        $result = $conn->query($sql);

        

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['book_id']."</td>
                        <td>".$row['title']."</td>
                        <td><a href='remove_book.php?book_id=".$row['book_id']."' onclick=\"return confirm('Are you sure you want to delete this book?');\">Delete</a></td>

                      </tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No books available</td></tr>";
        }
        ?>
    </table>
    <div style="text-align:center;">
        <a href="add_book.php">Add New Book</a>
</body>
</html>