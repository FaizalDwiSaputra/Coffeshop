<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$database = 'fadisa_kopi';
$konek = mysqli_connect($host, $user, $pass, $database);

if(!$konek){
    echo "tidak terhubung";
}
?>