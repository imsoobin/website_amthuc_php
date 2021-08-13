<?php
    include"../connect.php";
    $trangthai = $_POST['trangthai'];
    if(isset($_POST['suadatban']))
    {
        $sql_update = "UPDATE dat_ban SET trang_thai='".$trangthai."' WHERE id_datban ='$id'";
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_datban.php');
    }
    else
     {
        $id = $_GET['iddatban'];
        $sql_xoa = "DELETE FROM dat_ban WHERE id_datban = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_datban');
    }
?>