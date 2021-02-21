 <?php 
session_start();
require_once 'include/db_connect.php';
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
                <h1 class="page-title">Data Pendaftar</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Pendaftar</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Pendaftar</div>
                        <div> <a href="javascript:void(0);" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-user-plus"></i> Tambah</a></div>
                    </div>
                    <div class="ibox-body">
                        <div class="table-responsive">
                            <table class="table" id="listdata" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NAMA SISWA</th>
                                        <th>NISN</th>
                                        <th>EMAIL SISWA</th>
                                        <th>TEMPAT LAHIR SISWA</th>
                                        <th>TANGGAL LAHIR SISWA</th>
                                        <th>JK SISWA</th>
                                        <th>AGAMA SISWA</th>
                                        <th>NOHP SISWA</th>
                                        <th>ALAMAT SISWA</th>
                                        <th>DESA</th>
                                        <th>KECAMATAN</th>
                                        <th>NAMA AYAH</th>
                                        <th>PEKERJAAN AYAH</th>
                                        <th>PENDIDIKAN AYAH</th>
                                        <th>NAMA IBU</th>
                                        <th>PEKERJAAN IBU</th>
                                        <th>PENDIDIKAN IBU</th>
                                        <th>NAMA WALI</th>
                                        <th>PEKERJAAN WALI</th>
                                        <th>STATUS DAFTAR</th>
                                        <th>TANGGAL DAFTAR</th>
                                        <th>NOMOR IJAZAH</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>NILAI AKHIR</th>                         
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>NAMA SISWA</th>
                                        <th>NISN</th>
                                        <th>EMAIL SISWA</th>
                                        <th>TEMPAT LAHIR SISWA</th>
                                        <th>TANGGAL LAHIR SISWA</th>
                                        <th>JK SISWA</th>
                                        <th>AGAMA SISWA</th>
                                        <th>NOHP SISWA</th>
                                        <th>ALAMAT SISWA</th>
                                        <th>DESA</th>
                                        <th>KECAMATAN</th>
                                        <th>NAMA AYAH</th>
                                        <th>PEKERJAAN AYAH</th>
                                        <th>PENDIDIKAN AYAH</th>
                                        <th>NAMA IBU</th>
                                        <th>PEKERJAAN IBU</th>
                                        <th>PENDIDIKAN IBU</th>
                                        <th>NAMA WALI</th>
                                        <th>PEKERJAAN WALI</th>
                                        <th>STATUS DAFTAR</th>
                                        <th>TANGGAL DAFTAR</th>
                                        <th>NOMOR IJAZAH</th>
                                        <th>ASAL SEKOLAH</th>
                                        <th>NILAI AKHIR</th>                         
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
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
            "scrollX": true,
            "ajax": "psb/action.php?aksi=view_data_valid",
            stateSave: true,
            "order": []
        });
        $('#listdata').on('click', '.hapus-data', function() {
            var id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi',
                text: "Anda ingin menghapus ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "psb/action.php?aksi=hapus",
                        method: "post",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                onOpen: () => {
                                    swal.showLoading()
                                }
                            })
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil Terhapus',
                                showConfirmButton: true,
                                timer: 1500
                            })

                            listdata.ajax.reload(null, false)
                        }
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Batal Menghapus Data',
                        showConfirmButton: true,
                        timer: 1500
                    })

                }
            })
        });
        $('#listdata').on('click', '.validasi-data', function() {
            var id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi',
                text: "Verifikasi Data Calon Siswa Baru ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'diterima',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ditolak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "psb/action.php?aksi=lulus",
                        method: "post",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                onOpen: () => {
                                    swal.showLoading()
                                }
                            })
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil di Verifikasi',
                                showConfirmButton: true,
                                timer: 1500
                            })

                            listdata.ajax.reload(null, false)
                        }
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    $.ajax({
                        url: "psb/action.php?aksi=tidak_lulus",
                        method: "post",
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Menunggu',
                                html: 'Memproses data',
                                onOpen: () => {
                                    swal.showLoading()
                                }
                            })
                        },
                        data: {
                            id: id
                        },
                        success: function(data) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil di Verifikasi',
                                showConfirmButton: true,
                                timer: 1500
                            })

                            listdata.ajax.reload(null, false)
                        }
                    })

                }
            })
        });
    });
</script>

</body>

</html>