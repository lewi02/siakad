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
                <h1 class="page-title">Data Siswa yang Keluar/Lulus</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Siswa</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Siswa yang Keluar/Lulus</div>
                        <div> <a href="javascript:void(0);" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-user-plus"></i> Tambah</a></div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="listdata" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>            
                                    <th>NISN</th>            
                                    <th>Tempat Tanggal Lahir</th>            
                                    <th>Keluar/Lulus</th>           
                                    <th>Alasan</th>           
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>            
                                    <th>NISN</th>            
                                    <th>Tempat Tanggal Lahir</th>            
                                    <th>Keluar/Lulus</th>           
                                    <th>Alasan</th>           
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>                
            </div>
           
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel-heading bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- MODAL ADD -->
                        <form id="formtambahdata">
                        <div class="modal-body panel-body"> 
                            <div class="row">                                          
                                <div class="col-sm-6 form-group">
                                    <label>Nama Siswa <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="id_siswa" required="">
                                    <option value="">~~ Pilih Siswa ~~</option>
                                    <?php 
                                        $sql="select * from tbl_siswa where status_siswa='Aktif'";

                                        $hasil=mysqli_query($connect,$sql);
                                        while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <option value="<?php echo $data['id_siswa'];?>"><?php echo $data['nisn'];?> |  <?php echo $data['nama_siswa'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Tanggal Keluar <span class="text-warning">*</span></label>
                                    <input type="date" name="tanggal_keluar" class="form-control" required>
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Status Keluar <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="status_siswa" required="">
                                        <option value="">~~ Pilih Status Keluar ~~</option>
                                        <option value="Keluar">Keluar/DROP OUT</option>
                                        <option value="Lulus">Lulus</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row"> 
                                <div class="col-sm-6 form-group">
                                    <label>Nomor Ijazah(di isi jika jenis keluar lulus) <span class="text-warning">*</span></label>
                                    <input type="text" name="alasan_keluar" class="form-control">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Alsasan Keluar(di isi jika jenis keluar DROP OUT) <span class="text-warning">*</span></label>
                                    <input type="text" name="nomor_ijazah" class="form-control">
                                </div>
                            </div>
                           
                        </div>
                        <div class="modal-footer panel-footer text-success">
                            <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
                            <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--END MODAL ADD-->
            <!-- /edit modal -->
           <?php include "include/case_footer.php";?>
        </div>
    </div>
    <?php include "include/case_js.php";?>
    <script>
    $(document).ready(function() {
       var listdata = $('#listdata').DataTable({
            "processing": true,
            "ajax": "Siswa_keluar_action/action.php?aksi=view_data",
            stateSave: true,
            "order": []
        });
        $('#formtambahdata').on('submit', function() {
            var form = $(this);     
            $.ajax({
                type: "POST",
                url: "Siswa_keluar_action/action.php?aksi=simpan",
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
                        text: 'Anda Berhasil Menambah Data Siswa',
                        showConfirmButton: true,
                        timer: 1500
                    });
                    $("#formtambahdata")[0].reset();
                    listdata.ajax.reload(null, false);
                }
            });
            return false;
        });
        $('#listdata').on('click', '.batal-data', function() {
            var id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Konfirmasi',
                text: "Anda ingin Membatalkan Status Keluar/Lulus Siswa ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Batalkan',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                cancelButtonText: 'Tidak',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "Siswa_keluar_action/action.php?aksi=batal",
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
                        title: 'Aksi tidak jadi dilakukan',
                        showConfirmButton: true,
                        timer: 1500
                    })

                }
            })
        });
    });
    </script>

</body>

</html>