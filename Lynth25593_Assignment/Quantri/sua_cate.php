<?php
require_once "../connection.php";

if (isset($_POST['btnLuu'])) {
    //lấy dữ liệu từ form
    extract($_REQUEST);
    //Viết câu lệnh sql
    $sql = "UPDATE categories SET cate_name='$cate_name' WHERE cate_id=$cate_id";
    //chuẩn bị
    $stmt = $conn->prepare($sql);
    //Thực thi
    if ($stmt->execute()) {
        $message = "Cập nhật dữ liệu thành công";
    } else {
        $message = "Cập nhật thất bại";
    }
}

//lấy id từ thanh url
$cate_id = $_GET['id'];
//viest câu lệnh SELECT có điều kiện
$sql = " SELECT * FROM categories WHERE cate_id=$cate_id";
//Chuẩn bị
$stmt = $conn->prepare($sql);
//Thực thi 
$stmt->execute();
//lấy dữ liệu 
$result = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Sửa danh mục</title>

</head>

<body>
    <div class="container">
        <h2>Sửa danh mục sản phẩm</h2>
        <a href="show_cate.php">Danh Mục</a>
        <?php
        if (isset($message)) : ?>
            <h4><?= $message ?></h4>
        <?php endif; ?>
        <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
            <input type="hidden" name="cate_id" value="<?= $result['cate_id'] ?>">
            <label for="">Tên danh mục: </label>
            <br>
            <input type="text" name="cate_name" id="" value="<?= $result['cate_name'] ?>">
            <br>
            </div>
            </div>
            <button class="btn btn-primary" name="btnLuu" type="submit">Lưu</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>