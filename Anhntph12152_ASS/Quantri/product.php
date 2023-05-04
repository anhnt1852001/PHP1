<?php
require_once "../connection.php";
//Viết câu lệnh SQL Select
$sql = "Select * From products";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi
$stmt->execute();
//Lấy dữ liệu
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//
session_start();
//Kiểm tra xem người dùng đăng nhập chưa
//nếu chưa đăng nhập thì sẽ vào trang login
if (!isset($_SESSION['user'])) {
    header("location: ../login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Sản Phẩm</title>
    <style>
        .dm {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="dm">
        <a href="../index.php"><button type="button" class="btn btn-outline-info">Trang chủ</button></a>
        <a href="../login.php"><button type="button" class="btn btn-outline-primary">Đăng nhập</button></a></a>
        <a href="../logout.php"><button type="button" class="btn btn-outline-primary">Đăng xuất</button></a></a>
        <h2>Sản Phẩm</h2>
    </div>
    <table class="table text-center" border="1">
        <thead class="p-3 mb-2 bg-info text-drank">
            <tr>
                <th scope="col">Mã Sản Phẩm</th>
                <th scope="col">Tên Sản Phẩm</th>
                <th scope="col">Mã Danh Mục</th>
                <th scope="col">Giá</th>
                <th scope="col">Intro</th>
                <th scope="col">Ảnh</th>
                <th scope="col">Detail</th>
                <th scope="col">Quantity</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($result as $c) : ?>
                <tr>
                    <td scope="row"><?= $c['pro_id'] ?></td>
                    <td><?= $c['pro_name'] ?></td>
                    <td>
                        <?= $c['cate_id'] ?>
                    </td>
                    <td>
                        <?= $c['price'] ?>
                    </td>
                    <td>
                        <?= $c['intro'] ?>
                    </td>
                    <td><img src="../images/<?= $c['pro_image'] ?>" width="120" alt=""></td>
                    <td>
                        <?= $c['detail'] ?>
                    </td>
                    <td>
                        <?= $c['quantity'] ?>
                    </td>
                    <td>
                        <a href="them_sanpham.php"><button type="button" class="btn btn-outline-info">Thêm SP</button></a>
                        <a href="capnhat_sanpham.php?id=<?= $c['pro_id'] ?>"><button type="button" class="btn btn-outline-info">Sửa</button></a>
                        <a onclick="return confirm('Bạn có chắc chắn xóa không')" href="xoa_sanpham.php?id=<?= $c['pro_id'] ?>"><button type="button" class="btn btn-outline-info">xóa</button></a>
                        <a href="../quantri.php"><button type="button" class="btn btn-outline-info">Trở về</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>