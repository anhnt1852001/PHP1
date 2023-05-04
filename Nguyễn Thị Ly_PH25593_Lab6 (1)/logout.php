<?php
session_start();
session_destroy();

//quay tro laij login
header("location: login.php");
exit;