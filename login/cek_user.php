<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include "../include/db_connect.php";

$username = $_POST['username'];

$cek_kode = mysqli_query($connect,"select * from tbl_login where username='$username'");
$row = mysqli_fetch_row($cek_kode);
if($row > 0){    
    echo json_encode(array(
        'status' => 0
    ));
}else{
    echo json_encode(array(
        'status' => 1
    ));
}

?>