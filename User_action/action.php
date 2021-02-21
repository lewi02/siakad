<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_login";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini reset-data' data-toggle='modal' data-id=".$row['id_login']." title='Reset Password'><i class='fa fa-key'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_login']." title='hapus'  ><i class='fa fa-trash'></i></button>";
            $output['data'][] = array(
                $x,
                $row['username'],
                $row['password'],
                $row['nama_lengkap'],
                $row['level'],
                $action
            );
          
            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

   
    case 'reset':

        $id = $_POST['id'];
        $password="123456";
       
        $sql = "UPDATE tbl_login SET password='$password' WHERE id_login = $id";
        $data = $connect->query($sql);

     
        $connect->close();

        echo json_encode($data);
    break;

    case 'hapus':       
        $id_login = $_POST['id'];

        $sql = "DELETE FROM tbl_login WHERE id_login = '$id_login'";
        $data = $connect->query($sql);

        $connect->close();

        echo json_encode($data);
    break;
}
?>