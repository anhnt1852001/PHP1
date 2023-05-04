<?php 
require_once "../connection.php";
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
$cate = $stmt->fetchAll(PDO::FETCH_ASSOC);
$errors = ['cate_name' => ''];
if (isset($_POST['btnLuu'])) {
    extract($_REQUEST);
    if(isset($_POST['btnLuu'])) {
        extract($_REQUEST);
        if($cate_name == '') {
            $errors['cate_name'] = "Bạn chưa nhập tên danh mục !!!";
        }
        if(!array_filter($errors)) {
            $sql = "INSERT INTO categories(cate_name) VALUES ('$cate_name')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            header("location: show_cate.php?message=Thêm dữ liệu thành công");
            die;
        }
    }
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

    <title>Thêm danh mục</title>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Thêm danh mục sản phẩm</h2>
        <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Tên Danh Mục</label>
                <input type="text" name="cate_name" class="form-control is-valid" id="validationServer01" value="">
                <span><?= isset($errors['cate_name']) ? $errors['cate_name'] : '' ?></span>
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