<?php
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_tu";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini ubah-data' data-toggle='modal' data-id=".$row['id_tu']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_tu']." title='hapus'  ><i class='fa fa-trash'></i></button>";
                        
           $ttl_tu=$row['tempat_lahir_tu'].", ".$row['tanggal_lahir_tu'];

            $output['data'][] = array(
                $x,
                $row['nama_tu'],
                $row['nip_tu'],
                $ttl_tu,
                $row['jk_tu'],
                $row['nohp_tu'],
                $row['email_tu'],
                $row['agama_tu'],
                $row['alamat_tu'],
                $action
            );
          
            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $tanggal_lahir_tu=$_POST['tanggal_lahir_tu'];
        $pecah   = explode("-", $tanggal_lahir_tu);
        $no_urut = $pecah[0].$pecah[1].$pecah[2];
        $query = mysqli_query($connect, "SELECT max(id_tu) as max_id FROM tbl_tu WHERE id_tu LIKE '{$no_urut}%' ORDER BY id_tu DESC LIMIT 1");
        $data = mysqli_fetch_assoc($query);

        $getId = $data['max_id'];

        $no = substr($getId, -2, 2);
        $no = (int) $no;
        $no += 1;
        $newId = $no_urut . sprintf("%02s", $no);


        $nama_tu=$_POST['nama_tu'];
        $tempat_lahir_tu=$_POST['tempat_lahir_tu'];
        $tanggal_lahir_tu=$_POST['tanggal_lahir_tu'];
        $jk_tu=$_POST['jk_tu'];        
        $nip_tu=$_POST['nip_tu'];
        $agama_tu=$_POST['agama_tu'];
        $alamat_tu=$_POST['alamat_tu'];
        $nohp_tu=$_POST['nohp_tu'];
        $email_tu=$_POST['email_tu'];
       

        $sql = "INSERT INTO tbl_tu (id_tu,nama_tu,tempat_lahir_tu,tanggal_lahir_tu,jk_tu,nip_tu,agama_tu,alamat_tu,nohp_tu,email_tu) VALUES ('$newId','$nama_tu','$tempat_lahir_tu','$tanggal_lahir_tu','$jk_tu','$nip_tu','$agama_tu','$alamat_tu','$nohp_tu','$email_tu')";
        $query = $connect->query($sql);

        $sqls = "INSERT INTO tbl_login (username,password,nama_lengkap,level) VALUES ('$newId','$newId','$nama_tu','Admin')";
        $querys = $connect->query($sqls);

        echo json_encode($query);
    break;

    case 'edit':

        $id = $_POST['id_tu'];
        $nama_tu=$_POST['editnama_tu'];
        $tempat_lahir_tu=$_POST['edittempat_lahir_tu'];
        $tanggal_lahir_tu=$_POST['edittanggal_lahir_tu'];
        $jk_tu=$_POST['editjk_tu'];        
        $nip_tu=$_POST['editnip_tu'];
        $agama_tu=$_POST['editagama_tu'];
        $alamat_tu=$_POST['editalamat_tu'];
        $nohp_tu=$_POST['editnohp_tu'];
        $email_tu=$_POST['editemail_tu'];

        $sql = "UPDATE tbl_tu SET nama_tu='$nama_tu',tempat_lahir_tu='$tempat_lahir_tu',tanggal_lahir_tu='$tanggal_lahir_tu',jk_tu='$jk_tu',nip_tu='$nip_tu',agama_tu='$agama_tu',alamat_tu='$alamat_tu',nohp_tu='$nohp_tu',email_tu= '$email_tu' WHERE id_tu = $id";
        $data = $connect->query($sql);

        $sqls = "UPDATE tbl_login SET nama_lengkap='$nama_tu' WHERE username = $id";
        $querys = $connect->query($sqls);
 
        $connect->close();

        echo json_encode($data);
    break;

    case 'hapus':       
        $id_tu = $_POST['id'];

        $sql = "DELETE FROM tbl_tu WHERE id_tu = '$id_tu'";
        $data = $connect->query($sql);
                
        $connect->close();

        echo json_encode($data);
    break;
}
?>