<?php
//Hủy cookie, cho về thời gian âm
setcookie('user', '', time() - 60 * 60 * 24, '/');


header("location: user_cookie.php");
