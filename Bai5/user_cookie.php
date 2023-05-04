<?php
//Sử dụng cookie
if (isset($_COOKIE['user'])) {
    echo "<h3>User: " . $_COOKIE['user'] . "</h3>";
    echo '<a href= huy_cookie.php>Hủy cookie</a>';
} else {
    echo "Cookie user không tồn tại <a href='cookie.php'>Tạo cookie</a>";
}
