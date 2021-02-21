 <?php 
session_start();
require_once 'include/db_connect.php';
 $id =$_GET['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru WHERE id_jadwal='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);

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
                <h1 class="page-title">Data Absensi</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php"><i class="fa fa-home font-20"></i></a>
                    </li>
                    <li class="breadcrumb-item">Data Absensi</li>
                </ol>
            </div>
            <div class="page-content fade-in-up">
               <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Data Absensi</div>    
                        <div> <a href="javascript:void(0);" class="btn btn-primary btn-mini" data-toggle="modal" data-target="#Modal_Add"><i class="fa fa-user-plus"></i> Tambah</a></div>
                        <div> <a href="Absensi.php" class="btn btn-primary btn-mini"><i class="fa fa-reply"></i> Kembali</a></div>                    
                    </div>
                    <div class="ibox-body">
                        <table class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <tbody>
                                <tr>
                                    <th width="20%">Mata Pelajaran</th>
                                    <th width="30%">: <?php echo $datpil['nama_matpel']?></th>
                                    <th width="20%">Tahun Akademik</th>
                                    <th width="30%">: <?php echo $datpil['semester']?> <?php echo $datpil['tahun_akademik']?></th>                                    
                                </tr>
                                <tr>
                                    <th width="20%">Kelas</th>
                                    <th width="30%">: <?php echo $datpil['nama_kelas']?></th>
                                    <th width="20%">Guru</th>
                                    <th width="30%">: <?php echo $datpil['nama_guru']?></th>                                    
                                </tr>
                                <tr>
                                    <th width="20%">Hari</th>
                                    <th width="30%">: <?php echo $datpil['hari']?></th>
                                    <th width="20%">Jam</th>
                                    <th width="30%">: <?php echo $datpil['jam_mulai']?> - <?php echo $datpil['jam_selesai']?></th>                                    
                                </tr>
                            </tbody>                           
                        </table>
                        <hr>
                        <div id="contentData"></div>
                       
                    </div>
                </div>                
            </div>
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content panel panel-primary">
                        <div class="modal-header panel-heading bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Pilih Tanggal Absensi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- MODAL ADD -->
                        <form id="formtambahdata">
                        <div class="modal-body panel-body">              
                            <div class="form-group row">
                                <label  class="col-sm-4 col-form-label">Pilih Tanggal Absensi</label>
                                <div class="col-sm-6">
                                  <input type="hidden"  class="form-control" id="id_jadwal" name="id_jadwal" value="<?php echo $datpil['id_jadwal']?>" required="">
                                  <input type="hidden"  class="form-control" id="id_kelas" name="id_kelas" value="<?php echo $datpil['id_kelas']?>" required="">
                                  <input type="date"  class="form-control" id="tanggal_absen" name="tanggal_absen" required="">
                                </div>                               
                            </div>
                            
                            
                        </div>
                        <div class="modal-footer panel-footer text-success">
                            <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Proses</button>
                            <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
                        </div>
                        </form>
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
           <?php include "include/case_footer.php";?>
        </div>
    </div>
    <?php include "include/case_js.php";?>
    <script>
    $(document).ready(function() {

        loadData();

        $('#formtambahdata').on('submit', function() {
            var form = $(this);     
            $.ajax({
                type: "POST",
                url: "Absensi_action/action.php?aksi=simpan",
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
                        text: 'Anda Berhasil Memproses Absensi',
                        showConfirmButton: true,
                        timer: 1500
                    });
                    $('#Modal_Add').modal('hide');
                    var id_kelas=$('#id_kelas').val();
                    var id_jadwal=$('#id_jadwal').val();
                    var tanggal_absen=$('#tanggal_absen').val();
                    loadData();
                    $.ajax({
                        type: "post",
                        url: "Absensi_action/isi_absen.php",
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
                            id_kelas: id_kelas,
                            id_jadwal: id_jadwal,
                            tanggal_absen: tanggal_absen
                        },
                        success: function(data) {
                            swal.close();
                            $('#Modal_Edit').modal('show');
                            $('#formdata').html(data);

                            var litssiswa = $('#litssiswa').DataTable({
                                "processing": true,
                                 ajax:{
                                    type: "post",
                                    url: "Absensi_action/action.php?aksi=view_absen_siswa",
                                    data: {
                                        id_jadwal: id_jadwal,
                                        tanggal_absen: tanggal_absen
                                    }, 
                                 },
                                stateSave: true,
                                "order": []
                            });
                            $('#litssiswa').on('click', '.hadir', function() {
                                var id = $(this).data('id');
                                 $.ajax({
                                    type: "post",
                                    url: "Absensi_action/action.php?aksi=hadir",
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
                                            title: 'Berhasil Terupdate',
                                            timer: 500
                                        })
                                        // bersihkan form pada modal
                                        litssiswa.ajax.reload(null, false)
                                        loadData();
                                    }
                                })
                                return false;
                            });
                            $('#litssiswa').on('click', '.sakit', function() {
                                var id = $(this).data('id');
                                 $.ajax({
                                    type: "post",
                                    url: "Absensi_action/action.php?aksi=sakit",
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
                                            title: 'Berhasil Terupdate',
                                            timer: 500
                                        })
                                        // bersihkan form pada modal
                                        litssiswa.ajax.reload(null, false)
                                        loadData();
                                    }
                                })
                                return false;
                            });
                            $('#litssiswa').on('click', '.izin', function() {
                                var id = $(this).data('id');
                                 $.ajax({
                                    type: "post",
                                    url: "Absensi_action/action.php?aksi=izin",
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
                                            title: 'Berhasil Terupdate',
                                            timer: 500
                                        })
                                        // bersihkan form pada modal
                                        litssiswa.ajax.reload(null, false)
                                        loadData();
                                    }
                                })
                                return false;
                            });
                            $('#litssiswa').on('click', '.alpa', function() {
                                var id = $(this).data('id');
                                 $.ajax({
                                    type: "post",
                                    url: "Absensi_action/action.php?aksi=alpa",
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
                                            title: 'Berhasil Terupdate',
                                            timer: 500
                                        })
                                        // bersihkan form pada modal
                                        litssiswa.ajax.reload(null, false)
                                        loadData();
                                    }
                                })
                                return false;
                            });
                        }
                    });
                }
            });
            return false;
        });
        $('#contentData').on('click', '.edit_absen', function() {
            var id_kelas=$('#id_kelas').val();
            var id_jadwal=$('#id_jadwal').val();
            var tanggal_absen = $(this).data('id');
            $.ajax({
                type: "post",
                url: "Absensi_action/isi_absen.php",
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
                    id_kelas: id_kelas,
                    id_jadwal: id_jadwal,
                    tanggal_absen: tanggal_absen
                },
                success: function(data) {
                    swal.close();
                    $('#Modal_Edit').modal('show');
                    $('#formdata').html(data);

                    var litssiswa = $('#litssiswa').DataTable({
                        "processing": true,
                         ajax:{
                            type: "post",
                            url: "Absensi_action/action.php?aksi=view_absen_siswa",
                            data: {
                                id_jadwal: id_jadwal,
                                tanggal_absen: tanggal_absen
                            }, 
                         },
                        stateSave: true,
                        "order": []
                    });
                    $('#litssiswa').on('click', '.hadir', function() {
                        var id = $(this).data('id');
                         $.ajax({
                            type: "post",
                            url: "Absensi_action/action.php?aksi=hadir",
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
                                    title: 'Berhasil Terupdate',
                                    timer: 500
                                })
                                // bersihkan form pada modal
                                litssiswa.ajax.reload(null, false)
                                loadData();
                            }
                        })
                        return false;
                    });
                    $('#litssiswa').on('click', '.sakit', function() {
                        var id = $(this).data('id');
                         $.ajax({
                            type: "post",
                            url: "Absensi_action/action.php?aksi=sakit",
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
                                    title: 'Berhasil Terupdate',
                                    timer: 500
                                })
                                // bersihkan form pada modal
                                litssiswa.ajax.reload(null, false)
                                loadData();
                            }
                        })
                        return false;
                    });
                    $('#litssiswa').on('click', '.izin', function() {
                        var id = $(this).data('id');
                         $.ajax({
                            type: "post",
                            url: "Absensi_action/action.php?aksi=izin",
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
                                    title: 'Berhasil Terupdate',
                                    timer: 500
                                })
                                // bersihkan form pada modal
                                litssiswa.ajax.reload(null, false)
                                loadData();
                            }
                        })
                        return false;
                    });
                    $('#litssiswa').on('click', '.alpa', function() {
                        var id = $(this).data('id');
                         $.ajax({
                            type: "post",
                            url: "Absensi_action/action.php?aksi=alpa",
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
                                    title: 'Berhasil Terupdate',
                                    timer: 500
                                })
                                // bersihkan form pada modal
                                litssiswa.ajax.reload(null, false)
                                loadData();
                            }
                        })
                        return false;
                    });
                }
            });  
            
        });
        $('#contentData').on('click', '.hapus_absen', function() {
            var id_jadwal=$('#id_jadwal').val();
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
                        url: "Absensi_action/action.php?aksi=hapus_absen",
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
                            id: id,
                            id_jadwal: id_jadwal
                        },
                        success: function(data) {

                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil Terhapus',
                                showConfirmButton: true,
                                timer: 1500
                            })

                            loadData();
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
        function loadData() {
            var id_kelas=$('#id_kelas').val();
            var id_jadwal=$('#id_jadwal').val();
            $.ajax({
                url: 'Absensi_action/tampildata.php',
                type: "POST",
                data: {
                    id_kelas: id_kelas,
                    id_jadwal: id_jadwal,
                },
                success: function(data) {
                    $('#contentData').html(data);
                }
            });
        }
        
    });
    </script>

</body>

</html>