<?php
    include"../connect.php";
    if(isset($_POST['themkhuyenmai'])){
        $tieude = $_POST['tieude'];
        $tensp = $_POST['tensanpham'];
        $apdung = $_POST['apdung'];
        $madm = 6;
        $sql_them = "INSERT INTO khuyen_mai(tieu_de,ten_sanpham,ap_dung, ma_danhmuc) VALUE ('".$tieude."','".$tensp."','".$apdung."','".$madm."')";
        mysqli_query($conn, $sql_them) or die ("error");
        header('Location: ../view_khuyenmai.php');
    }
    elseif(isset($_POST['suakhuyenmai']))
    {
        $id = $_GET['idkhuyenmai'];
        $tieude = $_POST['tieude'];
        $tensp = $_POST['tensanpham'];
        $apdung = $_POST['apdung'];
        $sql_update = "UPDATE khuyen_mai SET tieu_de='".$tieude."',ten_sanpham='".$tensp."',ap_dung='".$apdung."' WHERE id_khuyenmai='$id'";
        mysqli_query($conn, $sql_update) or die ("error");
         header('Location: ../view_khuyenmai.php');
    }
    else
     {
        $id = $_GET['idkhuyenmai'];
        $sql_xoa = "DELETE FROM khuyen_mai WHERE id_khuyenmai = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_khuyenmai.php');
    }
?>