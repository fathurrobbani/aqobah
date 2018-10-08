
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Transaksi
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
              <a class="btn btn-primary" href="<?php echo base_url()?>transaksi/tambah_transaksi">Tambah Transaksi</a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Username pemesan</th>
                  <th>Tanggal Transaksi</th>
                  <th>Tanggal Sewa</th>
                  <th>Jam Awal</th>
                  <th>Jam Akhir</th>
                  <th>Durasi</th>
                  <th>Total Bayar</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1;for($i=0; $i < count($transaksi); $i++){ ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $transaksi[$i]['username'] ?></td>
                      <td><?php echo $transaksi[$i]['tgl_transaksi'] ?></td>
                      <td><?php echo $transaksi[$i]['tgl_sewa'] ?></td>
                      <td><?php echo $transaksi[$i]['jam_awal'] ?></td>
                      <td><?php echo $transaksi[$i]['jam_akhir'] ?></td>
                      <td><?php echo $transaksi[$i]['durasi'] ?></td>
                      <td><?php echo $transaksi[$i]['tot_bayar'] ?></td>
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