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
                <h1 class="page-title">Data Siswa</h1>
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
                        <div class="ibox-title">Data Siswa</div>
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
                                    <th>Tahun Masuk</th>           
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>            
                                    <th>NISN</th>            
                                    <th>Tempat Tanggal Lahir</th>            
                                    <th>Tahun Masuk</th>           
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
                                    <label>Nama Siswa  <span class="text-warning">*</span></label>
                                    <input class="form-control" type="text" name="nama_siswa" placeholder="Nama Siswa" required="">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>NISN <span class="text-warning">*</span></label>
                                    <input class="form-control" type="number" name="nisn" placeholder="NISN" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Tempat Lahir <span class="text-warning">*</span></label>
                                    <input class="form-control" type="text" name="tempat_lahir_siswa" placeholder="Tempat Lahir" required="">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Tanggal Lahir <span class="text-warning">*</span></label>
                                    <?php 
                                    $tanggal = Date("Y-m-d");
                                    $tgl_lama = date('Y-m-d', strtotime('-10 year', strtotime( $tanggal ))); 
                                    ?>
                                    <input class="form-control" type="date" name="tanggal_lahir_siswa" max="<?php echo $tgl_lama;?>" placeholder="Tanggal Lahir" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Jenis Kelamin <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="jk_siswa" required="">
                                        <option value="">~~ Pilih Jenis Kelamin ~~</option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Agama <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="agama_siswa" required="">
                                        <option value="">~~ Pilih Agama ~~</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindhu">Hindhu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Khatolik">Khatolik</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Nomor HP/Telp</label>
                                    <input class="form-control" type="number" name="nohp_siswa" placeholder="Nomor HP/Telp">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Tahun Akademik <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="id_tahun_akademik" required="">
                                    <option value="">~~ Pilih Tahun Akademik ~~</option>
                                    <?php 
                                        $sql="select * from tbl_tahun_akademik";

                                        $hasil=mysqli_query($connect,$sql);
                                        while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <option value="<?php echo $data['id_tahun_akademik'];?>">Semester <?php echo $data['semester'];?> <?php echo $data['tahun_akademik'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Desa/Kelurahan <span class="text-warning">*</span></label>
                                    <input class="form-control" type="text" name="desa" placeholder="Desa/Kelurahan" required="">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Kecamatan <span class="text-warning">*</span></label>
                                    <input class="form-control" type="text" name="kecamatan" placeholder="Kecamatan" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="text-warning">*</span></label>
                                <input class="form-control" type="text" name="alamat_siswa" placeholder="Alamat" required="">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Nama Ayah </label>
                                    <input class="form-control" type="text" name="nama_ayah" placeholder="Nama Ayah">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Nama Ibu <span class="text-warning">*</span></label>
                                    <input class="form-control" type="text" name="nama_ibu" placeholder="Nama Ibu" required="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Pekerjaan Ayah </label>
                                    <input class="form-control" type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Pekerjaan Ibu <span class="text-warning">*</span></label>
                                    <input class="form-control" type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" required="">
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Pendidikan Ayah</label>
                                    <input class="form-control" type="text" name="pendidikan_ayah" placeholder="Pendidikan Ayah">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Pendidikan Ibu <span class="text-warning">*</span></label>
                                    <input class="form-control" type="text" name="pendidikan_ibu" placeholder="Pendidikan Ibu" required="">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Nama Wali</label>
                                    <input class="form-control" type="text" name="nama_wali" placeholder="Nama Wali">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Pekerjaan Wali</label>
                                    <input class="form-control" type="text" name="pekerjaan_wali" placeholder="Pekerjaan Wali">
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
            "ajax": "Siswa_action/action.php?aksi=view_data",
            stateSave: true,
            "order": []
        });
        $('#formtambahdata').on('submit', function() {
            var form = $(this);     
            $.ajax({
                type: "POST",
                url: "Siswa_action/action.php?aksi=simpan",
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
                    $('#Modal_Add').modal('hide');
                    listdata.ajax.reload(null, false);
                }
            });
            return false;
        });
        $('#listdata').on('click', '.ubah-data', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "Siswa_action/modal_edit.php",
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
                   
                    $('#formubahdata').on('submit', function() {
                        var form = $(this);                
                        $.ajax({
                            type: "post",
                            url: "Siswa_action/action.php?aksi=edit",
                            beforeSend: function() {
                                Swal.fire({
                                    title: 'Menunggu',
                                    html: 'Memproses data',
                                    onOpen: () => {
                                        swal.showLoading()
                                    }
                                })
                            },
                            data: form.serialize(),
                            success: function(data) {
                                listdata.ajax.reload(null, false);
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Berhasil Terupdate',
                                    text: 'Anda Berhasil Mengubah Data Siswa',
                                    showConfirmButton: true,
                                    timer: 1500
                                })
                                // bersihkan form pada modal
                                $('#Modal_Edit').modal('hide');
                            }
                        })
                        return false;
                    });
                }
            });
        });
        $('#listdata').on('click', '.view-data', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "post",
                url: "Siswa_action/modal_view.php",
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
                   
                }
            });
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
                        url: "Siswa_action/action.php?aksi=hapus",
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
    });
    </script>

</body>

</html>