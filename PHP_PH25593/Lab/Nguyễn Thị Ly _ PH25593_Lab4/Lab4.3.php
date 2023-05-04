<?php 
    if(isset($_POST['dangky'])){
    $tensp = $_POST['sanpham'];
    $gia = $_POST['price'];
    $mota = $_POST['discribe'];
    $giagiam = $_POST['sale'];
    $hinhanh = $_POST['img'];
    $danhmuc = $_POST['category'];

    if($tensp == ""){
        $tensp_err = "Bạn chưa nhập tên sản phẩm!";
    }

    if($gia == ""){
        $gia_err = "Bạn chưa nhập giá sản phẩm!";
    }

    if($mota == ""){
        $mota_err = "Bạn chưa mô tả sản phẩm!";
    }

    if ($giagiam == "") {
        $giagiam_err = "Bạn chưa nhập giá giảm!";
    }

    if ($danhmuc == "") {
        $danhmuc_err = "Bạn chưa chọn danh mục!";
    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab4.3</title>
</head>

<body>
<form action="Lab4.3.php" method="post">
        <h1>Thêm mới sản phẩm</h1>
        Tên sản phẩm: <input type="text" name="sanpham" value="<?= $tensp ?? ''?>"><br>
        <?php if(isset($tensp_err)) : ?>
            <span style= "color: red;"><?= $tensp_err?></span> 
        <?php endif ?>
        <br>
        Giá: <input type="text" name="price" id="" value="<?= $gia ?? ''?>"><br>
        <?php if(isset($gia_err)) : ?>
            <span style = "color: red;"><?= $gia_err ?></span>
        <?php endif ?>
        <br>
        Mô tả:<br>
        <textarea name="discribe" id="" cols="30" rows="10" value=<?= $mota ?? ''?>></textarea><br>
        <?php if(isset($mota_err)) : ?>
            <span style = "color: red;"><?= $mota_err ?></span>
        <?php endif ?>
        <br>
        Giá giảm: <input type="text" name="sale" id="" value="<?= $giagiam ?? ''?>"><br>
        <?php if(isset($giagiam_err)) : ?>
            <span style = "color: red;"><?= $giagiam_err ?></span>
        <?php endif ?>
        <br>
        Hình ảnh: <input type="text" name="img"><br>
        <br>
        Danh mục sản phẩm <select name="category" id="" value="<?= $danhmuc ?? ''?>">
            <option value=""></option>
            <option value="">Máy tính</option>
            <option value="">Điện thoại</option>
            <option value="">Phụ kiện</option>
        </select><br>
        <?php if(isset($danhmuc_err)) : ?>
            <span style = "color: red;"><?= $danhmuc_err ?></span>
        <?php endif ?>
        <br>
        <button type="submit" name="dangky">Gửi</button>
    </form>
</body>
</html>