<?php
require_once '../include/db_connect.php';
 $id =$_POST['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_jadwal WHERE id_jadwal='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>

<form id="formubahdata" method="post"> 

<div class="row">
    <div class="col-sm-6 form-group">
        <label>Kelas | Tahun Akademik <span class="text-warning">*</span></label>
        <input type="Hidden" name="id_jadwal" id="id_jadwal" class="form-control" value="<?php echo $datpil['id_jadwal']?>"  readonly>
        <select class="form-control select2" name="editid_kelas" required="">
        <option value="">~~ Pilih Tahun Akademik ~~</option>
        <?php 
             $sql="select * from tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik where status='Ya'";

            $hasil=mysqli_query($connect,$sql);
            while ($data = mysqli_fetch_array($hasil)) {
            $id_kelas=$datpil['id_kelas'];
            if($id_kelas==$data['id_kelas']){
                 echo "<option value='$data[id_kelas]' selected> $data[nama_kelas] | $data[semester]  $data[tahun_akademik]</option>";
            }else{
                 echo "<option value='$data[id_kelas]'>$data[nama_kelas] | $data[semester]  $data[tahun_akademik]</option>";
             
            }
        } ?>
        </select>
    </div>
    <div class="col-sm-6 form-group">
        <label>Hari <span class="text-warning">*</span></label>
        <select class="form-control select2" name="edithari" required="">
            <?php $hari=$datpil['hari'];?>
            <option value="">~~ Pilih Hari ~~</option>
            <option <?php if( $hari=='Senin'){echo "selected"; } ?> value="Senin">Senin</option>
            <option <?php if( $hari=='Selasa'){echo "selected"; } ?> value="Selasa">Selasa</option>
            <option <?php if( $hari=='Rabu'){echo "selected"; } ?> value="Rabu">Rabu</option>
            <option <?php if( $hari=='Kamis'){echo "selected"; } ?> value="Kamis">Kamis</option>
            <option <?php if( $hari=='Jumat'){echo "selected"; } ?> value="Jumat">Jumat</option>
            <option <?php if( $hari=='Sabtu'){echo "selected"; } ?> value="Sabtu">Sabtu</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 form-group">
        <label>Mata Pelajaran <span class="text-warning">*</span></label>
        <select class="form-control select2" name="editid_matpel"  id="ddlKegiatanedit" required="">
            <option value="">~~ Pilih Mata Pelajaran ~~</option>
            <?php 
                $id_matpel=$datpil['id_matpel'];
                $sqls="select * from tbl_matpel";
                $hasils=mysqli_query($connect,$sqls);
                while ($data_matpel = mysqli_fetch_array($hasils)) {
               
                if($id_matpel==$data_matpel['id_matpel']){
                     echo "<option value='$data_matpel[id_matpel]' selected>$data_matpel[nama_matpel]</option>";
                }else{
                     echo "<option value='$data_matpel[id_matpel]'>$data_matpel[nama_matpel]</option>";
                 
                }
            } ?>
            <option <?php if( $id_matpel=='0'){echo "selected"; } ?>  value="0">Kegiatan Lainnya</option>
        </select>
    </div>                                
    <div id="dvKegiatanedit" class="col-sm-6 form-group">
        <label>Kegiatan Lainnya( Misalnya Apel Pagi) <span class="text-warning">*</span></label>
        <input class="form-control" name="editketerangan" type="text" value="<?php echo $datpil['keterangan']?>" placeholder="Kegiatan Lainnya( Misalnya Apel Pagi)">
    </div>
</div>
<div class="row">
    <div class="col-sm-3 form-group">
        <label>Jam Mulai <span class="text-warning">*</span></label>
        <input class="form-control" name="editjam_mulai" type="time" value="<?php echo $datpil['jam_mulai']?>" placeholder="jam_mulai">
    </div>
    <div class="col-sm-3 form-group">
        <label>Jam Selesai <span class="text-warning">*</span></label>
        <input class="form-control" name="editjam_selesai" type="time" value="<?php echo $datpil['jam_selesai']?>" placeholder="Jam Selesai">
    </div>
    <div class="col-sm-6 form-group">
        <label>Guru Bidang Studi <span class="text-warning">*</span></label>
        <select class="form-control select2" name="editid_guru">
        <option value="">~~ Pilih Guru ~~</option>
        <?php 
            $id_guru=$datpil['id_guru'];
            $sql_guru="select * from tbl_guru";            
            $hasil_guru=mysqli_query($connect,$sql_guru);
            while ($data_guru = mysqli_fetch_array($hasil_guru)) {
            if($id_guru==$data_guru['id_guru']){
                     echo "<option value='$data_guru[id_guru]' selected>$data_guru[nama_guru]</option>";
                }else{
                     echo "<option value='$data_guru[id_guru]'>$data_guru[nama_guru]</option>";
                 
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