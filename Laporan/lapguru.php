<!DOCTYPE html>
<html><title>Data Guru</title><head>
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
            <h4 class="kop">SEKOLAH MENENGAH PERTAMA NEGERI SATAP TOLULUS</h4>
            <h4 class="kop3">Tolulos Kecamatan Peling Tengah</h4>
          </td>
          <td>
            <p><img src="../assets/img/tutwuri.png" width="120" height="120" /></p>
          </td>
        </tr>
      </tbody>
</table>
<hr>
<h4 class="kop"><u>DATA GURU</u> </h4>
<br>
<br>
<table class="fael-table">
  <thead>
      <tr>
          <th>No</th>
          <th>NAMA GURU</th>
          <th>NIP</th>
          <th>PENDIDIKAN TERAKHIR</th>
          <th>JURUSAN</th>
          <th>NUPTK</th>
          <th>JK GURU</th>
          <th>AGAMA GURU</th>
          <th>ALAMAT GURU</th>
          <th>NOHP GURU</th>
          <th>EMAIL GURU</th>
          <th>TEMPAT LAHIR GURU</th>
          <th>TANGGAL LAHIR GURU</th>                                                 
      </tr>
  </thead>
  <tbody>
      <?php
      require_once '../include/db_connect.php';
      $sql = "SELECT * FROM tbl_guru";
      $query = $connect->query($sql);

      $no =1;  
      while ($row = $query->fetch_assoc()) {  
      
      ?>
      <tr>
          <td><?php echo $no++;?></td>
          <td><?php echo $row['nama_guru'];?></td>
          <td><?php echo $row['nip'];?></td>
          <td><?php echo $row['pendidikan_terakhir'];?></td>
          <td><?php echo $row['jurusan'];?></td>
          <td><?php echo $row['nuptk'];?></td>
          <td><?php echo $row['jk_guru'];?></td>
          <td><?php echo $row['agama_guru'];?></td>
          <td><?php echo $row['alamat_guru'];?></td>
          <td><?php echo $row['nohp_guru'];?></td>
          <td><?php echo $row['email_guru'];?></td>
          <td><?php echo $row['tempat_lahir_guru'];?></td>
          <td><?php echo $row['tanggal_lahir_guru'];?></td>           
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
            <td>&nbsp;</td>
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
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>(.........................)</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>NIP: ......................</td>
        </tr>
    </tbody>
</table>
</body></html>