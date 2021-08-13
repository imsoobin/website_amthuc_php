<?php
include "connect.php";
session_start();
$sql = "SELECT * FROM mon_an";
$tk = $_SESSION['dangnhap'];
$sql2 = "SELECT * FROM tai_khoan WHERE username = '".$tk."' LIMIT 1";
$sql3 = "SELECT * FROM tai_khoan";
$sql4 = "SELECT * FROM tbl_giohang";
$sql5 = "SELECT * FROM danh_muc";
$sql_td = "SELECT * FROM binh_luan";
$query = mysqli_query($conn, $sql); 
$query2 = mysqli_query($conn, $sql2);
$query3 = mysqli_query($conn, $sql3);
$query4 = mysqli_query($conn, $sql4);
$query5 = mysqli_query($conn, $sql5);
$query6 = mysqli_query($conn, $sql_td);
$total1 = mysqli_num_rows($query);
$total3 = mysqli_num_rows($query3);
$total4 = mysqli_num_rows($query4);
$roww = mysqli_fetch_array($query2);
$total2 = mysqli_num_rows($query6);
if (isset($_GET['action']) == 'dangxuat'){
    unset($_SESSION['dangnhap']);
    header("Location: Pages/main_layout.php");
}
else
{
    if(!isset($_SESSION['dangnhap'])){
        header("Location: Pages/login.php");
    }
    elseif((isset($_SESSION['dangnhap']) == $roww['trang_thai']) == 1){
       echo"<p style='position: absolute; z-index: 999; right: 60px; font-size: 11px;'></p>";
    }
   else{
       header("Location: Pages/login.php");
   }
}

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
.top-right{
    position: fixed;
    height: 50px;
    width: calc(100% - 260px);
    z-index: 1;
    right: 0;
    background-color: rgb(141, 134, 233);
}
.timkiem input{
    height: 30px;
    width: 600px;
    line-height: 50px;
    position: fixed;
    right: 350px;
    margin: 10px;
    border: 1px solid cornflowerblue;
    border-radius: 5px;
    color: rebeccapurple;
    font-weight: 600; 
    font-size: 15px;
}
input::placeholder{color: darkblue; font-weight: 400; font-family: sans-serif;}
.timkiem .fa{
    position: fixed;
    right: 373px;
    top: 18px;
    font-weight: 600;
    font-size: 15px;
    color: darkblue;
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
    /* cursor: pointer; */
}
.right-logout{
    display: flex;
    position: fixed;
    right: 20px;
    line-height: 50px;
}
.right-logout p{
    margin: 0 15px 0 0;
    color: rgb(125, 255, 212);
    font-weight: 600;
    text-transform: uppercase;
    font-size: 16px;
    letter-spacing: 1px;
}
.right-logout p:hover{
    color: #fff;
}
.right-logout a:hover{
    color: #fff;
}
.right-logout a{
    text-decoration: underline;
    font-size: 13px;
    color: #e91515;
}
@media screen and (max-width: 1023px) {
  .top-right {
    position: fixed;
    width: 100%;
  }
  .timkiem input{
      position: fixed;
      width: 300px;
      
  }
}

@media screen and (max-width: 799px) {
    .top-right {
    position: fixed;
    width: 100%;
  }
  .timkiem input{
      position: fixed;
      width: 300px;
  }
  .timkiem .fa{
      position: fixed;
      right: 110px;
  }
}

@media screen and (max-width: 511px) {
    .top-right {
    position: fixed;
  }
  
  .right-logout{
      display: none;
  }
  
}
</style>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="dashboard">
                <div class="left">
                    <span class="left__icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <div class="left__content">
                        <div class="left__logo">DOLPAN</div>
                        <div class="left__profile">
                            <div class="left__image"><img src="images/admin.jpg" alt=""></div>
                            <p class="left__name">Quản trị viên(김유정)</p>
                        </div>
                        <ul class="left__menu">
                            <li class="left__menuItem">
                                <a href="index.php" class="left__title"><img src="assets/icon-dashboard.svg" alt="">Trang chủ Admin</a>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-book.svg" alt="">Thực đơn<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="models/insert_thucdon.php">Chèn thực đơn</a>
                                    <a class="left__link" href="view_thucdon.php">Xem thực đơn</a>
                                </div>
                            </li> 
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-tag.svg" alt="">Sản phẩm<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="models/insert_product.php">Chèn Sản phẩm</a>
                                    <a class="left__link" href="view_product.php">Xem Sản phẩm</a>
                                </div>
                            </li>
                         
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-edit.svg" alt="">Danh Mục SP<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="models/insert_danhmuc.php">Chèn Danh Mục</a>
                                    <a class="left__link" href="view_danhmuc.php">Xem Danh Mục</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-edit.svg" alt="">Khuyến mại<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="models/insert_khuyenmai.php">Thêm khuyến mại</a>
                                    <a class="left__link" href="view_khuyenmai.php">Xem khuyến mại</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-pencil.svg" alt="">Tin tức<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="models/insert_tintuc.php">Chèn tin tức</a>
                                    <a class="left__link" href="view_tintuc.php">Xem tin tức</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <a href="view_datban.php" class="left__title"><img src="assets/icon-check.svg" alt="">Đặt bàn</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="view_binhluan.php" class="left__title"><img src="assets/icon-email.svg" alt="">Bình luận</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="view_taikhoan.php" class="left__title"><img src="assets/icon-users.svg" alt="">Tài khoản</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="view_orders.php" class="left__title"><img src="assets/icon-book.svg" alt="">Đơn Đặt Hàng</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="index.php?action=dangxuat" class="left__title"><img src="assets/icon-logout.svg" alt="">Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="top-right">
                    <div class="timkiem">
                    <form action="timkiem.php" method="GET">
                        <input type="text" name="search" autocomplete="off" value="" placeholder="Tìm kiếm..."/>
                        <input type="submit" name="ok" class="search" value=""
                            style="position: fixed; right: 345px; width: 50px; cursor: pointer; background-color: #fff;"/>
                        <i class="fa fa-search"></i></a>
                    </form>
                    </div>
                    <div class="right-logout">
                        <p style="color: #ff0;">HELLO!</p>
                        <p style="text-decoration: underline; cursor: pointer;"><?php
                            if(isset($_SESSION['dangnhap'])){
                                echo $_SESSION['dangnhap']; 
                            }
                            
                        ?></p>
                    </div>
                </div>
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Bảng điều khiển</p>
                        <div class="right__cards">
                            <a class="right__card" href="view_product.php">
                                <div class="right__cardTitle">Sản phẩm</div>
                                <div class="right__cardNumber"><?php echo $total1 ?></div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="view_binhluan.php">
                                <div class="right__cardTitle">Bình luận</div>
                                <div class="right__cardNumber"><?php echo $total2 ?></div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="view_taikhoan.php">
                                <div class="right__cardTitle">Tài khoản</div>
                                <div class="right__cardNumber"><?php echo $total3 ?></div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="view_orders.php">
                                <div class="right__cardTitle">Đơn Hàng</div>
                                <div class="right__cardNumber"><?php echo $total4 ?></div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="assets/arrow-right.svg" alt=""></div>
                            </a>
                        </div>
                        <div class="right__table">
                            <p class="right__tableTitle" style="text-transform: uppercase;"> tất cả danh mục</p>
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th style="text-align: left;">Mã danh mục</th>
                                            <th>Tiêu đề</th>
                                            <th>Mô tả</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        <?php
                                            while($roww = mysqli_fetch_array($query5)){     
                                        ?>
                                        <tr>
                                            <td data-label="Mã danh mục"><?php echo $roww['ma_danhmuc'] ?></td>
                                            <td data-label="Tên danh mục"><?php echo $roww['ten_danhmuc'] ?></td>
                                            <td data-label="Mô tả"><?php echo $roww['mota_dm'] ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <a href="view_orders.php" class="right__tableMore"><p>Xem tất cả các đơn đặt hàng</p> <img src="assets/arrow-right-black.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>