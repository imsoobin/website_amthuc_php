<?php
include"../connect.php";
    session_start();
    if(isset($_SESSION['cart'])){
        
    }

    if (isset($_GET['action']) == 'dangxuat'){
        unset($_SESSION['dangnhap']);
        echo "<script>swal('Bạn đã đăng xuất thành công')</script>";
        header("Location: main_layout.php");
    }
    
    $sql = "SELECT * FROM danh_muc WHERE ma_danhmuc > 1";
    $query = mysqli_query($conn, $sql);
    $sql_td = "SELECT * FROM thuc_don";
    $query_td = mysqli_query($conn, $sql_td);
    // $tkhoan = $_SESSION['dangnhap'];
    // $sql_tk = "SELECT * FROM tai_khoan WHERE username = '".$tkhoan."' LIMIT 1";
    // $query_tk = mysqli_query($conn, $sql_tk);
    // $rowtk = mysqli_fetch_array($query_tk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="giohang.css">
    <link rel="stylesheet" href="hieuung.css">
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body class="preloading">
<div class="loader" id="preload">
      <span class="fas fa-spinner preload-icon rotating"></span>
   </div>
<div class="container">
        <div class="menu">
            <div class="menu-top-left">
                <ul class="top-left">
                    <li><a href="main_layout.php" id="menu"><h1 style="color: green;" title="Nhà hàng Dolpan">DOLPAN</h1></a></li>
                    <li><a href="layout.php">Trang chủ</a></li>
                    <li><a href="">Thực đơn &nabla;</a>
                        <ul style="height: 275px;">
                        <?php while($row = mysqli_fetch_array($query_td)){  ?>
                            <li><a href="view_thucdon.php?idthucdon=<?php echo$row['id_thucdon'] ?>"><?php echo $row['ten_sp'] ?></a></li>
                        <?php } ?>
                        </ul>
                    </li>
                    <?php while($row = mysqli_fetch_array($query)){  ?>
                    <li><a href="xuy_layout.php?quanly&madanhmuc=<?php echo $row['ma_danhmuc'] ?>"><?php echo $row['ten_danhmuc'] ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="menu-top-right">
                
                <div>
                    <span><i class="fa fa-user"></i></span> 
                </div>
                <div>
                <a href="" title="Thông tin tài khoản">  
                <p style="font-size: 15px;">
                <?php
                if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                }     
                ?>
                </p>
                </a>
                </div>
            
            </div> 
        </div>
        <div class="search-call">
            <div class="search">
                
                <select name="sapxepgia" id="" class="select" >
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="HCM">HCM</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                </select>
               
                <form action="search_layout.php" method="GET">
                    <input type="text" name="search" placeholder="tìm kiếm ...">
                    <button type="submit" name="ok" class="timmkiem">Tìm kiếm</button>
                </form>
            </div>
            <div class="call">
                <h1 style="color: green;">
                <i class="fa fa-phone" style="font-size: 22px;"></i>
                1900-0345
                </h1>
            </div>
        </div>
        <!-- Hiển thị tin tức cột trái -->
<div class="all-content">
    <div class="content-right">
        <div class="right-header">
        <p>Giỏ hàng</p>
    </div>
    <div class="right-menu">
    <table style="width:100%;" >
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php
            if(isset($_SESSION['cart'])){
                $i = 0;
                $tongtien = 0;
            foreach($_SESSION['cart'] as $cart_item){
                $i++;
                $thanhtien = $cart_item['giadoan']*$cart_item['soluong'];
                $tongtien += $thanhtien;
            ?>
        <tr style="font-weight: 600;">
            <td><?php echo $i ?></td>
            <td style="width: 120px;">
            <img src="../models/Uploads/<?php echo $cart_item['hinhanh'] ?>" width="120px" height="100px">
            </td>
            <td style="font-size: 15px;"><?php echo $cart_item['tendoan'] ?></td>
            <td><?php echo number_format($cart_item['giadoan']).' đ' ?></td>
            <td style="font-size: 15px; width: 100px;">
                <a href="themgiohang.php?tru=<?php echo $cart_item['madoan'] ?>">
                    <button style="border: none;background: none; cursor: pointer;"><i class="fas fa-minus"></i></button>
                </a>
                <span style="padding: 0 10px; border: 1px solid rgba(228, 140, 63, 0.4);">
                    <?php echo $cart_item['soluong'] ?>
                </span>
                <a href="themgiohang.php?cong=<?php echo $cart_item['madoan'] ?>">
                    <button style="border: none; background: none; cursor: pointer;"><i class="fas fa-plus"></i></button>
                </a>
            </td>
            <td style="width: 200px;"><?php echo number_format($thanhtien).' đ' ?></td>
            <td>
                <a href="themgiohang.php?xoa=<?php echo $cart_item['madoan'] ?>" style="font-size: 16px; color: green; font-weight: 600;">Xóa</a>
            </td>
        </tr>
        <?php 
            }
    ?>
        <tr>
            <td colspan="8" style="text-align: right; padding: 10px;">
                <p style="font-size: 16px; font-weight: 600;">Tổng tiền: <?php echo number_format($tongtien).' VNĐ' ?></p>
                <a href="themgiohang.php?xoatatca=1" style="color: red; font-weight: 600;">Xóa tất cả</a>
            </td>
        </tr>
<?php
    }
    else{
?>
    <tr>
         <td colspan="8" style="padding: 20px; font-weight: 600;">Giỏ hàng trống</td>
    </tr>
<?php } ?>
</table>
<div style="padding: 5px 10px 5px 10px; background-color: rgb(228, 140, 63);
    display: flex; justify-content: space-between;
">
    <div>
        &#9754; <a href="javascript: history.go(-1)" style="color: #fff; font-weight: 600;">Tiếp tục mua hàng</a>
    </div>
    <div>
    <?php 
         if(isset($_SESSION['dangnhap'])){
    ?>
    <a href="xac_nhan.php">
        <button name="thanhtoan" style="background-color: #fff; border: none; outline: none;padding: 5px 20px 5px 20px; font-size: 13px; font-weight: 600;color: green;border-radius: 5px; cursor: pointer;">
            Tiến hành thanh toán <i class="fas fa-arrow-right"></i>
        </button>
    <?php }else{
        echo "<b style='color: #fff;'>Bạn phải đăng nhập/đăng ký để đặt hàng</b>";
    ?>
    <?php } ?>
    </a>
    </div>
</div>
    </div>
    </div>
</div>
</div>
    <div class="footer">
        <div class="footer-left">
            <p style="color: rgba(255, 255, 0 , 0.7);">Dolpan Korean Food</p>
            <ul>
                
                <li>
                <i class="fas fa-home"></i>
                CH1:181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM
                </li>
                <li>
                <i class="fas fa-home"></i>
                CH1:181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM
                </li>
                <li>
                <i class="fas fa-home"></i>
                CH1:181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM
                </li>
                <li>
                <i class="fas fa-home"></i>
                CH1:181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM
                </li>
                
            </ul>
        </div>
        <div class="footer-right">
            <ul>
                <li>
                <i class="fas fa-phone-alt"></i>
                    Hotline: 0345425328
                </li>
                <li>
                <i class="fab fa-weebly"></i>
                    Website: Dolpan.com
                </li>
                <li>
                <i class="fab fa-facebook-f"></i>
                    Facebook: www.fb.com/dolpan.korean
                </li>
                
            </ul>
        </div>
        
    </div>
    
</div>
<div class="end" style="z-index: 900; position: relative; width: 100%; height: 70px; background-color: #111;" >
    <p style="color: #fff; padding: 0 0 0 100px; line-height: 70px; font-size: 15px;"> 
        <i class="far fa-copyright"></i> Bản quyền thuộc về Phạm Hoàng Sơn : Nhà hàng Hàn Quốc Dolpan
    </p>
</div>
</body>
<script>
    $(window).on('load', function(event) {
   $('body').removeClass('preloading');
      // $('.load').delay(1000).fadeOut('fast');
   $('.loader').delay(400).fadeOut('fast');
});
</script>
</html>