<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik order by id_kelas DESC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini ubah-data' data-toggle='modal' data-id=".$row['id_kelas']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_kelas']." title='hapus'  ><i class='fa fa-trash'></i></button>";
            $ta=$row['semester']." ".$row['tahun_akademik'];            
            $output['data'][] = array(
                $x,
                $row['nama_kelas'],
                $ta,
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $nama_kelas=$_POST['nama_kelas'];
        $id_tahun_akademik=$_POST['id_tahun_akademik'];

        $sql = "INSERT INTO  tbl_kelas (nama_kelas,id_tahun_akademik) VALUES ('$nama_kelas','$id_tahun_akademik')";
        $query = $connect->query($sql);        
        $connect->close();

        echo json_encode($query);
    break;

    case 'edit':

            $id = $_POST['id_kelas_ubah'];
            $nama_kelas=$_POST['nama_kelas_ubah'];
            $id_tahun_akademik=$_POST['id_tahun_akademik_ubah'];

            $sql = "UPDATE tbl_kelas SET nama_kelas='$nama_kelas',id_tahun_akademik='$id_tahun_akademik' WHERE id_kelas = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;

    case 'hapus':       
        $id_kelas = $_POST['id'];

        $sql = "DELETE FROM tbl_kelas WHERE id_kelas = '$id_kelas'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
}
?>