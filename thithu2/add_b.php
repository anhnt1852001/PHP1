<?php
require_once "connection.php";

$sql = "SELECT * FROM pub";
$stmt = $conn->prepare($sql);
$stmt->execute();
$pub = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (isset($_POST['luu'])) {
    $book_title = $_POST['book_title'];
    $pub_id = $_POST['pub_id'];
    $quantity = $_POST['quantity'];
    $intro = $_POST['intro'];
    $detail = $_POST['detail'];
    $price = $_POST['price'];
 
    $file = $_FILES['image'];
    $image = $file['name'];

    //vadidate
    if($book_title == ""){
        $book_title_err = "Bạn phải nhập tên sách";
    }
    if($quantity == ""){
        $quantity_err = "Bạn phải nhập số lượng";
    }elseif($quantity < 0){
        $quantity_err = "Số lượng phải >0";
    }
    if($intro == ""){
        $intro_err = "Bạn phải nhập giới thiệu";
    }
    if($detail = ""){
        $detail_err = "Bạn phải nhập nội dung";
    }
    if($price = ""){
        $price_err = "Bạn phải nhập giá";
    }elseif($price < 0 ){
        $price_err = "Giá phải luôn dương";
    }
    if($file['size'] <= 0){
        $file_err = "Bạn chưa nhập file ảnh";
    }
    if($file['size'] >= 2578965 ){
        $file_err = "File anh không quá 2MB";
    }
    
    if($file['size'] > 0){
        $ext = pathinfo($iamge, PATHINFO_EXTENSION);
        if($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png'){
            $file_err = "Đây không là file ảnh";
        }
    }

    if (!isset($book_title_err) && !isset($quantity_err) && !isset($intro_err) && !isset($detail_err) && !isset($price_err)) {
        $sql = "INSERT INTO book (book_title, image, quantity, intro, detail, price, pub_id) VALUE('$book_title', '$image','$quantity','$intro','$detail','$price','$pub_id')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if (!isset($file_err)) {
            move_uploaded_file($file['tmp_name'], 'upload/' . $image);
            $ok = true;
        }

        $msg = "Thêm dữ liệu thành công";
        header("location: show_bh.php?msg=$msg");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Thêm sách</h1>
        <label for="">Book_title</label>
        <input type="text" name="book_title" value="<?=$book_title ?? ''?>">
        <?php if (isset($book_title_err)) : ?>
            <span style="color: red"><?= $book_title_err?> </span>
        <?php endif ?>
        <br>
        <label for="">Pub</label>
        <select name="pub_id" id="">
            <?php foreach ($pub as $c) : ?>
                <option value="<?= $c['pub_id'] ?>"><?= $c['pud_name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="">Image</label>
        <input type="file" name="image" value="<?=$file ?? ''?>">
        <?php if(isset($file_err)):?>
            <span style="color: red;"><?=$file_err?></span>
            <?php endif?>
        <br>
        <label for="">Quantity</label>
        <input type="text" name="quantity" value="<?=$quantity ?? ''?>">
        <?php if(isset($quantity_err)):?>
            <span style="color: red;"><?=$quantity_err?></span>
            <?php endif?>
        <br>
        <label for="">Intro</label>
        <input type="text" name="intro" value="<?=$intro ?? ''?>">
        <?php if(isset($intro_err)):?>
            <span style="color: red;"><?=$intro_err?></span>
            <?php endif?>
        <br>
        <label for="">Detail</label>
        <input type="text" name="detail" value="<?=$detail ?? ''?>">
        <?php if(isset($detail)):?>
            <span style="color: red;"><?=$detail?></span>
            <?php endif?>
        <br>
        <label for="">Price</label>
        <input type="text" name="price" value="<?=$price ?? ''?>">
        <?php if(isset($price_err)):?>
            <span style="color: red;"><?=$price_err?></span>
            <?php endif?>
        <br>
        <button type="submit" name="luu">Lưu</button>
        <a href="show_b.php">Danh sách</a>
    </form>
</body>

</html>