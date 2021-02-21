<?php
session_start();
require_once '../include/db_connect.php';

switch ($_GET['aksi'])
{
    case 'view_data':

        $output = array('data' => array());
        $sql = "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru ORDER BY hari, jam_mulai ASC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<a class='btn btn-info btn-mini' href='List_nilai.php?id=".$row['id_jadwal']."' title='Lihat nilai'><i class='fa fa-list-alt'></i></a>";
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

        $output = array('data' => array());
        $id_guru = $_SESSION['username'];  
        $sql = "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru  WHERE tbl_jadwal.id_guru='$id_guru' ORDER BY hari, jam_mulai ASC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<a class='btn btn-info btn-mini' href='List_nilai.php?id=".$row['id_jadwal']."' title='Lihat nilai'><i class='fa fa-list-alt'></i></a>";
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
    
    case 'simpan':

        $id_kelas=$_POST['id_kelas'];
        $id_jadwal=$_POST['id_jadwal'];
        $tanggal_nilai=$_POST['tanggal_nilai'];
        $nama_tugas=$_POST['nama_tugas'];
        
        $sqls = "SELECT * FROM tbl_pemb_kelas left join tbl_siswa on tbl_pemb_kelas.id_siswa=tbl_siswa.id_siswa Where id_kelas='$id_kelas'";
        $querys = $connect->query($sqls);

        while ($rows = $querys->fetch_assoc()) {  
        $id_siswa= $rows['id_siswa'];
        $sql = "INSERT INTO  tbl_nilai (id_jadwal,id_siswa,tanggal_nilai,nama_tugas,nilai) VALUES ('$id_jadwal','$id_siswa','$tanggal_nilai','$nama_tugas','0')";
        $query = $connect->query($sql);

        }        
        $connect->close();

        echo json_encode($query);
    break;

    case 'edit_nilai':

            $id = $_POST['id_nilai'];
            $id_kelas=$_POST['nilai'];

            $sql = "UPDATE tbl_nilai SET nilai='$nilai' WHERE id_nilai = $id";
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
    case 'hapus_nilai':       
        $tanggal_nilai = $_POST['id'];
        $id_jadwal = $_POST['id_jadwal'];

        $sql = "DELETE FROM tbl_nilai WHERE id_jadwal = '$id_jadwal' and tanggal_nilai='$tanggal_nilai'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;

    
    case 'view_nilai_siswa':

        $output = array('data' => array());
        $id_jadwal=$_POST['id_jadwal'];
        $tanggal_nilai=$_POST['tanggal_nilai'];

        $sql = "SELECT * FROM tbl_nilai left join tbl_siswa on tbl_nilai.id_siswa=tbl_siswa.id_siswa where id_jadwal='$id_jadwal' and tanggal_nilai='$tanggal_nilai'";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<input type='text' id=".$row['id_nilai']." data-id='KK' class='form-control col-sm-6 editnsiswa' max='100' value=".$row['nilai'].">";        
            $output['data'][] = array(
                $x,
                $row['nisn'],
                $row['nama_siswa'],
                $action               
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;
    case 'simpan_nilai':

            $id = $_POST['id'];
            $nilai = $_POST['text'];

            $sql = "UPDATE tbl_nilai SET nilai='$nilai' WHERE id_nilai = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;
    
}
?>