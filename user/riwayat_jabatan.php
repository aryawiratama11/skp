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
                            <a href="index.php">Hom</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        
                        <li>
                            <span class="active">Data Riwayat Jabatan</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                   
                    <div class="row">
                        <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bubble font-green-sharp"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Riwayat Jabatan</span>
                                    </div>
                                                                    </div>
                                <div class="portlet-body">
                                    <ul class="nav nav-pills">
                                        <li class="active">
                                            <a href="#tab_2_1" data-toggle="tab"> Data Riwayat Jabatan </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_2" data-toggle="tab"> Tambah Riwayat Jabatan </a>
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
                                                                        <th> Status </th>
                                                                        <th> Kontrol </th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                 <!-- data kne-->

                                                                 <?php
                                                                if ($_SESSION['jabatan']=='J03') {
                                                                $sql = mysqli_query($con," SELECT p.nip, p.`NAMA_PEGAWAI` , j.`NAMA_JABATAN` ,p.userid , rw.statusjabatan, rw.id_rw_jabatan
                                                                FROM pegawai p , RIWAYAT_JABATAN rw ,  JABATAN j
                                                                WHERE p.`USERID`=rw.`USERID` AND j.`ID_JABATAN`=rw.`ID_JABATAN` "); //statuspeg apa ?
                                                                } else {
                                                                    $sql = mysqli_query($con," SELECT p.nip, p.`NAMA_PEGAWAI` , j.`NAMA_JABATAN` ,p.userid , rw.statusjabatan, rw.id_rw_jabatan
                                                                FROM pegawai p , RIWAYAT_JABATAN rw ,  JABATAN j
                                                                WHERE p.`USERID`=rw.`USERID` AND j.`ID_JABATAN`=rw.`ID_JABATAN` and p.userid='".$_SESSION['userid']."' ");
                                                                }
                                                                 $no = 1;
                                                                 while ($rr = mysqli_fetch_array($sql)) {
                                                                    $id = $rr[0];
                                                                    ?>

                                                                    <tr align='left'>

                                                                     
                                                                        <td><a href="profil.php?nip=<?php echo $rr['userid']; ?>"><span class="fa fa-user"></span> <?php echo  $rr['nip']; ?></a></td>

                                                                       <td><?php echo  $rr['NAMA_PEGAWAI']; ?></td>

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
                                                                        
                                                                       
                                                                        <td><a href="edit.php?id=<?php echo $rr['id_rw_jabatan']; ?>&hal=jabatan"><button class="btn green btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Update"><i class="fa fa-edit"></i></button></a>
                                                                        <!-- <a href="aksi/hapus_rw.php?id=<?php //echo $rr['id_rw_jabatan']; ?>&hal=pendidikan" class="delete-link"> <button class="btn red btn-xs tooltips" data-container="body" data-placement="top" data-original-title="Hapus"><i class="fa fa-remove"></i></button></a> -->
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
                                                        <span class="caption-subject font-green sbold uppercase">Tambah Riwayat Jabatan</span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="portlet-body">
                                                    <!-- BEGIN FORM-->
                                                    <form action="aksi/insert_jabatan.php" class="form-horizontal" enctype="multipart/form-data" method="POST">
                                                        <div class="form-body">

                                                        <?php if ($_SESSION['jabatan']=='J03') { ?>    
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">NIP</label>
                                                                <div class="col-md-8">
                                                                    <select class="bs-select form-control" data-live-search="true" data-size="8" name="nip" required>
                                                                       
                                                                        <option value=""></option>
                                                                    <?php
                                                                    // ambil data dari database
                                                                    
                                                                    $query = "SELECT * FROM pegawai ";
                                                                    
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
                                                            <?php } else { ?>
                                                             <div class="form-group form-md-line-input">
                                                                <label class="col-md-3 control-label" for="form_control_1">Nama
                                                                    <span class="required" aria-required="true">*</span>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input type="text"  name="nip" hidden="true" readonly="true" value="<?php echo $_SESSION['userid'] ?>" >
                                                                    <input type="text" class="form-control" placeholder="" name="nama" readonly="true" value="<?php echo $r[2] ?>" required>
                                                                    <div class="form-control-focus"> </div>
                                                                    <span class="help-block">enter your full name</span>
                                                                </div>
                                                            </div>
                                                            <?php } ?>
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
                                                                <label class="col-md-3 control-label" for="form_control_1">Tanggal Mulai
                                                                    <span class="required" aria-required="true">*</span>
                                                                </label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control form-control-inline input-medium date-picker" size="16" name="tmt" type="text" required />
                                                                    <div class="form-control-focus"> </div>
                                                                    <span class="help-block">enter your full name</span>
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