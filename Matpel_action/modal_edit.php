<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_matpel WHERE id_matpel='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>

<form id="formubahdata" method="post"> 
<div class="form-group row">
    <label class="col-md-3 col-form-label">Nama Mata Pelajaran</label>
    <div class="col-md-9">
      <input type="Hidden" name="id_matpel_ubah" id="id_matpel_ubah" class="form-control" value="<?php echo $datpil['id_matpel']?>"  readonly>
      
      <input type="text" name="nama_matpel_ubah" id="nama_matpel_ubah" value="<?php echo $datpil['nama_matpel']?>"  class="form-control" placeholder="Nama Mata Pelajaran" required>
    </div>
</div>
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  