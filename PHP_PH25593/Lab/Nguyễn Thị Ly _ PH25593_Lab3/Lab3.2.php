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
        <label for="">Số nguyên bất kỳ</label>
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
    $tong = 0;

    for($i = 0; $i <= $soNguyen; $i++){
        if($i % 2 == 0){
            $tong = $tong + $i;
        }
    }
    
    echo "Số mới nhập: $soNguyen<br>";
    echo "S theo quy luật: $tong <br>";
} else {
    echo "Bạn chưa nhập form check";
}
?>