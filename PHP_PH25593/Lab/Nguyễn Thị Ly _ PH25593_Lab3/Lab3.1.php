<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="">Số bất kỳ</label>
        <input class="form-control" type="number" name="soNguyen">
        <br>
        
        <button type="submit" name="check">Check</button>
    </form>
</body>
</html>
<br>
<?php
if(isset($_POST['check'])){

    $soNguyen = $_POST['soNguyen'];
    $b = 0;
    if($soNguyen < 2){ // nếu số nhập vào nhỏ hơn 2 -> dừng chương trình vì số nguyên tố là số dương > 2
        return;
    }

    for($i = 2; $i < $soNguyen; $i++){
        if($soNguyen % $i == 0){
           $b++; 
        }
    }
    
    if($b == 0){
        echo "Đây là số nguyên tố";
    } else {
    echo "Đây không phải số nguyên tố";
    }
} else {
    echo "Bạn chưa nhập form check";
}
?>