<?php
require_once '../include/db_connect.php';
$tanggal_absen =$_POST['tanggal_absen'];
?>

<form id="formubahdata" method="post"> 
<div class="form-group row">
    <label  class="col-sm-4 col-form-label">Tanggal Absensi</label>
    <div class="col-sm-6">
      <input type="date"  class="form-control" value="<?php echo $tanggal_absen;?>" readonly>
    </div>                               
</div>

<div class="row">
    <div class="col-sm-12 form-group">
        <table class="table table-striped table-bordered table-hover" id="litssiswa" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>#</th>
                    <th>NISN</th>            
                    <th>Nama Siswa</th>            
                    <th>Status Absen</th>  
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>#</th>
                    <th>NISN</th>            
                    <th>Nama Siswa</th>  
                    <th>Status Absen</th> 
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="modal-footer panel-footer text-success">
    <button type="button" data-dismiss="modal" class="btn waves-effect waves-light btn-danger btn-outline-danger"><i class="icofont icofont-check-circled"></i>Tutup</button>
</div>
</form>  