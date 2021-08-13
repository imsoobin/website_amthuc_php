<?php
    if($_GET['madanhmuc'] == '2')
    {
        header('Location: layout_doan.php');
    }
    elseif($_GET['madanhmuc'] == '4'){
        header('Location: tintuc.php');
    }
    elseif($_GET['madanhmuc'] == '5'){
        header('Location: datban.php');
    }
    else{   
        header('Location: khuyen_mai.php');
    }
?>