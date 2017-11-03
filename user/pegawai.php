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
                            <a href="index.php">Hom</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        
                        <li>
                            <span class="active">Data Pegawai</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                   
                    <div class="row">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Pegawai</span>
                                    </div>
                                                                    </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> Data Pegawai </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> Tambah Pegawai </a>
                                        </li>
                                        
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab_2_1">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-globe"></i>Buttons </div>
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                    <thead>
                                                                    <tr>

                                                                        <th> NIP </th>
                                                                        <th> Nama </th>
                                                                        <th> Jabatan </th>
                                                                        <th> Pangkat </th>
                                                                        <th> Kontrol </th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <!-- data kne-->

                                                                 <?php
                                                                
$sql = mysqli_query($con," SELECT p.nip, p.`NAMA_PEGAWAI` , pa.`NAMA_PANGKAT` , pa.`GOLONGAN_RUANG` ,j.`NAMA_JABATAN` ,p.userid
FROM pegawai p , RIWAYAT_JABATAN rw , HISTORY_PANGKAT hp , PANGKAT pa , JABATAN j
WHERE p.`USERID`=rw.`USERID` AND p.`USERID`=hp.userid AND hp.`ID_PANGKAT`=pa.`ID_PANGKAT` AND j.`ID_JABATAN`=rw.`ID_JABATAN` AND rw.`STATUSJABATAN`='1' AND hp.`STATUSPANGKAT`='1' "); //statuspeg apa ?
                                                                 $no = 1;
                                                                 while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                    ?>

                                                                    <tr align='left'>

                                                                     
                                                                        <td><a href="profil.php?id=<?php echo $rr['userid']; ?>"><span class="fa fa-user"></span> <?php echo  $rr['nip']; ?></a></td>

                                                                       <td><?php echo  $rr['NAMA_PEGAWAI']; ?></td>

                                                                       <td><?php echo  $rr['NAMA_JABATAN']; ?></td>
                                                                       <td><?php echo  $rr['NAMA_PANGKAT']."/".$rr['GOLONGAN_RUANG']; ?></td>
                                                                        
                                                                       
                                                                        <td><a href="profil.php?id=<?php echo $rr['userid'];  ?>"><button class="btn green btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Update"><i class="fa fa-edit"></i></button></a>
                                                                        <!-- <a href="detail.html"> <button class="btn blue btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Surat Pengajuan Pensiun"><i class="fa fa-print"></i></button></a> -->
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
                                        <span class="caption-subject font-green sbold uppercase">Tambah Pegawai</span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <!-- BEGIN FORM-->
                                    <form action="aksi/insert_pegawai.php" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                        <div class="form-body">
                                            
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">NIP
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="nip" required>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Nama
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="nama" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your full name</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Password
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="password" class="form-control" placeholder="" name="password" required>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-radios">
                                                <label class="col-md-3 control-label" for="form_control_1">Jenis Kelamin</label>
                                                <div class="col-md-9">
                                                    <div class="md-radio-inline">
                                                        <div class="md-radio">
                                                            <input type="radio" id="checkbox1_8" name="jk" value="L" class="md-radiobtn" required>
                                                            <label for="checkbox1_8">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Laki-laki </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="checkbox1_9" name="jk" value="P" class="md-radiobtn" required>
                                                            <label for="checkbox1_9">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Perempuan </label>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div> 
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Agama</label>
                                                <div class="col-md-9">
                                                    <select class="form-control" name="agama" required="true" >
                                                        <option> -- Pilih Salah Satu --</option>
                                                        <option value="Islam"> Islam</option>
                                                        <option value="Kristen"> Kristen</option>
                                                        <option value="Protestan"> Protestan</option>
                                                        <option value="Hindu"> Hindu</option>
                                                        <option value="Budha"> Budha</option>
                                                    </select>
                                                    <!-- <div class="form-control-focus"> </div> -->
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                 <label class="col-md-3 control-label" for="form_control_1">Kota Lahir </label>
                                                    <div class="col-sm-9">
                                              
                                                        <?php
                                                          echo "<select class=\"form-control\" name=\"kota\" id=\"kota\" required>";
                                                                
                                                              $pkt2=mysqli_query($con,"select * from kota ");
                                                                  echo "<option value=\"\">   --Pilih Salah Satu --   </option>";

                                                                  while ($pk2=mysqli_fetch_array($pkt2))
                                                                  {
                                                                  echo "<option value=\"".$pk2[0]."\">".$pk2[1]."</option>";
                                                                  }
                                                                  
                                                          echo "</select>";
                                                       ?>
                                                     </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Tanggal Lahir
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control form-control-inline input-medium date-picker" size="16" name="tgl" type="text" required />
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your full name</span>
                                                </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">No. Hp
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="hp" required>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Alamat</label>
                                                    <div class="col-md-9">
                                                        <textarea class="form-control" name="alamat" rows="3" style="margin: 0px -5.25px 0px 0px; width: 383px; height: 70px;"></textarea>
                                                        <div class="form-control-focus"> </div>
                                                    </div>
                                            </div>
                                             <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">Tanggal Tugas
                                                    <span class="required" aria-required="true">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input class="form-control form-control-inline input-medium date-picker" size="16" name="tugas" type="text" required />
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">enter your full name</span>
                                                </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                 <label class="col-md-3 control-label" for="form_control_1">Jabatan </label>
                                                    <div class="col-sm-9">
                                              
                                                        <?php
                                                          echo "<select class=\"form-control\" name=\"jabatan\" id=\"jabatan\" required>";
                                                                
                                                              $pkt2=mysqli_query($con,"select * from jabatan ");
                                                                  echo "<option value=\"\">   --Pilih Salah Satu --   </option>";

                                                                  while ($pk2=mysqli_fetch_array($pkt2))
                                                                  {
                                                                  echo "<option value=\"".$pk2[0]."\">".$pk2[1]."</option>";
                                                                  }
                                                                  
                                                          echo "</select>";
                                                       ?>
                                                     </div>
                                             </div>
                                             <div class="form-group form-md-line-input">
                                                 <label class="col-md-3 control-label" for="form_control_1">Pangkat </label>
                                                    <div class="col-sm-9">
                                              
                                                        <?php
                                                          echo "<select class=\"form-control\" name=\"pangkat\" id=\"pangkat\" required>";
                                                                
                                                              $pkt2=mysqli_query($con,"select * from pangkat ");
                                                                  echo "<option value=\"\">   --Pilih Salah Satu --   </option>";

                                                                  while ($pk2=mysqli_fetch_array($pkt2))
                                                                  {
                                                                  echo "<option value=\"".$pk2[0]."\">".$pk2[1]." | ".$pk2[2]."</option>";
                                                                  }
                                                                  
                                                          echo "</select>";
                                                       ?>
                                                     </div>
                                             </div>
                                             <!-- <div class="col-md-9"> -->
                                                    <div class="form-group form-md-line-input">
                                                    <label class="col-md-3 control-label" for="form_control_1">Foto </label>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                    <img src="../upload/no.png" alt="" /> </div>
                                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                <div>
                                                                    <span class="btn default btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="file" accept="image/jpg,image/png,image/jpeg,image/bmp" required> </span>
                                                                    <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                            </div>
                                                           
                                                        </div>
                                                <!-- </div> -->
                                           
                                            
                                            
                                            
                                            
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
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
    </body>

</html>