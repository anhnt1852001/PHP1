<?php
session_start();
require_once "connection.php";
//Kiểm tra xem người dùng đăng nhập chưa
//nếu chưa đăng nhập thì sẽ vào trang login
if (!isset($_SESSION['user'])) {
    header("location: login.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">

    <title>Quản Trị</title>
    <style>
        body {
            background: url()
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1>Trang quản trị website</h1>
        <table class="table table-striped" border="1" cellpadding="0" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Tổng Số Lượng Danh Mục</th>
                    <th scope="col">Tổng Số Lượng Sản Phẩm</th>
                    <th scope="col">Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <?php
                        $sql = "SELECT count(cate_id) FROM categories ";
                        $stm = $conn->prepare($sql);
                        $stm->execute();
                        $result = $stm->fetch(PDO::FETCH_ASSOC);
                        foreach ($result as $c) {
                            echo "$c";
                        }
                        ?>
                    </td>
                    <td>
                        <?php
                        $sql = "SELECT sum(quantity) FROM products ";
                        $stm = $conn->prepare($sql);
                        $stm->execute();
                        $result = $stm->fetch(PDO::FETCH_ASSOC);
                        foreach ($result as $c) {
                            echo "$c";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="trangchu.php"><button type="button" class="btn btn-outline-info">Trang chủ</button></a>
                        <a href="Quantri/show_cate.php"><button type="button" class="btn btn-outline-info">Danh Mục</button></a>
                        <a href="Quantri/show_product.php"><button type="button" class="btn btn-outline-info">Sản Phẩm</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
        <a href="logout.php"><button type="button" class="btn btn-outline-primary">Đăng xuất</button></a></a>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js" integrity="sha384-XEerZL0cuoUbHE4nZReLT7nx9gQrQreJekYhJD9WNWhH8nEW+0c5qq7aIo2Wl30J" crossorigin="anonymous"></script>
</body>

</html>