<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_tahun_akademik WHERE id_tahun_akademik='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>

<form id="formubahdata" method="post"> 
<div class="row">
    <div class="col-sm-12 form-group">
        <label>Tahun Akademik<span class="text-warning">*</span></label>
        <input type="Hidden" name="id_tahun_akademik" id="id_tahun_akademik" class="form-control" value="<?php echo $datpil['id_tahun_akademik']?>"  readonly>
        <input class="form-control" type="text" name="edittahun_akademik" value="<?php echo $datpil['tahun_akademik']?>"  placeholder="Tahun Akademik" required="">
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Semester <span class="text-warning">*</span></label>
        <select class="form-control select2" name="editsemester" required="">
        	 <?php $semester=$datpil['semester'];?>
            <option value="">~~ Pilih Semester ~~</option>
            <option <?php if( $semester=='Ganjil'){echo "selected"; } ?> value="Ganjil">Ganjil</option>
            <option <?php if( $semester=='Genap'){echo "selected"; } ?> value="Genap">Genap</option>
        </select>
    </div>
    <div class="col-sm-6 form-group">
        <label>Aktif <span class="text-warning">*</span></label>
        <select class="form-control select2" name="editstatus" required="">
        	 <?php $status=$datpil['status'];?>
            <option value="">~~ Piliha Status Aktif ~~</option>
            <option <?php if( $status=='Ya'){echo "selected"; } ?>  value="Ya">Ya</option>
            <option <?php if( $status=='Tidak'){echo "selected"; } ?>  value="Tidak">Tidak</option>
        </select>
    </div>
</div>
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  