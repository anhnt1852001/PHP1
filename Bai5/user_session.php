<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "<h4>Username: " . $_SESSION['username'] . "<h4>";
    echo "<p>Email: " . $_SESSION['email'] . "<p>";
    echo "<a href= 'huy_session.php'>Hủy session</a>";
} else {
    echo "Session Username chưa tồn tại <a href = 'session.php'>Tạo session </a>";
}
