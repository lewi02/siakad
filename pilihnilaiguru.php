 <?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:login/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "include/case_css.php";?>
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <?php include "include/case_header.php";?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Cetak Nilai</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Cetak Nilai</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Cetak Nilai</div>
                       
                    </div>
                    <div class="ibox-body">
                        <div class="alert alert-primary" role="alert">
                          Silahkan Memilih Jadwal Pelajaran untuk mencetak Nilai
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="listdata" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Akademik</th>                          
                                    <th>Kelas</th>                          
                                    <th>Hari</th>                          
                                    <th>Jam</th>                          
                                    <th>Mata Pelajaran</th>                          
                                    <th>Guru</th>                          
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                require_once 'include/db_connect.php';
                                $id_guru = $_SESSION['username'];
                                $sql = "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru  WHERE tbl_jadwal.id_guru='$id_guru' ORDER BY hari, jam_mulai ASC";
                                $query = $connect->query($sql);

                              $no =1;  
                              while ($row = $query->fetch_assoc()) {  
                              
                              ?>
                              <tr>
                                  <td><?php echo $no++;?></td>
                                  <td><?php echo $row['semester']." ".$row['tahun_akademik'];?></td>
                                  <td><?php echo $row['nama_kelas'];?></td>
                                  <td><?php echo $row['hari'];?></td>
                                  <td><?php echo $row['jam_mulai']." - ".$row['jam_selesai'];?></td>
                                  <td><?php echo $row['nama_matpel']."".$row['keterangan'];?></td>
                                  <td><?php echo $row['nama_guru'];?></td>
                                  <td><a href="Laporan/blangkonilai.php?id=<?php echo  $row['id_jadwal'];?>&id_kelas=<?php echo  $row['id_kelas'];?>" class="btn btn-primary btn-mini" target="_blank" title="Cetak Blangko Nilai"><i class="fa fa-id-card"></i></a> <a href="Laporan/nilaisiswa.php?id=<?php echo  $row['id_jadwal'];?>&id_kelas=<?php echo  $row['id_kelas'];?>" class="btn btn-danger btn-mini" target="_blank" title="Cetak Nilai Siswa"><i class="fa fa-barcode"></i></a></td>
                              </tr>
                             <?php } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Akademik</th>                          
                                    <th>Kelas</th>                          
                                    <th>Hari</th>                          
                                    <th>Jam</th>                          
                                    <th>Mata Pelajaran</th>                          
                                    <th>Guru</th>                          
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>                
            </div>
            
            
            <!-- /edit modal -->
           <?php include "include/case_footer.php";?>
        </div>
    </div>
    <?php include "include/case_js.php";?>

</body>

</html>