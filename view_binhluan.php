<?php
include "connect.php";
session_start();
$sql = "SELECT * FROM binh_luan , mon_an WHERE binh_luan.ma_doan = mon_an.ma_doan ORDER BY  binh_luan.id_bl DESC";
$query = mysqli_query($conn, $sql);
if (isset($_GET['action']) == 'dangxuat'){
    unset($_SESSION['dangnhap']);
    header("Location: Pages/login.php");
}
else
{
    if(!isset($_SESSION['dangnhap'])){
        header("Location: Pages/login.php");
    }
   
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="tmp_css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
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
                        <div class="left__logo">LOGO</div>
                        <div class="left__profile">
                            <div class="left__image"><img src="images/admin.jpg" alt=""></div>
                            <p class="left__name">Quản trị viên</p>
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
                            <!-- <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-book.svg" alt="">Đồ uống<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="models/insert_drink.php">Chèn đồ uống</a>
                                    <a class="left__link" href="view_drink.php">Xem đồ uống</a>
                                </div>
                            </li> -->
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
                                <div class="left__title"><img src="assets/icon-edit.svg" alt="">Tin tức<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
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
                        <input type="text" autocomplete="off" value="" placeholder="Tìm kiếm...">
                        <i class="fa fa-search"></i>
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
                        <p class="right__desc">Xem bình luận</p>
                        <div class="right__table">
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nội dung</th>
                                            <th>Tên SP</th>
                                            <th>ID TK</th>
                                            <th>Xoá</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                    <?php
                                        $i = 0;
                                    while ($row = mysqli_fetch_array($query)) {
                                        $i++;    
                                    ?>
                                        <tr>
                                            <td data-label="STT"><?php echo $i ?></td>
                                            <td data-label="Tiêu đề"><?php echo $row['noidung_bl']; ?></td>
                                            <td data-label="Mô tả"><?php echo $row['ten_doan']; ?></td>
                                            <td data-label="Mô tả"><?php echo $row['id_taikhoan']; ?></td>
                                            <td data-label="Xoá" class="right__iconTable"><a href="models/xuly_binhluan.php?mabinhluan=<?php echo $row['id_bl']; ?>"><img src="assets/icon-trash-black.svg" alt=""></a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>