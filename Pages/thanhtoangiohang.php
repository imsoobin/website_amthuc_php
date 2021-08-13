<?php 
    include"../connect.php";
    session_start();
    $id_khach = $_SESSION['id_khachhang'];
    $code_order = rand(0, 9999);
    $insert_cart = "INSERT INTO tbl_giohang (id_taikhoan, code_cart, cart_staus) VALUE('".$id_khach."','".$code_order."','Chưa xử lý')";
    $cart_query = mysqli_query($conn,$insert_cart);
    if($cart_query){
        //them vao tbl gio hang chi tiet
        foreach($_SESSION['cart'] as $key => $value){
            
            $id_doan = $value['madoan'];
            $soluong = $value['soluong'];
            $insert_details = "INSERT INTO tbl_giohang_chitiet(code_cart, ma_doan, soluong_mua) VALUE('".$code_order."','".$id_doan."','".$soluong."')";
            mysqli_query($conn, $insert_details);
        }
    }
    
    if(isset($_SESSION['cart'])){
        foreach($_SESSION['cart'] as $cart_item){
            $id = $cart_item['madoan'];
            $slmua = $cart_item['soluong'];
            $sql_update = "UPDATE mon_an SET so_luong = so_luong - '".$slmua."' WHERE ma_doan ='$id'";
            mysqli_query($conn, $sql_update) or die ("error");
           
        }
    }
    unset($_SESSION['cart']);
    header('Location: camon_2.php');
?>