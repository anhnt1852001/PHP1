<?php
if (isset($_POST['btnLuu'])) {
    //nếu người dùng không nhập 1 trong số các trường 
    if ($_POST['cate_name'] == "" || $_POST['description'] == "" || $_FILES['cate_image']['size'] == 0) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //gắn cờ
            $error = array();
            //phất cờ và kiểm tra
            if (empty($_POST['cate_name'])) {
                $error['cate_name'] = "Bạn chưa nhập cate name !!!";
            }
            if ($_FILES['cate_image']['size'] == 0) {
                $error['cate_image'] = "Bạn chưa chọn ảnh !!!";
            }
            if (empty($_POST['description'])) {
                $error['description'] = "Bạn chưa nhập description !!!";
            }
        }
    } else {
        //trường hợp ngược lại
        require_once "../connection.php";
        extract($_REQUEST);
        if ($_FILES['cate_image']['size'] > 0) {
            $cate_image = $_FILES['cate_image']['name'];
        } else {
            $cate_image = "";
            echo $cate_image_error = "Không có ảnh";
        }
        $sql = "INSERT INTO categories(cate_name,cate_image,description) 
            VALUES ('$cate_name','$cate_image','$description')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            if (!empty($cate_image)) {
                move_uploaded_file($_FILES['cate_image']['tmp_name'], "../images/" . $cate_image);
            }
            header("location: Danhmuc.php?message=Thêm dữ liệu thành công");
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

</head>

<body>
    <div class="container">
        <h2>Thêm danh mục sản phẩm</h2>
        <form class="was-validated" action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3">
                <label for="validationServer01">Tên Danh Mục</label>
                <input type="text" name="cate_name" class="form-control is-valid" id="validationServer01" value="">
                <?php
                if (isset($error['cate_name'])) { ?>
                    <span style="color: red;"><?php echo $error['cate_name']; ?></span>
                <?php } ?>
            </div>
            <div class=" col-md-6 mb-3 form-group">
                <label for="exampleFormControlFile1">Hình Ảnh</label>
                <input type="file" name="cate_image" class="form-control-file" id="exampleFormControlFile1">
                <?php
                if (isset($error['cate_image'])) { ?>
                    <span style="color: red;"><?php echo $error['cate_image']; ?></span>
                <?php } ?>
            </div>
            <div class="col-md-6 mb-3">
                <label for="validationTextarea">Mô tả</label>
                <textarea class="form-control is-invalid" name="description" id="validationTextarea" placeholder="Viết gì đó vào đây"></textarea>
                <?php
                if (isset($error['description'])) { ?>
                    <span style="color: red;"><?php echo $error['description']; ?></span>
                <?php } ?>
            </div>
            <button class="btn btn-primary " name="btnLuu" type="submit">Lưu</button>

        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>