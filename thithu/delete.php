<?php

require_once "connection.php";

$id_bh = $_GET['id_bh'];
$sql = "DELETE FROM baihat WHERE id_bh=$id_bh";

$stmt = $conn->prepare($sql);
$stmt->execute();

header("location: show.php");
setcookie("success", "xóa ok", time() + 1);
exit;
