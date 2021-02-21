<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>Halaman Registrasi</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Halaman Registrasi">
    <meta name="author" content="
    ">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome JS-->
    <script defer src="../assets/psb/fontawesome/js/all.min.js"></script>

    <!-- Theme CSS -->  
    <link id="theme-style" rel="stylesheet" href="../assets/psb/css/theme.css">
    <link href="../assets/vendors/sweetalert2/sweetalert2.min.css" rel="stylesheet" >

</head> 

<body>    
    <header class="header fixed-top">	    
        <div class="branding docs-branding">
            <div class="container-fluid position-relative py-2">
                <div class="docs-logo-wrapper">
	                <div class="site-logo"><a class="navbar-brand" href="#"><img class="logo-icon mr-2" src="../assets/psb/images/coderdocs-logo.svg" alt="logo"><span class="logo-text">SMP Satap<span class="text-alt">Tolulos</span></span></a></div>    
                </div><!--//docs-logo-wrapper-->
	            
            </div><!--//container-->
        </div><!--//branding-->
    </header><!--//header-->
    
    
    <div class="page-header theme-bg-dark py-5 position-relative">
	    <div class="theme-bg-shapes-right"></div>
	    <div class="theme-bg-shapes-left"></div>
	    <div class="container">
		    <h1 class="page-heading single-col-max mx-auto text-center">Halaman Registrasi</h1>
		    <div class="page-intro single-col-max mx-auto text-center">Silahkan melakukan pendaftaran siswa baru</div>
		    <div class="row justify-content-center">
			    <div class="col-12">
				    <div class="card shadow-sm">
					    <div class="card-body">
						    <h5 class="card-title mb-3">
							    <span class="theme-icon-holder card-icon-holder mr-2">
							        <i class="fas fa-map-signs"></i>
						        </span><!--//card-icon-holder-->
						        <span class="card-title-text text-center">Registrasi</span>
						    </h5>
						    <div class="card-text">
						    	<form id="formtambahdata">
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
	                                    <label>Email <span class="text-warning">*</span></label>
	                                    <input class="form-control" type="email" name="email_siswa" placeholder="Email" required="">
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
	                            <hr>
	                            <div class="row">
	                                <div class="col-sm-6 form-group">
	                                    <label>Asal Sekolah SD</label>
	                                    <input class="form-control" type="text" name="asal_sekolah" placeholder="Asal Sekolah SD">
	                                </div>
	                                <div class="col-sm-4 form-group">
	                                    <label>Nomor Ijazah</label>
	                                    <input class="form-control" type="text" name="nomor_ijazah" placeholder="Nomor Ijazah">
	                                </div>
	                                <div class="col-sm-2 form-group">
	                                    <label>Nilai Akhir</label>
	                                    <input class="form-control" type="text" name="nilai_akhir" placeholder="Nilai Akhir">
	                                </div>
	                            </div> 
	                             <button type="submit" class="btn btn-primary d-none d-lg-flex"><i class="fas fa-save"></i> Simpan</button>                     
						    </div>
						    </form>
					    </div><!--//card-body-->
				    </div><!--//card-->
			    </div><!--//col-->
				    
			</div><!--//row-->
	    </div>
    </div><!--//page-header-->
    
    <footer class="footer">

	    <div class="footer-bottom text-center py-5">
	     	<small class="copyright">Designed with <i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="theme-link" href="" target="_blank"> Agusmin Baika</a> AMIK  Luwuk Banggai</small>
	    </div>
	    
    </footer>
       
    <!-- Javascript -->          
    <script src="../assets/psb/plugins/jquery-3.4.1.min.js"></script>
    <script src="../assets/psb/plugins/popper.min.js"></script>
    <script src="../assets/psb/plugins/bootstrap/js/bootstrap.min.js"></script>  
    <script src="../assets/vendors/sweetalert2/sweetalert2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#formtambahdata').on('submit', function() {
            var form = $(this);     
            $.ajax({
                type: "POST",
                url: "action.php?aksi=simpan",
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
                        text: 'Anda Berhasil Melakukan Pendaftaran, Pengumuman Kelulusan akan disampiakan melalui telepon dan Email'
                    });
                    $("#formtambahdata")[0].reset();
                    listdata.ajax.reload(null, false);
                }
            });
            return false;
        });
       
    });
	</script>
</body>
</html> 