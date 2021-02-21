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
                <h1 class="page-title">Data Pembagian Kelas</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Pembagian Kelas</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Pembagian Kelas</div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="listdata" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>            
                                    <th>Tahun Akademik</th>            
                                    <th>Jumlah Siswa</th>        
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>            
                                    <th>Tahun Akademik</th>            
                                    <th>Jumlah Siswa</th>        
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>                
            </div>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel-heading bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                     <div class="modal-body panel-body">
                        <div id="formdata">
                            
                        </div>
                        </div>
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
            "ajax": "Pemb_kelas_action/action.php?aksi=view_data",
            stateSave: true,
            "order": []
        });
        $('#listdata').on('click', '.view-data', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "Pemb_kelas_action/modal_tambah_siswa.php",
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
                    swal.close();
                    $('#Modal_Edit').modal('show');
                    $('#formdata').html(data);
                    var id_kelas = $('#id_kelas').val(); 
                    var litssiswa = $('#litssiswa').DataTable({
                        "processing": true,
                         ajax:{
                            type: "post",
                            url: "Pemb_kelas_action/action.php?aksi=view_data_siswa",
                            data: {
                                id_kelas: id_kelas
                            }, 
                         },
                        stateSave: true,
                        "order": []
                    });
                    $('#formubahdata').on('submit', function() {
                        var form = $(this);     
                        $.ajax({
                            type: "POST",
                            url: "Pemb_kelas_action/action.php?aksi=simpan",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })
                            },
                            dataType: "JSON",
                            data: form.serialize(),
                            success: function(data) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Tambah Data',
                                    text: 'Anda Berhasil Menambah Siswa ',
                                    showConfirmButton: true,
                                    timer: 1500
                                });
                                litssiswa.ajax.reload(null, false);
                                listdata.ajax.reload(null, false);
                            }
                        });
                        return false;
                    });
                    $('#litssiswa').on('click', '.hapus-data', function() {
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
                                    url: "Pemb_kelas_action/action.php?aksi=hapus",
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

                                        litssiswa.ajax.reload(null, false);
                                        listdata.ajax.reload(null, false);
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
                }
            });
        });
        
    });
    </script>

</body>

</html>