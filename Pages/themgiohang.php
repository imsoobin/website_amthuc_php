<?php
    session_start();
    include"../connect.php";

    //xoa tat ca sp
    if(isset($_GET['xoatatca']) && $_GET['xoatatca'] == 1){
        unset($_SESSION['cart']);
        header('Location: giohang.php');
    }
    //xoa tung san pham
    if(isset($_SESSION['cart']) && isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['madoan'] != $id){
                $product[] = array(
                'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'], 'soluong' => $cart_item['soluong'],
                'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
            } 
            $_SESSION['cart'] = $product;
            header('Location: giohang.php');
        }
    }
    //tang so luong
    if(isset($_GET['cong'])){
        $id = $_GET['cong'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['madoan'] != $id){
                $product[] = array(
                'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'],'soluong' => $cart_item['soluong'],
                'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                $_SESSION['cart'] = $product;
            }
            else{
                $tang = $cart_item['soluong'] + 1;
                if($cart_item['soluong'] <= 9){
                    
                    $product[] = array(
                    'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'],'soluong' => $tang,
                    'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                }
                else{
                    $product[] = array(
                    'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'],'soluong' => $cart_item['soluong'],
                    'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location: giohang.php');
    }
    //giam so luong

    if(isset($_GET['tru'])){
        $id = $_GET['tru'];
        foreach($_SESSION['cart'] as $cart_item){
            if($cart_item['madoan'] != $id){
                $product[] = array(
                'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'],'soluong' => $cart_item['soluong'],
                'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                $_SESSION['cart'] = $product;
            }
            else{
                $tang = $cart_item['soluong'] - 1;
                if($cart_item['soluong'] > 1){
                    
                    $product[] = array(
                    'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'],'soluong' => $tang,
                    'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                }
                else{
                    $product[] = array(
                    'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'],'soluong' => $cart_item['soluong'],
                    'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                }
                $_SESSION['cart'] = $product;
            }
        }
        header('Location: giohang.php');
    }

    if(isset($_POST['themgiohang'])){
        // session_destroy();
        $id = $_GET['madoan']; 
        $soluong = $_POST['soluongdat'];
        $sql = "SELECT * FROM mon_an WHERE ma_doan = '".$id."' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($query);
        if($row){
            $new_monan = array(array('tendoan' => $row['ten_doan'], 'madoan' => $id, 'soluong' => $soluong,
            'giadoan' => $row['gia'], 'hinhanh' => $row['hinh_anh']));
            //ktra sesstion ton tai hay chua
            if(isset($_SESSION['cart'])){
                $found = false;
                foreach($_SESSION['cart'] as $cart_item){
                    if($cart_item['madoan'] == $id){
                        $product[] = array(
                            'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'],'soluong' => $cart_item['soluong']+1,
                            'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                        $found = true;
                    }
                    else{
                        $product[] = array(
                            'tendoan' => $cart_item['tendoan'], 'madoan' => $cart_item['madoan'], 'soluong' => $cart_item['soluong'],
                            'giadoan' => $cart_item['giadoan'], 'hinhanh' => $cart_item['hinhanh']);
                    }
                }
                if($found == false){
                    $_SESSION['cart'] = array_merge($product, $new_monan);
                }
                else{
                    $_SESSION['cart'] = $product;
                }
            }
            else{
                $_SESSION['cart'] = $new_monan;
            } 
        }
        header('Location: giohang.php');
    }
    
?>