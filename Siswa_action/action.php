<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_siswa left join tbl_tahun_akademik on tbl_siswa.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik ORDER BY tbl_tahun_akademik.id_tahun_akademik ASC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini view-data' data-toggle='modal' data-id=".$row['id_siswa']." title='Edit'><i class='fa fa-search-plus'></i></button>".' '."<button class='btn btn-primary btn-mini ubah-data' data-toggle='modal' data-id=".$row['id_siswa']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_siswa']." title='hapus'  ><i class='fa fa-trash'></i></button>";
                        
           $ttl_siswa=$row['tempat_lahir_siswa'].", ".$row['tanggal_lahir_siswa'];

            $output['data'][] = array(
                $x,
                $row['nama_siswa'],
                $row['nisn'],
                $ttl_siswa,
                $row['tahun_akademik'],
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
        $id_tahun_akademik=$_POST['id_tahun_akademik'];
            
        $sql = "INSERT INTO tbl_siswa (nama_siswa,nisn,tempat_lahir_siswa,tanggal_lahir_siswa,jk_siswa,agama_siswa,nohp_siswa,alamat_siswa,desa,kecamatan,nama_ayah,pekerjaan_ayah,pendidikan_ayah,nama_ibu,pekerjaan_ibu,pendidikan_ibu,nama_wali,pekerjaan_wali,id_tahun_akademik) VALUES ('$nama_siswa','$nisn','$tempat_lahir_siswa','$tanggal_lahir_siswa','$jk_siswa','$agama_siswa','$nohp_siswa','$alamat_siswa','$desa','$kecamatan','$nama_ayah','$pekerjaan_ayah','$pendidikan_ayah','$nama_ibu','$pekerjaan_ibu','$pendidikan_ibu','$nama_wali','$pekerjaan_wali','$id_tahun_akademik')";
        $query = $connect->query($sql);

        $sqls = "INSERT INTO tbl_login (username,password,nama_lengkap,level) VALUES ('$nisn','$nisn','$nama_siswa','Siswa')";
        $querys = $connect->query($sqls);

        echo json_encode($query);
    break;

    case 'edit':

        $id=$_POST['editid_siswa'];
        $nama_siswa=$_POST['editnama_siswa'];
        $nisn=$_POST['editnisn'];
        $tempat_lahir_siswa=$_POST['edittempat_lahir_siswa'];
        $tanggal_lahir_siswa=$_POST['edittanggal_lahir_siswa'];
        $jk_siswa=$_POST['editjk_siswa'];
        $agama_siswa=$_POST['editagama_siswa'];
        $nohp_siswa=$_POST['editnohp_siswa'];
        $alamat_siswa=$_POST['editalamat_siswa'];
        $desa=$_POST['editdesa'];
        $kecamatan=$_POST['editkecamatan'];
        $nama_ayah=$_POST['editnama_ayah'];
        $pekerjaan_ayah=$_POST['editpekerjaan_ayah'];
        $pendidikan_ayah=$_POST['editpendidikan_ayah'];
        $nama_ibu=$_POST['editnama_ibu'];
        $pekerjaan_ibu=$_POST['editpekerjaan_ibu'];
        $pendidikan_ibu=$_POST['editpendidikan_ibu'];
        $nama_wali=$_POST['editnama_wali'];
        $pekerjaan_wali=$_POST['editpekerjaan_wali'];
        $id_tahun_akademik=$_POST['editid_tahun_akademik'];       

        $sql = "UPDATE tbl_siswa SET nama_siswa='$nama_siswa',
                                    nisn='$nisn',
                                    tempat_lahir_siswa='$tempat_lahir_siswa',
                                    tanggal_lahir_siswa='$tanggal_lahir_siswa',
                                    jk_siswa='$jk_siswa',
                                    agama_siswa='$agama_siswa',
                                    nohp_siswa='$nohp_siswa',
                                    alamat_siswa='$alamat_siswa',
                                    desa='$desa',
                                    kecamatan='$kecamatan',
                                    nama_ayah='$nama_ayah',
                                    pekerjaan_ayah='$pekerjaan_ayah',
                                    pendidikan_ayah='$pendidikan_ayah',
                                    nama_ibu='$nama_ibu',
                                    pekerjaan_ibu='$pekerjaan_ibu',
                                    pendidikan_ibu='$pendidikan_ibu',
                                    nama_wali='$nama_wali',
                                    pekerjaan_wali='$pekerjaan_wali',
                                    id_tahun_akademik='$id_tahun_akademik'
                                    WHERE id_siswa = '$id'";
        $data = $connect->query($sql);

        $sqls = "UPDATE tbl_login SET nama_lengkap='$nama_siswa' WHERE username = '$id'";
        $querys = $connect->query($sqls);
 
        $connect->close();

        echo json_encode($data);
    break;

    case 'hapus':       
        $id_siswa = $_POST['id'];

        $sql = "DELETE FROM tbl_siswa WHERE id_siswa = '$id_siswa'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
}
?>