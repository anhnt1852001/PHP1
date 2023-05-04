
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="timsanpham.php" method="GET">
        <label for="">
            Nhập Tên Sản Phẩm Cần Tìm
            <input type="text" name="name" >
            <button name="timkiem">Tìm Kiếm Sản Phẩm</button>
        </label>
    </form>
    <?php
        $products = [ ['masp'=>1, 'tensp'=>"Iphone 13", 'gia'=>819, 'anh'=>'img/iphone13.png'],
                ['masp'=>2, 'tensp'=>"Iphone 13 Pro", 'gia'=>999, 'anh'=>'img/iphone13pro.jpg'], 
                ['masp'=>3, 'tensp'=>"Samsung Galaxy S22", 'gia'=>799, 'anh'=>'img/s22.jpg'], 
                ['masp'=>4, 'tensp'=>"Samsung Galaxy S22 ultra", 'gia'=>999, 'anh'=>'img/s22ultra.jpg'], 
                ['masp'=>5, 'tensp'=>"Oppo Reno 7", 'gia'=>289, 'anh'=>'img/reno7.jpg'], 
                ['masp'=>6, 'tensp'=>"Xiaomi S12 Pro", 'gia'=>569, 'anh'=>'img/s12pro.jpg'], 
        ] 
    ?> 
    <?php foreach($products as $product) : ?>
        <div class="box">
            <img src="<?= $product['anh']?>">
            <h1><?= $product['tensp']?></h1>    
            <h3><?= $product['gia']?></h3>        
        </div>
    <?php endforeach ?>
</body>
</html>

