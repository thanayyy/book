<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Report</title>
</head>
<body>
<?php
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbName = "bookStore";
        $conn = mysqli_connect($hostname, $username, $password);
        if (!$conn)
        die("ไม่สามารถติดต่อกับ MySQL ได้");
        mysqli_select_db($conn, $dbName) or die("ไม่สามารถเลือกฐานข้อมูล bookStore ได้");
        
        mysqli_query($conn,"set character_set_connection=utf8mb4");
        mysqli_query($conn,"set character_set_client=utf8mb4");
        mysqli_query($conn,"set character_set_results=utf8mb4");
        $sql = "select BookId, BookName, TypeName, StatusName, Publish, UnitPrice, UnitRent, DayAmount, picture, BookDate from book inner join typebook on book.TypeID=typebook.TypeID inner join statusbook on book.StatusID=statusbook.statusId;";
        $result = mysqli_query ($conn, $sql);
        echo "<table width ='50%' align='center' border='1'>";
        echo "<td align='center'>BookId</td><td align='center'>BookName</td><td align='center'>TypeName</td><td align='center'>StatusName</td>";
        echo "<td align='center'>Publish</td><td align='center'>UnitPrice</td><td align='center'>UnitRent</td><td align='center'>DayAmount</td>";
        echo "<td align='center'>Picture</td><td align='center'>BookDate</td><tr>";
        while($rs = mysqli_fetch_array($result)){
            echo '<td>'.$rs[0].'</a></td>';
            echo '<td align="left">'.$rs[1].'</td>';
            echo '<td align="left">'.$rs[2].'</td>';
            echo '<td align="left">'.$rs[3].'</td>';
            echo '<td align="left">'.$rs[4].'</td>';
            echo '<td align="center">'.$rs[5].'</td>';
            echo '<td align="center">'.$rs[6].'</td>';
            echo '<td align="center">'.$rs[7].'</td>';
            echo '<td align="left">'.$rs[8].'</td>';
            echo '<td align="center">'.$rs[9].'</td><tr>';
        }
        echo "</table>";
        mysqli_close($conn);
    ?>
     <a href="/"></a>
    <center><br><a href="bookList1.php">Home</a>
</body>
</html>