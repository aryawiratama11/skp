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
  $id=$_GET['id'];
  @$kd=$_GET['kd'];
if (@$_GET['hal']=='jabatan') {
$sql=mysqli_query($con," SELECT p.nip, p.`NAMA_PEGAWAI` , j.`NAMA_JABATAN` ,p.userid , rw.statusjabatan, rw.id_rw_jabatan,j.id_jabatan ,rw.tglmulai
                         FROM pegawai p , RIWAYAT_JABATAN rw ,  JABATAN j
                         WHERE p.`USERID`=rw.`USERID` AND j.`ID_JABATAN`=rw.`ID_JABATAN` and  rw.id_rw_jabatan='$id' ");
  $r=mysqli_fetch_array($sql);

}
elseif (@$_GET['hal']=='pangkat') {
    $sql=mysqli_query($con," SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,p.userid,hp.statuspangkat, hp.id_h_pangkat
                            ,pa.ID_PANGKAT,hp.tanggalmulai
                            FROM pegawai p , HISTORY_PANGKAT hp , PANGKAT pa 
                            WHERE p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` and  hp.id_h_pangkat='$id' ");
  $r=mysqli_fetch_array($sql);
    # code...
}
elseif (@$_GET['hal']=='identitas') {
    $sql=mysqli_query($con," SELECT * from sasaran_kinerja_pegawai where kode_skp ='$id' ");
  $r=mysqli_fetch_array($sql);
    # code...
}
elseif (@$_GET['hal']=='ajuan') {
    $sql=mysqli_query($con," SELECT u.`NAMA_UNSUR`,su.`NAMA_SUBUNSUR` , k.`BUTIR_KEGIATAN`, dk.`T_KUANTITAS`, dk.`T_KUALITAS` , dk.`T_WAKTU` ,dk.`T_BIAYA`,u.id_unsur , su.ID_SUBUNSUR , k.ID_KEG , k.satuan_hasil , k.angka_kredit
FROM unsur u, sub_unsur su , kegiatan k , detil_kegiatan dk 
WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR` AND k.`ID_KEG`=dk.`ID_KEG` AND dk.`KODE_SKP`= '$kd' and k.ID_KEG='$id'");
  $r=mysqli_fetch_array($sql);
    # code...
}
elseif (@$_GET['hal']=='perilaku') {
    $sql=mysqli_query($con,"SELECT p.`USERID` , skp.`KODE_SKP` ,pp.`KODENILAI` , skp.`JANGKAWAKTU_PENILAIAN` , p.`NAMA_PEGAWAI`, p.nip , pp.orientasipelayanan,pp.integritas,pp.komitmen,pp.disiplin,pp.kerjasama,pp.kepemimpinan
                            FROM pegawai p , sasaran_kinerja_pegawai skp , penilaian_perilaku_pegawai pp
                            WHERE p.`USERID`=skp.`USERID` AND skp.`KODE_SKP` = pp.`KODE_SKP` and pp.`KODENILAI`='$id' ");
  $r=mysqli_fetch_array($sql);
    # code...
}
elseif (@$_GET['hal']=='kegiatan') {
    $sql=mysqli_query($con,"SELECT u.`id_unsur`,su.`id_subunsur` , k.`BUTIR_KEGIATAN`,k.satuan_hasil , k.angka_kredit, u.id_unsur ,k.ID_KEG
                            FROM unsur u, sub_unsur su , kegiatan k
                            WHERE u.`ID_UNSUR`=su.`ID_UNSUR` AND su.`ID_SUBUNSUR`=k.`ID_SUBUNSUR`and k.id_keg='$id' ");
  $r=mysqli_fetch_array($sql);
    # code...
}

else {
    echo '<script>
    alert(\'ERROR\');
    window.location="index.php";
    </script> '; 

}

if ($ketemu==0){
    echo '<script>
    alert(\'LOGIN DULU\');
    window.location="../index.php";
    </script> '; 
} 


    else { 
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
        <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
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
                            <span class="active">Data <?php echo $_GET['hal']; ?></span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                   <?php if (@$_GET['hal']=='jabatan') {?>
                   <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green sbold uppercase">Edit Riwayat Jabatan</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="aksi/update.php?id=<?php echo $id; ?>&hal=jabatan" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="form-body">

                                
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Nama
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="" name="userid" readonly="true" value="<?php echo $r[1] ?>" required>
                                        <div class="form-control-focus"> </div>
                                        <span class="help-block">enter your full name</span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                   <label class="col-md-3 control-label" for="form_control_1">Jabatan </label>
                                   <div class="col-sm-9">

                                    <?php
                                    echo "<select class=\"form-control\" name=\"jabatan\" id=\"jabatan\" required>";

                                    $pkt2=mysqli_query($con,"select * from jabatan where id_jabatan='$r[6]'
                                    union select * from jabatan where id_jabatan!='$r[6]' ");
                                   

                                    while ($pk2=mysqli_fetch_array($pkt2))
                                    {
                                      echo "<option value=\"".$pk2[0]."\">".$pk2[1]."</option>";
                                  }

                                  echo "</select>";
                                  ?>
                                  </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Tanggal Mulai
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control form-control-inline input-medium date-picker" size="16" name="tmt" type="text" required value="<?php

                                                                $arr = explode('-', $r[7]);
                                                                $newDate = $arr[2].'/'.$arr[1].'/'.$arr[0];
                                                                echo $newDate; ?>" />
                                        <div class="form-control-focus"> </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label" for="form_control_1">Status </label>
                                       <div class="col-md-9">

                                          <?php
                                          if($r[4]==1){ ?>
                                          <select class="form-control" name="status">

                                           <option value="1">Sekarang</option>
                                           <option value="0">Sebelum</option>


                                       </select>
                                       <?php }
                                       else { ?>
                                       <select class="form-control" name="status">

                                          <option value="0">Sebelum</option>
                                          <option value="1">Sekarang</option>



                                      </select>
                                      <?php    }  ?>

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
                <?php } elseif (@$_GET['hal']=='pangkat'){ ?>
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-green sbold uppercase">Edit Riwayat pangkat</span>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form action="aksi/update.php?id=<?php echo $id; ?>&hal=pangkat" class="form-horizontal" enctype="multipart/form-data" method="POST">
                            <div class="form-body">

                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Nama
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" placeholder="" name="userid" readonly="true" value="<?php echo $r[1] ?>" required>
                                        <div class="form-control-focus"> </div>
                                        <span class="help-block">enter your full name</span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                   <label class="col-md-3 control-label" for="form_control_1">Pangkat </label>
                                   <div class="col-sm-9">

                                        <?php
                                        echo "<select class=\"form-control\" name=\"pangkat\" id=\"pangkat\" required>";

                                        $pkt2=mysqli_query($con,"select * from pangkat where id_pangkat='$r[7]'
                                            union
                                            select * from pangkat where id_pangkat!='$r[7]'");
                                        

                                        while ($pk2=mysqli_fetch_array($pkt2))
                                        {
                                          echo "<option value=\"".$pk2[0]."\">".$pk2[1]." | ".$pk2[2]."</option>";
                                      }

                                      echo "</select>";
                                      ?>
                                  </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                    <label class="col-md-3 control-label" for="form_control_1">Tanggal Mulai
                                        <span class="required" aria-required="true">*</span>
                                    </label>
                                    <div class="col-md-9">
                                        <input class="form-control form-control-inline input-medium date-picker" size="16" name="tmt" type="text" required value="<?php

                                                                $arr = explode('-', $r[8]);
                                                                $newDate = $arr[2].'/'.$arr[1].'/'.$arr[0];
                                                                echo $newDate; ?>" />
                                        <div class="form-control-focus"> </div>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group form-md-line-input">
                                       <label class="col-md-3 control-label" for="form_control_1">Status </label>
                                       <div class="col-md-9">

                                          <?php
                                          if($r[5]==1){ ?>
                                          <select class="form-control" name="status">

                                           <option value="1">Sekarang</option>
                                           <option value="0">Sebelum</option>


                                       </select>
                                       <?php }
                                       else { ?>
                                       <select class="form-control" name="status">

                                          <option value="0">Sebelum</option>
                                          <option value="1">Sekarang</option>



                                      </select>
                                      <?php    }  ?>

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
                 <?php } elseif (@$_GET['hal']=='identitas'){ ?>
                <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Edit Identitas SKP</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="aksi/update.php?id=<?php echo $id; ?>&hal=identitas" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                        <div class="form-body">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">NIP/Nama Pejabat Penilai</label>
                                                <div class="col-md-8">
                                                    <select class="bs-select form-control" data-live-search="true" data-size="8" name="nip" required>
                                                       
                                                        <!-- <option value=""></option> -->
                                                    <?php
                                                    // ambil data dari database
                                                    $query = "SELECT * FROM pegawai where userid='$r[17]'
                                                            union SELECT * FROM pegawai where userid!='$r[17]' ";
                                                    $hasil = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_array($hasil)) {
                                                        ?>
                                                        <option value="<?php echo $row[14] ?>"><?php echo $row[0]." | " .$row[2];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">NIP/Nama Atasan Pejabat Penilai</label>
                                                <div class="col-md-8">
                                                    <select class="bs-select form-control" data-live-search="true" data-size="8" name="nipa" required>
                                                       
                                                        <!-- <option value=""></option> -->
                                                    <?php
                                                    // ambil data dari database
                                                    $query = "SELECT * FROM pegawai where userid='$r[18]'
                                                            union SELECT * FROM pegawai where userid!='$r[18]'";
                                                    $hasil = mysqli_query($con, $query);
                                                    while ($row = mysqli_fetch_array($hasil)) {
                                                        ?>
                                                        <option value="<?php echo $row[14] ?>"><?php echo $row[0]." | " .$row[2];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                    </select>
                                                </div>
                                            </div>
                                             
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Periode
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control" placeholder="" name="periode" value="<?php echo $r[2] ?>">
                                                    <div class="form-control-focus"> </div>
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
                <?php } elseif (@$_GET['hal']=='ajuan') { ?>
                <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Edit Kegiatan SKP</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="aksi/update.php?id=<?php echo $id; ?>&kd=<?php echo $kd; ?>&hal=ajuan" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                        <div class="form-body">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Unsur</label>
                                                <div class="col-md-8">
                                                    <select class="bs-select form-control" data-live-search="true" data-size="8" id="unsur" name="unsur" required>
                                                       
                                                        <!-- <option value=""></option> -->
                                                    <?php
                                                    // ambil data dari database
                                                    $query = "SELECT id_unsur,nama_unsur from unsur where id_unsur='$r[7]'
                                                    union SELECT id_unsur,nama_unsur from unsur where id_unsur!='$r[7]' ";
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
                                                    echo "<select class=\"form-control\" name=\"subunsur\" id=\"subunsur\" value=\"$r[8]\"  required >";
                                                        $subunsur=mysqli_query($con,"
                                                        SELECT id_subunsur,nama_subunsur from sub_unsur where id_subunsur='$r[8]' and id_unsur='$r[7]'
                                                         union 
                                                         SELECT id_subunsur,nama_subunsur from sub_unsur where id_subunsur!='$r[8]' and id_unsur='$r[7]'  ");
                       

                                                                while ($sub=mysqli_fetch_array($subunsur))
                                                                          {
                                                                          echo "<option value=\"".$sub['id_subunsur']."\">".$sub['nama_subunsur']."</option>";
                                                                          }
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Butir Kegiatan</label>
                                                <div class="col-md-8">
                                                    <?php
                                                    echo "<select class=\"form-control\" name=\"butir\" id=\"butir\"  required >";
                                                                  $bk=mysqli_query($con,"SELECT id_keg,butir_kegiatan FROM kegiatan WHERE id_keg='$r[9]'  union SELECT id_keg,butir_kegiatan FROM kegiatan WHERE id_keg!='$r[9]' and id_subunsur='$r[8]'   ");
                       

                                                                while ($butir=mysqli_fetch_array($bk))
                                                                          {
                                                                          echo "<option value=\"".$butir['id_keg']."\">".$butir['butir_kegiatan']."</option>";
                                                                          }
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                             
                                             
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Angka Kredit</label>
                                                <div class="col-md-8">
                                                    <?php
                                                    echo "<select class=\"form-control\" name=\"kredit\" id=\"kredit\" required >";
                                                         $subunsur2=mysqli_query($con,"SELECT id_keg,butir_kegiatan,satuan_hasil,angka_kredit FROM kegiatan WHERE id_keg='$r[11]'  union SELECT id_keg,butir_kegiatan,satuan_hasil,angka_kredit FROM kegiatan WHERE id_keg!='$r[11]' and id_subunsur='$r[8]'   ");
                       

                                                                while ($sub2=mysqli_fetch_array($subunsur2))
                                                                          {
                                                                          echo "<option value=\"".$sub2['angka_kredit']."\">".$sub2['angka_kredit']."</option>";
                                                                          }
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Kuantitas
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tku" value="<?php echo $r[3]; ?>">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-3">satuan</label>
                                                <div class="col-md-8">
                                                    <?php
                                                    echo "<select class=\"form-control\" name=\"satuan\" id=\"satuan\"  required >";
                                                        $subunsur1=mysqli_query($con,"SELECT id_keg,butir_kegiatan,satuan_hasil FROM kegiatan WHERE id_keg='$r[10]'  union SELECT id_keg,butir_kegiatan,satuan_hasil FROM kegiatan WHERE id_keg!='$r[10]' and id_subunsur='$r[8]'   ");
                       

                                                                while ($sub1=mysqli_fetch_array($subunsur1))
                                                                          {
                                                                          echo "<option value=\"".$sub1['satuan_hasil']."\">".$sub1['satuan_hasil']."</option>";
                                                                          }
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Kualitas
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tkw" value="<?php echo $r[4]; ?>" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Waktu
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tw" value="<?php echo $r[5]; ?>" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Target Biaya
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" id='numbers1' name="tb" 
                                                    value="<?php echo $r[6]; ?>">
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
                <?php } elseif (@$_GET['hal']=='perilaku') { ?>
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Edit Penilaian Perilaku</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="aksi/update.php?id=<?php echo $id; ?>&hal=perilaku" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                        <div class="form-body">
                                            
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Nama
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="userid" readonly="true" value="<?php echo $r[4] ?>" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your full name</span>
                                                </div>
                                            </div>
                                             
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1"> Orientasi Pelayanan
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" name="op" value="<?php echo $r[6] ?>" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">  Integritas
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" name="int" value="<?php echo $r[7] ?>">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input"> 
                                                <label class="col-md-3 control-label" for="form_control_1"> Komitmen
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" name="kom" value="<?php echo $r[8] ?>" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input"> 
                                                <label class="col-md-3 control-label" for="form_control_1"> Disiplin
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" name="disp" value="<?php echo $r[9] ?>" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input"> 
                                                <label class="col-md-3 control-label" for="form_control_1"> Kerjasama
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" name="kerja" value="<?php echo $r[10] ?>">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Gunakan titik bila desimal</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1"> Kepemimpinan
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-4">
                                                    <input type="number" step="0.01" class="form-control" placeholder="" name="pimpin" value="<?php echo $r[11] ?>">
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
                <?php } elseif (@$_GET['hal']=='kegiatan') {  ?>
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class=" icon-layers font-green"></i>
                                        <span class="caption-subject font-green sbold uppercase">Edit Kegiatan SKP</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="aksi/update.php?id=<?php echo $id; ?>&hal=kegiatan" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                        <div class="form-body">
                                            
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Unsur</label>
                                                <div class="col-md-8">
                                                    <select class="bs-select form-control" data-live-search="true" data-size="8" id="unsur" name="unsur" required>
                                                       
                                                       <!--  <option value=""></option> -->
                                                    <?php
                                                    // ambil data dari database
                                                    $query = "SELECT id_unsur,nama_unsur from unsur where id_unsur='$r[0]'
                                                    union SELECT id_unsur,nama_unsur from unsur where id_unsur!='$r[0]' ";
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
                                                    echo "<select class=\"form-control\" name=\"subunsur\" id=\"subunsur\"  required >";
                                                        $subunsur=mysqli_query($con,"
                                                        SELECT id_subunsur,nama_subunsur from sub_unsur where id_subunsur='$r[1]' and id_unsur='$r[0]'
                                                         union 
                                                         SELECT id_subunsur,nama_subunsur from sub_unsur where id_subunsur!='$r[1]' and id_unsur='$r[0]'  ");
                       

                                                                while ($sub=mysqli_fetch_array($subunsur))
                                                                          {
                                                                          echo "<option value=\"".$sub['id_subunsur']."\">".$sub['nama_subunsur']."</option>";
                                                                          }
                                                    
                                                                 echo "</select>";
                                                              ?>
                                                </div>
                                            </div>
                                            
                                             
                                             
                                            
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Butir Kegiatan
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder=""  name="butir" value="<?php echo $r[2] ?>" >
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Satuan Hasil
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text"  class="form-control" placeholder=""  name="satuan" value="<?php echo $r[3] ?>">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"></span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Angka Kredit
                                                    <span class=""></span>
                                                </label>
                                                <div class="col-md-6">
                                                    <input type="text"  class="form-control" placeholder=""  name="angka" value="<?php echo $r[4] ?>">
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block"></span>
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
                                            
                <?php } else { } ?>

                    
                    
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
        <script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        
         <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-bootstrap-select.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
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