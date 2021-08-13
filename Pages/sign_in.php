<?php
session_start();
include"../connect.php";
    if(isset($_POST['dangky'])){
        $ten_tk = $_POST['taikhoankh'];
        $matkhau_tk = md5($_POST['matkhaukh']);
        $hoten = $_POST['hoten'];
        $email_tk = $_POST['emailkh'];
        $diachi = $_POST['diachikh'];
        $sodt_tk = $_POST['sodienthoai'];
        $psss = $_POST['matkhaukh'];
    //ktra ton tai   
        $sql = "SELECT * FROM tai_khoan WHERE username = '$ten_tk'";
        $check = mysqli_query($conn, $sql);
        if(mysqli_num_rows($check) > 0){
            echo "Tài khoản này đã tồn tại <a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
            
        }
        // if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[0-9]).*$#", $matkhau_tk)){
        //   echo "Your password is bad <a href='javascript: history.go(-1)'>Trở lại</a>.<br/>";
        //   exit;
        // }
          if(strlen($psss) < 6){
            echo "Mật khẩu của bạn phải có ít nhất 6 ký tự trở lên<a href='javascript: history.go(-1)'>Trở lại</a>";
            exit;
          }
        //ktra email
        if(!mb_ereg("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email_tk)){
          echo "<b>Email này không hợp lệ. Vui long nhập email khác.</b> <a href='javascript: history.go(-1)'>Trở lại</a>";
          exit;
        }
        //cho phép đăng ký
        else{
            $trangthai = 0;
            $sql = mysqli_query($conn, "INSERT INTO tai_khoan(username, passwordd, ho_ten, email, dia_chi, so_phone, trang_thai) VALUE(
                '".$ten_tk."','".$matkhau_tk."','".$hoten."','".$email_tk."','".$diachi."','".$sodt_tk."','".$trangthai."')");
            echo "<h2>Đăng ký thành công</h2><a href='main_layout.php'>Let's go</a>";
            
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="id01" class="modal" style="display: block; height: auto;">
<span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>
  <!-- Modal Content -->
  <form class="modal-content animate" action="" method="POST" enctype="multipart/form-data" style="width: 600px; margin-top: -50px;"> 
  <div class="container">
      <label for="uname"><b>Tên tài Khoản</b></label>
      <input type="text" placeholder="Enter Username" name="taikhoankh" required>

      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Enter Password" name="matkhaukh" id="password"required >

      <label for="psw"><b>Họ tên</b></label>
      <input type="text" placeholder="Enter Password" name="hoten" required>

      <label for="psw"><b>Email</b></label>
      <input type="text" placeholder="Enter email" name="emailkh" id="email" required>

      <label for="psw"><b>Địa chỉ</b></label>
      <input type="text" placeholder="Enter address" name="diachikh" >

      <label for="psw"><b>Số điện thoại</b></label>
      <input type="text" placeholder="Enter phone number" name="sodienthoai"  required>

      <button type="submit" name="dangky" >Đăng ký</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Nhớ tài khoản này
      </label>
    </div>
 
    <div class="container" style="background-color:#f1f1f1">
    <a href="javascript: history.go(-1)">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Thoát</button>
    </a>
      
      <span class="psw">Quên<a href="#">Mật khẩu?</a></span>
    </div> 
    
  </form>
</div>

  
</body>
<!-- <script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script> -->
</html>