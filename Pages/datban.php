<?php
    include "../connect.php";
    session_start();
    $sql = "SELECT * FROM danh_muc WHERE ma_danhmuc > 1";
    $query = mysqli_query($conn, $sql);
    $sql_td = "SELECT * FROM thuc_don ";
    $query_td = mysqli_query($conn, $sql_td);
    $tkhoan = $_SESSION['dangnhap'];
    $sql_tk = "SELECT * FROM tai_khoan WHERE username = '".$tkhoan."' LIMIT 1";
    $query_tk = mysqli_query($conn, $sql_tk);
    $rowtk = mysqli_fetch_array($query_tk);
    $sql_datban = "SELECT * FROM dat_ban WHERE id_datban LIMIT 1";
    $query_datban = mysqli_query($conn, $sql_datban);
    $sql_km = "SELECT * FROM khuyen_mai";
    $query_km = mysqli_query($conn, $sql_km);
    if (isset($_GET['action']) == 'dangxuat'){
        unset($_SESSION['dangnhap']);
        unset($_SESSION['cart']);
        echo "<script>alert('Bạn đã đăng xuất thành công')</script>";
        header("Location: main_layout.php");
    }
    else
    {
        // if(!isset($_SESSION['dangnhap'])){
        //     header("Location: login.php");
        // }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt bàn</title>
    <link rel="stylesheet" href="layout.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.min.css">
</head>
<style>
.search-call{
    position: relative;
    height: 70px;
    width: 100%;
    background-color: rgb(223, 243, 240);
    display: flex;
    justify-content: space-between;
    box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
    z-index: 90;
}
.search-call .search{
    margin: 0 0 0 100px;
    width: auto;
    display: flex;
}
.search-call .search form {
    width: auto;
}
.search-call .search input{
    width: 550px; 
    height: 34px;
    margin: 4px 0 0 0;
    outline: none;
    border: 1px solid rgba(0, 0, 0, 0.3);
    margin: 15px 0 0 0;
    float: left;
}
.search-call .search button{
    height: 36px;
    border: none;
    width: 100px;
    color: #fff;
    font-weight: 600;
    background-color: rgb(228, 140, 63);
    cursor: pointer;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    margin: 15px 0 0 0;
}
.search-call .search .select{
    width: 205px;
    border: 1px solid rgba(0, 0, 0, 0.3);
    height: 36px;
    outline: none;
    margin: 15px 0 15px 0px;
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}
.search-call .call{
    line-height: 70px;
    margin: 0 100px 0 0;
}
.news form > div{
    display: flex;
    justify-content: center;
    padding: 5px 0;
}
.news div > input{
    padding: 5px 10px 5px 10px;
    width: calc(100% - 50px); 
}   
.news div > textarea{
    padding: 5px 10px 0px 10px;
    width: calc(100% - 50px); 
}   
.news div > button{
    padding: 5px 20px 5px 20px;
    outline: green;
    font-weight: 600;
    background-color: green;
    border: none;
    color: #fff;
}
.news div > button:hover{
    cursor: pointer;
    box-sizing: border-box;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
    background-color: rgb(228, 140, 63);
}
.khuyenmai{
    margin: 30px 100px;
    background-color: #fff;
    padding: 30px;
}

    .khuyenmai table tr td{
        text-align: center;
        font-size: 15px;
        padding: 10px;
    }
    .khuyenmai table th{
        padding: 10px;
    }
    .khuyenmai p{
        font-size: 20px;
        margin: 10px 0 10px 0;
        font-weight: 600;
        color: red;
    }

</style>
<body>
    <div class="container">
        <div class="menu" style="position: fixed;z-index: 990; width: 100%;">
            <div class="menu-top-left">
                <ul class="top-left">
                    <li><a href="layout.php" id="menu"><h1 style="color: green;" title="Nhà hàng Dolpan">DOLPAN</h1></a></li>
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
            <p class="logout"><a href="layout.php?action=dangxuat"> Đăng xuất</a></p>
            <span title="Đổi mật khẩu">
                
                    <i class="fa fa-user" title="Đổi mật khẩu"></i>
               
            </span>
            <a href="thongtin_tk.php?username=<?php echo $rowtk['username']?>" title="Thông tin tài khoản">
            <p>
                <?php
                if(isset($_SESSION['dangnhap'])){
                    echo $_SESSION['dangnhap'];
                    // echo $_SESSION['id_khachhang'];
                }     
                ?>
            </p>
            </a>
            </div>
            
        </div>
        <div class="search-call" style=" top: 50px; position: relative;">
            <div class="search">
                <select name="" id="" class="select">
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
        <div class="banner" style="margin-top: 70px;">
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
            
            <div class="news" >
            <?php while($row = mysqli_fetch_array($query_datban)){ ?>
            <form action="../models/xuly_datban.php?madatban=<?php echo $row['id_datban'] ?>" method="POST">
                <div>
                    <p style="font-size: 13px; font-weight: 700;">Hãy đặt trước 30 phút nhé quý khách!</p>
                </div>
                <div>
                    <input type="text" placeholder="Họ tên" name="hoten" required>
                </div>
                <div>
                    <input type="text" placeholder="Số điện thoại" name="sodienthoai" required>
                </div>
                <div>
                    <input type="text" placeholder="Số lượng người" name="soluong" required>
                </div>
                <div>
                    <textarea type="text" placeholder="Ghi chú - VD: 1 người lớn, 1 trẻ nhỏ" cols="40" rows="10" name="ghichu" required></textarea>
                </div>
                <div>
                    <button type="submit" name="datban">Đặt bàn</button>
                </div>
            </form>
            <?php } ?>
            </div>
        </div>
        <div class="introduce">
            <div class="intro-content" style="width: 800px;">
                <p>Nhà Hàng Dolpan - Món ăn chuẩn vị hàn quốc </p>
                <span> DOLPAN mang đến các món ăn Hàn Quốc chế biến công phu và trọn vẹn vị ngon tinh tế, đánh thức giác quan và tạo cảm hứng.</span>
            </div>
            <div class="intro-button">
                <button style="margin-right: 30px;" onclick="datban();">Đặt bàn ngay</button>
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

    </div>   
    <div class="khuyenmai">
        <p >Ưu đãi: </p>
        <table style="width: 100%; border-collapse: collapse;" border="1">
            <thead>
                <th>Sản phầm khuyến mãi</th>
                <th>Sản phẩm ưu đãi</th>
                <th>Áp dụng</th>
             </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($query_km)){
                 ?>
                <tr>
                    <td><?php echo $row['tieu_de'] ?></td>
                    <td><?php echo $row['ten_sanpham'] ?></td>
                    <td><?php echo $row['ap_dung'] ?></td>
                               
                </tr>
                <?php } ?> 
            </tbody>
        </table>
    </div>
<div class="footer" style="background-color: #000;">
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
    function datban(){
        swal("Doplan xin chào!", "Hãy đặt bàn ở góc bên phải nha! Tks", "success");
    }
</script> 
</script>
<script src="main.js"></script>
</html>