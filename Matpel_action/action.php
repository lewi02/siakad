<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_matpel";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini ubah-data' data-toggle='modal' data-id=".$row['id_matpel']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_matpel']." title='hapus'  ><i class='fa fa-trash'></i></button>";
                        
            $output['data'][] = array(
                $x,
                $row['nama_matpel'],
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $nama_matpel=$_POST['nama_matpel'];

        $sql = "INSERT INTO  tbl_matpel (nama_matpel) VALUES ('$nama_matpel')";
        $query = $connect->query($sql);        
        $connect->close();

        echo json_encode($query);
    break;

    case 'edit':

            $id = $_POST['id_matpel_ubah'];
            $nama_matpel=$_POST['nama_matpel_ubah'];

            $sql = "UPDATE tbl_matpel SET nama_matpel='$nama_matpel' WHERE id_matpel = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;

    case 'hapus':       
        $id_matpel = $_POST['id'];

        $sql = "DELETE FROM tbl_matpel WHERE id_matpel = '$id_matpel'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
}
?>