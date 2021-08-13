<?php
include "../connect.php";
    $id = $_GET['code'];
    $trangthai = $_POST['trangthai'];
    if(isset($_POST['suadonhang']))
    {
        $sql_update = "UPDATE tbl_giohang SET cart_staus='".$trangthai."' WHERE code_cart ='$id'";
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_orders.php');
    }
?>