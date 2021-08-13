<?php
include "../connect.php";
    $id = $_GET['madanhmuc'];
    $tendm = $_POST['tendanhmuc'];
    $mota = $_POST['motadanhmuc'];
    if(isset($_POST['themdanhmuc'])){
        $sql_them = "INSERT INTO danh_muc(ten_danhmuc,mota_dm) VALUE ('".$tendm."','".$mota."')";
        mysqli_query($conn, $sql_them) or die ("error");
        header('Location: ../view_danhmuc.php');
    }
    elseif(isset($_POST['suadanhmuc']))
    {
        $sql_update = "UPDATE danh_muc SET ten_danhmuc='".$tendm."',mota_dm='".$mota."' WHERE ma_danhmuc='$id'";
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_danhmuc.php');
    }
    else
     {
        $id = $_GET['madanhmuc'];
        $sql_xoa = "DELETE FROM danh_muc WHERE ma_danhmuc = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_danhmuc.php');
    }
?>