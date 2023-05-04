<?php
if (isset($_POST['btnLuu'])) {
    //nếu người dùng không nhập 1 trong số các trường 
    if ($_POST['pro_name'] == "" || $_POST['cate_id'] == "" || $_POST['price'] == "" ||  $_POST['intro'] == "" ||  $_POST['detail'] == "" || $_POST['quantity'] == "" || $_FILES['pro_image']['size'] == 0) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            //gắn cờ
            $error = array();
            //phất cờ và kiểm tra
            if (empty($_POST['pro_name'])) {
                $error['pro_name'] = "Bạn chưa nhập tên sản phẩm !!!";
            }
            if (empty($_POST['cate_id'])) {
                $error['cate_id'] = "Bạn chưa nhập cate id !!!";
            }
            if (empty($_POST['price'])) {
                $error['price'] = "Bạn chưa nhập giá !!!";
            }
            if (empty($_POST['intro'])) {
                $error['intro'] = "Bạn chưa nhập intro !!!";
            }
            if (empty($_POST['detail'])) {
                $error['detail'] = "Bạn chưa nhập detail!!!";
            }
            if ($_FILES['pro_image']['size'] == 0) {
                $error['pro_image'] = "Bạn chưa chọn ảnh !!!";
            }
            if (empty($_POST['quantity'])) {
                $error['quantity'] = "Bạn chưa nhập quantity !!!";
            }
        }
    } else {
        //trường hợp ngược lại
        require_once "../connection.php";
        extract($_REQUEST);
        if ($_FILES['pro_image']['size'] > 0) {
            $pro_image = $_FILES['pro_image']['name'];
        } else {
            $pro_image_error = "Không có ảnh";
        }
        $sql = "INSERT INTO products(pro_name,cate_id,price,intro,pro_image,detail,quantity) 
               VALUES ('$pro_name','$cate_id','$price','$intro','$pro_image','$detail','$quantity')";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute()) {
            if (!empty($pro_image)) {
                move_uploaded_file($_FILES['pro_image']['tmp_name'], "../images/" . $pro_image);
            }
            header("location: product.php?message=Thêm dữ liệu thành công");
            die;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Thêm Sản Phẩm</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- thuoc tinh bat buoc khi muon them anh -->
        <label for="">Tên Sản Phẩm: </label>
        <br>
        <input type="text" name="pro_name" id="">
        <?php
        if (isset($error['pro_name'])) { ?>
            <span style="color: red;"><?php echo $error['pro_name']; ?></span>
        <?php } ?>
        <br>
        <label for="">Cate_id: </label>
        <br>
        <select name="cate_id" id="">
            <option value="">Cate_id:</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <?php
        if (isset($error['cate_id'])) { ?>
            <span style="color: red;"><?php echo $error['cate_id']; ?></span>
        <?php } ?>
        <br>
        <label for="">Price: </label>
        <br>
        <input type="number" name="price" id="" value="0">
        <?php
        if (isset($error['price'])) { ?>
            <span style="color: red;"><?php echo $error['price']; ?></span>
        <?php } ?>
        <br>
        <label for="">Quantity </label>
        <br>
        <input type="number" name="quantity" id="" value="0">
        <?php
        if (isset($error['quantity'])) { ?>
            <span style="color: red;"><?php echo $error['quantity']; ?></span>
        <?php } ?>
        <br>
        <label for="">image: </label>
        <br>
        <input type="file" name="pro_image" id="">
        <?php
        if (isset($error['pro_image'])) { ?>
            <span style="color: red;"><?php echo $error['pro_image']; ?></span>
        <?php } ?>
        <br>
        <label for="">Intro:</label>
        <br>
        <textarea type="text" name="intro" id="" cols="30" rows="5"></textarea>
        <?php
        if (isset($error['intro'])) { ?>
            <span style="color: red;"><?php echo $error['intro']; ?></span>
        <?php } ?>
        <br>
        <label for="">Detail: </label>
        <br>
        <textarea name="detail" id="" cols="30" rows="5"></textarea>
        <?php
        if (isset($error['detail'])) { ?>
            <span style="color: red;"><?php echo $error['detail']; ?></span>
        <?php } ?>
        <br>
        <button type="submit" name="btnLuu">lưu</button>
    </form>
</body>

</html>