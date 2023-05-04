<?php
require_once "connect.php";
//câu lệnh SQL lấy dữ liệu
$sql = "SELECT * FROM qlsach";

//chuẩn bị
$stmt = $conn->prepare($sql);

//thực thi
$stmt->execute();

//lấy dữ liệu 
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!--Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Bài 2</title>
        <!--Bootstrap CSS-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <h1 style="text-align: center;">Danh sách loại</h1>
        <table class="table" style="text-align:center;">
            <tr>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th>Hành động</th>
            </tr>

            <?php foreach($users as $loaisach):?>
                <tr>
                    <td><?=$loaisach['ma_loai']?></td>
                    <td><?=$loaisach['ten_loai']?></td>
                    <td>edit/delete</td>
                </tr>
            <?php endforeach?>
        </table>
        
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>