<?php
// while – Lặp một hành động dựa theo 
// một điều kiện cụ thể mà nó trả về là 
// true. Ví dụ  như trong WordPress, hàm have_posts() 
// sẽ có chức năng kiểm tra trong truy vấn còn đối tượng không, 
// nếu nó return về là true thì lặp, false thì ngừng

$dem = 0;
while ($dem < 5) {
    $dem++;
    echo "Vòng lặp while thứ $dem <br>";
}

// vòng lặp do.... while
// do while – Vòng lặp này tương tự giống như while, 
// nhưng bạn có thể đặt một tập hợp các code vào hàm do() rồi nó sẽ lặp lại các code này dựa theo một điều kiện nhất định
do {
    echo " Vòng lặp do.... while thứ $dem <br>";
    $dem--;
} while ($dem > 0);


// vòng lặp for 
for ($i = 0; $i < 5; $i++) {
    echo "Vòng lặp thứ $i<br>";
}


for ($i = 1; $i < 10; $i++) {
    echo "Bảng cửu chương $i <br>";
    for ($j = 0; $j <= 10; $j++) {
        echo "$i x $j = " . ($i * $j) . "<br>";
    }
}
