<?php
include"../connect.php";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $Search = $_POST['search'];
        $sql_tv = "SELECT * FROM mon_an WHERE ten_doan like '%".$Search."%' LIMIT 15";
        $result_tv = mysqli_query($conn, $sql_tv); 
        if(mysqli_num_rows($result_tv)){
            while($row = mysqli_fetch_assoc($result_tv)){
                echo'<a href="#" style="color: #111; font-size: 14px;">'.$row["ten_doan"].'<br/></a>';
            }
        }
        else{
            echo'Không tìm thấy kết quả';
        }
    }
?>