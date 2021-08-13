<?php
include"../connect.php";
  $sql_tk = "SELECT * FROM tai_khoan WHERE username = '$_GET[username]' LIMIT 1";
  $query_tk = mysqli_query($conn, $sql_tk);
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
  <form class="modal-content animate" action="update_tk.php" method="POST" enctype="multipart/form-data">
    <p style="text-transform: uppercase; margin-left: 20px; font-weight: 600; font-family:sans-serif; letter-spacing: 1px;" >
       Thông tin tài khoản
    </p>
    <?php 
      while($row = mysqli_fetch_array($query_tk)){
    ?>
    <div class="container" style="display: block;">
      <label for="uname"><b>Tên tài Khoản </b>
        <p><?php echo $row['username'] ?></p>
      </label>
      <!-- <input type="text" placeholder="Enter Username" name="taikhoankh" required> -->
      <label for="psw"><b>Họ tên</b></label>
      <!-- <input type="text" placeholder="Enter Password" name="hoten" required> -->
      <p><?php echo $row['ho_ten'] ?></p>

      <label for="psw"><b>Email</b></label>
      <!-- <input type="text" placeholder="Enter email" name="emailkh" required> -->
      <p><?php echo $row['email'] ?></p>

      <label for="psw"><b>Địa chỉ</b></label>
      <!-- <input type="text" placeholder="Enter address" name="diachikh" required> -->
      <p><?php echo $row['dia_chi'] ?></p>

      <label for="psw"><b>Số điện thoại</b></label>
      <!-- <input type="text" placeholder="Enter phone number" name="sodienthoai" required> -->
      <p><?php echo $row['so_phone'] ?></p>
  
    <!-- <button type="submit" name="thaydoi">Thay đổi mật khẩu</button> -->
 
    </div>
  <?php }?>
<div class="container" style="background-color:#f1f1f1">
<a href="javascript: history.go(-1)">
<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Trở lại</button>
</a>
      
    </div> 
    
  </form>
</div>
</body>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</html>