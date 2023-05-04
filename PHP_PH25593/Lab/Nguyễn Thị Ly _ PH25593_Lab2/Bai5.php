<?php

function isPrimeNumber($n) {
    // so nguyen n < 2 khong phai la so nguyen to
    if ($n < 2) {
        return false;
    }
    // check so nguyen to khi n >= 2
    $squareRoot = sqrt ( $n );
    for($i = 2; $i <= $squareRoot; $i ++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}
 
echo ("Các số nguyên tố từ 1 đến 1000 là: <br>");
for($i = 0; $i < 1001; $i ++) {
    if (isPrimeNumber ( $i )) {
        echo ($i . "<br>");
    }
}
?>