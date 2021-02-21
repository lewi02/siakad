<?php
require_once '../include/db_connect.php';
$id =$_POST['id'];
$sql = "SELECT * FROM tbl_siswa left join tbl_tahun_akademik on tbl_siswa.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik where id_siswa='$id'";
$query = $connect->query($sql);
$row = $query->fetch_assoc();
?>

<form id="formubahdata" method="post"> 
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nama Siswa  <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="nama_siswa" value="<?php echo $row['nama_siswa'];?>" placeholder="Nama Siswa" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>NISN <span class="text-warning">*</span></label>
        <input class="form-control" type="number" name="nisn" value="<?php echo $row['nisn'];?>" placeholder="NISN" readonly>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Tempat Lahir <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="tempat_lahir_siswa" value="<?php echo $row['tempat_lahir_siswa'];?>" placeholder="Tempat Lahir" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Tanggal Lahir <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="tanggal_lahir_siswa" value="<?php echo  date('d F Y', strtotime($row['tanggal_lahir_siswa']));?>" placeholder="Tanggal Lahir" readonly>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Jenis Kelamin <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="jk_siswa" value="<?php echo $row['jk_siswa'];?>" placeholder="Tempat Lahir" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Agama <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="agama_siswa" value="<?php echo $row['agama_siswa'];?>" placeholder="Tempat Lahir" readonly>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nomor HP/Telp</label>
        <input class="form-control" type="number" name="nohp_siswa" value="<?php echo $row['nohp_siswa'];?>" placeholder="Nomor HP/Telp" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Tahun Akademik <span class="text-warning">*</span></label>
        <input class="form-control" type="number" name="tahun_akademik" value="<?php echo $row['tahun_akademik'];?>" readonly>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Desa/Kelurahan <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="desa" value="<?php echo $row['desa'];?>" placeholder="Desa/Kelurahan" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Kecamatan <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="kecamatan" value="<?php echo $row['kecamatan'];?>" placeholder="Kecamatan" readonly>
    </div>
</div>
<div class="form-group">
    <label>Alamat <span class="text-warning">*</span></label>
    <input class="form-control" type="text" name="alamat_siswa" value="<?php echo $row['alamat_siswa'];?>" placeholder="Alamat" readonly>
</div>
<hr>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nama Ayah </label>
        <input class="form-control" type="text" name="nama_ayah" value="<?php echo $row['nama_ayah'];?>" placeholder="Nama Ayah" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Nama Ibu <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="nama_ibu" value="<?php echo $row['nama_ibu'];?>" placeholder="Nama Ibu" readonly>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Pekerjaan Ayah </label>
        <input class="form-control" type="text" name="pekerjaan_ayah" value="<?php echo $row['pekerjaan_ayah'];?>" placeholder="Pekerjaan Ayah" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Pekerjaan Ibu <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="pekerjaan_ibu" value="<?php echo $row['pekerjaan_ibu'];?>" placeholder="Pekerjaan Ibu" readonly>
    </div>
</div>
 <div class="row">
    <div class="col-sm-6 form-group">
        <label>Pendidikan Ayah</label>
        <input class="form-control" type="text" name="pendidikan_ayah" value="<?php echo $row['pendidikan_ayah'];?>" placeholder="Pendidikan Ayah" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Pendidikan Ibu <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="pendidikan_ibu" value="<?php echo $row['pendidikan_ibu'];?>" placeholder="Pendidikan Ibu" readonly>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nama Wali</label>
        <input class="form-control" type="text" name="nama_wali" value="<?php echo $row['nama_wali'];?>" placeholder="Nama Wali" readonly>
    </div>
    <div class="col-sm-6 form-group">
        <label>Pekerjaan Wali</label>
        <input class="form-control" type="text" name="pekerjaan_wali" value="<?php echo $row['pekerjaan_wali'];?>" placeholder="Pekerjaan Wali" readonly>
    </div>
</div>                        
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  