<!DOCTYPE html>
<html><title>Absen</title><head>
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


.atas-table {
    border-collapse: collapse;
    font-size: 13px;
    width: 100%;
}
.atas-table th {
    padding: 7px 17px;
    text-align: left;
}
.atas-table td {
    padding: 7px 17px;
    text-align: right;
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
<h4 class="kop"><u>Absen</u> </h4>
<br>
<?php 
require_once '../include/db_connect.php';
 $id =$_GET['id'];
 $query=mysqli_query($connect, "SELECT * FROM tbl_jadwal left join tbl_kelas on tbl_jadwal.id_kelas=tbl_kelas.id_kelas left join tbl_tahun_akademik on tbl_tahun_akademik.id_tahun_akademik=tbl_kelas.id_tahun_akademik left join tbl_matpel on tbl_jadwal.id_matpel=tbl_matpel.id_matpel left join tbl_guru on tbl_jadwal.id_guru=tbl_guru.id_guru WHERE id_jadwal='$id'") or die(mysqli_error($connect));
 $datpil=mysqli_fetch_array($query);

?>
<table class="atas-table">
  <tbody>
    <tr>
        <td>Mata Pelajaran</td>
        <th>: <?php echo $datpil['nama_matpel']?></th>
        <td>Tahun Akademik</td>
        <th>: <?php echo $datpil['semester']?> <?php echo $datpil['tahun_akademik']?></th>                                    
    </tr>
    <tr>
        <td>Kelas</td>
        <th>: <?php echo $datpil['nama_kelas']?></th>
        <td>Guru</td>
        <th>: <?php echo $datpil['nama_guru']?></th>                                    
    </tr>
    <tr>
        <td>Hari</td>
        <th>: <?php echo $datpil['hari']?></th>
        <td>Jam</td>
        <th>: <?php echo $datpil['jam_mulai']?> - <?php echo $datpil['jam_selesai']?></th>                                    
    </tr>
  </tbody>
</table>
<br>
<table class="fael-table">
  <thead>
      <tr>
          <th rowspan="3">No</th>
          <th rowspan="3">Nama Siswa</th>                          
          <th rowspan="3">NISN</th>                                              
          <th colspan="16">TANGGAL PERTEMUAN</th>  
          <th colspan="3">JUMLAH</th>

      </tr>
      <tr>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
          <th>11</th>
          <th>12</th>
          <th>13</th>
          <th>14</th>
          <th>15</th>
          <th>16</th>                                              
          <th>I</th>                                              
          <th>S</th>                                              
          <th>A</th>                                              
      </tr>
      <tr>
          <th><br><br><br></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>

      </tr>
  </thead>
  <tbody>
      <?php 
        $i = 1;
        $id_kelas=$_GET['id_kelas'];
        $data_siswa = mysqli_query($connect,"SELECT * FROM tbl_pemb_kelas left join tbl_siswa on tbl_pemb_kelas.id_siswa=tbl_siswa.id_siswa where id_kelas='$id_kelas' ");
         while($ds = mysqli_fetch_array($data_siswa)){
       ?>
      <tr>
          <td><?php echo $i++;?></td>
          <td><?php echo $ds['nama_siswa'];?></td>    
          <td><?php echo $ds['nisn'];?></td>   
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
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
            <td>Guru Bidang Studi</td>
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
            <td><?php echo $datpil['nama_guru']?></td>
            <td>&nbsp;</td>
            <td>(.........................)</td>
        </tr>
        <tr>
            <td>NIP : <?php echo $datpil['nip']?></td>
            <td>&nbsp;</td>
            <td>NIP: ......................</td>
        </tr>
    </tbody>
</table>
</body></html>