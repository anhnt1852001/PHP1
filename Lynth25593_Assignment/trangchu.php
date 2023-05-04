<?php
require_once "./connection.php";
//Lấy ra 8 sản phẩm để hiển thị trên trang chủ 
$sql = "SELECT * FROM products ORDER BY product_id DESC LIMIT 0,8";
$stmt = $conn->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="https://mysite.com/mypage">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/8ddf476500.js" crossorigin="anonymous"></script>

    <style>
        /* css navbar */
        .navbar {
            background-color: #9DD2ED;
        }

        .nav-item {
            font-size: 16px;
            color: white;
        }

        .nav-item>.nav-link {
            color: white !important;
            margin: 10px;
            font-weight: bold;
        }

        .nav-item>.nav-link:hover {
            color: #9EA7E1 !important;
        }

        .collapse>.form-inline>.form-control {
            margin-left: 100px;
            width: 350px;
            border: white;
        }

        .collapse>.form-inline>.fas:hover {
            color: #9EA7E1;
        }
        .btn{
          background-color: #9DD2ED !important;
          border-color: white;
          color: white;
   }
   .btn:hover{
    background-color: #9EA7E1 !important;
    border-color: white;
   }
        /* css footer */
        footer {
            background-color: #9DD2ED;
            color: white;
            width: 100%;
            height: 100px;
            margin-top: 65px;
        }
        b{
            line-height: 75px;
            margin-left: 20px;
        }
        .gach {
            margin-left: 400px;
            border-left: 1px solid white;
            font-size: 30pt;
        }
        i{
            margin-top: 25px;
            margin-right: 100px;
            float: right;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <!--tips: to change the nav placement use .fixed-top,.fixed-bottom,.sticky-top-->
        <!-- <a class="navbar-brand" href="#">brand</a> -->
        <a class="navbar-brand" href="./trangchu.html">
            <img src="img/logo_heyyou_website-04_cfe6eb8b64f7430db789de966b4003b3-removebg-preview.png"
                class="d-inline-block align-top" width="100" height="90" alt="...">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#idCollapse"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <h6 class="navbar-toggler-icon"></h6>
        </button>

        <div class="collapse navbar-collapse" id="idCollapse">
            <ul class="navbar-nav mr-auto">`
                <li class="nav-item">
                    <a class="nav-link" href="./trangchu.php">Trang chủ<h6 class="sr-only">(current)</h6></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="gioithieu.html">Giới thiệu</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="sanpham.html">Sản phẩm</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="lichsumuahang.html">Lịch sử mua hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="lienhe.html">liên hệ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="quantri.php">Quản trị</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Đăng Nhập</a>
                </li>

            </ul>

            <!-- <h6 class="navbar-text">
                    Some text
                </h6> -->
                
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
                </form>
        </div>
    </nav>
    <div class="container-fluid">
        <div style="clear: both;"></div>
        <h2>Sản phẩm nổi bật</h2>
        <div class="box1">
        <?php foreach ($products as $p) : ?>
                            <div class="box1">

                                    <a href="chitet.php?id=<?= $p['product_id'] ?>">
                                        <img src="./images/<?= $p['image'] ?>" class="img-fluid">
                                        <h6><?= $p['product_name'] ?></h6>
                                        
                                    </a>
                                    <p class="price"><?= $p['price'] ?></p>

                            </div>
                        <?php endforeach; ?>
          
        </div>
        <div style="clear: both;"></div>
        <div class="hr"></div>

        <div class="row">
            <div class="col-lg-6">
                <h2 class="h3">Tin nổi bật của heyyou!!</h2>
                <img src="img/anh17.JPG" alt="">
                <h3 >Heyyou sẽ có sản phẩm mới vào tháng
                    7 năm 2022</h3>
                <p>Sản phẩm lần này sẽ làm mọi người đáng mong đợi và giá sẽ rất phù hợp với túi tiền của sinh viên</p>
            </div>
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                        <img src="img/anh18.JPG" alt="">
                        <h6>Giá của Heyyou sẽ giảm mạnh vào tuấn sau </h6>
                        <span >Đã vào hè và bên Heyyou sẽ giảm giá để người
                            dùng có thể có những chiếc áo xinh</span>
                    </li>
                    <li class="list-group-item"><img src="img/anh19.png" alt="">
                        <h6>Thật bất ngờ heyyou sẽ có mặt trên sendo</h6>
                        <span >Sau khi có mặt trên các thị trường và bên heyyou
                            sẽ có mặt trên sàn sendo </span>
                    </li>
                    <li class="list-group-item"><img src="img/anh20.png" alt="">
                        <h6>Tất cả áo phông của heyyou sẽ giảm giá còn 69k</h6>
                    <span >Mỗi đợt heyyou sẽ có 1 khoảng thời gian sale khùng nê nhanh tay đặt hàng nhé </span>
                    </li>
                    <li class="list-group-item"><img src="img/ao2.jfif" alt="">
                        <h6>Local brand Việt Nam Hey You Studio</h6>
                    <span >Localbrand Hey You với giá cả hợp lý nhưng không làm giảm sự chất lượng, hầu hết đều có giá dưới 300k</span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <footer>
        <div class="col">
        <b>© Copyright 2022 By heyyoustudiovn. Powered by Haravan</b>
        <b class="gach"></b>
            <i class="far fa-envelope fa-2x"></i>
            <i class="fab fa-google-plus-g fa-2x"></i>
            <i class="fab fa-instagram fa-2x"></i>
            <i class="fab fa-facebook-square fa-2x"></i>
        </div> 
            
            

    </footer>

    <!-- <main role="main" class="container"> 
            <div class="starter-template">
                <h1>My Page Title</h1>
                <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
            </div>
        </main> -->

    <!--Optional JavaScript-->
    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>