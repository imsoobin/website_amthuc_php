<?php
include "../connect.php";
    $id = $_GET['mataikhoan'];
    $trangthai = $_POST['trangthai'];
    if(isset($_POST['suataikhoan']))
    {
        $sql_update = "UPDATE tai_khoan SET trang_thai='".$trangthai."' WHERE id_taikhoan ='$id'";
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_taikhoan.php');
    }
    else
     {
        $id = $_GET['mataikhoan'];
        $sql_xoa = "DELETE FROM tai_khoan WHERE id_taikhoan = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_taikhoan.php');
    }
?>