<?php
// $dbhost = "sql312.byethost18.com";
// $dbuser = "b18_26578390";
// $dbpass = "soobin2021";
// $dbname = "b18_26578390_user";
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "tttn_nhahanghq";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($conn)
{
    mysqli_query($conn, "SET NAMES 'utf8'");
}
else
{
    echo "Ban da ket noi that bai !" .mysqli_connect_error();
}
?>