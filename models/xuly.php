<?php
include "../connect.php";
    // $id = $_GET['madoan'];
    $tenfood = $_POST['tenmonan'];
    $imgs = $_FILES['hinhanh']['name'];
    $imgs_tmp = $_FILES['hinhanh']['tmp_name'];
    $imgs = time().'_'.$imgs;
    $price = $_POST['giamonan'];
    $soluong = $_POST['soluongco'];
    $mota = $_POST['motamonan'];
    $madm = 2;
    $iddm = $_POST['idthucdon'];
    if(isset($_POST['themmonan'])){
        $sql_them = "INSERT INTO mon_an(ten_doan,hinh_anh,gia,so_luong, mo_ta, ma_danhmuc, id_thucdon) VALUE ('".$tenfood."','".$imgs."','".$price."','".$soluong."', '".$mota."','".$madm."','".$iddm."')";
        mysqli_query($conn, $sql_them) or die ("error");
        move_uploaded_file($imgs_tmp, 'Uploads/'.$imgs);
        header('Location: ../view_product.php');
    }
    elseif(isset($_POST['suamonan']))
    {
        $id = $_GET['madoan'];
        if($imgs != '')
        {
            move_uploaded_file($imgs_tmp, 'Uploads/'.$imgs);
            $sql = "SELECT * FROM mon_an WHERE ma_doan = '$id' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)){
                unlink('Uploads/'.$row['hinh_anh']);
            }
            $sql_update = "UPDATE mon_an SET ten_doan='".$tenfood."',hinh_anh='".$imgs."',gia='".$price."',mo_ta='".$mota."' WHERE ma_doan='$id'";
            
        }
       else
       {
            $sql_update = "UPDATE mon_an SET ten_doan='".$tenfood."',gia='".$price."',mo_ta='".$mota."' WHERE ma_doan='$id'";
       }
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_product.php');
    }
    else
     {
        $id = $_GET['madoan'];
        $sql = "SELECT * FROM mon_an WHERE ma_doan = '$id'";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query))
        {
            unlink('Uploads/'.$row['hinh_anh']);
        }
        $sql_xoa = "DELETE FROM mon_an WHERE ma_doan = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_product.php');
    }
?>