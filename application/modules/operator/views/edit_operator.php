
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit operator
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
            <form method="post" action="<?php echo base_url()?>operator/proses_edit_operator" enctype="multipart/form-data">
              <?php foreach($pengguna as $operator){?>
              <div class="box-body">
              <input type="hidden" name="id_pengguna" value="<?php echo $operator['id_pengguna'];?>">
              <input type="hidden" name="foto_lama" value="<?php echo $operator['foto'];?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Foto Operator</label>
                  <?php 
                    if(!empty($operator['foto'])){
                      echo '<br><img src="'.base_url().'assets/backend/img/member/resized/'.$operator['foto'].'" style="width:100px;">';
                    }
                  ?>
                  <input type="file" class="form-control" name="foto">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Username</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $operator['username'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="email" value="<?php echo $operator['email'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Alamat</label>
                  <input type="text" class="form-control" name="alamat" value="<?php echo $operator['alamat'];?>" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">No. telp</label>
                  <input type="number" class="form-control" name="telp" value="<?php echo $operator['phone'];?>" required>
                </div>
              </div>
              <?php } ?>
              <!-- /.box-body -->

              <div class="box-footer">
                <a class="btn btn-danger" href="<?php echo base_url()?>operator">Back</a>
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