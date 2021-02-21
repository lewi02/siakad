<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_tu WHERE id_tu='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>

<form id="formubahdata" method="post"> 
<div class="row">
    <div class="col-sm-8 form-group">
        <label for="editnama_tu">Nama Lengkap</label>
        <input class="form-control" type="text" id="id_tu" name="id_tu" value="<?php echo $datpil['id_tu'];?>">
        <input class="form-control" type="text" id="editnama_tu" name="editnama_tu" value="<?php echo $datpil['nama_tu'];?>" placeholder="Nama Lengkap dengan Gelar" required="">
    </div>  
    <div class="col-sm-4 form-group">
        <label>NIP</label>
        <input class="form-control" type="number"  id="editnip_tu" name="editnip_tu" value="<?php echo $datpil['nip_tu'];?>"  placeholder="NIP" >
    </div>                              
</div>
<div class="row">
    <div class="col-sm-8 form-group">
        <label for="edittempat_lahir_tu">Tempat Lahir</label>
        <input class="form-control" type="text" id="edittempat_lahir_tu" name="edittempat_lahir_tu" value="<?php echo $datpil['tempat_lahir_tu'];?>" placeholder="Tempat Lahir">
    </div>
    <div class="col-sm-4 form-group">
        <label for="edittanggal_lahir_tu">Tanggal Lahir</label>
        <input class="form-control" type="date" id="edittanggal_lahir_tu" name="edittanggal_lahir_tu" value="<?php echo $datpil['tanggal_lahir_tu'];?>" placeholder="Tanggal Lahir">
    </div>
</div>

<div class="row">
    <div class="col-sm-6 form-group">
        <label for="editjk_tu">Jenis Kelamin</label>
        <select class="form-control" id="editjk_tu" name="editjk_tu">
        	<?php $jk_tu=$datpil['jk_tu'];?>
            <option <?php if( $jk_tu=='L'){echo "selected"; } ?> value="L">Laki - Laki</option>
            <option <?php if( $jk_tu=='P'){echo "selected"; } ?> value="P">Perempuan</option>
        </select>
    </div> 
    <div class="col-sm-6 form-group">
        <label for="editagama_tu">Agama</label>
        <select class="form-control" id="editagama_tu" name="editagama_tu">
        	<?php $agama=$datpil['agama_tu'];?>
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
    <label for="editnohp_tu">Nomor HP</label>
    <input class="form-control" type="number" id="editnohp_tu" name="editnohp_tu"  value="<?php echo $datpil['nohp_tu'];?>" placeholder="Nomor HP">
    </div>
    <div class="col-sm-6 form-group">
        <label for="editemail_tu">Email</label>
        <input class="form-control" type="email" id="editemail_tu" name="editemail_tu" value="<?php echo $datpil['email_tu'];?>" placeholder="Email">
    </div>
</div>
<div class="form-group">
    <label for="editalamat_tu">Alamat</label>
    <input class="form-control" type="text" id="editalamat_tu" name="editalamat_tu" value="<?php echo $datpil['alamat_tu'];?>" placeholder="Alamat">
</div>
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  