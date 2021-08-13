<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="hieuung.css">
     <link rel="stylesheet" href="../fontawesome-free-5.11.2-web/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<style>
    body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: snow;
    }
    p{
        font-size: 40px;
        text-transform: uppercase;
        font-weight: 600;
        padding: 50px;
        color: green;
        text-align: center;
    }
    .duoi{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .duoi button{
        padding: 10px 30px 10px 30px;
        border: 1px solid rgba(0,0,0,0.4);
        outline: none;
        font-weight: 600;
        text-transform: uppercase;
        color: green;background-color: #fff;
        border-radius: 10px;
    }
    .duoi button:hover{
        cursor: pointer;
        background-color: green;
        color: #fff;
    } 
    
</style>
<body class="preloading">
<div class="loader" id="preload">
      <span class="fas fa-spinner preload-icon rotating"></span>
</div>
<div class="container">
    <div>
        <p>Đặt bàn thành công <br/> Cảm ơn quý khách đã quan tâm đến nhà hàng Doplan</p>
    </div>
    <div class="duoi">
        <a href="javascript: history.go(-1)" style="margin: 0 50px 0 0;">
        <button>Quay lại</button>
    </a>
        <button onclick="muahang();">Đánh giá "TỐT"</button>
    </div>
</div>
</body>
<script>
    function muahang(){
        swal("Good job!", "Cảm ơn vì bài đánh giá này!", "success");
    }
</script> 

<script>
    $(window).on('load', function(event) {
   $('body').removeClass('preloading');
      // $('.load').delay(1000).fadeOut('fast');
   $('.loader').delay(800).fadeOut('fast');
});
</script>
</html>
