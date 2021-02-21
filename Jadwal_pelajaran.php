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
                <h1 class="page-title">Data Jadwal Pelajaran</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Jadwal Pelajaran</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Jadwal Pelajaran</div>
                        <div> <a href="javascript:void(0);" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-user-plus"></i> Tambah</a></div>
                    </div>
                    <div class="ibox-body">
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
                                <div class="col-sm-8 form-group">
                                    <label>Kelas | Tahun Akademik <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="id_kelas" required="">
                                    <option value="">~~ Pilih Tahun Akademik ~~</option>
                                    <?php 
                                        $sql="select * from tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik where status='Ya'";

                                        $hasil=mysqli_query($connect,$sql);
                                        while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <option value="<?php echo $data['id_kelas'];?>"><?php echo $data['nama_kelas'];?> | <?php echo $data['semester'];?> <?php echo $data['tahun_akademik'];?></option>
                                    <?php } ?>
                                    </select>
                                </div>                              
                                <div class="col-sm-4 form-group">
                                    <label>Hari <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="hari" required="">
                                        <option value="">~~ Pilih Hari ~~</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
									
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>Mata Pelajaran <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="id_matpel"  id="ddlKegiatan" required="">
                                    <option value="">~~ Pilih Mata Pelajaran ~~</option>
                                    <?php 
                                        $sqls="select * from tbl_matpel";

                                        $hasils=mysqli_query($connect,$sqls);
                                        while ($data_matpel = mysqli_fetch_array($hasils)) {
                                    ?>
                                    <option value="<?php echo $data_matpel['id_matpel'];?>"><?php echo $data_matpel['nama_matpel'];?></option>
                                    <?php } ?>
                                    <option value="0">Kegiatan Lainnya</option>
                                    </select>
                                </div>                                
                                <div id="dvKegiatan" class="col-sm-6 form-group" style="display: none">
                                    <label>Kegiatan Lainnya( Misalnya Apel Pagi) <span class="text-warning">*</span></label>
                                    <input class="form-control" name="keterangan" type="text" placeholder="Kegiatan Lainnya( Misalnya Apel Pagi)">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 form-group">
                                    <label>Jam Mulai <span class="text-warning">*</span></label>
                                    <input class="form-control" name="jam_mulai" type="time" placeholder="jam_mulai">
                                </div>
                                <div class="col-sm-3 form-group">
                                    <label>Jam Selesai <span class="text-warning">*</span></label>
                                    <input class="form-control" name="jam_selesai" type="time" placeholder="Jam Selesai">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>Guru Bidang Studi <span class="text-warning">*</span></label>
                                    <select class="form-control select2" name="id_guru">
                                    <option value="">~~ Pilih Guru ~~</option>
                                    <?php 
                                        $sql_guru="select * from tbl_guru";

                                        $hasil_guru=mysqli_query($connect,$sql_guru);
                                        while ($data_guru = mysqli_fetch_array($hasil_guru)) {
                                    ?>
                                    <option value="<?php echo $data_guru['id_guru'];?>"><?php echo $data_guru['nama_guru'];?></option>
                                    <?php } ?>
                                    </select>
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
        $("#ddlKegiatanedit").change(function () {
            if ($(this).val() == "0") {
                $("#dvKegiatanedit").show();
            } else {
                $("#dvKegiatanedit").hide();
            }
        });
        $("#ddlKegiatan").change(function () {
            if ($(this).val() == "0") {
                $("#dvKegiatan").show();
            } else {
                $("#dvKegiatan").hide();
            }
        });

       var listdata = $('#listdata').DataTable({
            "processing": true,
            "ajax": "Jadwal_pelajaran_action/action.php?aksi=view_data",
            stateSave: true,
            "order": []
        });
        $('#formtambahdata').on('submit', function() {
            var form = $(this);     
            $.ajax({
                type: "POST",
                url: "Jadwal_pelajaran_action/action.php?aksi=simpan",
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
                        text: 'Anda Berhasil Menambah Data Jadwal Pelajaran',
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
                url: "Jadwal_pelajaran_action/modal_edit.php",
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
                            url: "Jadwal_pelajaran_action/action.php?aksi=edit",
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
                                    text: 'Anda Berhasil Mengubah Data Jadwal Pelajaran',
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
                        url: "Jadwal_pelajaran_action/action.php?aksi=hapus",
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