<?php
    include"../connect.php";
    $id = $_GET['code'];
    $sql = "SELECT * FROM tbl_giohang, tai_khoan WHERE tbl_giohang.id_taikhoan = tai_khoan.id_taikhoan AND code_cart = '".$id."' ORDER BY tbl_giohang.id_cart DESC LIMIT 1";
    $query = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/main.css">
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
                            <div class="left__image"><img src="../images/admin.jpg" alt=""></div>
                            <p class="left__name">Quản trị viên</p>
                        </div>
                        <ul class="left__menu">
                            <li class="left__menuItem">
                                <a href="../index.php" class="left__title"><img src="assets/icon-dashboard.svg" alt="">Trang chủ Admin</a>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-book.svg" alt="">Thực đơn<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_thucdon.php">Chèn thực đơn</a>
                                    <a class="left__link" href="../view_thucdon.php">Xem thực đơn</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-tag.svg" alt="">Sản phẩm<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_product.php">Chèn Sản phẩm</a>
                                    <a class="left__link" href="../view_product.php">Xem Sản phẩm</a>
                                </div>
                            </li>
                            <!-- <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-book.svg" alt="">Đồ uống<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_category.php">Chèn đồ uống</a>
                                    <a class="left__link" href="../view_drink.php">Xem đồ uống</a>
                                </div>
                            </li> -->
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-edit.svg" alt="">Danh Mục SP<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_danhmuc.php">Chèn Danh Mục</a>
                                    <a class="left__link" href="../view_danhmuc.php">Xem Danh Mục</a>
                                </div>
                            </li>
                            <li class="left__menuItem">
                                <div class="left__title"><img src="assets/icon-book.svg" alt="">Tin tức<img class="left__iconDown" src="assets/arrow-down.svg" alt=""></div>
                                <div class="left__text">
                                    <a class="left__link" href="insert_tintuc.php">Chèn tin tức</a>
                                    <a class="left__link" href="../view_tintuc.php">Xem tin tức</a>
                                </div>
                            </li> 
                            <li class="left__menuItem">
                                <a href="../view_datban.php" class="left__title"><img src="assets/icon-check.svg" alt="">Đặt bàn</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="../view_binhluan.php" class="left__title"><img src="assets/icon-email.svg" alt="">Bình luận</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="../view_taikhoan.php" class="left__title"><img src="assets/icon-users.svg" alt="">Tài khoản</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="../view_orders.php" class="left__title"><img src="assets/icon-book.svg" alt="">Đơn Đặt Hàng</a>
                            </li>
                            <!-- <li class="left__menuItem">
                                <a href="edit_css.html" class="left__title"><img src="assets/icon-pencil.svg" alt="">Chỉnh CSS</a>
                            </li> -->
                            
                            <li class="left__menuItem">
                                <a href="" class="left__title"><img src="assets/icon-logout.svg" alt="">Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Chỉnh tài khoản</p>
                        <div class="right__formWrapper">
                            <form method="POST" action="xuly_donhang.php?code=<?php echo $id ?>">
                            <?php
                                while($row = mysqli_fetch_array($query)) {
                            ?>
                                <div class="right__inputWrapper">
                                    <label for="email">Code: <?php echo $row['code_cart']?></label>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="email">Tên tài khoản: <?php echo $row['username']?></label>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="password">Mât khẩu: <?php echo $row['email']?></label>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="password">Họ tên: <?php echo $row['dia_chi']?></label>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="password">Email: <?php echo $row['so_phone']?></label>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="password">Trạng thái </label>
                                    <select name="trangthai" id="">
                                        <option value="OK">OK</option>
                                        <option value="Chưa xử lý">Chưa xử lý</option>
                                    </select>
                                </div>
                                <button class="btn" type="submit" name="suadonhang">Xử lý đơn hàng</button>
                            <?php } ?>     
                                
                               
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>