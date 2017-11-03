            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item  ">
                            <a href="index.php" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Home</span>
                                <span class="selected"></span>
                               
                            </a>
                          
                        </li>
                        <?php if ($_SESSION['jabatan']=='J03'){  ?>
                        <li class="nav-item  ">
                            <a href="kegiatan.php" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Kegiatan</span>
                                <span class="selected"></span>
                               
                            </a>
                          
                        </li>
                        <li class="nav-item  ">
                            <a href="pegawai.php" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Pegawai</span>
                                <span class="selected"></span>
                               
                            </a>
                          
                        </li>
                        <?php } else{} ?>
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-list"></i>
                                <span class="title">Riwayat</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="riwayat_jabatan.php" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Riwayat Jabatan </span>
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="riwayat_pangkat.php" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Riwayat Pangkat</span>
                                        
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        <?php if ($_SESSION['jabatan']=='J03'){ } else { ?>
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-list"></i>
                                <span class="title">Sasaran Kinerja <br>Pegawai</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                            <?php if ($_SESSION['jabatan']=='J00'){} else{  ?>
                                <li class="nav-item start ">
                                    <a href="riwayat_skppenilai.php" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Riwayat SKP Penilai</span>
                                            
                                    </a>
                                </li>
                            <?php } ?>
                                <li class="nav-item start ">
                                    <a href="riwayat_pengajuanskp.php" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Riwayat Pengajuan SKP </span>
                                    </a>
                                </li>
                            <?php if ($_SESSION['jabatan']=='J03' || $_SESSION['jabatan']=='J00' || $_SESSION['jabatan']=='J09' ){  ?>
                                <li class="nav-item start ">
                                    <a href="riwayat_persetujuanskp.php" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Persetujuan Pengajuan SKP</span>
                                        
                                    </a>
                                </li>
                            <?php } else{} ?>
                                
                            </ul>
                        </li>


                        <?php if ($_SESSION['jabatan']=='J00' || $_SESSION['jabatan']=='J09' ){  ?>
                        <!-- <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-list"></i>
                                <span class="title">Penilaian</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start ">
                                    <a href="penilaian_capaian.php" class="nav-link ">
                                        <i class="icon-bulb"></i>
                                        <span class="title">Penilaian Capaian</span>
                                            
                                    </a>
                                </li>
                                <li class="nav-item start ">
                                    <a href="penilaian_perilaku.php" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Penilaian Perilaku </span>
                                    </a>
                                </li>
                                
                                
                            </ul>
                        </li> -->
                        <li class="nav-item  ">
                            <a href="penilaian_capaian.php" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Penilaian</span>
                                <span class="selected"></span>
                               
                            </a>
                          
                        </li>
                        <?php } else {} ?>
                        <li class="nav-item  ">
                            <a href="keberatan.php" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Keberatan Penilaian</span>
                                <span class="selected"></span>
                               
                            </a>
                          
                        </li>
                        <li class="nav-item  ">
                            <a href="persetujuanskp.php" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Persetujuan SKP</span>
                                <span class="selected"></span>
                               
                            </a>
                          
                        </li>
                        <?php if ($_SESSION['jabatan']=='J03' || $_SESSION['jabatan']=='J00' || $_SESSION['jabatan']=='J09' ){  ?>
                        <li class="nav-item  ">
                            <a href="laporan.php" class="nav-link nav-toggle">
                                <i class="icon-book-open"></i>
                                <span class="title">Laporan</span>
                                <span class="selected"></span>
                               
                            </a>
                          
                        </li>  
                        <?php } else {} ?>   
                        <?php } ?>              
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>