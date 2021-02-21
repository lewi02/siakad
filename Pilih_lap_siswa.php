 <?php 
require_once 'include/db_connect.php';

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
                <h1 class="page-title">Pilih Laporan Berdasarkan Kelas</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Pilih Laporan Berdasarkan Kelas</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Pilih Laporan Berdasarkan Kelas</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="listdata" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>            
                                    <th>Tahun Akademik</th>            
                                    <th>Jumlah Siswa</th>        
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>            
                                    <th>Tahun Akademik</th>            
                                    <th>Jumlah Siswa</th>        
                                    <th>Cetak</th>
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
    <script>
    $(document).ready(function() {        
        var listdata = $('#listdata').DataTable({
            "processing": true,
            "ajax": "laporan/laporansiswa.php?aksi=view_data",
            stateSave: true,
            "order": []
        });
        
    });
    </script>

</body>

</html>