
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sosial dan Lingkungan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sosial dan Lingkungan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <h1 class="m-0 text-dark">Detail Data</h1>
                                <table>
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no=0;
                                        foreach ($sosial_lingkungan as $li) :
                                        $no++;
                                        ?>
                                        <tr>
                                        <th>LSM/Tokoh Masyarakat/Instansi</th><td>: <?php echo $li['nama_lsm'] ?></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                        <th>Kondisi 10 tahun Terakhir</th><td>: <?php echo $li['kondisi_10thn_terakhir'] ?></td>
                                        </tr>
                                        <tr>
                                        <th>Tanggal </th> <td>: <?php $newDate = date("d-m-Y", strtotime($li['tanggal'])); echo $newDate ;?></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                        <th>Kondisi saat ini</th> <td>: <?php echo $li['kondisi_saat_ini'] ?></td>
                                        </tr>
                                        <tr>
                                        <th>Lokasi</th><td>: <?php echo $li['lokasi'] ?></td><td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
                                        <th>Keterangan</th><td>: <?php echo $li['keterangan'] ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal-lg">
                                Tambah Kondisi
                                </button>
                                <!-- <a href="<?php echo base_url() ?>c_gap_legal_ijin/form_legal_ijin"><button type="button" class="btn btn-block btn-success btn-s">Tambah </button></a> -->
                            </div>
                            <div class="col-md-2 mb-3">
                            <!-- select -->
                                <div class="form-group">
                                    <select class="custom-select" id="dynamic_select">
                                        <option selected disabled>Export</option>
                                        <option value="<?php echo base_url() ?>c_laporan_gap_analysis/excel_ksi_sosial_lingkungan/<?php echo $li['id_sos_lik'] ?>">Excel</option>
                                        <option value="<?php echo base_url() ?>c_laporan_gap_analysis/pdf_ksi_sosial_lingkungan/<?php echo $li['id_sos_lik'] ?>">PDF</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>Kondisi Saat Ini</th>
                          <th>Tanggal Update</th>
                          <th>Upload Dokumen</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                              $no=0;
                              foreach ($kondisi_saat_ini as $ksi) :
                              $no++;
                            ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $ksi['histori_kondisi_saat_ini'] ?></td>
                                <td><?php $newDate1 = date("d-m-Y", strtotime($ksi['tanggal_update'])); echo $newDate1 ;?></td>
                                <td><?php echo $ksi['histori_upload_dokumen'] ?></td>
                                <td><button type="button" class="btn  btn-primary btn-sm" id="<?php echo $ksi['histori_upload_dokumen'] ?>" value="<?php echo $ksi['id_histori_sos_ling'] ?>,<?php echo $ksi['id_sos_lik'] ?>,<?php echo $ksi['histori_kondisi_saat_ini'] ?>,<?php echo $ksi['tanggal_update'] ?>" onClick="kirimupdate(this.value,this.id)" data-toggle="modal" data-target="#modal-edit" title="Edit"><i class="far fa-edit"></i></button></td>
                                
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                        
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
          <!-- ./col -->
          <!-- Modal Edit -->
          <div class="modal fade" id="modal-edit">
              <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                  <h4 class="modal-title">Edit Kondisi saat ini</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <form onsubmit="return Validate(this);" action="<?php echo base_url() ?>c_gap_sosial_lingkungan/update_detail_sosial_lingkungan"  method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                  <input type="hidden" class="form-control"  name="id_histori_sos_ling" id="myText1">
                  <input type="hidden" class="form-control"  name="id_sos_lik" id="myText2">
                      <div class="form-group">
                          <label for="inputDescription">Kondisi Saat Ini</label>
                          <textarea class="form-control" rows="4" name="histori_kondisi_saat_ini" id="myText3"></textarea>
                      </div>
                      <div class="form-group">
                          <label>Tanggal</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                  <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" id="myText4"name="tanggal_update"required/>
                                  <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                      </div>
                      <div class="file_div">
                        <div class="form-group">
                          <label for="exampleInputFile">Upload Dokumen</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input"   id="cv" name="histori_upload_dokumen[]" multiple>
                              <label class="custom-file-label" id="myText5"></label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text">jpg,png,pdf</span>
                            </div>
                          </div>
                          <!-- <input class="btn btn-primary" type="button" onclick="add_file();" value="+" style="width:40px;height:40px;margin-bottom:10px"> -->
                        </div>
                        <input type="hidden" class="form-control" id="myText6" name="upload_dokument" >

                      </div>
                  </div>
                  <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                  </form>
              </div>
              <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div>
          <!-- Modal Edit -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- Modal Edit -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Kondisi saat ini</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form onsubmit="return Validate(this);" action="<?php echo base_url() ?>c_gap_sosial_lingkungan/tambah_detail_sosial_lingkungan"  method="post" enctype="multipart/form-data">
            <div class="modal-body">
            <?php
            $no=0;
            foreach ($sosial_lingkungan as $li) :
            $no++;
            ?>
            <input type="hidden" class="form-control"  name="id_sos_lik" value="<?php echo $li['id_sos_lik'] ?>">
            <?php endforeach; ?>
                <div class="form-group">
                    <label for="inputDescription">Kondisi Saat Ini</label>
                    <textarea id="inputDescription" class="form-control" rows="4" name="histori_kondisi_saat_ini"></textarea>
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                        <div class="input-group date" id="reservationdate1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate1" name="tanggal_update" required/>
                            <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                </div>
                <div class="file_div">
                  <div class="form-group">
                    <label for="exampleInputFile">Upload Dokumen</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"   id="cv" name="histori_upload_dokumen[]" multiple>
                        <label class="custom-file-label" ></label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">jpg,png,pdf</span>
                      </div>
                    </div>
                    <!-- <input class="btn btn-primary" type="button" onclick="add_file();" value="+" style="width:40px;height:40px;margin-bottom:10px"> -->
                  </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Modal Edit -->
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
    <?php if ($this->session->flashdata('something')) { ?>
    <script>
    $(document).ready(function() {
      swal("Data berhasil Ditambah", "", "success");
    });
    </script>

    <?php } ?>
    <?php if ($this->session->flashdata('something1')) { ?>
    <script>
    $(document).ready(function() {
      swal("Data berhasil Diubah", "", "success");
    });
    </script>

    <?php } ?>
    <script type="text/javascript">
    function add_file()
    {
    $(".file_div").append(" <div><input type='file' name='histori_upload_dokumen[]'><input class='btn btn-danger' type='button' value='-' onclick=remove_file(this); style='width:40px;height:40px;margin-left:3px;margin-bottom:10px'></div>");
    }
    function remove_file(ele)
    {
    $(ele).parent().remove();
    }
    </script>
    <script type="text/javascript">
      function kirimupdate(z,x){
        var str = z ;
        var res = str.split(",");
        var strx = x ;
        var resx = strx.split(",");
        document.getElementById("myText1").value = res[0];
        document.getElementById("myText2").value = res[1];
        document.getElementById("myText3").value = res[2];
        document.getElementById("myText4").value = res[3];
        document.getElementById("myText6").value = resx;
        document.getElementById("myText5").innerHTML = resx;

      }
    </script>
       <script>
        $(function(){
          // bind change event to select
          $('#dynamic_select').on('change', function () {
              var url = $(this).val(); // get selected value
              if (url) { // require a URL
                  window.location = url; // redirect
              }
              return false;
          });
        });
    </script>
