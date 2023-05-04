<?php
$products = [ ['masp'=>1, 'tensp'=>"Iphone 13", 'gia'=>819, 'anh'=>'img/iphone13.png'],
['masp'=>2, 'tensp'=>"Iphone 13 Pro", 'gia'=>999, 'anh'=>'img/iphone13pro.jpg'], 
['masp'=>3, 'tensp'=>"Samsung Galaxy S22", 'gia'=>799, 'anh'=>'img/s22.jpg'], 
['masp'=>4, 'tensp'=>"Samsung Galaxy S22 ultra", 'gia'=>999, 'anh'=>'img/s22ultra.jpg'], 
['masp'=>5, 'tensp'=>"Oppo Reno 7", 'gia'=>289, 'anh'=>'img/reno7.jpg'], 
['masp'=>6, 'tensp'=>"Xiaomi S12 Pro", 'gia'=>569, 'anh'=>'img/s12pro.jpg'], 
];
$timkiem=$_GET['timkiem'];
$name=$_GET['name'];
$a=[];$i=0;
        $kt=0;
        foreach($products as $product){
            if($product['tensp']==$name){
                $a[$i]['masp']=$product['masp'];
                $a[$i]['tensp']=$product['tensp'];
                $a[$i]['gia']=$product['gia'];
                $a[$i]['anh']=$product['anh'];
                $i+=1;
            }
        }
    
?>       
<?php foreach($a as $product) : ?>
        <div>
            <img src="<?= $product['anh']?>">
            <h1><?= $product['tensp']?></h1>    
            <h3><?= $product['gia']?></h3>        
        </div>
<?php endforeach ?>