<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 
?>

<form id="formsimpannilai" method="post"> 

<div class="row">
    <div class="form-group row">
        <label  class="col-sm-4 col-form-label">Isi Nilai</label>
        <div class="col-sm-6">
          <input type="hidden"  class="form-control" id="id_nilai" name="id_nilai" value="<?php echo $datpil['id']?>" required="">
          <input type="number"  class="form-control" id="nilai" name="nilai" required="">
        </div>                               
    </div>
</div>
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  