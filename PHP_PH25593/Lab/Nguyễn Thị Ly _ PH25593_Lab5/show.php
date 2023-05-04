<?php
require_once "connect.php";

//Câu lệnh SQL để lấy dữ liệu
$sql = "SELECT * FROM sach";

//Chuẩn bị
$stmt = $conn->prepare($sql);

//Thực thi 
$stmt->execute();

//lấy tất cả dữ liệu
$sach = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<pre>";
print_r($sach);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h1 style="text-align:center;">Danh mục sách</h1>
    <table class="table" style="text-align:center;">
        <tr>
            <th>Mã sách</th>
            <th>Tên sách</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số trang</th>
            <th>Mô tả</th>
            <th>Tác giả</th>
            <th>Năm xuất bản</th>
            <th>Ngày nhập</th>
            <th>Hành động</th>
        </tr>

        <?php foreach ($sach as $sach ) :?>
        <tr>
            <td><?= $sach['ma_sach']?></td>
            <td><?= $sach['ten_sach']?></td>
            <td><?= $sach['anh']?></td>
            <td><?= $sach['gia']?></td>
            <td><?= $sach['so_trang']?></td>
            <td><?= $sach['mota']?></td>
            <td><?= $sach['tac_gia']?></td>
            <td><?= $sach['nam_xuat_ban']?></td>
            <td><?= $sach['ngay_nhap']?></td>
            <td>
                edit/delete    
            </td>
        </tr>
        <?php endforeach ?>
    </table>
</body>

</html>