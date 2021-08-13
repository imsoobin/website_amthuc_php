<?php
    include "../connect.php";
    $sql = "SELECT * FROM danh_muc WHERE ma_danhmuc > 1";
    $query = mysqli_query($conn, $sql);
    $sql_td = "SELECT * FROM thuc_don";
    $query_td = mysqli_query($conn, $sql_td);
    $sql_tt = "SELECT * FROM tin_tuc";
    $query_tt = mysqli_query($conn, $sql_tt);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link rel="stylesheet" href="styles-main.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="menu">
            <div class="menu-top-left">
                <ul class="top-left">
                    <li><a href="main_layout.php" id="menu"><h1 style="color: green;" title="Nhà hàng Dolpan">DOLPAN</h1></a></li>
                    <li><a href="main_layout.php">Trang chủ</a></li>
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
                <div class="dangnhap">
                    <a href="login.php"><button>Đăng nhập</button></a>
                </div>
                <div class="dangky">
                    <a href="sign_in.php"> <button>Đăng ký</button> </a>
                </div>
            </div>
            
        </div>
        <div class="search-call">
            <div class="search">
                <select name="" id="" class="select">
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="HCM">HCM</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                </select>
                <input type="text" name="timkiemsp" placeholder="tìm kiếm ...">
                <button name="timkiem">Tìm kiếm</button>
            </div>
            <div class="call">
                <h1 style="color: green;">
                <i class="fa fa-phone" style="font-size: 22px;"></i>
                1900-0345
                </h1>
            </div>
        </div>
        <div class="banner">
            <div class="content">
                <div class="images">
                    <img src="../images/banner-6.jpg" alt="" class="imgs">
                    <img src="../images/banner-1.jpg" alt="" class="imgs">
                    <img src="../images/banner-2.jpg" alt="" class="imgs">
                    <img src="../images/banner-3.jpg" alt="" class="imgs">
                    <img src="../images/banner-4.jpg" alt="" class="imgs">
                    <img src="../images/banner-5.jpg" alt="" class="imgs">
                    <img src="../images/banner-7.jpg" alt="" class="imgs">
                </div>
            </div>
            
            <div class="news">
                <p>Tin tức mới từ Dolapn</p>
                <ul>
                <?php while($row = mysqli_fetch_array($query_tt)){  ?>
                    <li>
                        <img src="../models/Uploads/<?php echo $row['hinh_anh']; ?>" alt="" width="70px" height="80px">
                        <span class="tieude"><?php echo $row['tieude_tintuc']; ?></span>
                        <p class="noidung">
                            <?php echo mysubstr($row['noi_dung']); ?>
                        </p>
                       
                    </li>
                <?php } ?>
                </ul>
            </div>
        </div>
        <div class="introduce">
            <div class="intro-content" style="width: 800px;">
                <p>Nhà Hàng Dolpan - Món ăn chuẩn vị hàn quốc </p>
                <span> DOLPAN mang đến các món ăn Hàn Quốc chế biến công phu và trọn vẹn vị ngon tinh tế, đánh thức giác quan và tạo cảm hứng.</span>
            </div>
            <div class="intro-button">
                <button style="margin-right: 30px;">Đặt bàn ngay</button>
                <a href="#ds"><button>Xem thực đơn</button></a>
            </div>
        </div>
        <div class="product">
            <div class="product-title">
                <p>Ở Dolpan có gì hấp dẫn thực khách ?</p>
            </div>
            <div class="product-content">
                <ul>
                    <li>
                        <p style="text-align: center;"><i class="fas fa-utensils" style="font-size: 25px; color: green;"></i></p>
                        <p>Món ăn hợp vị</p>
                        <span>Hancook luôn cập nhật đa dạng các món 
                        Hàn Quốc đặc trưng nhất với hương vị độc đáo như nguyên bản,
                        thêm chút biến tấu tinh tế thêm hợp vị người Việt
                        </span>
                    </li>
                    <li>
                        <p style="text-align: center;"><i class="far fa-image" style="font-size: 25px; color: green;"></i></p>
                        <p>Không gian ấm cúng kiểu Hàn</p>
                        <span>Không gian theo phong cách bình dị ấm cúng kiểu gia đình Hàn, cho bạn cảm giác thoải mái dễ chịu, thêm gắn kết khi đi ăn cùng bạn bè, người thân.
                        </span>
                    </li>
                    <li>
                        <p style="text-align: center;"><i class="far fa-money-bill-alt"  style="font-size: 25px; color: green;"></i></p>
                        <p>Giá cực hấp dẫn</p>
                        <span>Giá món ở Hancook luôn cực hấp dẫn, chỉ khoảng 100K/người là bạn đã đủ no rùi nè. Nếu đi ăn chung với bạn bè thì lại càng có lợi hơn nữa nhé!
                        </span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="thucdon">
            <div class="thucdon-con">
                <div class="thucdon-content">
                <p>Thực đơn đa dạng tại Dolpan mới nhất chờ bạn khám phá!</p>
                <span style="font-size: 16px;">
                Bạn đã biết chưa, thực đơn 2020 của Dolpan cập nhật thêm rất nhiều món mới, rất nhiều món "best seller" và món ĐỘC QUYỀN với hương vị độc đáo thật khó kiếm ở nơi nào khác. 
                Click vào mỗi nhóm món hoặc bấm Xem tất cả Menu để tham khảo toàn bộ menu Dolpan bạn nhé!
                </span>
            </div>
            </div>
            <div class="thucdon-con-btn">
                <div class="thucdon-button">
                    <a href="#menu"><button>Xem menu chính</button></a>
                    <a href="#dc"><button>Xem chi nhánh</button></a>
                </div>
            </div>
        </div>

        <div class="danhsach" id="ds">
            <div class="ds-top">
                <ul>
                    <li style="margin-right: 30px;">
                        <img src="../images/thit_nuong_1.png" alt="" width="100px" height="100px">
                        <p>Thịt nướng kiểu Hàn ngon mê say!</p>
                        <span>Cũng là các nguyên liệu quen thuộc: thịt ba chỉ, hải sản và rau, nấm.
                             Nhưng khi thêm vào nồi lẩu kim chi hay Bulgogi tại Dolapn, 
                            mọi thứ hương vị đều được định nghĩa lại và cuốn hút đến lạ kì
                        </span>
                        <a href=""><i>Xem chi tiết</i> &rarr;</a>
                    </li>
                    <li>
                        <img src="../images/mi-jajang.png" alt="" width="100px" height="100px">
                        <p>Mỳ - Miến - Súp đặc trưng xứ Hàn</p>
                        <span>Những phần ăn nóng nghi ngút khói, mùi thơm lừng. Múc 1 muỗng  để cảm nhận 
                            độ hương vị độc đáo và những mùi thơm của gia vị Hàn Quốc chẳng lẫn vào đâu được
                        </span>
                        <a href=""><i>Xem chi tiết</i> &rarr; </a>
                    </li>
                </ul>
                <ul>
                    <li style="margin-right: 30px;">
                        <img src="../images/banhgaocay1.jpg" alt="" width="100px" height="100px">
                        <p>Tokbokki-Kimbab-Bokkum-Cơm Trộn</p>
                        <span>CCho dù bạn là tín đồ của Tokbokki, Kimbab, Bokkum hay cơm trộn thì Dolpan 
                            cũng không làm bạn thất vọng! Thử một lần mà xem bạn có ghiền ngay và liền không nhé!
                            Món ăn vặt nổi tiếng HQ
                        <a href=""><i>Xem chi tiết</i> &rarr; </a>
                    </li>
                    <li>
                        <img src="../images/menu-nuoc-tra-sua-hoa-dau-biec.png" alt="" width="100px" height="100px">
                        <p>Thức uống đa dạng - độc quyền</p>
                        <span>Bạn có biết chưa? 2020 này thực đơn đồ uống của Hancook mới cập nhật thêm 3 món thức 
                            uống handmade - best seller.  Mới ra thôi đã gây biết bao thương nhớ!
                        </span>
                        <a href=""><i>Xem chi tiết</i> &rarr; </a>
                    </li>
                </ul>
            </div>
            
        </div>
    <div class="diachi" id="dc">
        <div class="ds-diachi">
            <p style="text-align: center; font-size: 25px; font-weight: 600; margin-top: 30px;"> 
            <b style="color: green;"> <i class="fas fa-quote-left" style="font-size: 20px; position: relative; top: -10px;"></i>Dolpan<i class="fas fa-quote-right"style="font-size: 20px; position: relative; top: -10px;"></i></b>  
            rất mong được chào đón bạn tại!</p>
                <ul> 
                    <h1>01</h1>
                    <li>
                       
                        <img src="../images/banner-3.jpg" alt="" width="120px" height="120px">
                        <p>CN 3 tháng 2</p>
                        <span>
                        Dolpan mong chờ được đón bạn tại:<br/> <b>Địa chỉ:</b>  181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM<br/>
                        <b>Giờ làm việc:</b>
                        <br/>
                        Thứ 2 – Chủ Nhật: 9:00-22:00<br/>
                       <b>Hotline:</b> <br/>
                        028 6686 3438
                        </span>
                        <a href=""><i>Xem chi tiết</i> &rarr; </a>
                    </li>
                    <h1>02</h1>
                    <li>
                        <img src="../images/banner-4.jpg" alt="" width="120px" height="120px">
                        <p>CN Nguyễn Tri Phương</p>
                        <span>
                        Dolpan mong chờ được đón bạn tại:<br/> <b>Địa chỉ:</b>  181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM<br/>
                        <b>Giờ làm việc:</b>
                        <br/>
                        Thứ 2 – Chủ Nhật: 9:00-22:00<br/>
                       <b>Hotline:</b> <br/>
                        028 6686 3438
                        </span>
                        <a href=""><i>Xem chi tiết</i> &rarr; </a>
                    </li>
                    <h1>03</h1>
                    <li>
                        <img src="../images/banner-7.jpg" alt="" width="120px" height="120px">
                        <p>CN Nguyễn Du</p>
                        <span>
                        Dolpan mong chờ được đón bạn tại:<br/> <b>Địa chỉ:</b>  181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM<br/>
                        <b>Giờ làm việc:</b>
                        <br/>
                        Thứ 2 – Chủ Nhật: 9:00-22:00<br/>
                       <b>Hotline:</b> <br/>
                        028 6686 3438
                        </span>
                        <a href=""><i>Xem chi tiết</i> &rarr; </a>
                    </li>
                    <h1>04</h1>
                    <li>
                        <img src="../images/banner-3.jpg" alt="" width="120px" height="120px">
                        <p>CN Nguyễn Trãi</p>
                        <span>
                        Dolpan mong chờ được đón bạn tại:<br/> <b>Địa chỉ:</b>  181/2 Ba Tháng Hai, Phường 11, Quận 10, Tp. HCM<br/>
                        <b>Giờ làm việc:</b>
                        <br/>
                        Thứ 2 – Chủ Nhật: 9:00-22:00<br/>
                       <b>Hotline:</b> <br/>
                        028 6686 3438
                        </span>
                        <a href=""><i>Xem chi tiết</i> &rarr; </a>
                    </li>
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
    <img src="../images/HQ.jpg" alt="" class="KYJ">
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