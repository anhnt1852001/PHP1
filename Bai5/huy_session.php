<?php
session_start();
//Hủy bỏ toàn bộ session đang tồn tại trong phiên làm việc
// session_destroy();
unset($_SESSION['email']);
header("location: user_session.php");
die;
