<!DOCTYPE html>
<html><title>Data SISWA</title><head>
<style type="text/css">
  .kop {
    font-size:20px; 
    font-weight:bold; 
    text-align: center; 
    line-height:0.1;
    margin:22px;
  }

  .kop2 {
    font-size:20px; 
    font-weight:normal; 
    text-align: center; 
    line-height:0.1;
    margin:22px;
  }

  .kop3 {
    font-size:16px; 
    text-align: center; 
    font-weight:normal; 
    line-height:0.1;
    margin:22px;
  }  

.tanda-table {
    border-collapse: collapse;
    font-size: 13px;
    width: 100%;
}
.tanda-table td {
    padding: 7px 17px;
    text-align: center;
}

 .fael-table{
    border-collapse: collapse;
    font-size: 12px;
    width: 100%;
}
.fael-table td, 
.fael-table th {
    padding: 8px 8px;
    display: table-cell;
    text-align: left;
    vertical-align: top;
    border: 0.3px solid;
   
}
.fael-table th {
    font-weight: bold;
    background:#e1edff;
    text-align: center;
    font-size:14px; 
}
 
.fael-table {
    font-size: 13px!important;
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    display: table;
}
</style>
</style>
</head><body>
<table style="width: 100%;">
   <tbody>
        <tr>
          <td>
            <p><img src="../assets/img/Logo_Kab_Banggai_Kepulauan.png" width="120" height="120" /></p>
          </td>
          <td style="text-align:">
            <h4 class="kop2">PEMERINTAH KABUPATEN BANGGAI KEPULAUAN</h4>
            <h4 class="kop2">DINAS PENDIDIKAN DAN KEBUDAYAAN</h4>
            <h4 class="kop">SEKOLAH MENENGAH PERTAMA NEGERI SATAP TOLULOS</h4>
            <h4 class="kop3">KECAMATAN PELING TENGAH</h4>
          </td>
          <td>
            <p><img src="../assets/img/tutwuri.png" width="120" height="120" /></p>
          </td>
        </tr>
      </tbody>
</table>
<hr>
<h4 class="kop"><u>DATA SISWA</u> </h4>
<br>
<br>
<?php
require_once '../include/db_connect.php';
$id =$_GET['id'];
$query=mysqli_query($connect, "SELECT * FROM tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik WHERE id_kelas='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>
<table width="100%">
    <tbody>
	<tr>
            <td>Semester</td>
            <td>:</td>
            <td><?php echo $datpil['semester']?></td>
        </tr>
        <tr>
            <td>Nama Kelas</td>
            <td>:</td>
            <td><?php echo $datpil['nama_kelas']?></td>
        </tr>
		 <tr>
            <td>Tahun Ajaran</td>
            <td>:</td>
            <td><?php echo $datpil['tahun_akademik']?></td>
        </tr>
	</tbody>
</table>
<br>
<table class="fael-table">
  <thead>
      <tr>
          <th>No</th>
          <th>NAMA SISWA</th>
          <th>NISN</th>
          <th>TEMPAT LAHIR SISWA</th>
          <th>TANGGAL LAHIR SISWA</th>
          <th>JK SISWA</th>
          <th>AGAMA SISWA</th>
          <th>NOHP SISWA</th>
          <th>ALAMAT SISWA</th>
          <th>DESA</th>
          <th>KECAMATAN</th>
          <th>NAMA AYAH</th>
          <th>PEKERJAAN AYAH</th>
          <th>PENDIDIKAN AYAH</th>
          <th>NAMA IBU</th>
          <th>PEKERJAAN IBU</th>
          <th>PENDIDIKAN IBU</th>
          <th>NAMA WALI</th>
          <th>PEKERJAAN WALI</th>
          <th>ID TAHUN AKADEMIK</th>
          <th>STATUS SISWA</th>
          <th>TANGGAL KELUAR</th>
          <th>ALASAN KELUAR</th>
          <th>NOMOR IJAZAH</th>                                                 
      </tr>
  </thead>
  <tbody>
      <?php
      $id_kelas =$_GET['id'];
       $sql = "SELECT * FROM tbl_pemb_kelas left join tbl_siswa on tbl_pemb_kelas.id_siswa=tbl_siswa.id_siswa where id_kelas='$id_kelas'";
       $query = $connect->query($sql);

      $no =1;  
      while ($row = $query->fetch_assoc()) {  
      
      ?>
      <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $row['nama_siswa'];?></td>
          <td><?php echo $row['nisn'];?></td>
          <td><?php echo $row['tempat_lahir_siswa'];?></td>
          <td><?php echo $row['tanggal_lahir_siswa'];?></td>
          <td><?php echo $row['jk_siswa'];?></td>
          <td><?php echo $row['agama_siswa'];?></td>
          <td><?php echo $row['nohp_siswa'];?></td>
          <td><?php echo $row['alamat_siswa'];?></td>
          <td><?php echo $row['desa'];?></td>
          <td><?php echo $row['kecamatan'];?></td>
          <td><?php echo $row['nama_ayah'];?></td>
          <td><?php echo $row['pekerjaan_ayah'];?></td>
          <td><?php echo $row['pendidikan_ayah'];?></td>
          <td><?php echo $row['nama_ibu'];?></td>
          <td><?php echo $row['pekerjaan_ibu'];?></td>
          <td><?php echo $row['pendidikan_ibu'];?></td>
          <td><?php echo $row['nama_wali'];?></td>
          <td><?php echo $row['pekerjaan_wali'];?></td>
          <td><?php echo $row['id_tahun_akademik'];?></td>
          <td><?php echo $row['status_siswa'];?></td>
          <td><?php echo $row['tanggal_keluar'];?></td>
          <td><?php echo $row['alasan_keluar'];?></td>
          <td><?php echo $row['nomor_ijazah'];?></td>
          
      </tr>
     <?php } ?>
  </tbody>
 
</table>
<table class="tanda-table">
    <tbody>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Tolulos, <?php echo date('d-m-Y');?></td>
        </tr>
        <tr>
            <td>Wali Kelas</td>
            <td>&nbsp;</td>
            <td>Kepala Sekolah</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
       
        <tr>
            <td></td>
            <td>&nbsp;</td>
            <td>(.........................)</td>
        </tr>
        <tr>
            <td>NIP : </td>
            <td>&nbsp;</td>
            <td>NIP: ......................</td>
        </tr>
    </tbody>
</table>
</body></html>