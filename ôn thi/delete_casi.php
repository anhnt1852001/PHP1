<?php
require_once "connection.php";
if (isset($_GET['id_bh'])) {
    $id=$_GET['id_bh'];
    $sql="DELETE FROM baihat WHERE id_bh=$id";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $msg = "Xóa thành công";
    header("location: show_casi.php?/msg=$msg");
    exit;
}
header("location: show_casi.php");
exit;