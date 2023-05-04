<?php
session_start();

if(isset ($_SESSION['username'])){
    echo "<h2>Username: ". $_SESSION['username'] . "</h2>";
    echo "<a href='huy_session.php'>Hủy Session</a> ";
}else{
    echo "Session username chưa được tạo";
}