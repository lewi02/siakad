 <table class="table table-striped table-bordered table-hover text-center"  cellspacing="0" width="100%">
    <?php 
    require_once '../include/db_connect.php';
    $id =$_POST['id_jadwal'];
    $data_pertemuan = mysqli_query($connect,"SELECT * FROM tbl_nilai where id_jadwal='$id' GROUP BY tanggal_nilai ");
    $jlh_pertemuan = mysqli_num_rows($data_pertemuan);
    ?>
    <thead>
        <tr>
            <td rowspan="2">No</td>
            <td rowspan="2">Nama Siswa</td>                          
            <td colspan="<?php echo $jlh_pertemuan;?>">Tanggal dan Nama Tugas</td>   
        </tr>
        <tr>
            <?php 
            while($d = mysqli_fetch_array($data_pertemuan)){
            ?>
            <td><?php echo $d['tanggal_nilai'];?> <br><?php echo $d['nama_tugas'];?><br> <?php echo "<button class='btn btn-primary btn-mini edit_nilai' id='id' data-toggle='modal' data-id=".$d['tanggal_nilai']." title='Edit nilai'> <i class='fa fa-pencil-square-o'></i> </button>".' '."<button class='btn btn-warning btn-mini hapus_nilai' id='id' data-toggle='modal' data-id=".$d['tanggal_nilai']." title='Hapus nilai'><i class='fa fa-trash'></i></button>";?></td>
            <?php } ?>
        </tr>
    </thead>
    <tbody>
        <?php 
        $i = 1;
        $id_kelas=$_POST['id_kelas'];
        $data_siswa = mysqli_query($connect,"SELECT * FROM tbl_pemb_kelas left join tbl_siswa on tbl_pemb_kelas.id_siswa=tbl_siswa.id_siswa where id_kelas='$id_kelas' ");
         while($ds = mysqli_fetch_array($data_siswa)){
        ?>
        <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $ds['nama_siswa'];?></td>                                   
            <?php 
            $id_siswa= $ds['id_siswa'];
            $detail = mysqli_query($connect,"SELECT * FROM tbl_nilai where id_jadwal='$id' GROUP BY tanggal_nilai ");
            while($de = mysqli_fetch_array($detail)){
            $tgl_nilai=$de['tanggal_nilai'];
            $nilaisiswa=mysqli_query($connect, "SELECT * FROM tbl_nilai WHERE tanggal_nilai='$tgl_nilai' and id_siswa='$id_siswa'") or die(mysqli_error($connect));
                $lihatnilai=mysqli_fetch_array($nilaisiswa);
            ?>
            <td><?php echo $lihatnilai['nilai'];?></td>
            <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
   
</table>