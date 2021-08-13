<?php
include"../connect.php";
if(isset($_POST['capnhat'])){
    $taikhoan = $_POST['tentaikhoan'];
    $mkcu = md5($_POST['matkhaucu']);
    $mkmoi = md5($_POST['matkhaumoi']);
    $sql =  "SELECT * FROM tai_khoan WHERE username = '".$taikhoan."' AND passwordd = '".$mkcu."' LIMIT 1";
    $row = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($row);
    if($count >= 1){
        $sql_update = mysqli_query($conn, "UPDATE tai_khoan SET username = '".$taikhoan."', passwordd = '".$mkmoi."' LIMIT 1");
        echo "Mật khẩu đã được thay đổi";
    }
    else{
        echo "Tài khoản hoặc mật khẩu không đúng";
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

<!-- <button onclick="document.getElementById('id01').style.display='block'">Đăng kí tài khoản</button> -->

<!-- The Modal -->
<div id="id01" class="modal" style="display: block;">
  <!-- <span onclick="document.getElementById('id01').style.display='none'"
class="close" title="Close Modal">&times;</span> -->

  <!-- Modal Content -->
  <form class="modal-content animate" action="" method="POST" enctype="multipart/form-data">
    <p style="text-transform: uppercase; margin-left: 20px; font-weight: 600; font-family:sans-serif; letter-spacing: 1px;" >
       Đổi mật khẩu
    </p>
    <div class="container" style="display: block;">
        <label  for="psw"><b>Tên tài khoản:</b></label>
        <input type="text" placeholder="Enter username" name="tentaikhoan" required>

      <label for="psw"><b>Mật khẩu cũ</b></label>
      <input type="text" placeholder="Enter Password" name="matkhaucu" required>
     

      <label for="psw"><b>Mật khẩu mới</b></label>
      <input type="text" placeholder="Enter new password" name="matkhaumoi" required>
      
    
      <button type="submit" name="capnhat">Cập nhật</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
<a href="javascript: history.go(-1)">
<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Trở lại</button>
</a>
      
    </div> 
    
  </form>
</div>
</body>
<script>

</script>
</html>