    <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="index.html">
                    <span class="brand"><?php echo $_SESSION['level']; ?> |
                        <span class="brand-tip"> SIAKAD</span>
                    </span>
                    <span class="brand-mini">AC</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li>
                        Sistem Informasi Akademik (SIAKAD) berbasis Web pada SMP SATAP Tolulos
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="./assets/img/admin-avatar.png" />
                            <span></span><?php echo $_SESSION['level']; ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fa fa-user"></i>Profile</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="login/logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="./assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $_SESSION['nama_lengkap']; ?></div><small><?php echo $_SESSION['level']; ?></small></div>
                </div>
                <ul class="side-menu metismenu">
                    <li>
                        <a href="index.php"><i class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <?php 
                    $level = $_SESSION['level'];
                    if ($level=='Admin'){
                    ?>
                    <li class="heading">Master Data</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-bookmark"></i>
                            <span class="nav-label">SDM</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="Master_guru.php">Guru</a>
                            </li>
                            <li>
                                <a href="Master_siswa.php">Siswa</a>
                            </li> 
                            <li>
                                <a href="Master_tu.php">Tata Usaha</a>
                            </li>  
                            <li>
                                <a href="Master_user.php">User Aplikasi</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Akademik</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="Master_kelas.php">Kelas</a>
                            </li>
                            <li>
                                <a href="Tahun_akademik.php">Tahun Akademik</a>
                            </li>
                            <li>
                                <a href="Master_matpel.php">Mata Pelajaran</a>
                            </li>                            
                        </ul>
                    </li>                   
                    <li class="heading">Pembelajaran</li>  
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Pembelajaran</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="Jadwal_pelajaran.php">Jadwal Pelajaran</a>
                            </li>
                            <li>
                                <a href="Pembagian_kelas.php">Pembagian Kelas</a>
                            </li> 
                            <li>
                                <a href="Siswa_Keluar.php">Siswa Keluar/Lulus</a>
                            </li>     
                            <li>
                                <a href="Absensi.php">Absensi</a>
                            </li>
                            <li>
                                <a href="Penilaian.php">Penilaian</a>
                            </li>                 
                        </ul>
                    </li>  
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Penerimaan Siswa Baru</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="Data_pendaftar.php">Data Pendaftar</a>
                            </li>
                            <li>
                                <a href="Data_diterima.php">Data Diterima</a>
                            </li>                    
                        </ul>
                    </li>     
                    <li class="heading">Laporan</li>
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Master Data</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="Laporan/lapguru.php" target="_blank">Guru</a>
                            </li>
                            <li>
                                <a href="Pilih_lap_siswa.php">Siswa</a>
                            </li>
                            <li>
                                <a href="Laporan/lapkelas.php" target="_blank">Kelas</a>
                            </li>
                            <li>
                                <a href="Laporan/lapmatpel.php" target="_blank">Mata Pelajaran</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="pilihjadwal.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Jadwal Pelajaran</span>
                        </a>                       
                    </li>
                    <li>
                        <a href="pilihabsensi.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Absensi</span>
                        </a>                       
                    </li>
                    <li>
                        <a href="pilihnilai.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Nilai</span>
                        </a>                       
                    </li>                   
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Siswa Baru</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="Laporan/lap_psddaftar.php" target="_blank">Pendaftar</a>
                            </li>
                            <li>
                                <a href="Laporan/lap_psdditerima.php" target="_blank">Diterima</a>
                            </li>
                                                        
                        </ul>
                    </li>
                    <?php
                    }else if ($level=='Guru'){
                    ?>
                    <li class="heading">Akademik</li>  
                    <li>
                        <a href="javascript:;"><i class="sidebar-item-icon fa fa-edit"></i>
                            <span class="nav-label">Pembelajaran</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="Jadwal_pelajaranguru.php">Jadwal Pelajaran</a>
                            </li>                             
                            <li>
                                <a href="Absensiguru.php">Absensi</a>
                            </li>
                            <li>
                                <a href="Penilaianguru.php">Penilaian</a>
                            </li>                 
                        </ul>
                    </li>  
                    <li class="heading">Laporan</li>
                    <li>
                        <a href="pilihjadwal.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Jadwal Pelajaran</span>
                        </a>                       
                    </li>
                    <li>
                        <a href="pilihabsensiguru.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Absensi</span>
                        </a>                       
                    </li>
                    <li>
                        <a href="pilihnilaiguru.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Nilai</span>
                        </a>                       
                    </li>      
                    <?php
                    }else{
                    ?>
                    <li>
                        <a href="pilihjadwal.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Jadwal Pelajaran</span>
                        </a>                       
                    </li>
                    <li>
                        <a href="pilihabsensi.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Absensi</span>
                        </a>                       
                    </li>
                    <li>
                        <a href="pilihnilai.php"><i class="sidebar-item-icon fa fa-calendar"></i>
                            <span class="nav-label">Nilai</span>
                        </a>                       
                    </li>      
                    <?php                     }
                    ?>
                    <li class="heading">Lainnya</li>                                    
                    <li>
                        <a href="javascript:void(0);"  data-toggle="modal" data-target="#Modal_info"><i class="sidebar-item-icon fa fa-info"></i>
                            <span class="nav-label">Tentang Program</span>
                        </a>                       
                    </li>
                </ul>
            </div>
        </nav>
