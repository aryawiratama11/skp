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
                            <span class="active">Data Riwayat Pengajuan SKP</span>
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
                                                     <div class="caption">
                                                        <div class="btn-group">
                                                                <a id="sample_editable_1_new" href="edit.php?id=<?php echo $_GET['id']; ?>&hal=identitas" > <span class="btn green" > Edit <i class="fa fa-edit"></i> </span> 
                                                                    
                                                                </a>
                                                        </div> 
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
                     <?php if ($skp[4] != NULL) { ?>
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">Revisi</span>
                                </div>
                            </div>
                            <div class="portlet-body">

                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab_2_1">
                                       <div class="portlet light portlet-fit portlet-form bordered">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class=" icon-layers font-green"></i>
                                                <span class="caption-subject font-green sbold uppercase">Revisi Pengajuan SKP anda</span>
                                            </div>

                                        </div>
                                        <div class="portlet-body">
                                            <!-- BEGIN FORM-->
                                            <form action="aksi/insert_keberatan.php?id=<?php echo $_GET['id'] ?>" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                                <div class="form-body">



                                                    <div class="form-group form-md-line-input">
                                                        <label class="col-md-2 control-label" for="form_control_1">Keterangan Revisi
                                                            <span class="required" aria-required="true">*</span>
                                                        </label>
                                                        <div class="col-md-10">
                                                            <!-- <textarea rows="11%" cols="100%" required readonly="true"><?php //echo $keberatan['keberatan']; ?> </textarea> -->
                                                            <div contenteditable="true" oncut="return false" onpaste="return false" onkeydown="if(event.metaKey) return true; return false;"><?php echo $skp[4]; ?>
                                                            </div>
                                                            <div class="form-control-focus"> </div>

                                                        </div>
                                                    </div>



                                                </div>

                                            </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                    <!-- END EXAMPLE TABLE PORTLET-->
                                </div>


                            </div>
                        </div>
                    </div>
                        
                    </div>
                    <?php } else {} ?>


                    <div class="col-md-12">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Riwayat Pengajuan SKP</span>
                                    </div>
                                                                    </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> Data Riwayat Pengajuan SKP </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> Tambah Riwayat Pengajuan SKP </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <div class="btn-group">
                                                                <a id="sample_editable_1_new" href="aksi/konfirmasi.php?id=<?php echo $modal_id; ?>&hal=ajuan" class="konfirmasi" > <span class="btn blue" > Selesai <i class="fa fa-check"></i> </span> 
                                                                    
                                                                </a>
                                                        </div> 
                                                    </div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                                    <tr>

                                                                        
                                                                        <!-- <th> Jenis Unsur </th> -->
                                                                        <th> Unsur (Jenis Unsur) </th>
                                                                        <th> Subunsur</th>
                                                                        <th> Butir<br>Kegiatan </th>
                                                                        <th>Target<br>Kuantitas</th>
                                                                        <th>Target<br>Kualitas</th>
                                                                        <th>Target<br>Biaya</th>
                                                                        <th>Target<br>Waktu</th>
                                                                        <th> # </th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <!-- data kne-->

                                                                 <?php
                                                                
                                                                $sql = mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur ,dk.KODE_SKP,k.ID_KEG
                                                                    FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
                                                                    WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$modal_id' "); //statuspeg apa ?
                                                                 $no = 1;
                                                                 while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                    ?>

                                                                    <tr align='left'>

                                                                       
                                                                        <td><?php echo  nl2br($rr['NAMA_UNSUR']); if ($rr['id_unsur']==4) {
                                                                            echo " (UNSUR PENUNJANG)";
                                                                        } else{ echo " (UNSUR UTAMA)"; } ?></td>
                                                                        <td><?php echo  nl2br($rr['NAMA_SUBUNSUR']) ?></td>
                                                                        <td><?php echo  nl2br($rr['BUTIR_KEGIATAN']) ?></td>
                                                                        <td><?php echo  $rr['T_KUANTITAS']; ?></td>
                                                                        <td><?php echo  $rr['T_KUALITAS']; ?></td>
                                                                        <td><?php echo  $rr['T_WAKTU']; ?></td>
                                                                        <td><?php echo  $rr['T_BIAYA']; ?></td>                                                                    
                                                                       
                                                                        <td>
                                                                        
                                                                        <a href="edit.php?id=<?php echo $rr['ID_KEG']; ?>&kd=<?php echo $rr['KODE_SKP'] ?>&hal=ajuan"><button class="btn green btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Update"><i class="fa fa-edit"></i></button></a>
                                                                        <a href="aksi/hapus.php?id=<?php echo $rr['ID_KEG']; ?>&kd=<?php echo $rr['KODE_SKP']; ?>&hal=ajuan" class="delete-link"> <button class="btn red btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Hapus"><i class="fa fa-remove"></i></button></a>
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
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
                                        <div class="tab-pane fade" id="tab_2_2">
                                             <!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Tambah Kegiatan SKP</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="aksi/insert_detailskp.php?id=<?php echo $_GET['id']; ?>" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                        <div class="form-body">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Unsur</label>
                                                <div class="col-md-8">
                                                    <select class="bs-select form-control" data-live-search="true" data-size="8" id="unsur" name="unsur" required>
                                                       
                                                        <option value=""></option>
                                                    <?php
                                                    // ambil data dari database
                                                    $query = "SELECT id_unsur,nama_unsur from unsur ";
                                                    $hasil = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_array($hasil)) {
                                                        ?>
                                                        <option value="<?php echo $row[0] ?>"><?php echo $row[1];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Subunsur</label>
                                                <div class="col-md-8">
                                                    <?php
                                                    echo "<select class=\"form-control\" name=\"subunsur\" id=\"subunsur\" required >";
                                                                  
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Butir Kegiatan</label>
                                                <div class="col-md-8">
                                                    <?php
                                                    echo "<select class=\"form-control\" name=\"butir\" id=\"butir\" required >";
                                                                  
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                             
                                             
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Angka Kredit</label>
                                                <div class="col-md-8">
                                                    <?php
                                                    echo "<select class=\"form-control\" name=\"kredit\" id=\"kredit\" >";
                                                                  
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Kuantitas
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tku" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">satuan</label>
                                                <div class="col-md-8">
                                                    <?php
                                                    echo "<select class=\"form-control\" name=\"satuan\" id=\"satuan\"  >";
                                                                  
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Kualitas
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tkw" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Waktu
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tw" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Biaya
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tb" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
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
                                    <!-- END FORM-->
                                </div>
                            </div>
                                            
                                        </div>
                                        
                                    </div>
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
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        
        <!-- BEGIN CORE PLUGINS -->
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
       <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <script type="text/javascript">
        var htmlobjek;
        $(document).ready(function(){
          //apabila terjadi event onchange terhadap object <select id=propinsi>
          $("#unsur").change(function(){
            var unsur = $("#unsur").val();
            $.ajax({
                url: "ambilsubunsur.php",
                data: "unsur="+unsur,
                cache: false,
                success: function(msg){
                    //jika data sukses diambil dari server kita tampilkan
                    //di <select id=kota>
                    $("#subunsur").html(msg);
                }
            });
          });
          $("#subunsur").change(function(){
            var subunsur = $("#subunsur").val();
            $.ajax({
                url: "ambilbutir.php",
                data: "subunsur="+subunsur,
                cache: false,
                success: function(msg){
                    $("#butir").html(msg);
                }
            });
          });
          $("#butir").change(function(){
            var butir = $("#butir").val();
            $.ajax({
                url: "ambilsatuan.php",
                data: "butir="+butir,
                cache: false,
                success: function(msg){
                    $("#satuan").html(msg);
                }
            });
          });
          $("#butir").change(function(){
            var butir = $("#butir").val();
            $.ajax({
                url: "ambilkredit.php",
                data: "butir="+butir,
                cache: false,
                success: function(msg){
                    $("#kredit").html(msg);
                }
            });
          });
        });
        </script>
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