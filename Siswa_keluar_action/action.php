<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_siswa left join tbl_tahun_akademik on tbl_siswa.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik where status_siswa!='Aktif' ORDER BY tbl_tahun_akademik.id_tahun_akademik ASC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-danger btn-mini batal-data' id='id' data-toggle='modal' data-id=".$row['id_siswa']." title='Batlkan'  ><i class='fa fa-reply'></i></button>";
                        
            $ttl_siswa=$row['tempat_lahir_siswa'].", ".$row['tanggal_lahir_siswa'];
            $alasn=$row['alasan_keluar']." ".$row['nomor_ijazah'];

            $output['data'][] = array(
                $x,
                $row['nama_siswa'],
                $row['nisn'],
                $ttl_siswa,
                $row['status_siswa'],
                $alasn,
                $action
            );


            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $id_siswa=$_POST['id_siswa'];
        $status_siswa=$_POST['status_siswa'];
        $alasan_keluar=$_POST['alasan_keluar'];
        $nomor_ijazah=$_POST['nomor_ijazah'];
        $tanggal_keluar=$_POST['tanggal_keluar'];
            
        $sql = "UPDATE tbl_siswa SET status_siswa='$status_siswa',
                                    alasan_keluar='$alasan_keluar',
                                    nomor_ijazah='$nomor_ijazah',
                                    tanggal_keluar='$tanggal_keluar'
                                    WHERE id_siswa = '$id_siswa'";
        $data = $connect->query($sql);
        $connect->close();

        echo json_encode($query);
    break;

   
    case 'batal':       
        $id_siswa = $_POST['id'];
        $status_siswa="Aktif";
        $alasan_keluar="";
        $nomor_ijazah="";
        $tanggal_keluar="";
        $sql = "UPDATE tbl_siswa SET status_siswa='$status_siswa',
                                    alasan_keluar='$alasan_keluar',
                                    nomor_ijazah='$nomor_ijazah',
                                    tanggal_keluar='$tanggal_keluar'
                                    WHERE id_siswa = '$id_siswa'";
        $data = $connect->query($sql);   
        $connect->close();

        echo json_encode($data);
    break;
}
?>