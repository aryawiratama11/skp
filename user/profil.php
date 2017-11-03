 <?php
session_start();

if (empty($_SESSION['userid']) AND empty($_SESSION['password']) AND empty($_SESSION['jabatan'])){
 echo '<script>
    alert(\'LOGIN DULU\');
    window.location="../index.php";
    </script> ';
}
else
{


include '../config/koneksi.php';
include '../config/library.php';

$login=mysqli_query($con," SELECT *
   FROM pegawai p , riwayat_jabatan rw
   WHERE p.userid=rw.userid AND rw.statusjabatan='1' and p.userid='".$_SESSION['userid']."' and p.password='".$_SESSION['password']."' ");

  $ketemu=mysqli_num_rows($login);
  $r=mysqli_fetch_array($login);

if ($ketemu==0){
    echo '<script>
    alert(\'LOGIN DULU\');
    window.location="../index.php";
    </script> ';
}


    else {

        $modal_id=$_GET['id'];

        $pegawai=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid, p.gambar , k.nama_kota ,p.tgllahir ,p.jenis_kelamin,p.agama,k.kode_kota,p.no_telp,p.alamat, p.password,p.tanggal_tugas,p.tanggal_keluar,p.alasan
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j , kota k
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$modal_id' and k.kode_kota=p.kode_kota "));

    ?>
<!DOCTYPE html>
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> Sasaran Kinerja Pegawai </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
       <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/profile-2.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="../assets/layouts/layout4/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/layouts/layout4/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="../assets/layouts/layout4/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo page-md">
        <!-- BEGIN HEADER -->
        <?php include"header.php"; ?>
        <?php }} ?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
             <?php include"sider.php"; ?>
            <!-- END SIDEBAR -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <!-- <div class="page-title">
                            <h1>User Profile 2
                                <small>user profile sample</small>
                            </h1>
                        </div> -->
                        <!-- END PAGE TITLE -->

                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">User</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    <div class="profile">
                        <div class="tabbable-line tabbable-full-width">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_1_1" data-toggle="tab"> Profil </a>
                                </li>
                                <li>
                                    <a href="#tab_1_3" data-toggle="tab"> Edit </a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1_1">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="list-unstyled profile-nav">
                                                <li>
                                                    <img src="../upload/<?php echo $pegawai['gambar'] ?>" class="img-responsive pic-bordered" alt="" />
                                                    <!-- <a href="javascript:;" class="profile-edit"> edit </a> -->
                                                </li>
                                                
                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-8 profile-info">
                                                    <h1 class="font-green sbold uppercase"><?php echo $pegawai['NAMA_PEGAWAI']; ?></h1>
                                                    <h3 class="font-black sbold uppercase">SMP Negeri 2 Rejoso</h3>
                                                    <!-- <p> Lorem ipsu
                                                        </p> -->
                                                    <!-- <p>
                                                        <a href="javascript:;"> www.mywebsite.com </a>
                                                    </p> -->
                                                    <ul class="list-inline">
                                                        <li>
                                                            <i class="fa fa-map-marker"></i> <?php echo $pegawai['nama_kota']; ?> </li>
                                                        <li>
                                                            <i class="fa fa-calendar"></i> <?php echo indonesian_date($pegawai['tgllahir']); ?> </li>
                                                        <li>
                                                            <i class="fa fa-briefcase"></i> <?php echo $pegawai['NAMA_JABATAN']; ?></li>
                                                        <li>
                                                            <i class="fa fa-star"></i> <?php echo $pegawai['NAMA_PANGKAT']."/".$pegawai['GOLONGAN_RUANG']; ?> </li>

                                                    </ul>
                                                </div>
                                                <!--end col-md-8-->

                                                <!--end col-md-4-->
                                            </div>
                                            <!--end row-->
                                            <div class="tabbable-line tabbable-custom-profile">
                                                <ul class="nav nav-tabs">
                                                    <li class="active">
                                                        <a href="#tab_1_11" data-toggle="tab"> Riwayat Jabatan </a>
                                                    </li>
                                                    <li>
                                                        <a href="#tab_1_22" data-toggle="tab"> Riwayat Pangkat </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1_11">
                                                        <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <i class="fa fa-briefcase"></i> Jabatan </th>
                                                                        <th class="hidden-xs">
                                                                            <i class="fa fa-question"></i> Status </th>
                                                                       <!--  <th>
                                                                            <i class="fa fa-bookmark"></i> Amount </th>
                                                                        <th> </th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <?php
                    //Data mentah yang ditampilkan ke tabel

                                                                $sql = mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid, p.gambar , k.nama_kota ,p.tgllahir , rw.statusjabatan
                                                        FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j , kota k
                                                        WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$modal_id' and k.kode_kota=p.kode_kota "); //statuspeg apa ?
                                                                $no = 1;
                                                                while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                    ?>

                                                                    <tr align='left'>

                                                                       <td><?php echo  $rr['NAMA_JABATAN']; ?></td>

                                                                       <td>
                                                                       <?php
                                                                         if($rr['statusjabatan']==1){
                                                                       echo "<a class='btn btn-circle btn-xs blue' ><i class='icon-user-following'> </i> sekarang </a>";
                                                                        }
                                                                        else{
                                                                     echo "<a class='btn btn-circle btn-xs red' ><i class='icon-action-redo'> </i> sebelum </a>";
                                                                       }
                                                                      ?>
                                                                       </td>
                                                                    </tr>
                                                                <?php
                                                                $no++;
                                                            }
                                                            ?>



                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                    <div class="tab-pane" id="tab_1_22">
                                                        <div class="tab-pane active" id="tab_1_1_1">
                                                            <div class="portlet-body">
                                                            <table class="table table-striped table-bordered table-advance table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <i class="fa fa-briefcase"></i> Pangkat </th>
                                                                            <th>
                                                                            <i class="fa fa-briefcase"></i> Golongan Ruang </th>
                                                                        <th class="hidden-xs">
                                                                            <i class="fa fa-question"></i> Status </th>
                                                                       <!--  <th>
                                                                            <i class="fa fa-bookmark"></i> Amount </th>
                                                                        <th> </th> -->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  <?php
                    //Data mentah yang ditampilkan ke tabel

                                                                $sql = mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid, p.gambar , k.nama_kota ,p.tgllahir , rw.statusjabatan, hp.statuspangkat
                                                        FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j , kota k
                                                        WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$modal_id' and k.kode_kota=p.kode_kota "); //statuspeg apa ?
                                                                $no = 1;
                                                                while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                    ?>

                                                                    <tr align='left'>

                                                                       <td><?php echo  $rr['NAMA_PANGKAT']; ?></td>
                                                                       <td><?php echo  $rr['GOLONGAN_RUANG']; ?></td>

                                                                       <td>
                                                                       <?php
                                                                         if($rr['statuspangkat']==1){
                                                                       echo "<a class='btn btn-circle btn-xs blue' ><i class='icon-user-following'> </i> sekarang </a>";
                                                                        }
                                                                        else{
                                                                     echo "<a class='btn btn-circle btn-xs red' ><i class='icon-action-redo'> </i> sebelum </a>";
                                                                       }
                                                                      ?>
                                                                       </td>
                                                                    </tr>
                                                                <?php
                                                                $no++;
                                                            }
                                                            ?>



                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--tab-pane-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--tab_1_2-->
                                <div class="tab-pane" id="tab_1_3">
                                    <div class="row profile-account">
                                        <div class="col-md-3">
                                            <ul class="ver-inline-menu tabbable margin-bottom-10">
                                                <li class="active">
                                                    <a data-toggle="tab" href="#tab_1-1">
                                                        <i class="fa fa-cog"></i> Personal info </a>
                                                    <span class="after"> </span>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#tab_2-2">
                                                        <i class="fa fa-picture-o"></i> Ganti Foto </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="tab" href="#tab_3-3">
                                                        <i class="fa fa-lock"></i> Ganti Password </a>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="tab-content">
                                                <div id="tab_1-1" class="tab-pane active">
                                                    <form role="form" action="aksi/update_profil.php?id=<?php echo $modal_id; ?>&hal=info" method="POST">
                                                      <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label">Nip</label>
                                                            <input type="text" placeholder="" name="nip" class="form-control"
                                                            value="<?php echo $pegawai['nip']; ?>" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Nama</label>
                                                            <input type="text" placeholder="" name="nama" class="form-control"
                                                             value="<?php echo $pegawai['NAMA_PEGAWAI']; ?>" /> </div>

                                                         <div class="form-group">
                                                                 <label class="control-label" for="form_control_1">Jenis Kelamin</label>
                                                                                    <!-- <div class="col-md-9"> -->

                                                              <?php
                                                                  if($pegawai['jenis_kelamin']=='L'){ ?>
                                                                  <select class="form-control" name="jk">

                                                                     <option value="L">Laki-laki</option>
                                                                      <option value="P">Perempuan</option>

                                                                      </select>

                                                                  <?php } else { ?>
                                                                   <select class="form-control" name="jk">


                                                                        <option value="P">Perempuan</option>
                                                                         <option value="L">Laki-laki</option>



                                                                      </select>
                                                                  <?php    }  ?>

                                                                  <!-- </div> -->
                                                         </div>
                                                       <div class="form-group">
                                                          <label class="control-label" for="form_control_1">AGAMA</label>


                                                      <?php
                                                          if($pegawai['agama']=='Islam'){ ?>
                                                          <select class="form-control" name="agama" id="agama" required >

                                                             <option value="Islam"> Islam</option>
                                                                <option value="Kristen"> Kristen</option>
                                                                <option value="Protestan"> Protestan</option>
                                                                <option value="Hindu"> Hindu</option>
                                                                <option value="Budha"> Budha</option>
                                                              </select>
                                                               <?php }

                                                               elseif($pegawai['agama']=='Kristen'){ ?>
                                                           <select class="form-control" name="agama" id="agama" required >


                                                                <option value="Kristen"> Kristen</option>
                                                                <option value="Protestan"> Protestan</option>
                                                                <option value="Hindu"> Hindu</option>
                                                                <option value="Budha"> Budha</option>
                                                                <option value="Islam"> Islam</option>

                                                              </select>


                                                          <?php } elseif($pegawai['agama']=='Protestan'){ ?>
                                                           <select class="form-control" name="agama" id="agama" required >

                                                                <option value="Protestan"> Protestan</option>
                                                                <option value="Hindu"> Hindu</option>
                                                                <option value="Budha"> Budha</option>
                                                                <option value="Islam"> Islam</option>
                                                                <option value="Kristen"> Kristen</option>

                                                              </select>


                                                          <?php } elseif($pegawai['agama']=='Hindu'){ ?>
                                                           <select class="form-control" name="agama" id="agama" required >


                                                                <option value="Hindu"> Hindu</option>
                                                                <option value="Budha"> Budha</option>
                                                                <option value="Islam"> Islam</option>
                                                                <option value="Kristen"> Kristen</option>
                                                                 <option value="Protestan"> Protestan</option>

                                                              </select>

                                                          <?php } else { ?>
                                                           <select class="form-control" name="agama" id="agama" required >


                                                                 <option value="Budha"> Budha</option>
                                                                <option value="Islam"> Islam</option>
                                                                <option value="Kristen"> Kristen</option>
                                                                 <option value="Protestan"> Protestan</option>
                                                                 <option value="Hindu"> Hindu</option>

                                                              </select>
                                                          <?php    }  ?>


                                                      </div>
                                                       <div class="form-group">
                                                             <label class="control-label" for="form_control_1">Kota Lahir </label>


                                                                    <?php
                                                                      echo "<select class=\"form-control\" name=\"kota\" id=\"kota\" required>";

                                                                          $pkt2=mysqli_query($con,"select * from kota where kode_kota='".$pegawai['kode_kota']."'
                                                                            union
                                                                            select * from kota where kode_kota!='".$pegawai['kode_kota']."'");


                                                                              while ($pk2=mysqli_fetch_array($pkt2))
                                                                              {
                                                                              echo "<option value=\"".$pk2[0]."\">".$pk2[1]."</option>";
                                                                              }

                                                                      echo "</select>";
                                                                   ?>

                                                         </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Tanggal Lahir</label>
                                                             <input class="form-control form-control-inline input-medium date-picker" size="16" name="tgl" type="text" value="<?php

                                                                $arr = explode('-', $pegawai['tgllahir']);
                                                                $newDate = $arr[2].'/'.$arr[1].'/'.$arr[0];
                                                                echo $newDate; ?>" required />
                                                                </div>
                                                        <div class="form-group">
                                                            <label class="control-label">No.Hp</label>
                                                            <input type="number" placeholder="" name="hp" class="form-control"  value="<?php echo $pegawai['no_telp']; ?>"/> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Alamat</label>
                                                            <textarea class="form-control" rows="3" placeholder="" name="alamat"><?php echo $pegawai['alamat']; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Tanggal Tugas</label>
                                                             <input class="form-control form-control-inline input-medium date-picker" size="16" name="tugas" type="text" value="<?php

                                                                $arr = explode('-', $pegawai['tanggal_tugas']);
                                                                $newDate = $arr[2].'/'.$arr[1].'/'.$arr[0];
                                                                echo $newDate; ?>" required />
                                                                </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Tanggal Keluar ( Di isi Ketika guru tsb pensiun,pindah dan lain-lain)</label>
                                                             <input class="form-control form-control-inline input-medium date-picker" size="16" name="keluar" type="text" value="<?php

                                                                $arr = explode('-', $pegawai['tanggal_keluar']);
                                                                $newDate = $arr[2].'/'.$arr[1].'/'.$arr[0];
                                                                echo $newDate; ?>" required />
                                                                </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Alasan Keluar ( Di isi Ketika guru tsb pensiun,pindah dan lain-lain)</label>
                                                            <textarea class="form-control" rows="3" placeholder="" name="alasan"><?php echo $pegawai['alasan']; ?></textarea>
                                                        </div>

                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit"  class="btn green">Simpan</button>
                                                                    <input type=reset class="btn blue" value=Kembali onclick=self.history.back()>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_2-2" class="tab-pane">
                                                    <form  action="aksi/update_profil.php?id=<?php echo $modal_id; ?>&hal=foto" method="POST" enctype="multipart/form-data" role="form">
                                                        <div class="form-body">
                                                         <div class="form-group">
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="../upload/<?php echo $pegawai['gambar']; ?>" alt="" /> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="file" value="<?php echo $id['gambar']; ?>">

                                                                          <input type="text" hidden="true"  name="userid" value="<?php echo $id[17]; ?>"/>  </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                                                           </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn green">Simpan</button>
                                                                    <input type=reset class="btn blue" value=Kembali onclick=self.history.back()>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="tab_3-3" class="tab-pane">
                                                    <form action="aksi/update_profil.php?id=<?php echo $modal_id; ?>&hal=pass" method="POST">
                                                        <div class="form-body">
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password</label>
                                                            <input type="password" id="name" name="name" class="form-control" /> <br>
                                                            <span id="result"></span> </div>

                                                        <div class="form-group">
                                                            <label class="control-label">New Password</label>
                                                            <input type="password" id="password1" name="password1" class="form-control" /> </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Re-type New Password</label>
                                                            <input type="password" id="password2" name="password2" class="form-control" />
                                                            <span id="validate-status"></span></div>
                                                        </div>
                                                       <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
                                                                    <button type="submit" class="btn green">Simpan</button>
                                                                    <input type=reset class="btn blue" value=Kembali onclick=self.history.back()>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                        <!--end col-md-9-->
                                    </div>
                                </div>
                                <!--end tab-pane-->

                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
           </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php include"footer.php";?>
        <!-- END FOOTER -->

        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
                    $(document).ready(function()
                    {
                        $("#name").keyup(function()
                        {
                            var name = $(this).val();

                            if(name.length > 1)
                            {
                                $("#result").html('checking...');

                                /*$.post("username-check.php", $("#reg-form").serialize())
                                    .done(function(data){
                                    $("#result").html(data);
                                });*/

                                $.ajax({

                                    type : 'POST',
                                    url  : 'password-check.php',
                                    data : $(this).serialize(),
                                    success : function(data)
                                              {
                                                 $("#result").html(data);
                                              }
                                    });
                                    return false;

                            }
                            else
                            {
                                $("#result").html('');
                            }
                        });

                    });
                    </script>
<script type="text/javascript">
                $(document).ready(function() {
              $("#password2").keyup(validate);
            });


            function validate() {
              var password1 = $("#password1").val();
              var password2 = $("#password2").val();



                if(password1 == password2) {
                   $("#validate-status").text("valid");
                }
                else {
                    $("#validate-status").text("invalid");
                }

            }

            </script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
        <script src="../assets/global/plugins/gmaps/gmaps.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
         <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>
