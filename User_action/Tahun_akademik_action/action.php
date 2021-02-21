<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_tahun_akademik";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini ubah-data' data-toggle='modal' data-id=".$row['id_tahun_akademik']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_tahun_akademik']." title='hapus'  ><i class='fa fa-trash'></i></button>";
                        
            $output['data'][] = array(
                $x,
                $row['tahun_akademik'],
                $row['semester'],
                $row['status'],
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $tahun_akademik=$_POST['tahun_akademik'];
        $semester=$_POST['semester'];
        $status=$_POST['status'];

        $sql = "INSERT INTO  tbl_tahun_akademik (tahun_akademik,semester,status) VALUES ('$tahun_akademik','$semester','$status')";
        $query = $connect->query($sql);        
        $connect->close();

        echo json_encode($query);
    break;

    case 'edit':

            $id = $_POST['id_tahun_akademik'];
            $tahun_akademik=$_POST['edittahun_akademik'];
            $semester=$_POST['editsemester'];
            $status=$_POST['editstatus'];

            $sql = "UPDATE tbl_tahun_akademik SET tahun_akademik='$tahun_akademik',semester='$semester',status='$status' WHERE id_tahun_akademik = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;

    case 'hapus':       
        $id_tahun_akademik = $_POST['id'];

        $sql = "DELETE FROM tbl_tahun_akademik WHERE id_tahun_akademik = '$id_tahun_akademik'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
}
?>