
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Lapangan
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
              <a class="btn btn-primary" href="<?php echo base_url()?>lapangan/tambah_lapangan">Tambah Lapangan</a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Kode Lapangan</th>
                  <th>Daftar Harga</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1;for($i=0; $i < count($lapangan); $i++){ ?>
                    <tr>
                      <td><?php echo $no;?></td>

                      <td><?php echo $lapangan[$i]['kode_lapangan'] ?></td>
                      <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Daftar Harga</button>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Daftar Harga Sewa Lapangan</h4>
                              </div>
                              <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                  <tr>
                                    <th>Hari</th>
                                    <th>Jam</th>
                                    <th>Umum</th>
                                    <th>Member</th>
                                  </tr>
                                  <tr>
                                    <td rowspan="3">Senin - Jum'at</td>
                                    <td>07:00-12:00</td>
                                    <td><?php echo $lapangan[$i]['hrg_weekday07-12_umum'] ?></td>
                                    <td><?php echo $lapangan[$i]['hrg_weekday07-12_member'] ?></td>
                                  </tr>
                                  <tr>
                                    <td>12:00-17:00</td>
                                    <td><?php echo $lapangan[$i]['hrg_weekday12-17_umum'] ?></td>
                                    <td><?php echo $lapangan[$i]['hrg_weekday12-17_member'] ?></td>
                                  </tr>
                                  <tr>
                                    <td>17:00-24:00</td>
                                    <td><?php echo $lapangan[$i]['hrg_weekday17-24_umum'] ?></td>
                                    <td><?php echo $lapangan[$i]['hrg_weekday17-24_member'] ?></td>
                                  </tr>
                                  <tr>
                                    <td rowspan="3">Sabtu - Minggu</td>
                                    <td>07:00-12:00</td>
                                    <td><?php echo $lapangan[$i]['hrg_weekend07-12_umum'] ?></td>
                                    <td><?php echo $lapangan[$i]['hrg_weekend07-12_member'] ?></td>
                                  </tr>
                                  <tr>
                                    <td>12:00-17:00</td>
                                    <td><?php echo $lapangan[$i]['hrg_weekend12-17_umum'] ?></td>
                                    <td><?php echo $lapangan[$i]['hrg_weekend12-17_member'] ?></td>
                                  </tr>
                                  <tr>
                                    <td>17:00-24:00</td>
                                    <td><?php echo $lapangan[$i]['hrg_weekend17-24_umum'] ?></td>
                                    <td><?php echo $lapangan[$i]['hrg_weekend17-24_member'] ?></td>
                                  </tr>
                                </table>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                            </div>

                          </div>
                        </div></td>
                        <td>
                            <?php if($sess[0]['namalevel'] == 'admin'){?>
                            <a href="<?php echo base_url()?>lapangan/hapus/<?php echo $lapangan[$i]['id_lapangan'];?>" class="btn btn-danger">Delete</a><a href="<?php echo base_url()?>lapangan/edit/<?php echo $lapangan[$i]['id_lapangan'];?>" class="btn btn-info">Edit</a><?php } ?></td>
                        <td>
                            <?php if($sess[0]['namalevel'] == 'operator'){?>
                            <a href="<?php echo base_url()?>lapangan/edit/<?php echo $lapangan[$i]['id_lapangan'];?>" class="btn btn-info">Edit</a> <?php } ?>
                        </td>
                    </tr>
                  <?php $no++; } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No.</th>
                  <th>Kode Lapangan</th>
                  <th>Harga per jam</th>
                </tr>
                </tfoot>
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