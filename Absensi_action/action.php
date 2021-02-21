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

            $action= "<a class='btn btn-info btn-mini' href='List_absen.php?id=".$row['id_jadwal']."' title='Lihat Absen'><i class='fa fa-list-alt'></i></a>";
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
        $sql = "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru WHERE tbl_jadwal.id_guru='$id_guru' ORDER BY hari, jam_mulai ASC";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<a class='btn btn-info btn-mini' href='List_absen.php?id=".$row['id_jadwal']."' title='Lihat Absen'><i class='fa fa-list-alt'></i></a>";
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
        $tanggal_absen=$_POST['tanggal_absen'];
        
        $sqls = "SELECT * FROM tbl_pemb_kelas left join tbl_siswa on tbl_pemb_kelas.id_siswa=tbl_siswa.id_siswa Where id_kelas='$id_kelas'";
        $querys = $connect->query($sqls);

        while ($rows = $querys->fetch_assoc()) {  
        $id_siswa= $rows['id_siswa'];
        $sql = "INSERT INTO  tbl_absensi (id_jadwal,id_siswa,tanggal_absen,absensi) VALUES ('$id_jadwal','$id_siswa','$tanggal_absen','BA')";
        $query = $connect->query($sql);

        }        
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
    case 'hapus_absen':       
        $tanggal_absen = $_POST['id'];
        $id_jadwal = $_POST['id_jadwal'];

        $sql = "DELETE FROM tbl_absensi WHERE id_jadwal = '$id_jadwal' and tanggal_absen='$tanggal_absen'";
        $data = $connect->query($sql);        
        $connect->close();

        echo json_encode($data);
    break;

    
    case 'view_absen_siswa':

        $output = array('data' => array());
        $id_jadwal=$_POST['id_jadwal'];
        $tanggal_absen=$_POST['tanggal_absen'];

        $sql = "SELECT * FROM tbl_absensi left join tbl_siswa on tbl_absensi.id_siswa=tbl_siswa.id_siswa where id_jadwal='$id_jadwal' and tanggal_absen='$tanggal_absen'";
        $query = $connect->query($sql);

        $x = 1;
        while ($row = $query->fetch_assoc()) {  

            $action= "<button class='btn btn-primary btn-mini hadir' id='id' data-toggle='modal' data-id=".$row['id_absensi']." title='Hadir'>H</button>".' '."<button class='btn btn-info btn-mini sakit' id='id' data-toggle='modal' data-id=".$row['id_absensi']." title='sakit'>S</button>".' '."<button class='btn btn-danger btn-mini izin' id='id' data-toggle='modal' data-id=".$row['id_absensi']." title='Izin'>I</button>".' '."<button class='btn btn-warning btn-mini alpa' id='id' data-toggle='modal' data-id=".$row['id_absensi']." title='Alpa'>A</button>";        
            $output['data'][] = array(
                $x,
                $action,
                $row['nisn'],
                $row['nama_siswa'],
                $row['absensi']                
            );

            $x++;
        }
       
        $connect->close();

        echo json_encode($output);
    break;
    case 'hadir':

            $id = $_POST['id'];
            $absensi="H";

            $sql = "UPDATE tbl_absensi SET absensi='$absensi' WHERE id_absensi = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;
    case 'sakit':

            $id = $_POST['id'];
            $absensi="S";

            $sql = "UPDATE tbl_absensi SET absensi='$absensi' WHERE id_absensi = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;
    case 'izin':

            $id = $_POST['id'];
            $absensi="I";

            $sql = "UPDATE tbl_absensi SET absensi='$absensi' WHERE id_absensi = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;
    case 'alpa':

            $id = $_POST['id'];
            $absensi="A";

            $sql = "UPDATE tbl_absensi SET absensi='$absensi' WHERE id_absensi = $id";
            $data = $connect->query($sql);            
            $connect->close();

            echo json_encode($data);
    break;
}
?>