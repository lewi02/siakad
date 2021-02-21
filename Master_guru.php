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
                <h1 class="page-title">Data Guru</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Guru</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Guru</div>
                        <div> <a href="javascript:void(0);" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-user-plus"></i> Tambah</a></div>
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" id="listdata" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>NIP</th>
                                    <th>NUPTK</th>
                                    <th>Jurusan</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>JK</th>
                                    <th>Nomor HP</th>
                                    <th>Email</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Guru</th>
                                    <th>NIP</th>
                                    <th>NUPTK</th>
                                    <th>Jurusan</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>JK</th>
                                    <th>Nomor HP</th>
                                    <th>Email</th>
                                    <th>Agama</th>
                                    <th>Alamat</th>
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
                                <div class="col-sm-12 form-group">
                                    <label for="nama_guru">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="nama_guru" name="nama_guru" placeholder="Nama Lengkap dengan Gelar" required="">
                                </div>                               
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label>NIP</label>
                                    <input class="form-control" id="nip" name="nip" type="number" placeholder="NIP">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label>NUPTK</label>
                                    <input class="form-control" id="nuptk" name="nuptk" type="number" placeholder="NUPTK">
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-sm-4 form-group">
                                    <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                                    <input class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" type="text" placeholder="Pendidikan Terakhir" required="">
                                </div>
                                <div class="col-sm-8 form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <input class="form-control" id="jurusan" name="jurusan" type="text" placeholder="Jurusan" required="">
                                </div>
                            </div>   
                             <div class="row">
                                <div class="col-sm-6 form-group">
                                    <label for="jk_guru">Jenis Kelamin</label>
                                    <select class="form-control" id="jk_guru" name="jk_guru" required="">
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div> 
                                <div class="col-sm-6 form-group">
                                    <label for="agama_guru">Agama</label>
                                    <select class="form-control" id="agama_guru" name="agama_guru" required="">
                                        <option value="Kristen">Kristen</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Khatolik">Khatolik</option>
                                    </select>
                                </div>  
                            </div>  
                            <div class="form-group">
                                <label for="alamat_guru">Alamat</label>
                                <input class="form-control" type="text" id="alamat_guru" name="alamat_guru" placeholder="Alamat" required="">
                            </div>
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                <label for="nohp_guru">Nomor HP</label>
                                <input class="form-control" type="number" id="nohp_guru" name="nohp_guru" placeholder="Nomor HP">
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label for="email_guru">Email</label>
                                    <input class="form-control" type="email" id="email_guru" name="email_guru" placeholder="Email">
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-sm-8 form-group">
                                    <label for="tempat_lahir_guru">Tempat Lahir</label>
                                    <input class="form-control" type="text" id="tempat_lahir_guru" name="tempat_lahir_guru" placeholder="Tempat Lahir" required="">
                                </div>
                                <div class="col-sm-4 form-group">
                                    <label for="tanggal_lahir_guru">Tanggal Lahir</label>
                                    <input class="form-control" type="date" id="tanggal_lahir_guru" name="tanggal_lahir_guru" placeholder="Tanggal Lahir" max="2005-12-30" required="">
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
            "ajax": "Guru_action/action.php?aksi=view_data",
            stateSave: true,
            "order": []
        });
        $('#formtambahdata').on('submit', function() {
            var form = $(this);     
            $.ajax({
                type: "POST",
                url: "Guru_action/action.php?aksi=simpan",
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
                        text: 'Anda Berhasil Menambah Data Guru',
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
                url: "Guru_action/modal_edit.php",
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
                            url: "Guru_action/action.php?aksi=edit",
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
                                    text: 'Anda Berhasil Mengubah Data Guru',
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
                        url: "Guru_action/action.php?aksi=hapus",
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