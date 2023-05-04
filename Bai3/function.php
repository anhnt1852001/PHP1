<?php
// Hàm tính giai thừa
function giai_thua($n)
{
    $gt = 1;
    for ($i = 2; $i <= $n; $i++) {
        $gt *= $i;
    }
    return $gt;
}

// Hàm kiểm tra số nguyên tố 
function kiem_tr_so_nguyen_to($n)
{
    //Đặt một biến kiểm tra là true, có nghĩa là giả sử rằng số đó là nguyên tố
    $kt = true;
    //Chứng minh xem số đó có thực là số nguyên tố không
    if ($n < 2) {
        $kt = false;
    } else {
        for ($i = 2; $i < $n; $i++) {
            if ($n % $i == 0) {
                $kt = false;
                break;
            }
        }
    }
    return $kt;
}
