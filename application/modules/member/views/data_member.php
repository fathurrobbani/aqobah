
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Member
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
              <a class="btn btn-primary" href="<?php echo base_url()?>member/tambah_member">Tambah Member</a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Foto</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>No. telp</th>
                  <th>Status</th>
                  <th>Total Main</th>
                  <th>Tgl aktif</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1;for($i=0; $i < count($member); $i++){ ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php
                        if(!empty($member[$i]['foto'])){
                          echo '<img src="'.base_url().'assets/backend/img/member/resized/'.$member[$i]['foto'].'" style="width:100px;">';
                        } 
                      ?></td>
                      <td><?php echo $member[$i]['username'] ?></td>
                      <td><?php echo $member[$i]['email'] ?></td>
                      <td><?php echo $member[$i]['alamat'] ?></td>
                      <td><?php echo $member[$i]['phone'] ?></td>
                      <td><?php echo $member[$i]['status'] ?></td>
                      <td><?php echo $member[$i]['totalmain'] ?></td>
                      <td><?php echo $member[$i]['tgl_aktifmember'] ?></td>
                      <td>
                          <?php if($sess[0]['namalevel'] == 'admin'){?>
                            <a href="<?php echo base_url()?>member/hapus/<?php echo $member[$i]['id_pengguna'];?>" class="btn btn-danger">Delete</a>
                            <a href="<?php echo base_url()?>member/edit/<?php echo $member[$i]['id_pengguna'];?>" class="btn btn-info">Edit</a>
                            <?php if($member[$i]['status'] == 'aktif'){?>
                              <a href="<?php echo base_url()?>member/aktif/<?php echo $member[$i]['id_pengguna'];?>" class="btn btn-primary">Nonaktifkan</a>
                            <?php }?>
                            <?php if($member[$i]['status'] == 'nonaktif'){?>
                              <a href="<?php echo base_url()?>member/aktif/<?php echo $member[$i]['id_pengguna'];?>" class="btn btn-primary">Aktifkan</a>
                            <?php }?>
                          <?php } ?>
                          <?php if($sess[0]['namalevel'] == 'operator'){?>
                            <a href="<?php echo base_url()?>member/edit/<?php echo $member[$i]['id_pengguna'];?>" class="btn btn-info">Edit</a>
                            <?php if($member[$i]['status'] == 'aktif'){?>
                              <a href="<?php echo base_url()?>member/aktif/<?php echo $member[$i]['id_pengguna'];?>" class="btn btn-primary">Nonaktifkan</a>
                            <?php }?>
                            <?php if($member[$i]['status'] == 'nonaktif'){?>
                              <a href="<?php echo base_url()?>member/aktif/<?php echo $member[$i]['id_pengguna'];?>" class="btn btn-primary">Aktifkan</a>
                            <?php }?>
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