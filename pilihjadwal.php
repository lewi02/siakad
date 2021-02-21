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
                <h1 class="page-title">Cetak Jadwal Pelajaran</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Cetak Jadwal Pelajaran</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Cetak Jadwal Pelajaran</div>
                       
                    </div>
                    <div class="ibox-body">
                        <div class="alert alert-primary" role="alert">
                          Silahkan Memilih Tahun Akademik untuk mencetak Jadwal Pelajaran
                        </div>
                        <table class="table table-striped table-bordered table-hover" id="listdata" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Akademik</th>                          
                                    <th>Semester</th>                          
                                    <th>Aktif</th>                          
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              require_once 'include/db_connect.php';
                              $sql = "SELECT * FROM tbl_tahun_akademik where status='Ya'";
                              $query = $connect->query($sql);

                              $no =1;  
                              while ($row = $query->fetch_assoc()) {  
                              
                              ?>
                              <tr>
                                  <td><?php echo $no++;?></td>
                                  <td><?php echo $row['tahun_akademik'];?></td>
                                  <td><?php echo $row['semester'];?></td>
                                  <td><?php echo $row['status'];?></td>
                                  <td><a href="Laporan/laporanjadwal.php?id=<?php echo  $row['id_tahun_akademik'];?>" class="btn btn-primary btn-mini" target="_blank"><i class="fa fa-print"></i></a></td>
                              </tr>
                             <?php } ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Tahun Akademik</th>                          
                                    <th>Semester</th>                          
                                    <th>Aktif</th>                       
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