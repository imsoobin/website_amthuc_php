<?php
    include"../connect.php";
    session_start();
     if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['taikhoan'];
        $pass = md5($_POST['matkhau']);
        $sql = "SELECT * FROM tai_khoan WHERE username = '".$taikhoan."' AND passwordd = '".$pass."' LIMIT 1";
        $row = mysqli_query($conn, $sql);
        while ($test = mysqli_fetch_array($row)){
        if($test['trang_thai'] == "1"){
          $_SESSION['dangnhap'] = $taikhoan;
          header("Location: ../index.php");
          exit;
        }
        else if($test['trang_thai'] == "0"){
          $_SESSION['dangnhap'] = $taikhoan;
          $_SESSION['id_khachhang'] = $test['id_taikhoan'];
          header("Location: layout.php");
          exit;
        }  
        else{
          header("Location: login.php");
        } 
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>


<!-- The Modal -->
<div id="id01" class="modal" style="display: block; height: auto;">
  <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="" method="POST" style="width: 500px; ">
    <div class="imgcontainer">
      <img src="../images/login.png" alt="Avatar" class="avatar" height="150px">
    </div>

    <div class="container">
      <label for="uname"><b>Tài Khoản</b></label>
      <input type="text" placeholder="Enter Username" name="taikhoan" required>

      <label for="psw"><b>Mật khẩu</b></label>
      <input type="password" placeholder="Enter Password" name="matkhau" required>

      <a href=""><button type="submit" name="dangnhap">Đăng nhập</button></a>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    <a href="javascript: history.go(-1)">
      <button type="button" class="cancelbtn">Thoát</button>
    </a>
      <span class="psw">Quên <a href="#">mật khẩu ?</a></span>
    </div>
   
  </form>
</div>
</body>


</html>


