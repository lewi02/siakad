<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik WHERE id_kelas='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>

<form id="formubahdata" method="post"> 
<div class="row">
    <div class="col-sm-4 form-group">
        <label>Semester<span class="text-warning">*</span></label>
        <input type="Hidden" name="id_kelas" id="id_kelas" class="form-control" value="<?php echo $datpil['id_kelas']?>"  readonly>
        <input class="form-control" type="text" value="<?php echo $datpil['semester']?>"  readonly>
    </div>
    <div class="col-sm-4 form-group">
        <label>Tahun Akademik<span class="text-warning">*</span></label>
        <input class="form-control" type="text" value="<?php echo $datpil['tahun_akademik']?>" readonly>
    </div>
    <div class="col-sm-4 form-group">
        <label>Kelas<span class="text-warning">*</span></label>
        <input class="form-control" type="text" value="<?php echo $datpil['nama_kelas']?>" readonly>
    </div>
</div>
<div class="row">
    <div class="col-sm-8 form-group">
       <label>Nama Siswa <span class="text-warning">*</span></label>
        <select class="form-control select2" name="id_siswa" required="">
            <option value="">~~ Pilih Nama Siswa ~~</option>
            <?php 
                $sql="select * from tbl_siswa where status_siswa='Aktif'";

                $hasil=mysqli_query($connect,$sql);
                while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <option value="<?php echo $data['id_siswa'];?>"><?php echo $data['nisn'];?> - <?php echo $data['nama_siswa'];?></option>
            <?php } ?>
        </select>
    </div>
    <div class="col-sm-4 form-group">
        <label></label>
        <button type="submit" class="btn waves-effect waves-light btn-primary btn-outline-primary form-control"><i class="icofont icofont-save"></i>Simpan</button>
    </div>
</div>

</form>  
<div class="row">
    <div class="col-sm-12 form-group">
        <table class="table table-striped table-bordered table-hover" id="litssiswa" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>            
                    <th>Nama Siswa</th>            
                    <th>JK</th>        
                    <th>Aksi</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>NISN</th>            
                    <th>Nama Siswa</th>            
                    <th>JK</th>          
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal-footer panel-footer text-success">
   
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>