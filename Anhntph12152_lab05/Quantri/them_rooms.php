<?php
require_once "../connection.php";
// kiểm tra user nhấn nut lưu 
if (isset($_POST['btnLuu'])) {
    $name = $_POST['name'];
    $hotel_id = $_POST['hotel_id'];
    $price = $_POST['price'];
    $detail = $_POST['detail'];
    $status = $_POST['status'];
    //xử lý file upload vào web;
    if ($_FILES['image']['size'] > 0) {
        $image = $_FILES['image']['name'];
    } else {
        $image = "";
    }
    // viet code sql
    $sql = "INSERT INTO rooms(name,hotel_id,price,image,detail,status) 
               VALUES ('$name','$hotel_id','$price','$image','$detail','$status')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        //nếu $cate_image không rỗng thì upload ảnh vào thư mục images trong htdocs
        if (!empty($image)) {
            move_uploaded_file($_FILES['image']['tmp_name'], "../images/" . $image);
        }
        header("location: rooms.php?message=thêm date thành công");
        die;
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
    <h2>Thêm hotel</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <!-- thuoc tinh bat buoc khi muon them anh -->
        <label for="">Name: </label>
        <br>
        <input type="text" name="name" id="">
        <br>
        <label for="">Hotel_id: </label>
        <br>
        <select name="hotel_id" id="">
            <option value="">Hotel_id</option>
            <option value="123">1</option>
            <option value="124">2</option>
            <option value="125">3</option>
        </select>
        <br>
        <label for="">Price: </label>
        <br>
        <input type="text" name="price" id="">
        <br>
        <label for="">image: </label>
        <br>
        <input type="file" name="image" id="">
        <br>
        <label for="">Detail: </label>
        <br>
        <textarea name="detail" id="" cols="30" rows="5"></textarea>
        <br>
        <label for="">Status: </label>
        <br>
        <input type="number" name="status" id="" min="0" max="2">
        <br>
        <button type="submit" name="btnLuu">lưu</button>
    </form>
</body>

</html>