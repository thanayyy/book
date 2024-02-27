<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbName = "bookstore";

        $conn = mysqli_connect($hostname, $username, $password);
        if (!$conn) {
            die("Failed to connect to the database");
        }
        mysqli_select_db($conn, $dbName) or die("Can't choose database");
        if(isset($_GET['bookId'])) {
            $bookId = $_GET['bookId'];
            $sql = "SELECT * FROM book WHERE bookId = $bookId";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0) {
                
                $row = mysqli_fetch_assoc($result);
                $Path="pictures/"; //ระบุ path ของไฟล์รูปภาพที่จัดเก็บไว้ใน server
                $image = "<img src=$Path$row[Picture] valign=middle align = centerwidth=\"80\" height = \"100\">";
                echo "<table border=1 align =center ";
                echo "<tr><td align=center colspan = 2 bgcolor =#a1d08e><B>Book Details</B></td></tr>";

                echo "<tr><td> Book ID : </td><td>".$row['BookID']."</td></tr>";
                echo "<tr><td> Book Name : </td><td>".$row['BookName']."</td></tr>";
                echo "<tr><td> TypeID : </td><td>".$row['TypeID']."</td></tr>";
                echo "<tr><td> StatusID : </td><td>".$row['StatusID']."</td></tr>";
                echo "<tr><td> Publish : </td><td>".$row['Publish']."</td></tr>";
                echo "<tr><td> UnitPrice : </td><td>".$row['UnitPrice']."</td></tr>";
                echo "<tr><td> UnitRent : </td><td>".$row['UnitRent']."</td></tr>";
                echo "<tr><td> Picture : </td><td>".$image."</td></tr>";
                echo "<tr><td> DayAmount : </td><td>".$row['DayAmount']."</td></tr>";
                echo "<tr><td> BookDate :</td><td>".$row["BookDate"]."</td></tr></table>";
                
                
            } else {
                echo "No book found with the provided ID.";
            }
        } else {
            echo "No book ID provided.";
        }

        mysqli_close($conn);
    ?>
     <a href="/"></a>
    <center><br><a href="bookList1.php">Home</a>
</body>
</html>