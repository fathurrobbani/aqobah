
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Operator
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
            <div class="box-body">
              <a class="btn btn-primary" href="<?php echo base_url()?>operator/tambah_operator">Tambah Operator</a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Foto</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>No. telp</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1;for($i=0; $i < count($operator); $i++){ ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php
                        if(!empty($operator[$i]['foto'])){
                          echo '<img src="'.base_url().'assets/backend/img/member/resized/'.$operator[$i]['foto'].'" style="width:100px;">';
                        } 
                      ?></td>
                      <td><?php echo $operator[$i]['username'] ?></td>
                      <td><?php echo $operator[$i]['email'] ?></td>
                      <td><?php echo $operator[$i]['alamat'] ?></td>
                      <td><?php echo $operator[$i]['phone'] ?></td>
                      <td>
                          <?php if($sess[0]['namalevel'] == 'admin'){?>
                          <a href="<?php echo base_url()?>operator/hapus/<?php echo $operator[$i]['id_pengguna'];?>" class="btn btn-danger">Delete</a><a href="<?php echo base_url()?>operator/edit/<?php echo $operator[$i]['id_pengguna'];?>" class="btn btn-info">Edit</a>
                          <?php } ?>
                      </td>
                      <td>
                          <?php if($sess[0]['namalevel'] == 'operator'){?>
                          <a href="<?php echo base_url()?>operator/edit/<?php echo $operator[$i]['id_pengguna'];?>" class="btn btn-info">Edit</a>
                          <?php } ?>
                      </td>
                    </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
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