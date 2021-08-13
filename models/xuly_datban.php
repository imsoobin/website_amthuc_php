
<?php
include "../connect.php";
    
    if(isset($_POST['datban'])){
    $hoten = $_POST['hoten'];
    $sodt = $_POST['sodienthoai'];
    $soluong = $_POST['soluong'];
    $ghichu = $_POST['ghichu'];
    $trangthai = "Chưa xử lý";
    $madm = 5;
        $sql_them = "INSERT INTO dat_ban (ho_ten,so_dienthoai, so_luong, ghi_chu, trang_thai, ma_danhmuc) VALUE (
        '".$hoten."','".$sodt."','".$soluong."','".$ghichu."','".$trangthai."','".$madm."')";
        mysqli_query($conn, $sql_them) or die ("error");
        echo"<script>alert('Đặt bàn thành công !Cảm ơn quý khách đã ủng hộ')</script>";
        header('Location: ../Pages/camon.php');
    }
    elseif(isset($_POST['suadatban'])){ 
        $id = $_GET['iddatban'];
        $trangthai1 = $_POST['trangthai'];
        $sql_update = "UPDATE dat_ban SET trang_thai='".$trangthai1."' WHERE id_datban ='$id'";
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_datban.php');
    }
    else
    {
        $id = $_GET['iddatban'];
        $sql_xoa = "DELETE FROM dat_ban WHERE id_datban = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_datban.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    
</body>
</html>