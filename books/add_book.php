<?php include '../connection/connection.php'?>
<html>

<head>
    <title>Add Book</title>
</head>
<body>
    <form action="" method="POST">
        <label>Enter the title: </label>
        <input type="text" name="title" required/><br>
        <!-- tag, alt -->
        <input type="submit" name="submit" value="Add Book" />
    </form>
    <?php 
        if (isset ($_POST['submit'])){
            $title = $_POST['title'];

            $sql = "INSERT INTO books(title) VALUES('$title')";
            if ($conn ->query($sql)===TRUE){
                echo "Book added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
    ?>
</body>
</html>