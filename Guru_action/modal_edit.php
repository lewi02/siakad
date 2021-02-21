<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_guru WHERE id_guru='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>

<form id="formubahdata" method="post"> 
<div class="row">
    <div class="col-sm-12 form-group">
        <label for="editnama_guru">Nama Lengkap</label>
        <input class="form-control" type="hidden" id="id_guru" name="id_guru" value="<?php echo $datpil['id_guru'];?>">
        <input class="form-control" type="text" id="editnama_guru" name="editnama_guru" value="<?php echo $datpil['nama_guru'];?>" placeholder="Nama Lengkap dengan Gelar" required="">
    </div>                                
</div>

<div class="row">
    <div class="col-sm-6 form-group">
        <label>NIP</label>
        <input class="form-control" type="number"  id="editnip" name="editnip" value="<?php echo $datpil['nip'];?>"  placeholder="NIP" >
    </div>
    <div class="col-sm-6 form-group">
        <label>NUPTK</label>
        <input class="form-control" type="number" id="editnuptk" name="editnuptk" value="<?php echo $datpil['nuptk'];?>"  placeholder="NUPTK">
    </div>
</div>   
<div class="row">
    <div class="col-sm-4 form-group">
        <label for="editpendidikan_terakhir">Pendidikan Terakhir</label>
        <input class="form-control" type="text" id="editpendidikan_terakhir" name="editpendidikan_terakhir" value="<?php echo $datpil['pendidikan_terakhir'];?>" placeholder="Pendidikan Terakhir" required="">
    </div>
    <div class="col-sm-8 form-group">
        <label for="editjurusan">Jurusan</label>
        <input class="form-control" type="text" id="editjurusan" name="editjurusan" value="<?php echo $datpil['jurusan'];?>" placeholder="Jurusan"  required="">
    </div>
</div>   
<div class="row">
    <div class="col-sm-6 form-group">
        <label for="editjk_guru">Jenis Kelamin</label>
        <select class="form-control" id="editjk_guru" name="editjk_guru">
        	<?php $jk_guru=$datpil['jk_guru'];?>
            <option <?php if( $jk_guru=='L'){echo "selected"; } ?> value="L">Laki - Laki</option>
            <option <?php if( $jk_guru=='P'){echo "selected"; } ?> value="P">Perempuan</option>
        </select>
    </div> 
    <div class="col-sm-6 form-group">
        <label for="editagama_guru">Agama</label>
        <select class="form-control" id="editagama_guru" name="editagama_guru">
        	<?php $agama=$datpil['agama_guru'];?>
			<option <?php if( $agama=='Kristen'){echo "selected"; } ?> value='Kristen'>Kristen</option>
			<option <?php if( $agama=='Islam'){echo "selected"; } ?> value='Islam'>Islam</option>
			<option <?php if( $agama=='Hindu'){echo "selected"; } ?> value='Hindu'>Hindu</option>
			<option <?php if( $agama=='Budha'){echo "selected"; } ?> value='Budha'>Budha</option>
			<option <?php if( $agama=='Khatolik'){echo "selected"; } ?> value='Khatolik'>Khatolik</option>
        </select>
    </div>  
</div>  
<div class="form-group">
    <label for="editalamat_guru">Alamat</label>
    <input class="form-control" type="text" id="editalamat_guru" name="editalamat_guru" value="<?php echo $datpil['alamat_guru'];?>" placeholder="Alamat">
</div>
<div class="row">
    <div class="col-sm-6 form-group">
    <label for="editnohp_guru">Nomor HP</label>
    <input class="form-control" type="number" id="editnohp_guru" name="editnohp_guru"  value="<?php echo $datpil['nohp_guru'];?>" placeholder="Nomor HP">
    </div>
    <div class="col-sm-6 form-group">
        <label for="editemail_guru">Email</label>
        <input class="form-control" type="email" id="editemail_guru" name="editemail_guru" value="<?php echo $datpil['email_guru'];?>" placeholder="Email">
    </div>
</div>
 <div class="row">
    <div class="col-sm-8 form-group">
        <label for="edittempat_lahir_guru">Tempat Lahir</label>
        <input class="form-control" type="text" id="edittempat_lahir_guru" name="edittempat_lahir_guru" value="<?php echo $datpil['tempat_lahir_guru'];?>" placeholder="Tempat Lahir">
    </div>
    <div class="col-sm-4 form-group">
        <label for="edittanggal_lahir_guru">Tanggal Lahir</label>
        <input class="form-control" type="date" id="edittanggal_lahir_guru" name="edittanggal_lahir_guru" value="<?php echo $datpil['tanggal_lahir_guru'];?>" placeholder="Tanggal Lahir">
    </div>
</div>
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  