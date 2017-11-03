<?php 
include '../config/koneksi.php';
$c=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid ,p.gambar
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='".$_SESSION['userid']."'  "));
             ?>
 <div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="index.html">
                <img src="../assets/layouts/layout4/img/logo-light1.png" alt="logo" class="logo-default" /> </a>
                <div class="menu-toggler sidebar-toggler">
                    <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN PAGE ACTIONS -->
            <!-- DOC: Remove "hide" class to enable the page header actions -->
            
            <!-- END PAGE ACTIONS -->
            <!-- BEGIN PAGE TOP -->
            <div class="page-top">
                <!-- BEGIN HEADER SEARCH BOX -->
                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                <!-- END HEADER SEARCH BOX -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="separator hide"> </li>
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <!-- DOC: Apply "dropdown-hoverable" class after "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                        <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                        <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                            <!-- <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-success"> 7 </span>
                            </a> -->
                            <ul class="dropdown-menu">
                                <li class="external">
                                    <h3>
                                        <span class="bold">12 pending</span> notifications</h3>
                                        <a href="page_user_profile_1.html">view all</a>
                                    </li>
                                    <li>
                                        <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">just now</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;">
                                                        <span class="time">3 mins</span>
                                                        <span class="details">
                                                            <span class="label label-sm label-icon label-danger">
                                                                <i class="fa fa-bolt"></i>
                                                            </span> Server #12 overloaded. </span>
                                                        </a>
                                                    </li>
                                                    
                                                    
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                    <!-- BEGIN TODO DROPDOWN -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    
                                    <!-- END TODO DROPDOWN -->
                                    <!-- BEGIN USER LOGIN DROPDOWN -->
                                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                    <li class="dropdown dropdown-user dropdown-dark">
                                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <span class="username username-hide-on-mobile"> <?php echo $c[1]; ?> </span>
                                            <!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
                                            <img src="../upload/<?php echo $c[6]; ?>"  class="img-circle" alt=""  /> </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="profil.php?id=<?php echo $c[5]; ?>">
                                                        <i class="icon-user"></i> My Profile </a>
                                                    </li>                                    
                                                    <li>
                                                        <a href="../config/logout.php">
                                                            <i class="icon-key"></i> Log Out </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <!-- END USER LOGIN DROPDOWN -->
                                                
                                            </ul>
                                        </div>
                                        <!-- END TOP NAVIGATION MENU -->
                                    </div>
                                    <!-- END PAGE TOP -->
                                </div>
                                <!-- END HEADER INNER -->
                            </div>