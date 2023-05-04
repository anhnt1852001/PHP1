<!DOCTYPE html>
<html lang="en">

<head>
    <!--Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Chi tiết sản phẩm</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="/favicon.ico">
    <link rel="canonical" href="https://mysite.com/mypage">
    <!--Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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

        .btn {
            background-color: #9DD2ED !important;
            border-color: white;
            color: white;
        }

        .btn:hover {
            background-color: #9EA7E1 !important;
            border-color: white;
        }
        h4{
            color:red
        }
        .col-lg-6>p{
        font-size: 15pt;
        }
        .col-lg-6>span{
            font-size: 10pt;
        }
        .col-lg-6>button{
            width: 100px;
            border: 1px solid white;
            border-radius: 10px;
            background-color: #9DD2ED;
            text-decoration: none;
        }
        /* css footer */
        footer {
            background-color: #9DD2ED;
            color: white;
            width: 100%;
            height: 100px;
            margin-top: 65px;
        }

        b {
            line-height: 75px;
            margin-left: 20px;
        }

        .gach {
            margin-left: 400px;
            border-left: 1px solid white;
            font-size: 30pt;
        }

        i {
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
            <img src="img/logo_heyyou_website-04_cfe6eb8b64f7430db789de966b4003b3-removebg-preview.png" class="d-inline-block align-top" width="100" height="90" alt="...">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#idCollapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
        <div class="row">
            <div class="col-lg-6">
                <img src="img/ao10.JPG" alt="">
               
            </div>
            <div class="col-lg-6">
                <h3><br>RAINBOW ESSENTIAL TEE</h3>
                <h4>114,000₫ </h4>
                <p> Màu sắc: Black | White</p>
                <p>Kích thước: S | M | L | XL</p>
                <p>Chất liệu: Cotton 4 chiều</p>
                <p>Sản phẩm được in lụa thủ công</p>

                 <span>HEYYOU - THƯƠNG HIỆU QUỐC DÂN</span>
                 <br>
               <br><button type="submit"><a href="xacnhandathang.php">Đặt hàng</a></button>
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>