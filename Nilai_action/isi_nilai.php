<?php
require_once '../include/db_connect.php';
$tanggal_nilai =$_POST['tanggal_nilai'];
$query = mysqli_query($connect,"SELECT * FROM tbl_nilai where tanggal_nilai='$tanggal_nilai' GROUP BY tanggal_nilai ");
$datpil=mysqli_fetch_array($query);
$nama_tugas =$datpil['nama_tugas'];
?>

<form id="formubahdata" method="post"> 
<div class="form-group row">
    <label  class="col-sm-2 col-form-label">Tanggal Penilaian</label>
    <div class="col-sm-4">
      <input type="date"  class="form-control" value="<?php echo $tanggal_nilai;?>" readonly>
    </div>
    <label  class="col-sm-2 col-form-label">Nama Tugas</label>
    <div class="col-sm-4">
      <input type="text"  class="form-control" value="<?php echo $nama_tugas;?>" readonly>
    </div>                               
</div>

<div class="row">
    <div class="col-sm-12 form-group">
        <table class="table table-striped table-bordered table-hover" id="litssiswa" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NISN</th>            
                    <th>Nama Siswa</th>            
                    <th>Nilai</th>  
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>NISN</th>            
                    <th>Nama Siswa</th>  
                    <th>Nilai</th> 
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal-footer panel-footer text-success">
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  