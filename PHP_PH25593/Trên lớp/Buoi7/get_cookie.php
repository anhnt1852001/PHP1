<?php
if(isset ($_COOKIE['username'])){
    echo "<h2>Username: ". $_COOKIE['username'] . "</h2>";
    echo "<a href='huy_cookie.php'>Hủy cookie</a> ";
}else{
    echo "Cookie chua duoc tao";
}