<?php
//Kích hoạt seession
session_start();
//Khởi tạo session
$_SESSION['username'] = 'admin';
$_SESSION['email'] = 'admin@fpt.edu.vn';
?>
<a href="user_session.php">User Session</a>