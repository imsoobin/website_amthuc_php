<?php
include "../connect.php";
    // $id = $_GET['madoan'];
    $imgs = $_FILES['hinhanh']['name'];
    $imgs_tmp = $_FILES['hinhanh']['tmp_name'];
    $imgs = time().'_'.$imgs;
    $tieude = $_POST['tieude'];
    $noidung = $_POST['noidung'];
    $madm = 4;
    if(isset($_POST['themtintuc'])){
        $sql_them = "INSERT INTO tin_tuc (hinh_anh,tieude_tintuc,noi_dung, ma_danhmuc) VALUE ('".$imgs."','".$tieude."','".$noidung."','".$madm."')";
        mysqli_query($conn, $sql_them) or die ("error");
        move_uploaded_file($imgs_tmp, 'Uploads/'.$imgs);
        header('Location: ../view_tintuc.php');
    }
    if(isset($_POST['suatintuc']))
    {
        $id = $_GET['idtintuc'];
        if($imgs != '')
        {
            move_uploaded_file($imgs_tmp, 'Uploads/'.$imgs);
            $sql = "SELECT * FROM tin_tuc WHERE id_tintuc = '$id' LIMIT 1";
            $query = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($query)){
                unlink('Uploads/'.$row['hinh_anh']);
            }
            $sql_update = "UPDATE tin_tuc SET hinh_anh='".$imgs."',tieude_tintuc='".$tieude."',noi_dung='".$noidung."' WHERE id_tintuc='$id'";
            
        }
        else
        {
            $sql_update = "UPDATE mon_an SET hinh_anh='".$imgs."', tieude_tintuc='".$tieude."',noi_dung='".$noidung."' WHERE id_tintuc='$id'";
        }
        mysqli_query($conn, $sql_update) or die ("error");
        header('Location: ../view_tintuc.php');
    }
    else
     {
        $id = $_GET['idtintuc'];
        $sql = "SELECT * FROM tuc_tuc WHERE id_tintuc = '$id'";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query))
        {
            unlink('Uploads/'.$row['hinh_anh']);
        }
        $sql_xoa = "DELETE FROM tin_tuc WHERE id_tintuc = '".$id."'";
        mysqli_query($conn, $sql_xoa);
        header('Location: ../view_tintuc.php');
    }
?>