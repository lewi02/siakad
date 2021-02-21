<?php
require_once '../include/db_connect.php';
session_start();
switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru ORDER BY hari, jam_mulai ASC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-info btn-mini ubah-data' data-toggle='modal' data-id=".$row['id_jadwal']." title='Edit'><i class='fa fa-pencil-square-o'></i></button>".' '."<button class='btn btn-danger btn-mini hapus-data' id='id' data-toggle='modal' data-id=".$row['id_jadwal']." title='hapus'  ><i class='fa fa-trash'></i></button>";
            $jam=$row['jam_mulai']." - ".$row['jam_selesai'];              
            $matpel=$row['nama_matpel']."".$row['keterangan'];              
            $ta=$row['semester']." ".$row['tahun_akademik'];              
            $output['data'][] = array(
                $x,
                $ta,
                $row['nama_kelas'],
                $row['hari'],
                $jam,
                $matpel,
                $row['nama_guru'],
                $action
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'view_dataguru':
        $id_guru = $_SESSION['username'];    
        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru WHERE tbl_jadwal.id_guru='$id_guru' ORDER BY hari, jam_mulai ASC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  
            $jam=$row['jam_mulai']." - ".$row['jam_selesai'];              
            $matpel=$row['nama_matpel']."".$row['keterangan'];              
            $ta=$row['semester']." ".$row['tahun_akademik'];              
            $output['data'][] = array(
                $x,
                $ta,
                $row['nama_kelas'],
                $row['hari'],
                $jam,
                $matpel,
                $row['nama_guru']
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;

    case 'simpan':

        $id_kelas=$_POST['id_kelas'];
        $jam_mulai=$_POST['jam_mulai'];
        $jam_selesai=$_POST['jam_selesai'];
        $hari=$_POST['hari'];
        $id_matpel=$_POST['id_matpel'];
        $id_guru=$_POST['id_guru'];
        $keterangan=$_POST['keterangan'];

        $sql = "INSERT INTO  tbl_jadwal (id_kelas,jam_mulai,jam_selesai,hari,id_matpel,id_guru,keterangan) VALUES ('$id_kelas','$jam_mulai','$jam_selesai','$hari','$id_matpel','$id_guru','$keterangan')";
        $query = $connect->query($sql);        
        $connect->close();

        echo json_encode($query);
    break;

    case 'edit':

            $id = $_POST['id_jadwal'];
            $id_kelas=$_POST['editid_kelas'];
            $jam_mulai=$_POST['editjam_mulai'];
            $jam_selesai=$_POST['editjam_selesai'];
            $hari=$_POST['edithari'];
            $id_matpel=$_POST['editid_matpel'];
            $id_guru=$_POST['editid_guru'];
            $keterangan=$_POST['editketerangan'];

            $sql = "UPDATE tbl_jadwal SET id_kelas='$id_kelas',jam_mulai='$jam_mulai',jam_selesai='$jam_selesai',hari='$hari',id_matpel='$id_matpel',id_guru='$id_guru',keterangan='$keterangan' WHERE id_jadwal = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;

    case 'hapus':       
        $id_jadwal = $_POST['id'];

        $sql = "DELETE FROM tbl_jadwal WHERE id_jadwal = '$id_jadwal'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;
}
?>