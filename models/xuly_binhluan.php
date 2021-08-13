<?php 
    include"../connect.php";
    session_start();
   if(isset($_POST['binhluan'])){
       $noiddung =  $_POST['vietbinhluan'];
       $id = $_GET['madoan'];
       $id_khachhang = $_SESSION['id_khachhang'];
       $sql = "INSERT INTO binh_luan (noidung_bl, ma_doan, id_taikhoan) VALUE ('".$noiddung."','".$id."','".$id_khachhang."')";
       $quey = mysqli_query($conn, $sql);
       echo'<script>alert("Cảm ơn quý khách đã quan tâm")</script>';
       header('Location: ../Pages/camon_3.php');
   }
   else{
       $idd = $_GET['mabinhluan'];
       $sql_xoa = "DELETE FROM binh_luan WHERE id_bl = '".$idd."'";
       mysqli_query($conn, $sql_xoa);
       header('Location: ../view_binhluan.php');
   }
?>