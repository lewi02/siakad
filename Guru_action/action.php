<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_guru";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini ubah-data' data-toggle='modal' data-id=".$row['id_guru']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_guru']." title='hapus'  ><i class='fa fa-trash'></i></button>";
                        
           $ttl_guru=$row['tempat_lahir_guru'].", ".$row['tanggal_lahir_guru'];

            $output['data'][] = array(
                $x,
                $row['nama_guru'],
                $row['nip'],
                $row['nuptk'],
                $row['jurusan'],
                $ttl_guru,
                $row['jk_guru'],
                $row['nohp_guru'],
                $row['email_guru'],
                $row['agama_guru'],
                $row['alamat_guru'],
                $action
            );


            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $tanggal_lahir_guru=$_POST['tanggal_lahir_guru'];
        $pecah   = explode("-", $tanggal_lahir_guru);
        $no_urut = $pecah[0].$pecah[1].$pecah[2];
        $query = mysqli_query($connect, "SELECT max(id_guru) as max_id FROM tbl_guru WHERE id_guru LIKE '{$no_urut}%' ORDER BY id_guru DESC LIMIT 1");
        $data = mysqli_fetch_assoc($query);

        $getId = $data['max_id'];

        $no = substr($getId, -2, 2);
        $no = (int) $no;
        $no += 1;
        $newId = $no_urut . sprintf("%02s", $no);


        $nama_guru=$_POST['nama_guru'];
        $nip=$_POST['nip'];
        $pendidikan_terakhir=$_POST['pendidikan_terakhir'];
        $jurusan=$_POST['jurusan'];
        $nuptk=$_POST['nuptk'];
        $jk_guru=$_POST['jk_guru'];
        $agama_guru=$_POST['agama_guru'];
        $alamat_guru=$_POST['alamat_guru'];
        $nohp_guru=$_POST['nohp_guru'];
        $email_guru=$_POST['email_guru'];
        $tempat_lahir_guru=$_POST['tempat_lahir_guru'];
        $tanggal_lahir_guru=$_POST['tanggal_lahir_guru'];
        

        $sql = "INSERT INTO tbl_guru (id_guru,nama_guru,nip,pendidikan_terakhir,jurusan,nuptk,jk_guru,agama_guru,alamat_guru,nohp_guru,email_guru,tempat_lahir_guru,tanggal_lahir_guru) VALUES ('$newId','$nama_guru','$nip','$pendidikan_terakhir','$jurusan','$nuptk','$jk_guru','$agama_guru','$alamat_guru','$nohp_guru','$email_guru','$tempat_lahir_guru','$tanggal_lahir_guru')";
        $query = $connect->query($sql);

        $sqls = "INSERT INTO tbl_login (username,password,nama_lengkap,level) VALUES ('$newId','$newId','$nama_guru','Guru')";
        $querys = $connect->query($sqls);

        echo json_encode($query);
    break;

    case 'edit':

        $id = $_POST['id_guru'];
        $nama_guru=$_POST['editnama_guru'];
        $nip=$_POST['editnip'];
        $pendidikan_terakhir=$_POST['editpendidikan_terakhir'];
        $jurusan=$_POST['editjurusan'];
        $nuptk=$_POST['editnuptk'];
        $jk_guru=$_POST['editjk_guru'];
        $agama_guru=$_POST['editagama_guru'];
        $alamat_guru=$_POST['editalamat_guru'];
        $nohp_guru=$_POST['editnohp_guru'];
        $email_guru=$_POST['editemail_guru'];
        $tempat_lahir_guru=$_POST['edittempat_lahir_guru'];
        $tanggal_lahir_guru=$_POST['edittanggal_lahir_guru'];

        $sql = "UPDATE tbl_guru SET nama_guru='$nama_guru', nip='$nip', pendidikan_terakhir='$pendidikan_terakhir', jurusan='$jurusan', nuptk='$nuptk', jk_guru='$jk_guru', agama_guru='$agama_guru', alamat_guru='$alamat_guru', nohp_guru='$nohp_guru', email_guru= '$email_guru', tempat_lahir_guru='$tempat_lahir_guru', tanggal_lahir_guru='$tanggal_lahir_guru' WHERE id_guru = $id";
        $data = $connect->query($sql);

        $sqls = "UPDATE tbl_login SET nama_lengkap='$nama_guru' WHERE username = $id";
        $querys = $connect->query($sqls);
 
        $connect->close();

        echo json_encode($data);
    break;

    case 'hapus':       
        $id_guru = $_POST['id'];

        $sql = "DELETE FROM tbl_guru WHERE id_guru = '$id_guru'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
}
?>