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
                <h1 class="page-title">Data Nilai</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Nilai</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Nilai</div>                        
                    </div>
                    <div class="ibox-body">
                        <div class="alert alert-primary" role="alert">
                          Silahkan Memilih Jadwal untuk mengisi Nilai Siswa
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
           <?php include "include/case_footer.php";?>
        </div>
    </div>
    <?php include "include/case_js.php";?>
    <script>
    $(document).ready(function() {
       var listdata = $('#listdata').DataTable({
            "processing": true,
            "ajax": "Nilai_action/action.php?aksi=view_data",
            stateSave: true,
            "order": []
        });
        
    });
    </script>

</body>

</html>