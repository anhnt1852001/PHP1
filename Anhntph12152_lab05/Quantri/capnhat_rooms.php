<?php
require_once "../connection.php";
if (isset($_POST['btnLuu'])) {
    // lây data tu form
    extract($_REQUEST);
    // kiem tra nguoi dung co cap nhat anh 
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
    }
    $sql = "UPDATE rooms SET name='$name',hotel_id = '$hotel_id',price = '$price',image='$image',detail='$detail',status='$status'
             WHERE id = $id";
    // chuan bi 
    $stmt = $conn->prepare($sql);
    //thu thi
    if ($stmt->execute()) {
        $message = "Cập nhật thành công";
        // neu co anh
        if ($_FILES['image']['size'] > 0) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);
        } else {
            $message = "Cập nhật thất bại";
        }
    }
}
// lay id tu thanh url
$id = $_GET['id'];
// viet code SQL
$sql = "SELECT * FROM rooms WHERE id=$id";
// chuan bi 
$stmt = $conn->prepare($sql);
//thuc thi
$stmt->execute();
// lay data 
$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cập nhật</title>
</head>

<body>
    <h2>Cập nhật hotel</h2>
    <a href="rooms.php">Rooms</a>
    <?php if (isset($message)) : ?>
        <h4><?= $message ?></h4>
    <?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- thuoc tinh bat buoc khi muon them anh -->
        <input type="hidden" name="id" value="<?= $result['id'] ?>">
        <br>
        <label for="">Name: </label>
        <br>
        <input type="text" name="name" value="<?= $result['name'] ?>">
        <br>
        <label for="">Hotel_id: </label>
        <br>
        <select name="hotel_id" id="">
            <option value=""><?= $result['hotel_id'] ?></option>
            <option value="123">1</option>
            <option value="124">2</option>
            <option value="125">3</option>
        </select>
        <br>
        <label for="">Price: </label>
        <br>
        <input type="text" name="price" value="<?= $result['price'] ?>">
        <!-- ('$price','$image','$detail','$status')"; -->
        <br>
        <label for="">Hình ảnh: </label>
        <br>
        <input type="file" name="image" id="">
        <?php if (!empty($result['image'])) :  ?>
            <input type="hidden" name="image" value="<?= $result['image'] ?>">
            <br>
            <img src="../images/<?= $result['image'] ?>" width="120" alt="">
        <?php endif; ?>
        <br>
        <label for="">Detail: </label>
        <br>
        <textarea name="detail" id="" cols="50" rows="5"><?= $result['detail'] ?></textarea>
        <br>
        <label for="">Status: </label>
        <input type="number" name="status" min="0" max="2" value="<?= $result['status'] ?>">
        <br>
        <button type="submit" name="btnLuu">Lưu</button>
    </form>
</body>

</html>