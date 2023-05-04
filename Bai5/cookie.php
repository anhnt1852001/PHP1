<?php
//Tạo cookie
//Setcookie('tên cookie', 'Giá trị của cookie', thời gian sống, đường dẫn của cookie);
setcookie('user', 'Nguyễn Thế Anh', time() + 60 * 60 * 24, '/');
?>
<a href="user_cookie.php">User cookie</a>