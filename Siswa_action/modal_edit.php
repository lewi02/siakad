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
        <input class="form-control" type="hidden" name="editid_siswa" value="<?php echo $row['id_siswa'];?>">
        <input class="form-control" type="text" name="editnama_siswa" value="<?php echo $row['nama_siswa'];?>" placeholder="Nama Siswa" required="">
    </div>
    <div class="col-sm-6 form-group">
        <label>NISN <span class="text-warning">*</span></label>
        <input class="form-control" type="number" name="editnisn" value="<?php echo $row['nisn'];?>" placeholder="NISN" required="">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Tempat Lahir <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="edittempat_lahir_siswa" value="<?php echo $row['tempat_lahir_siswa'];?>" placeholder="Tempat Lahir" required="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Tanggal Lahir <span class="text-warning">*</span></label>
        <?php 
        $tanggal = Date("Y-m-d");
        $tgl_lama = date('Y-m-d', strtotime('-10 year', strtotime( $tanggal ))); 
        ?>
        <input class="form-control" type="date" name="edittanggal_lahir_siswa" value="<?php echo $row['tanggal_lahir_siswa'];?>" max="<?php echo $tgl_lama;?>" placeholder="Tanggal Lahir" required="">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label for="editjk_guru">Jenis Kelamin</label>
        <select class="form-control" id="editjk_guru" name="editeditjk_guru">
            <?php $jk_guru=$datpil['jk_guru'];?>
            <option <?php if( $jk_guru=='L'){echo "selected"; } ?> value="L">Laki - Laki</option>
            <option <?php if( $jk_guru=='P'){echo "selected"; } ?> value="P">Perempuan</option>
        </select>
    </div> 
    <div class="col-sm-6 form-group">
        <label for="editagama_guru">Agama</label>
        <select class="form-control" id="editagama_guru" name="editeditagama_guru">
            <?php $agama=$datpil['agama_guru'];?>
            <option <?php if( $agama=='Kristen'){echo "selected"; } ?> value='Kristen'>Kristen</option>
            <option <?php if( $agama=='Islam'){echo "selected"; } ?> value='Islam'>Islam</option>
            <option <?php if( $agama=='Hindu'){echo "selected"; } ?> value='Hindu'>Hindu</option>
            <option <?php if( $agama=='Budha'){echo "selected"; } ?> value='Budha'>Budha</option>
            <option <?php if( $agama=='Khatolik'){echo "selected"; } ?> value='Khatolik'>Khatolik</option>
        </select>
    </div>  
</div>  
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nomor HP/Telp</label>
        <input class="form-control" type="number" name="editnohp_siswa" value="<?php echo $row['nohp_siswa'];?>"  placeholder="Nomor HP/Telp">
    </div>
    <div class="col-sm-6 form-group">
        <label>Tahun Akademik <span class="text-warning">*</span></label>
        <select class="form-control select2" name="editid_tahun_akademik" required="">
        <option value="">~~ Pilih Tahun Akademik ~~</option>
        <?php 
            $sql="select * from tbl_tahun_akademik";

            $hasil=mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_array($hasil)) {
       
                $id_tahun_akademik=$row['id_tahun_akademik'];
                if($id_tahun_akademik==$data['id_tahun_akademik']){
                     echo "<option value='$data[id_tahun_akademik]' selected>Semester $data[semester]  $data[tahun_akademik]</option>";
                }else{
                     echo "<option value='$data[id_tahun_akademik]'>Semester $data[semester]  $data[tahun_akademik]</option>";
                 
                }
            } 
        ?>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Desa/Kelurahan <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="editdesa" value="<?php echo $row['desa'];?>"  placeholder="Desa/Kelurahan" required="">
    </div>
    <div class="col-sm-6 form-group">
        <label>Kecamatan <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="editkecamatan" value="<?php echo $row['kecamatan'];?>"  placeholder="Kecamatan" required="">
    </div>
</div>
<div class="form-group">
    <label>Alamat <span class="text-warning">*</span></label>
    <input class="form-control" type="text" name="editalamat_siswa" value="<?php echo $row['alamat_siswa'];?>"  placeholder="Alamat" required="">
</div>
<hr>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nama Ayah </label>
        <input class="form-control" type="text" name="editnama_ayah" value="<?php echo $row['nama_ayah'];?>"  placeholder="Nama Ayah">
    </div>
    <div class="col-sm-6 form-group">
        <label>Nama Ibu <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="editnama_ibu" value="<?php echo $row['nama_ibu'];?>"  placeholder="Nama Ibu" required="">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Pekerjaan Ayah </label>
        <input class="form-control" type="text" name="editpekerjaan_ayah" value="<?php echo $row['pekerjaan_ayah'];?>"  placeholder="Pekerjaan Ayah">
    </div>
    <div class="col-sm-6 form-group">
        <label>Pekerjaan Ibu <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="editpekerjaan_ibu" value="<?php echo $row['pekerjaan_ibu'];?>"  placeholder="Pekerjaan Ibu" required="">
    </div>
</div>
 <div class="row">
    <div class="col-sm-6 form-group">
        <label>Pendidikan Ayah</label>
        <input class="form-control" type="text" name="editpendidikan_ayah" value="<?php echo $row['pendidikan_ayah'];?>"  placeholder="Pendidikan Ayah">
    </div>
    <div class="col-sm-6 form-group">
        <label>Pendidikan Ibu <span class="text-warning">*</span></label>
        <input class="form-control" type="text" name="editpendidikan_ibu" value="<?php echo $row['pendidikan_ibu'];?>"  placeholder="Pendidikan Ibu" required="">
    </div>
</div>
<hr>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nama Wali</label>
        <input class="form-control" type="text" name="editnama_wali" value="<?php echo $row['nama_wali'];?>"  placeholder="Nama Wali">
    </div>
    <div class="col-sm-6 form-group">
        <label>Pekerjaan Wali</label>
        <input class="form-control" type="text" name="editpekerjaan_wali" value="<?php echo $row['pekerjaan_wali'];?>"  placeholder="Pekerjaan Wali">
    </div>
</div>                     
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  