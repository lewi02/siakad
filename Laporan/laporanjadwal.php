<!DOCTYPE html>
<html><title>Data Jadwal Pelajaran</title><head>
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
<?php
require_once '../include/db_connect.php';
 $id =$_GET['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_tahun_akademik WHERE id_tahun_akademik='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);
?>
<h4 class="kop">JADWAL PELAJARAN SEMESTER  <?php echo strtoupper($datpil['semester']);?></h4>
<h4 class="kop2">Tahun Pelajaran  <?php echo strtoupper($datpil['tahun_akademik']);?></h4>
<br>
<br>
<table class="fael-table">
  <thead>
      <tr>
          <th rowspan="2">Waktu</th>
          <?php 
            $sql = "SELECT * FROM tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik WHERE tbl_kelas.id_tahun_akademik='$id' order by id_kelas ASC";
            $query = $connect->query($sql);
          while ($row = $query->fetch_assoc()) {
          ?>  
          <th colspan="6"><?php echo $row['nama_kelas'];?></th>
          <?php } ?>
      </tr>
      <tr>
        <?php

            $sql = "SELECT * FROM tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik WHERE tbl_kelas.id_tahun_akademik='$id' order by id_kelas ASC";
            $query = $connect->query($sql);
          while ($row = $query->fetch_assoc()) {
          ?>  
          <th>Senin</th>
          <th>Selasa</th>
          <th>Rabu</th>
          <th>Kamis</th>
          <th>Jumat</th>
          <th>Sabtu</th>
          <?php } ?>
      </tr>
  </thead>
  <tbody>
      <?php
      $sql = "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas WHERE id_tahun_akademik='$id' GROUP BY jam_mulai ";
      $query = $connect->query($sql);

      while ($row = $query->fetch_assoc()) {  
      
      ?>
      <tr>
         <td><?php echo $jam=$row['jam_mulai']." - ".$row['jam_selesai'];?></td>
         <?php 
            $sqls = "SELECT * FROM tbl_kelas left join tbl_tahun_akademik on tbl_kelas.id_tahun_akademik=tbl_tahun_akademik.id_tahun_akademik WHERE tbl_kelas.id_tahun_akademik='$id' order by id_kelas ASC";
            $querys = $connect->query($sqls);
          while ($rows = $querys->fetch_assoc()) {
            $jam_mulai =$row['jam_mulai'];
            $id_kelas =$rows['id_kelas'];
           $Senin=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel  WHERE jam_mulai='$jam_mulai' and id_kelas='$id_kelas' and hari='Senin'") or die(mysqli_error($connect));
           $Selasa=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel  WHERE jam_mulai='$jam_mulai' and id_kelas='$id_kelas' and hari='Selasa'") or die(mysqli_error($connect));
           $Rabu=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel  WHERE jam_mulai='$jam_mulai' and id_kelas='$id_kelas' and hari='Rabu'") or die(mysqli_error($connect));
           $Kamis=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel  WHERE jam_mulai='$jam_mulai' and id_kelas='$id_kelas' and hari='Kamis'") or die(mysqli_error($connect));
           $Jumat=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel  WHERE jam_mulai='$jam_mulai' and id_kelas='$id_kelas' and hari='Jumat'") or die(mysqli_error($connect));
           $Sabtu=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel  WHERE jam_mulai='$jam_mulai' and id_kelas='$id_kelas'  and hari='Sabtu'") or die(mysqli_error($connect));
           $matpel_senin=mysqli_fetch_array($Senin);
           $matpel_selasa=mysqli_fetch_array($Selasa);
           $matpel_rabu=mysqli_fetch_array($Rabu);
           $matpel_kamis=mysqli_fetch_array($Kamis);
           $matpel_jumat=mysqli_fetch_array($Jumat);
           $matpel_sabtu=mysqli_fetch_array($Sabtu);
          ?>  
          <td><?php echo $matpel_senin['nama_matpel']."".$matpel_senin['keterangan'];?></td>
          <td><?php echo $matpel_selasa['nama_matpel']."".$matpel_selasa['keterangan'];?></td>
          <td><?php echo $matpel_rabu['nama_matpel']."".$matpel_rabu['keterangan'];?></td>
          <td><?php echo $matpel_kamis['nama_matpel']."".$matpel_kamis['keterangan'];?></td>
          <td><?php echo $matpel_jumat['nama_matpel']."".$matpel_jumat['keterangan'];?></td>
          <td><?php echo $matpel_sabtu['nama_matpel']."".$matpel_sabtu['keterangan'];?></td>
          
          <?php } ?>
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