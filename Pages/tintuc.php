<?php
    include "../connect.php";
    session_start();
    if (isset($_GET['action']) == 'dangxuat'){
        unset($_SESSION['dangnhap']);
        echo "<script>alert('Bạn đã đăng xuất thành công')</script>";
        header("Location: main_layout.php");
    }
    // else
    // {
    //     if(!isset($_SESSION['dangnhap'])){
    //         header("Location: login.php");
    //     }
    // }
    $sql = "SELECT * FROM danh_muc WHERE ma_danhmuc > 1";
    $query = mysqli_query($conn, $sql);
    $sql_td = "SELECT * FROM thuc_don";
    $query_td = mysqli_query($conn, $sql_td);
    $sql_tt = "SELECT * FROM tin_tuc";
    $query_tt = mysqli_query($conn, $sql_tt);
    $sql_ma = "SELECT * FROM mon_an ";//INNER JOIN danh_muc ON mon_an.ma_danhmuc = danh_muc.ma_danhmuc WHERE mon_an.ma_danhmuc = '$_GET[madanhmuc]' ";
    $query_ma = mysqli_query($conn, $sql_ma);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐỒ ĂN</title>
    <link rel="stylesheet" href="LY_doan.css">
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="menu">
            <div class="menu-top-left">
                <ul class="top-left">
                    <li><a href="#menu" id="menu"><h1 style="color: green;" title="Nhà hàng Dolpan">DOLPAN</h1></a></li>
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
           
                <div class="shop">
                <a href="giohang.php">
                        <i class="fas fa-cart-plus"></i>
                        Giỏ hàng
                    </a>
                </div>
                <div>
                    <span><i class="fa fa-user"></i></span> 
                </div>
                <div>
                <a href="#" title="Thông tin tài khoản">  
                <p>
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
                <select name="" id="" class="select" >
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
        <div class="content-left">
            <div class="content-text">
                <p>Cập nhật cùng Dolpan</p>
            </div>
            <div class="content-deltail"> 
                <ul>
                <?php while($row = mysqli_fetch_array($query_tt)){  ?>
                    <li>
                        <img src="../models/Uploads/<?php echo $row['hinh_anh']; ?>" alt="">
                        <div style="border: 1px solid rgba(0, 0, 0, 0.2); position: relative; top: -5px;">
                            <div class="details">
                                <p><?php echo $row['tieude_tintuc'] ?></p> 
                            </div>
                            <div class="btnn">
                                <a href="layout_tintuc.php?idtintuc=<?php echo $row['id_tintuc'] ?>"><button>Xem thêm</button></a>
                            </div>
                        </div>
                        
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
        <div class="content-right">
            <div class="right-header">
            <p>
               TIN TỨC
            </p>
            </div>
            <div class="right-menu">
                Hãy click vào mục bên trái để xem tin tức chi tiết
            </ul>
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
    <!-- <img src="../images/HQ.jpg" alt="" class="KYJ"> -->
</div>
<div class="end" 
    style="z-index: 900; position: relative;
    width: 100%; height: 70px; background-color: #111;" 
    >
        <p style="color: #fff; padding: 0 0 0 100px; line-height: 70px;
        font-size: 15px;
        "> <i class="far fa-copyright"></i> Bản quyền thuộc về Phạm Hoàng Sơn : Nhà hàng Hàn Quốc Dolpan</p>
</div>
<?php
function mysubstr($str,$limit=180){
	if(strlen($str)<=$limit) return $str;
	return mb_substr($str,0,$limit-3,'UTF-8').'...';
}
?>
</body>
<script src="main.js"></script>
</html>