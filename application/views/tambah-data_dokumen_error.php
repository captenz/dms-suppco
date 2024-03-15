<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="c_index" class="brand-link">
    <span class="brand-text font-weight-light">JASINFO <b>PTPN XII</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>c_index" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>c_data_dokumen" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Data Dokumen
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>c_master_jenis_dokumen" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Master Jenis Dokumen
              </p>
            </a>
          </li>
          <li class="nav-item menu-open">
            <a href="<?php echo base_url() ?>c_download_dokumen" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Download dokumen
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url() ?>c_data_dokumen" class="brand-link" align="center">
      <span class="brand-text font-weight-light">JASINFO <b>PTPN XII</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-item ">
            <a href="<?php echo base_url() ?>c_index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li> -->
          <li class="nav-item ">
            <a href="<?php echo base_url() ?>c_data_dokumen" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Dokumen
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-right: 250px">
    <!-- Main content -->
    <section class="content">

    <?php 
      $nama_dokumen = $this->session->userdata('nama_dokumen');

      $jenis_dok = $this->session->userdata('jenis_dok');
      $jenis_semua_dokumen =  $this->db->query("SELECT * FROM `tb_master_jenis_dok` where id = '$jenis_dok' ");
      $jenis_dokumen_session = $jenis_semua_dokumen->result();

      $durasi_tgl = $this->session->userdata('durasi_tgl');
      $durasi_bulan = $this->session->userdata('durasi_bulan');
      $durasi_tahun = $this->session->userdata('durasi_tahun');

      $pic = $this->session->userdata('pic');
      $user_jaminan_pelaksana = $this->db->query("SELECT * FROM `tb_user` where id = '$pic' ");
      $jampel_session = $user_jaminan_pelaksana->result();

      $cs = $this->session->userdata('cs');
      $masa_aktif = $this->session->userdata('masa_aktif');
      $akses = $this->session->userdata('akses_for');
      $count = count($akses);
    ?>


      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12 mt-3">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Tambah Data Dokumen</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form onsubmit="return Validate(this);" action="<?php echo base_url(). 'c_data_dokumen/tambah_data_dokumen' ?>" method="post" enctype="multipart/form-data">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Dokumen</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="nama_dokumen" value="<?php echo $nama_dokumen ?>" required>
                        </div>
                        
                        <?php $role_id = $this->session->userdata('role_id');
                          if ($role_id == 3) { ?>
                        <div class="form-group">
                            <label>Jenis Dokumen</label>
                            <select class="form-control select2" id="jns_dok" style="width: 100%;" name="jenis_dok" required>
                            <option selected>- Pilih Jenis Dokumen - </option>
                              <?php foreach ($jampel as $jd) : ?>
                                <option data-id="<?php echo $jd->durasi_tahun ?> <?php echo $jd->durasi_bulan ?> <?php echo $jd->durasi_tgl ?>" value="<?php echo $jd->id;?>" selected>
                                        <?php echo $jd->nama_jenis_dokumen ?> 
                                </option>
                              <?php endforeach; ?>
                            </select>
                        </div>

                        <?php } else { ?>
                        <div class="form-group">
                            <label>Jenis Dokumen</label>
                            <?php foreach ($jenis_dokumen_session as $jds) : ?>
                            <select class="form-control select2" id="jns_dok" style="width: 100%;" name="jenis_dok" value="" required>
                             <option selected value="<?php echo $jds->id;?>"> <?php echo $jds->nama_jenis_dokumen; ?> </option>
                              <?php endforeach; ?>

                              <?php foreach ($jenis_dokumen as $jd) : ?>
                                <option data-id="<?php echo $jd->durasi_tahun ?> <?php echo $jd->durasi_bulan ?> <?php echo $jd->durasi_tgl ?>" value="<?php echo $jd->id;?>">
                                        <?php echo $jd->nama_jenis_dokumen ?> 
                                </option>
                              <?php endforeach; ?>
                            </select>
                        </div>
                          <?php }  ?>
                              <div class="row">
                                <div class="col-12">
                                    <span>* Durasi Pengingat</span>
                                </div>
                                <div class="input-group mb-3 col-3">
                                  <input type="number" class="form-control" id="durasi_tahun" onKeyPress="if(this.value.length==2) return false;"  name="drs_tahun" value="<?php echo $durasi_tahun ?>">
                                  <div class="input-group-append">
                                    <span class="input-group-text">Tahun</span>
                                  </div>
                                </div>
                                <div class="input-group mb-3 col-3">
                                <input type="number" class="form-control"  id="durasi_bulan" onKeyPress="if(this.value.length==2) return false;"  name="drs_bulan" value="<?php echo $durasi_bulan ?>">
                                  <div class="input-group-append">
                                    <span class="input-group-text">Bulan</span> 
                                  </div>
                                </div>
                                  
                                <div class="input-group mb-3 col-3">
                                  <input type="number" class="form-control"  id="durasi_hari" onKeyPress="if(this.value.length==2) return false;" name="drs_hari" value="<?php echo $durasi_tgl ?>">
                                  <div class="input-group-append">
                                    <span class="input-group-text">Hari</span>
                                  </div>
                                </div>
                              </div>
                                

                        <div class="form-group">
                            <label>Bagian/Kebun</label>
                            <?php 
                                $role_id = $this->session->userdata('role_id');
                                $username = $this->session->userdata('username');
                                $bagian = $this->session->userdata('bagian');
                                $query_dokumen = $this->db->query("SELECT * FROM tb_master_bagian WHERE id_bagian ='$bagian'");
                                $data['datamasterbagian'] = $query_dokumen->result_array();
                                // print_r( $data['datamasterbagian']);
                                // die();
                                if($role_id == 1){
                                ?>
                                <select class="form-control select2" style="width: 100%;" name="bag_or_keb">
                                <option selected>- Pilih Bagian/Kebun - </option>
                                <?php foreach ($master_bagian as $usr) : ?>
                                    <option value="<?php echo $usr->id_bagian;?>">
                                      <?php echo $usr->nama_bagian?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <?php
                                }elseif($role_id != 1){
                            ?>
                             <input type="hidden" class="form-control" id="exampleInputEmail1" name="bag_or_keb" value="<?php echo $data['datamasterbagian'][0]['id_bagian'] ?> " readonly>
                             <input type="text" class="form-control" id="exampleInputEmail1" value="<?php echo $data['datamasterbagian'][0]['nama_bagian'] ?> " readonly>
                           
                                <?php }?>
                        </div>

                        <?php $role_id = $this->session->userdata('role_id');
                          if ($role_id == 3) { ?>
                          <div class="form-group">
                            <label>PIC Utama</label>
                            <select class="form-control select2" style="width: 100%;" name="pic" required>
                              <?php foreach ($jampel_session as $js) : ?>
                              <option value="<?php echo $js->id;?>" selected><?php echo $js->username;?></option>
                              <?php endforeach?>
                                <?php foreach ($user_jampel as $usr) : ?>
                                    <option value="<?php echo $usr->id;?>" selected>
                                      <?php echo $usr->username?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                            <?php } else {  ?>

                        <div class="form-group">
                            <label>PIC Utama</label>
                            <select class="form-control select2" style="width: 100%;" name="pic" required>
                              <?php foreach ($jampel_session as $js) : ?>
                              <option value="<?php echo $js->id;?>" selected><?php echo $js->username;?></option>
                              <?php endforeach?>
                                <?php foreach ($user as $usr) : ?>
                                    <option value="<?php echo $usr->id;?>">
                                      <?php echo $usr->username?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                              <?php }  ?>
                        
                        <div class="form-group">
                          <label for="exampleInputEmail1">Contact Person</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" name="cs" value="<?php echo $cs; ?>">
                        </div>

                        <div class="form-group">
                          <label>Masa aktif:</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <i class="far fa-calendar-alt"></i>
                              </span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservation" name="masa_aktif" value="<?php echo $masa_aktif; ?>">
                          </div>
                          <!-- /.input group -->
                        </div>


                        <div class="form-group">
                          <label>Memberikan Akses ke</label>
                          <select class="select2bs4" multiple="multiple" data-placeholder="" style="width: 100%;" name="akses_for[]" >
                            <?php foreach ($master_bagian as $usr) : ?>
                                    <option value="<?php echo $usr->id_bagian;?>">
                                      <?php echo $usr->nama_bagian?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>


                        <div class="form-group">
                          <label for="exampleInputFile">Upload Dokumen</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="exampleInputFile" name="upload_dokumen" required>
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">*jpg,pdf,png</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                  <div class="modal fade" id="modal-sm" data-backdrop="static">

                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        
                        <div class="modal-header">
                          <h4 class="modal-title">Peringatan !!!</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        
                        <div class="modal-body">
                          <p>File tidak cocok, silahkan compress ulang file PDF di <a href="https://docupub.com/pdfconvert/"> https://docupub.com/pdfconvert/ </a> </p>
                        </div>

                        <div class="modal-footer justify-content-center">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                  
            
          <!-- ./col -->
          
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="<?= base_url();?>">JASINFO</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="<?php echo base_url() ?>assets/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="<?php echo base_url() ?>assets/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
var _validFileExtensions = [".jpg", ".jpeg", ".pdf", ".png"]; 
function Validate(oForm) {
    var arrInputs = oForm.getElementsByTagName("input");
    for (var i = 0; i < arrInputs.length; i++) {
        var oInput = arrInputs[i];
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }
                
                if (!blnValid) {
                    alert("Format upload harus : " + _validFileExtensions.join(", "));
                    return false;
                }
            }
        }
    }
  
    return true;
}
</script>
<script>
$(function () {
  bsCustomFileInput.init();
});
$('#jns_dok').ready(function(){
  var data_tgl = $(this).find(':selected').data('id');
    var explode = data_tgl.split(" ");
    $("#durasi_tahun").val(explode[0]);
    $("#durasi_bulan").val(explode[1]);
    $("#durasi_hari").val(explode[2]);
});
$('#jns_dok').change(function(){
    var data_tgl = $(this).find(':selected').data('id');
    var explode = data_tgl.split(" ");
    $("#durasi_tahun").val(explode[0]);
    $("#durasi_bulan").val(explode[1]);
    $("#durasi_hari").val(explode[2]);
});
</script>
<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })
  
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
  
      //Date range picker
      $('#reservationdate').datetimepicker({
          format: 'L'
      });
      //Date range picker
      $('#reservation').daterangepicker(
        {
        locale: {
          format: 'DD/MM/YYYY'
        }
      }
      )
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
  
      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })
  
      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()
  
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
  
      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      });
  
      $("input[data-bootstrap-switch]").each(function(){
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      });
  
    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function () {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });
  
    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false;
  
    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
  
    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });
  
    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file); };
    });
  
    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });
  
    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1";
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });
  
    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0";
    });
  
    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true);
    };
    // DropzoneJS Demo Code End
  </script>

  <script type="text/javascript">
    $(window).on('load', function() {
        $('#modal-sm').modal('show');
    });
  </script>
</body>
</html>