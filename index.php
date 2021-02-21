 <?php 
session_start();

// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
    header("location:./login/login.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./include/case_css.php";?>
    <!-- PAGE LEVEL STYLES-->
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <?php include "./include/case_header.php";?>
        <!-- END SIDEBAR-->
        <div class="content-wrapper">
            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Beranda</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Halaman Utama</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">               
                <div>
				
                    <a class="adminca-banner" href="#" target="_blank">
                        <div class="adminca-banner-ribbon"><i class="fa fa-trophy mr-2"></i>SMP SATAP TOLULOS</div>
                        <div class="wrap-1">
                            <div class="wrap-2">
                                <div>
                                    <img src="./assets/img/logosekolah.png" style="height:160px;margin-top:50px;" />
                                </div>
                                <div class="color-white" style="margin-left:40px;">
                                    <h1 class="font-bold">SIAKAD</h1>
                                    <p class="font-16">SISTEM INFORMASI AKADEMIK</p>
                                    <ul class="list-unstyled">
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>Data Siswa</li>
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>Data Guru</li>
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>Data Nilai</li>
                                        <li class="m-b-5"><i class="ti-check m-r-5"></i>Data Absen</li>
                                        <li><i class="ti-check m-r-5"></i>Data Siswa Baru</li>
                                    </ul>
                                </div>
                            </div>
                            //hapus
                            <div style="flex:1;">
                                <div class="d-flex justify-content-end wrap-3">
                                    <div class="adminca-banner-b m-r-20">
                                        <img src="./assets/img/adminca-banner/bootstrap.png" style="width:40px;margin-right:10px;" />Bootstrap v4</div>
                                    <div class="adminca-banner-b m-r-10">
                                        <img src="./assets/img/adminca-banner/angular.png" style="width:35px;margin-right:10px;" />HTML</div>
                                </div>
                                <div class="dev-img">
                                    <img src="./assets/img/adminca-banner/sprite.png" />
                                </div>
                            </div>
                            // akhir hapus
                        </div>
                    </a>
					<img src="./assets/img/bgsekolah.jpg">
                </div>
            </div>
           <?php include "./include/case_footer.php";?>
        </div>
    </div>
    <?php include "./include/case_js.php";?>
    <script type="text/javascript">
        $(function() {
            $('#example-table').DataTable({
                pageLength: 10,
                //"ajax": './assets/demo/data/table_data.json',
                /*"columns": [
                    { "data": "name" },
                    { "data": "office" },
                    { "data": "extn" },
                    { "data": "start_date" },
                    { "data": "salary" }
                ]*/
            });
        })
    </script>
</body>

</html>