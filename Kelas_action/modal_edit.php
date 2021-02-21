<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_kelas WHERE id_kelas='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>

<form id="formubahdata" method="post"> 
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Nama Kelas <span class="text-warning">*</span></label>
        <input type="hidden" name="id_kelas_ubah" class="form-control" value="<?php echo $datpil['id_kelas']?>"  readonly>
        <input type="text" name="nama_kelas_ubah" class="form-control" value="<?php echo $datpil['nama_kelas']?>"  required="">
        
    </div>
    <div class="col-sm-6 form-group">
        <label>Tahun Akademik <span class="text-warning">*</span></label>
         <select class="form-control select2" name="id_tahun_akademik_ubah" required="">
        <option value="">~~ Pilih Tahun Akademik ~~</option>
        <?php 
            $sql="select * from tbl_tahun_akademik where status='Ya'";

            $hasil=mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_array($hasil)) {
            $id_tahun_akademik=$datpil['id_tahun_akademik'];
            if($id_tahun_akademik==$data['id_tahun_akademik']){
                 echo "<option value='$data[id_tahun_akademik]' selected>Semester $data[semester]  $data[tahun_akademik]</option>";
            }else{
                 echo "<option value='$data[id_tahun_akademik]'>Semester $data[semester]  $data[tahun_akademik]</option>";
             
            }
        } ?>
        </select>
    </div>
</div>
<div class="modal-footer panel-footer text-success">
    <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary"><i class="icofont icofont-save"></i>Simpan</button>
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  