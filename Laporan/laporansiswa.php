<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik where status='Ya'";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  
        $id_kelas=$row['id_kelas'];
        $id_tahun_akademik=$row['id_tahun_akademik'];
        $data_siswa = mysqli_query($connect,"SELECT * FROM tbl_pemb_kelas where id_kelas='$id_kelas'");
        $jumlah_siswa = mysqli_num_rows($data_siswa);
        $action= "<a class='btn btn-info btn-mini' href='laporan/cetaksiswa.php?id=".$row['id_kelas']."' title='Lihat Absen' target='_blank'><i class='fa fa-list-alt'></i></a>";
        $ta=$row['semester']." ".$row['tahun_akademik'];                    
            $output['data'][] = array(
                $x,
                $row['nama_kelas'],
                $ta,
                $jumlah_siswa,
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    
    case 'hapus':       
        $id_pemb_kelas = $_POST['id'];

        $sql = "DELETE FROM tbl_pemb_kelas WHERE id_pemb_kelas = '$id_pemb_kelas'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
    case 'view_data_siswa':

        $output = array('data' => array());
        $id_kelas = $_POST['id_kelas'];
       
        $sql = "SELECT * FROM tbl_pemb_kelas left join tbl_siswa on tbl_pemb_kelas.id_siswa=tbl_siswa.id_siswa where id_kelas='$id_kelas'";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  
        $action=  "<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_pemb_kelas']." title='hapus'  ><i class='fa fa-trash'></i></button>";
                        
            $output['data'][] = array(
                $x,
                $row['nisn'],
                $row['nama_siswa'],
                $row['jk_siswa'],
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;
    case 'simpan':

        $id_siswa=$_POST['id_siswa'];
        $id_kelas=$_POST['id_kelas'];

        $sql = "INSERT INTO  tbl_pemb_kelas (id_siswa,id_kelas) VALUES ('$id_siswa','$id_kelas')";
        $query = $connect->query($sql);        
        $connect->close();

        echo json_encode($query);
    break;


}
?>