<?php
require_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM book WHERE book_id=$book_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $msg = "Xóa dữ liệu thành công";
    header("location: show_b.php?msg=$msg");
    exit;
}
