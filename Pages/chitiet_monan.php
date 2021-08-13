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
    //         echo"<scritp>alert('Bạn phải đăng nhập để bình luận')</scritp>";
    //     }
    // }
    $sql = "SELECT * FROM danh_muc WHERE ma_danhmuc > 1";
    $query = mysqli_query($conn, $sql);
    $sql_td = "SELECT * FROM thuc_don";
    $query_td = mysqli_query($conn, $sql_td);
    $sql_tt = "SELECT * FROM tin_tuc";
    $query_tt = mysqli_query($conn, $sql_tt);
    $sql_ma = "SELECT * FROM mon_an WHERE ma_doan = '$_GET[madoan]' LIMIT 1"; 
    $query_ma = mysqli_query($conn, $sql_ma);
    $sql_an = "SELECT * FROM mon_an WHERE ma_doan = '$_GET[madoan]' LIMIT 1"; 
    $query_an = mysqli_query($conn, $sql_ma);
    $sql_bl = "SELECT * FROM binh_luan, tai_khoan WHERE binh_luan.id_taikhoan = tai_khoan.id_taikhoan ORDER BY binh_luan.id_bl DESC";
    $quey_bl = mysqli_query($conn, $sql_bl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết món ăn</title>
    <link rel="stylesheet" href="Chitietsp.css">
    <link rel="stylesheet" href="LY_doan.css">
    <link rel="stylesheet" href="hieuung.css">
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<style>
    .img {
    width: 300px;
    height: 300px;
}
.img > img {
    width: 100%;
    height: 100%;
    cursor: pointer;
}
.in {
    display: none;
    width: 100%;
    height: 100%;
    background: #000000e8;
    position: fixed;
    top: 0px;
    left: 0;
    cursor: pointer;
    z-index: 999;
    
}
.in > img {
    margin: auto;
    position: relative;
    top: 50px;
    animation: in 1s forwards;
    display: block;
    height: 500px;
}
@keyframes in{
    from{transform: scale(0.8);}
    to{transform: scale(1);}
}

</style>
<body class="preloading">
    <div class="loader" id="preload">
      <span class="fas fa-spinner preload-icon rotating"></span>
   </div>
    
    <div class="container">
        <div class="menu" style="position: fixed;z-index: 990; width: 100%;">
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
                    <li><a href="xuy_layout.php?madanhmuc=<?php echo $row['ma_danhmuc'] ?>"><?php echo $row['ten_danhmuc'] ?></a></li>
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
        <div class="search-call" style=" top: 50px; position: relative;">
            <div class="search">
                <form action="">
                    <select name="" id="" class="select" >
                        <option value="Hà Nội">Hà Nội</option>
                        <option value="HCM">HCM</option>
                        <option value="Đà Nẵng">Đà Nẵng</option>
                    </select>
                </form>
                
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
    <div class="all-content" style="margin-top: 70px;">
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
               Chi tiết sản phẩm
            </p>
                <!-- <div class="right-sx">
                    <p>Sắp xếp:</p>
                    <select name="sapxepgia" id="">
                        <option value="">Sắp xếp:</option>
                        <option value="Giá giảm dần">Giá giảm dần</option>
                        <option value="Giá tăng dần">Giá tăng dần</option>
                    </select>
                </div> -->
            </div>
            <div class="right-detail">
            <ul>
            <?php while($row = mysqli_fetch_array($query_ma)){  ?>
                <form action="themgiohang.php?madoan=<?php echo $row['ma_doan'] ?>" style="display: inline-flex;" method="POST">
                <div class="img">
                     <img src="../models/Uploads/<?php echo $row['hinh_anh']; ?>" alt="">
                </div>
                <div class="in">
                    <img src="../models/Uploads/<?php echo $row['hinh_anh']; ?>" alt="">
                </div>
                <li>
                <div class="tong">
                    <div class="tensp">
                        <p><?php echo $row['ten_doan']; ?></p>
                    </div>
                    <div class="gia">
                        <p style="letter-spacing: 1px;"><?php echo number_format($row['gia']).'VNĐ' ?></p>
                    </div>
                    <div class="mota">
                        <p><?php echo $row['mo_ta']; ?></p>
                    </div>
                    <div class="tinhtrang">
                        Tình trạng: <p>Còn hàng</p>
                    </div>
                    <div class="soluong">
                        Số lượng: 
                        <div style=" border: 1px solid rgba(0, 0, 0, 0.2);">
                            <button type="button" onclick="giamSL();">-</button>
                            <input type="text" value="1" name="soluongdat" id="inc">
                            <button type="button" onclick="tangSL();">+</button>
                        </div>
                       
                    </div>
                    <div class="btn-mua">
                        <a href="">
                            <button type="submit" name="themgiohang">Mua ngay</button>
                        </a>
                    </div>
                    <div class="chiase">
                        <p>Chia sẻ: </p>
                        <div class="icon">
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                        <a href=""><i class="fab fa-pinterest"></i></a>
                        </div>
                    </div>
                    
                </div>
                </li>
                </form>
            </ul>
            </div>
<div class="commend">
        <div class="tab">
            <button class="tablinks active">Mô tả</button>
            <button class="tablinks">Bình luận</button>
        </div>
 
        <div id="Mô tả" class="tabcontent">
        <h3>Mô tả</h3>
        <p style="letter-spacing: 1px;">
            <?php echo $row['mo_ta']?>
        </p>
        <p style="margin: 10px 0;">
        Kết nối Zalo cùng Dolpan để nhận nhiều ưu đãi hấp dẫn: zalo.me/3432705329173036626
        </p>
        <p style="font-weight: 700;">
            <i class="fas fa-ring"></i>
            GHÉ THƯỞNG THỨC TẠI:
        </p>
        <p>
        <ul>
            <li>CN1: 181/2 3 Tháng 2, P11, Q10, TP HCM – 028 6686 3438</li>
            <li>CN2: 263 Nguyễn Tri Phương, P5, Q10, TP HCM – 028 6686 3638</li>
            <li>CN2: 263 Nguyễn Tri Phương, P5, Q10, TP HCM – 028 6686 3638</li>
            <li>CN4: 320 Nguyễn Trọng Tuyển, P1, Q.Tân Bình, TP HCM – 028 2243 8383</li>
            <li>CN5: 123 Nguyễn Gia Trí, P25, Q.Bình Thạnh, TP HCM – 028 6660 1123</li>
        </ul>
        </p>
        <?php } ?>
        </div>
        <?php while($row = mysqli_fetch_array($query_an)){ ?>
        <div id="Bình luận" class="tabcontent">
        <form action="../models/xuly_binhluan.php?madoan=<?php echo $row['ma_doan'] ?>" method="POST">
        <h3>Bình luận</h3>
            <div class="vietbinhluan">
                <textarea name="vietbinhluan" autocomplete="off" id="" placeholder="Bình luận của bạn..." style="width: 100%; height: 200px; text-align: left;"></textarea>
            </div>
        <?php 
        if(!isset($_SESSION['dangnhap'])){
                echo"<b style='color: red;'>Bạn phải đăng nhập mới có thể binh luận</b>";
            }
            else
            {
        ?>
            <div class="sent">
                <button type="submit" name="binhluan">Gửi</button>      
            </div>
            <?php
            }
        ?>
        <p style="text-transform: uppercase; padding: 10px 0 10px 0; font-weight: 600;">Nội dụng bình luận</p>
        <div style="width: 100%; height: auto; border: 1px solid rgba(0, 0, 0, 0.5);">
            <?php while($row = mysqli_fetch_array($quey_bl)){ ?>
            <div style="padding: 10px; border-bottom: 1px solid rgba(11,111,110, 0.2);">
                <label for="" style="font-weight: 600;"> <i class="far fa-user" style="padding: 10px; margin-right: 5px; border-radius: 50%; background-color: green; color: #fff;">
                </i>User: <span style="cursor: pointer; text-decoration: underline;"><?php echo $row['username'] ?> </span> </label>
                <span> <i class="far fa-hand-point-right"></i> <?php echo $row['noidung_bl'] ?> </span>
                <span style="color: grey; font-weight: 600;">NXSP->code(<a href="chitiet_monan.php?madoan=<?php echo $row['ma_doan'] ?>"><?php echo $row['ma_doan']?></a>)</span>
            </div>
            <?php } ?>
        </div>
        </form>
        </div>
        <?php } ?>   
</div>
<div class="goiymuahang">
<!-- <iframe width="100%" height="515"  src="https://www.youtube.com/embed/-l0f4W7RV58" title="YouTube video player" frameborder="0"  allow="accelerometer; autoplay ; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
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
<script>
   var i = 0;
    function tangSL() {
        if(i == 10){
            return i;
        }
        else{
        i = parseInt(document.getElementById('inc').value, 10);
        i = i + 1;
        document.getElementById('inc').value = i;
        }
    }
    function giamSL(){
    var soluong = document.getElementById('inc').value;
        if(soluong == 1 ){
    	return soluong ;
        }
        else{
        i--;
        document.getElementById('inc').value = i;
        }
   }
   
</script>
<script>
    var img = document.querySelector('div.img img');
        var input = document.querySelector('.in');
        img.onclick = function(){
            input.style.display = 'block';
        }
        input.onclick = function(){
            input.style.display = 'none';
        }
</script>
<script>
var buttons = document.getElementsByClassName('tablinks');
    var contents = document.getElementsByClassName('tabcontent');
    function showContent(id){
        for(var i=0; i < contents.length; i++){
            contents[i].style.display = 'none';
        }
        var content = document.getElementById(id);
        content.style.display = 'block';
    }
    for (var i=0; i < buttons.length; i++){
        buttons[i].addEventListener("click", function(){
            var id = this.textContent;
            for(var i=0; i < buttons.length; i++){
                buttons[i].classList.remove("active");
            }
            this.className += "active";
            showContent(id);
        });
    }
    showContent('Mô tả');
</script>
<script>
    $(window).on('load', function(event) {
   $('body').removeClass('preloading');
      // $('.load').delay(1000).fadeOut('fast');
   $('.loader').delay(700).fadeOut('fast');
});
</script>
<script src="main.js"></script>
</html>