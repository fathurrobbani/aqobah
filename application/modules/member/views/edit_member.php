
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Member
      </h1>
<!--       <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <form method="post" action="<?php echo base_url()?>member/proses_edit_member" enctype="multipart/form-data">
              <?php foreach($pengguna as $member){?>
              <div class="box-body">
                <input type="hidden" name="id_pengguna" value="<?php echo $member['id_pengguna'];?>">
                <input type="hidden" name="foto_lama" value="<?php echo $member['foto'];?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Foto Member</label>
                  <?php 
                    if(!empty($member['foto'])){
                      echo '<br><img src="'.base_url().'assets/backend/img/member/resized/'.$member['foto'].'" style="width:100px;">';
                    }
                  ?>
                  <input type="file" class="form-control" name="foto">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $member['username'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $member['email'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?php echo $member['alamat'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No. telp</label>
                  <input type="number" class="form-control" name="telp" value="<?php echo $member['phone'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ganti password</label>
                  <br><button class="btn btn-primary" type="button" id="change_password">Ganti password</button> 
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->

              <div class="box-footer">
                <a class="btn btn-danger" href="<?php echo base_url()?>member">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>  
            </form>
            
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Ganti Password</h3>
              </div>
              <div class="modal-body form">
                  <form action="#" id="form" class="form-horizontal">
                    <?php foreach($pengguna as $member){?>
                      <input type="hidden" value="<?php echo $member['id_pengguna'];?>" name="id" /> 
                    <?php } ?>
                      <div class="form-body">
                          <div class="form-group">
                              <label class="control-label col-md-3">Password Baru</label>
                              <div class="col-md-9">
                                  <input name="password" placeholder="Password Baru" class="form-control" type="text">
                                  <span class="help-block"></span>
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              </div>
          </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- End Bootstrap modal -->

  <script>
    function save()
    {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable 
        var url;
        url = "<?php echo site_url('member/ubah_password')?>";
        
        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
      
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    alert('password berhasil diubah')
                    window.location.reload();
                }             
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable 
      
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error ganti password');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable             
            }
        });
    }
  </script>