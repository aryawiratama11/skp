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
   
        $skp=mysqli_fetch_array(mysqli_query($con,"SELECT *  FROM sasaran_kinerja_pegawai WHERE KODE_SKP='$modal_id' "));
        $pegawai=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$skp[16]' "));

        $penilai=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$skp[17]' "));
        $atasan=mysqli_fetch_array(mysqli_query($con,"SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid
            FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
            WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' and p.userid='$skp[18]' "));
    ?>

<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title> Sasaran Kinerja Pegawai </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #4 for buttons extension demos" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-sweetalert/sweetalert.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="../assets/global/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
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
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        <!--  -->
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        
                        <!-- END PAGE TOOLBAR -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        
                        <li>
                            <span class="active">Data Input Capaian SKP</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->

                   
                    <div class="row">
                    <div class="col-md-12">
                                    <div class="portlet box green" >
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Identitas </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                    <a href="javascript:;" class="remove"> </a>
                                                </div>
                                            </div>

                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                    <div class="row">
                                                        
                                                     </div>
                                                        <!-- <h2 class="margin-bottom-20"> Dosen </h2> -->
                                                        <h3 class="form-section">Indentitas</h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nama Pegawai:</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <?php echo  $pegawai[1]; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Pejabat Penilai:</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <?php echo  $penilai[1]; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Jabatan : </label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <?php echo  $pegawai[4]; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3"> Nama atasan: </label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <?php echo  $atasan[1]; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Pangkat/ :<br>mgolongan</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"><?php echo  $pegawai[2]."".$pegawai[3]; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                            <!-- <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Pangkat/Golongan </label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> isi </p>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                             
                                                             <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Periode </label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"><?php echo  $skp[2]; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        </div>
                                                        
                                                     </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                                      </div>
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Penilaian </span>
                                    </div>
                                                                    </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> Penilaian Capaian </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> Penilaian Perilaku </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                    <?php if ($_SESSION['jabatan']=='J00'){  ?>
                                                    <?php if ($skp[14] == 0) {?>
                                                        <div class="btn-group">
                                                                <a id="sample_editable_1_new" href="aksi/konfirmasi.php?id=<?php echo $modal_id; ?>&hal=capaian" class="konfirmasi" > <span class="btn blue" > Selesai <i class="fa fa-check"></i> </span> 
                                                                    
                                                                </a>
                                                        </div>
                                                    <?php  } else {} } else {} ?> 
                                                    </div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2" >
                                                    <thead>
                                                                    <tr>
                                                                        <th rowspan="2" >Butir Kegiatan</th>
                                                                        <th colspan="5" align="center"> Target </th>
                                                                        <th colspan="4" align="center"> Realisasi </th>
                                                                        <th rowspan="2" >Perhitungan</th>
                                                                        <th rowspan="2" >Nilai <br> Capaian SKP</th>
                                                                        <th rowspan="2"  > # </th>
                                                                    </tr>
                                                                    <tr>
                                                                        
                                                                        <th>Angka Kredit</th>
                                                                        <th> Kuantitas </th>
                                                                        <th> Kualitas </th>
                                                                        <th> Waktu </th>
                                                                        <th> Biaya </th>

                                                                        
                                                                        
                                                                        <th> Kuantitas </th>
                                                                        <th> Kualitas </th>
                                                                        <th> Waktu </th>
                                                                        <th> Biaya </th>
                                                                       
                                                                    
                                                                        
                                                                    </tr>
                                                    </thead>
                                                                <tbody>
                                                                 <!-- data kne-->

                                                                 <?php
                                                                
                                                                $sql = mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , dk.`R_KUANTITAS`, dk.`R_KUALITAS` , dk.`R_WAKTU` ,dk.`R_BIAYA`, k.satuan_hasil , dk.ID_KEG , k.angka_kredit
                                                                    FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
                                                                    WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' "); 
                                                                        //statuspeg apa ?
                                                                 $no = 1;
                                                                 $counter = 0;
                                                                 $total=0; 
                                                                 while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                     $counter++;
                                                                    ?>

                                                                    <tr align='left'>
                                                                    <form action="aksi/insert_nilaicapaian.php?id=<?php echo $_GET['id']; ?>" method="POST">

                                                                       
                                                                        
                                                                        <td><?php echo  nl2br($rr['BUTIR_KEGIATAN']) ?></td>
                                                                         <td><?php echo  $rr['angka_kredit']; ?></td>
                                                                        <td><?php echo  $rr['T_KUANTITAS']." ".$rr['satuan_hasil']; ?></td>
                                                                        <td><?php echo  $rr['T_KUALITAS']; ?></td>
                                                                        <td><?php echo  $rr['T_WAKTU']; ?></td>
                                                                        <td><?php echo  $rr['T_BIAYA']; ?></td>

                                                                        <td><input type="number" class="form-control input-xsmall" name="kua" size="3" value="<?php echo $rr['R_KUANTITAS'] ?>">

                                                                         <input type="hidden" name="idkeg" value="<?php echo $rr['ID_KEG'] ?>">
                                                                        </td>

                                                                        <td><input type="number" step="0.01" class="form-control input-xsmall" name="kwa" value="<?php echo $rr['R_KUALITAS'] ?>"></td> 

                                                                        <td><input type="number" step="0.01" class="form-control input-xsmall" name="waktu" value="<?php echo $rr['R_WAKTU'] ?>"></td> 

                                                                        <td><input type="number" class="form-control input-xsmall" name="biaya" value="<?php echo $rr['R_BIAYA'] ?>"></td>
                                                                        <td>
                                                                        <?php
                                                                        if ($rr['R_BIAYA']>0 && $rr['T_BIAYA']>0) {
                                                                        $persenbiaya= 100-($rr['R_BIAYA']/$rr['T_BIAYA']*100);
                                                                        } else { $persenbiaya=0; }


                                                                        $persenwaktu= 100-($rr['R_WAKTU']/$rr['T_WAKTU']*100);

                                                                        $kuantitas= $rr['R_KUANTITAS']/$rr['T_KUANTITAS']*100;
                                                                        $kualitas= $rr['R_KUALITAS']/$rr['T_KUALITAS']*100;
                                                                        if ($persenwaktu < 25 ){
                                                                            $RW24 = ((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100 ;
                                                                        }
                                                                        else {
                                                                            $RW24 = 76-((((1.76*$rr['T_WAKTU']-$rr['R_WAKTU'])/$rr['T_WAKTU'])*100)-100);
                                                                        }
                                                                         if ( $persenbiaya > 0 && $persenbiaya < 25 ){
                                                                            $RB24 = ((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100 ;
                                                                        }
                                                                        else {
                                                                            //$RB24 = 76-((((1.76*($rr['T_BIAYA']-$rr['R_BIAYA']))/$rr['T_BIAYA'])*100)-100);
                                                                            $RB24 = 0;
                                                                        }
                                                                        if ($RB24 == 0) {
                                                                            $perhitungan=$kuantitas+$kualitas+$RW24;
                                                                            echo $perhitungan;
                                                                            
                                                                        }
                                                                        else {
                                                                            $perhitungan=$kuantitas+$kualitas+$RW24+$RB24;
                                                                            echo $perhitungan;
                                                                        }


                                                                        ?> 
                                                                        </td>
                                                                        <td> 
                                                                        <?php
                                                                        if ($rr['T_BIAYA'] < 1 ) {
                                                                            if ($rr['R_BIAYA'] < 1) {
                                                                                $nilai=$perhitungan/3;
                                                                                echo round($nilai,2);
                                                                                 $total += $nilai;

                                                                            }
                                                                            else {
                                                                                $nilai=$perhitungan/4;
                                                                                 echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                            }
                                                                            # code...
                                                                        }
                                                                        else {
                                                                            $nilai=$perhitungan/4;
                                                                                 echo round($nilai,2);
                                                                                 $total += $nilai;
                                                                                 //$ttl=$total;

                                                                        }
                                                                        ?>  </td>                                                                     
                                                                       
                                                                                                                                                
                                                                        <td><button class="btn btn-xs blue" type=submit ><i class="fa fa-check"></i> submit </button> </td>
                                                                        
                                                                        

                                                                    </form>
                                                                </tr>
                                                                <?php
                                                                $no++;
                                                            }
                                                            ?>
                                                        </tbody>                                                        
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_2">
                                            <div class="portlet box green">
                                                <div class="portlet-title">

                                                    <div class="tools"> </div>
                                                </div>
                                                <!-- kene -->
                                                <?php  $sate = mysqli_query($con,"SELECT p.*
                                                FROM sasaran_kinerja_pegawai skp ,penilaian_perilaku_pegawai p
                                                WHERE skp.`KODE_SKP`=p.`KODE_SKP` AND skp.`KODE_SKP`='$modal_id' ");
                                                $p = mysqli_fetch_array($sate);
                                                ?>
                                                <div class="portlet light portlet-fit portlet-form bordered">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class=" icon-layers font-green"></i>
                                                                <span class="caption-subject font-green sbold uppercase">
                                                            <?php if ($p[2]>0) { ?>
                                                            Update Penilaian Perilaku
                                                            <?php } else { ?>
                                                            Tambah Penilaian Perilaku
                                                            <?php } ?>
                                                                </span>
                                                            </div>
                                                            
                                                        </div>

                                                    <div class="row" >
                                                      <div class="col-md-6" >
                                                        <div class="portlet-body">
                                                            <!-- BEGIN FORM-->
                                                            <?php if ($p[2]>0) { ?>
                                                            <form action="aksi/update.php?id=<?php echo $p[0]; ?>&hal=perilaku&kd=<?php echo $modal_id; ?>" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                                            <?php } else { ?>
                                                            <form action="aksi/insert_perilaku.php?id=<?php echo $modal_id; ?>" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                                            <?php } ?>
                                                            
                                                                <div class="form-body">
                                                                    
                                                                                                                 
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Orientasi Pelayanan
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" step="0.01" class="form-control" placeholder="" name="op" value="<?php 
                                                                                if ($p[2]>0) {
                                                                                echo $p[2];
                                                                                } else { } ?>"   >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label" for="form_control_1">  Integritas
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" step="0.01" class="form-control" placeholder="" name="int" value="<?php 
                                                                                if ($p[3]>0) {
                                                                                echo $p[3];
                                                                                } else { } ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input"> 
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Komitmen
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" step="0.01" class="form-control" placeholder="" name="kom" value="<?php 
                                                                                if ($p[4]>0) {
                                                                                echo $p[4];
                                                                                } else { } ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input"> 
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Disiplin
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" step="0.01" class="form-control" placeholder="" name="disp" value="<?php 
                                                                                if ($p[5]>0) {
                                                                                echo $p[5];
                                                                                } else { } ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input"> 
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Kerjasama
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" step="0.01" class="form-control" placeholder="" name="kerja" value="<?php 
                                                                                if ($p[6]>0 ){
                                                                                echo $p[6];
                                                                                } else { } ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Kepemimpinan
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" step="0.01" class="form-control" placeholder="" name="pimpin" value="<?php 
                                                                                if ($p[7]>0) {
                                                                                echo $p[7];
                                                                                } else { } ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>

                                                               
                                                                </div>
                                                                <div class="form-actions">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-6">
                                                                        <?php if ($p[2]>0) { ?>
                                                            <button type="submit"  class="btn green">Update</button>
                                                            <?php } else { ?>
                                                            <button type="submit"  class="btn green">Simpan</button>
                                                            <?php } ?>
                                                                            
                                                                            <input type=reset class="btn blue" value=Kembali onclick=self.history.back()>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <!-- END FORM-->
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6" >
                                                        <div class="portlet-body">
                                                            <!-- BEGIN FORM-->
                                                            <form action="aksi/insert_perilaku.php" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                                                <div class="form-body">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-8">NILAI PERILAKU TAHUN KEMARIN ( <?php $skr=date('Y');
                                                                        $sbm=$skr-1;
                                                                        echo $sbm; 


$sat = mysqli_query($con,"SELECT p.*
FROM sasaran_kinerja_pegawai skp ,penilaian_perilaku_pegawai p
WHERE skp.`KODE_SKP`=p.`KODE_SKP` AND skp.`userid`='$skp[16]' AND skp.`JANGKAWAKTU_PENILAIAN`='$sbm' ");
$ppp = mysqli_fetch_array($sat);

                                                                        ?> )</label>
                                                                        <div class="col-md-6">
                                                                           
                                                                        </div>
                                                                    </div>
                                                                    
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Orientasi Pelayanan
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" readonly="true" step="0.01" class="form-control" placeholder="" name="op" value="<?php echo $ppp[2]; ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label" for="form_control_1">  Integritas
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" readonly="true" step="0.01" class="form-control" placeholder="" name="int" value="<?php echo $ppp[3]; ?>">
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input"> 
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Komitmen
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" readonly="true" step="0.01" class="form-control" placeholder="" name="kom" value="<?php echo $ppp[4]; ?>">
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input"> 
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Disiplin
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" readonly="true" step="0.01" class="form-control" placeholder="" name="disp" value="<?php echo $ppp[5]; ?>">
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input"> 
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Kerjasama
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" readonly="true" step="0.01" class="form-control" placeholder="" name="kerja" value="<?php echo $ppp[6]; ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-md-line-input">
                                                                        <label class="col-md-3 control-label" for="form_control_1"> Kepemimpinan
                                                                            <span class=""></span>
                                                                        </label>
                                                                        <div class="col-md-4">
                                                                            <input type="number" readonly="true" step="0.01" class="form-control" placeholder="" name="pimpin" value="<?php echo $ppp[7]; ?>" >
                                                                            <div class="form-control-focus"> </div>
                                                                            <span class="help-block">Gunakan titik bila desimal</span>
                                                                        </div>
                                                                    </div>

                                                               
                                                                </div>
                                                                <!-- <div class="form-actions">
                                                                    <div class="row">
                                                                        <div class="col-md-offset-3 col-md-6">
                                                                            <button type="submit"  class="btn green">Simpan</button>
                                                                            <input type=reset class="btn blue" value=Kembali onclick=self.history.back()>
                                                                        </div>
                                                                    </div>
                                                                </div> -->
                                                            </form>
                                                            <!-- END FORM-->
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>  


                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                        <div class="portlet box green" >
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-gift"></i>Nilai Prestasi </div>
                                                <div class="tools">
                                                    <a href="javascript:;" class="collapse"> </a>
                                                    <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                    <a href="javascript:;" class="reload"> </a>
                                                    <a href="javascript:;" class="remove"> </a>
                                                </div>
                                            </div>

                                            <div class="portlet-body form">
                                                <!-- BEGIN FORM-->
                                                <form class="form-horizontal" role="form">
                                                    <div class="form-body">
                                                    <div class="row">

                                                     </div>
                                                        <!-- <h2 class="margin-bottom-20"> Dosen </h2> -->

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nilai Capaian :</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <?php 
                                                                        

                                                                        $jumlah = $total/$counter;
                                                                    echo round($jumlah,2)." x 60% = ".$jumlah*60/100; ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nilai Perilaku :</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"> <?php 
                                                                            $modal_id=$_GET['id'];

                                                                            $sql12 = mysqli_query($con," SELECT * FROM penilaian_perilaku_pegawai
                                                                            where KODE_SKP= '$modal_id' "); //statuspeg apa ?
                                                                             $no = 1;
                                                                             $rr12 = mysqli_fetch_array($sql12);
                                                                             if ($rr12[2]>0) { $a=1; }
                                                                             else {$a=0;}
                                                                                if ($rr12[3]>0) { $b=1; }
                                                                             else {$b=0;}
                                                                                if ($rr12[4]>0) { $c=1; }
                                                                             else {$c=0;}
                                                                                if ($rr12[5]>0) { $d=1; }
                                                                             else {$d=0;}
                                                                                if ($rr12[6]>0) { $e=1; }
                                                                             else {$e=0;}
                                                                                if ($rr12[7]>0) { $f=1; }
                                                                             else {$f=0;}

                                                                             $jumlah2=($rr12[2]+$rr12[3]+$rr12[4]+$rr12[5]+$rr12[6]+$rr12[7])/
                                                                                ($a+$b+$c+$d+$e+$f);
                                                                             $rt=$jumlah2;
                                                                              echo  round($rt,2)." x 40% = ".round($rt*40/100,2); ?> </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->

                                                            <!--/span-->
                                                        </div>
                                                        <!--/row-->
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Nilai Prestasi :</label>
                                                                    <div class="col-md-9">
                                                                        <p class="form-control-static"><?php echo  "Nilai Capaian + Nilai Perilaku<br>";
                                                                        echo round($jumlah*60/100+$rt*40/100,2); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--/span-->


                                                            <!--/span-->
                                                        </div>

                                                     </div>
                                                </form>
                                                <!-- END FORM-->
                                            </div>
                                        </div>
                                      </div>
                    </div>
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
                       
            <!-- END QUICK SIDEBAR -->

        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <?php include"footer.php";?>
        <!-- END FOOTER -->
        <!-- BEGIN QUICK NAV -->
       
        
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
       <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
       <script src="../assets/pages/scripts/ui-sweetalert.min.js" type="text/javascript"></script>
                <!-- END PAGE LEVEL SCRIPTS -->
         <script>
            jQuery(document).ready(function($){
                $('.delete-link').on('click',function(){
                    var getLink = $(this).attr('href');
                    swal({
                            title: 'Peringatan',
                            text: 'Hapus Data?',
                            html: true,
                            confirmButtonColor: '#d9534f',
                            showCancelButton: true,
                            },function(){
                            window.location.href = getLink
                        });
                    return false;
                });
            });
        </script>
        <script>
            jQuery(document).ready(function($){
                $('.konfirmasi').on('click',function(){
                    var getLink = $(this).attr('href');
                    swal({
                            title: 'Peringatan',
                            text: 'SKp TIDAK dapat di rubah setelah anda melakukan verifikasi berikut, Apakah anda yakin ? ',
                            html: true,
                            confirmButtonColor: '#d9534f',
                            showCancelButton: true,
                            }

                            ,function(){
                            window.location.href = getLink
                        });
                    return false;
                });
            });
        </script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
            
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
    </body>

</html>