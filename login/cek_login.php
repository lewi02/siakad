<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include "../include/db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$cek_kode = mysqli_query($connect,"select * from tbl_login where username='$username' and password='$password'");
$row = mysqli_fetch_row($cek_kode);
if($row > 0){    
	$sql = "select * from tbl_login where username='$username' and password='$password'";
    $query = $connect->query($sql);
    $result = $query->fetch_assoc();

	$_SESSION['username'] = $username;
	$_SESSION['level'] = $result['level'];
	$_SESSION['nama_lengkap'] = $result['nama_lengkap'];
	echo json_encode(array(
        'status' => 0
    ));
}else{
    echo json_encode(array(
        'status' => 1
    ));
}

?>