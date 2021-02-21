<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_siswa_baru ORDER BY tanggal_daftar DESC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  
            $status= $row['status_daftar'];
            if($status==2){
                $status_daftar = "Lulus";
            }else if($status==3){
                $status_daftar = "Tidak Lulus";
            }else{
                $status_daftar = "Belum Validasi";
            }
            $action= "<button class='btn btn-info btn-mini validasi-data' data-toggle='modal' data-id=".$row['id_siswa']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".'  '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_siswa']." title='hapus'  ><i class='fa fa-trash'></i></button>";
             $output['data'][] = array(
                $x,
                $row['nama_siswa'],
                $row['nisn'],
                $row['email_siswa'],
                $row['tempat_lahir_siswa'],
                $row['tanggal_lahir_siswa'],
                $row['jk_siswa'],
                $row['agama_siswa'],
                $row['nohp_siswa'],
                $row['alamat_siswa'],
                $row['desa'],
                $row['kecamatan'],
                $row['nama_ayah'],
                $row['pekerjaan_ayah'],
                $row['pendidikan_ayah'],
                $row['nama_ibu'],
                $row['pekerjaan_ibu'],
                $row['pendidikan_ibu'],
                $row['nama_wali'],
                $row['pekerjaan_wali'],
                $status_daftar,
                $row['tanggal_daftar'],
                $row['nomor_ijazah'],
                $row['asal_sekolah'],
                $row['nilai_akhir'],
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;
    case 'view_data_valid':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_siswa_baru where status_daftar = '2' ORDER BY tanggal_daftar DESC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  
            $status= $row['status_daftar'];
            if($status==2){
                $status_daftar = "Lulus";
            }else if($status==3){
                $status_daftar = "Tidak Lulus";
            }else{
                $status_daftar = "Belum Validasi";
            }
            $action= "<button class='btn btn-info btn-mini validasi-data' data-toggle='modal' data-id=".$row['id_siswa']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".'  '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_siswa']." title='hapus'  ><i class='fa fa-trash'></i></button>";
             $output['data'][] = array(
                $x,
                $row['nama_siswa'],
                $row['nisn'],
                $row['email_siswa'],
                $row['tempat_lahir_siswa'],
                $row['tanggal_lahir_siswa'],
                $row['jk_siswa'],
                $row['agama_siswa'],
                $row['nohp_siswa'],
                $row['alamat_siswa'],
                $row['desa'],
                $row['kecamatan'],
                $row['nama_ayah'],
                $row['pekerjaan_ayah'],
                $row['pendidikan_ayah'],
                $row['nama_ibu'],
                $row['pekerjaan_ibu'],
                $row['pendidikan_ibu'],
                $row['nama_wali'],
                $row['pekerjaan_wali'],
                $status_daftar,
                $row['tanggal_daftar'],
                $row['nomor_ijazah'],
                $row['asal_sekolah'],
                $row['nilai_akhir'],
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $nama_siswa=$_POST['nama_siswa'];
        $nisn=$_POST['nisn'];
        $email_siswa=$_POST['email_siswa'];
        $tempat_lahir_siswa=$_POST['tempat_lahir_siswa'];
        $tanggal_lahir_siswa=$_POST['tanggal_lahir_siswa'];
        $jk_siswa=$_POST['jk_siswa'];
        $agama_siswa=$_POST['agama_siswa'];
        $nohp_siswa=$_POST['nohp_siswa'];
        $alamat_siswa=$_POST['alamat_siswa'];
        $desa=$_POST['desa'];
        $kecamatan=$_POST['kecamatan'];
        $nama_ayah=$_POST['nama_ayah'];
        $pekerjaan_ayah=$_POST['pekerjaan_ayah'];
        $pendidikan_ayah=$_POST['pendidikan_ayah'];
        $nama_ibu=$_POST['nama_ibu'];
        $pekerjaan_ibu=$_POST['pekerjaan_ibu'];
        $pendidikan_ibu=$_POST['pendidikan_ibu'];
        $nama_wali=$_POST['nama_wali'];
        $pekerjaan_wali=$_POST['pekerjaan_wali'];
        $tanggal_daftar=date("Y-m-d H:i:s");
        $status_daftar="1";
        $nomor_ijazah=$_POST['nomor_ijazah'];
        $asal_sekolah=$_POST['asal_sekolah'];
        $nilai_akhir=$_POST['nilai_akhir'];
        
        $sql = "INSERT INTO tbl_siswa_baru (nama_siswa,nisn,email_siswa,tempat_lahir_siswa,tanggal_lahir_siswa,jk_siswa,agama_siswa,nohp_siswa,alamat_siswa,desa,kecamatan,nama_ayah,pekerjaan_ayah,pendidikan_ayah,nama_ibu,pekerjaan_ibu,pendidikan_ibu,nama_wali,pekerjaan_wali,tanggal_daftar,nomor_ijazah,asal_sekolah,nilai_akhir,status_daftar) VALUES ('$nama_siswa','$nisn','$email_siswa','$tempat_lahir_siswa','$tanggal_lahir_siswa','$jk_siswa','$agama_siswa','$nohp_siswa','$alamat_siswa','$desa','$kecamatan','$nama_ayah','$pekerjaan_ayah','$pendidikan_ayah','$nama_ibu','$pekerjaan_ibu','$pendidikan_ibu','$nama_wali','$pekerjaan_wali','$tanggal_daftar','$nomor_ijazah','$asal_sekolah','$nilai_akhir','$status_daftar')";
        $query = $connect->query($sql);
        $connect->close();

        echo json_encode($query);
    break;
    case 'hapus':       
        $id_siswa = $_POST['id'];

        $sql = "DELETE FROM tbl_siswa_baru WHERE id_siswa = '$id_siswa'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
    case 'lulus':       
        $id_siswa = $_POST['id'];
        $status_daftar = 2;

        $sql = "UPDATE tbl_siswa_baru SET status_daftar='$status_daftar' WHERE id_siswa = $id_siswa";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
    case 'tidak_lulus':       
        $id_siswa = $_POST['id'];
        $status_daftar = 3;

        $sql = "UPDATE tbl_siswa_baru SET status_daftar='$status_daftar' WHERE id_siswa = $id_siswa";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
}
?>