<?php
    include "../connect.php";
    $sql_sua = "SELECT * FROM danh_muc WHERE ma_danhmuc='$_GET[madanhmuc]' LIMIT 1";
    $query_sua = mysqli_query($conn, $sql_sua);
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
                                <a href="../index.php" class="left__title"><img src="assets/icon-dashboard.svg" alt="">Trang chủ Admin </a>
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
                                <a href="../view_taikhoan.html" class="left__title"><img src="assets/icon-users.svg" alt="">Khách Hàng</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="../view_orders.html" class="left__title"><img src="assets/icon-book.svg" alt="">Đơn Đặt Hàng</a>
                            </li>
                            <li class="left__menuItem">
                                <a href="" class="left__title"><img src="assets/icon-logout.svg" alt="">Đăng Xuất</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Chỉnh sửa danh mục</p>
                        <div class="right__formWrapper">
                            <form action="xuly_dm.php?madanhmuc=<?php echo $_GET['madanhmuc'] ?>" method="POST" enctype="multipart/form-data">
                            <?php
                                while($row = mysqli_fetch_array($query_sua)) {
                            ?>
                                <div class="right__inputWrapper">
                                    <label for="title">Tên danh mục</label>
                                    <input type="text" value="<?php echo $row['ten_danhmuc'] ?>" name="tendanhmuc"/>
                                </div>
                                <div class="right__inputWrapper">
                                    <label for="desc">Mô tả</label>
                                    <textarea name="motadanhmuc" id="" cols="30" rows="10"><?php echo $row['mota_dm'] ?></textarea>
                                </div>
                                    <button type="submit" class="btn" name="suadanhmuc">Cập nhật</button>
                                <?php
                                    }
                                ?>
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