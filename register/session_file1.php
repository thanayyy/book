<?php
session_start();
session_destroy();
?>
<form action="session_file2.php">
กรุณาป้อนชื่อผู้ใช้ (username) แล้วคลิกปุ่ ม OK<br><br>
<input type="text" name="username"><br><br>
<input type="text" name="password">
<input type="submit" value=" OK ">
</form>