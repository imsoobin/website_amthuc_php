<?php
include"../connect.php";
    session_start();
    if(isset($_SESSION['cart'])){
        
    }

    if (isset($_GET['action']) == 'dangxuat'){
        unset($_SESSION['dangnhap']);
        echo "<script>alert('Bạn đã đăng xuất thành công')</script>";
        header("Location: main_layout.php");
    }
    
    $sql = "SELECT * FROM danh_muc WHERE ma_danhmuc > 1";
    $query = mysqli_query($conn, $sql);
    $sql_td = "SELECT * FROM thuc_don";
    $query_td = mysqli_query($conn, $sql_td);
    $tkhoan = $_SESSION['dangnhap'];
    $sql_tk = "SELECT * FROM tai_khoan WHERE username = '".$tkhoan."' LIMIT 1";
    $query_tk = mysqli_query($conn, $sql_tk);
    $rowtk = mysqli_fetch_array($query_tk);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="giohang.css">
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.min.css">
</head>
<style>
.all-content .right-menu .modal{
    width: 100%;
    height: auto;
    padding: 20px 0px 20px 10px;
    box-sizing: border-box;
    border: 1px solid rgba(228, 140, 63, 0.4)

}
.modal .taikhoan{
    text-transform: uppercase;
    font-weight: 700;
    color: green;
} 
.containerr{
    display: inline-flex;
    justify-content: flex-start;
    width: 100%;
}
.containerr label{
    margin: 0 10px 0 10px;
    text-transform: uppercase;
    font-size: 12px;
    text-decoration: underline;
    color: green;
}
.containerr p{
    font-size: 13px;
}
</style>
<body>
<div class="container">
        <div class="menu">
            <div class="menu-top-left">
                <ul class="top-left">
                    <li><a href="main_layout.php" id="menu"><h1 style="color: green;" title="Nhà hàng Dolpan">DOLPAN</h1></a></li>
                    <li><a href="layout.php">Trang chủ</a></li>
                    <li><a href="">Thực đơn &nabla;</a>
                        <ul style="height: 250px;">
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
            <p>Xác nhận đặt hàng</p>
        </div>
    <div class="right-menu">
    
    <div id="id01" class="modal">
    <form class="modal-content animate" action="" method="POST" enctype="multipart/form-data">
    <p class="taikhoan">Thông tin tài khoản</p>
    <?php 
      if($rowtk){
    ?>
    <div class="containerr">
      <label for="uname"><b>Tên tài Khoản: </b></label>
      <p><?php echo $rowtk['username'] ?></p>

      <label for="psw"><b>Họ tên: </b></label>
     
      <p><?php echo $rowtk['ho_ten'] ?></p>

      <label for="psw"><b>Email: </b></label>
      
      <p><?php echo $rowtk['email'] ?></p>

      <label for="psw"><b>Địa chỉ: </b></label>
      <p><?php echo $rowtk['dia_chi'] ?></p>

      <label for="psw"><b>Số điện thoại: </b></label>
      
      <p><?php echo $rowtk['so_phone'] ?></p>
    </div>
  <?php }?>
  </form>
</div>
    <table style="width:100%;" >
        <tr>
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
                <span style="padding: 0 10px;"><?php echo $cart_item['soluong'] ?></span>
            </td>
            <td style="width: 200px;"><?php echo number_format($thanhtien).' đ' ?></td>
            
        </tr>
        <?php 
            }
    ?>
       
<?php
    }
    else{
?>
    <tr>
         <td colspan="8" style="padding: 20px; font-weight: 600;">Giỏ hàng trống</td>
    </tr>
<?php } ?>
</table>
<div style="padding: 10px;">
<form action="" method="POST">
    <div>  
        <input type="radio" value="0" name="thanhtoan">  
        <label for="">Thanh toán sau khi nhận hàng</label>
    </div>
    <div>
        <input type="radio" value="1" name="thanhtoan">
        <label for="">Thanh toán bằng thẻ ATM</label>
    </div>
</form>
</div>
<div style="padding: 5px 10px 5px 10px; background-color: rgb(228, 140, 63);
    display: flex; justify-content: space-between;
">
    <div>
        &#9754; <a href="javascript: history.go(-1)" style="color: #fff; font-weight: 600;">Tiếp tục mua hàng</a>
    </div>
    <div>
    <?php 
         if(isset($_SESSION['cart'])){
    ?>
    <a href="thanhtoangiohang.php">
        <button name="thanhtoan" style=" 
            background-color: #fff; border: none; outline: none;
            padding: 5px 20px 5px 20px; font-size: 13px; font-weight: 600;color: green;
            border-radius: 5px; cursor: pointer;">
            Đặt hàng<i class="fas fa-arrow-right"></i>
        </button>
    <?php }else{
        echo "<b style='color: #fff;'>Bạn chưa có đơn hàng nào!</b>";
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
</body>
</html>