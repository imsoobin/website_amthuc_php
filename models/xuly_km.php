<?php
include "../connect.php";
    $id = $_GET['idthucdon'];
    $tensp = $_POST['tensanpham'];
    $madm = 1;
    if(isset($_POST['themthucdon'])){
        $sql_them = "INSERT INTO thuc_don(ten_sp, ma_danhmuc) VALUE (
            '".$tensp."','".$madm."'
        )";
        mysqli_query($conn, $sql_them) or die ("error");
        header('Location: ../view_thucdon.php');
    }
    elseif(isset($_POST['suathucdon']))
    {
        $sql_update = "UPDATE thuc_don SET ten_sp = '".$tensp."' WHERE id_thucdon ='$id'";
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_thucdon.php');
    }
    else
     {
        $id = $_GET['idthucdon'];
        $sql_xoa = "DELETE FROM thuc_don WHERE id_thucdon = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_thucdon.php');
    }
?>