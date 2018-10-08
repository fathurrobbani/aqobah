  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Transaksi
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
            <form method="post" action="<?php echo base_url()?>transaksi/proses_tambah_transaksi">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <select class="form-control" name="id_pengguna" required="">
                  <?php foreach($pengguna as $row){?>
                    <option value="<?php echo $row['id_pengguna'] ?>"><?php echo $row['username'] ?></option>
                  <?php } ?>
                  </select>
                </div>                
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Lapangan</label>
                  <select class="form-control" name="id_lapangan" required="">
                    <?php foreach($transaksi as $row){?>
                    <option value="<?php echo $row['id_lapangan'] ?>"><?php echo $row['kode_lapangan'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal</label>
                  <input type="text" class="form-control" name="tgl_sewa" id="tanggal" required="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jam Awal</label><br>
                  <input type="text" class="form-control jam" name="jamawal" required>
                </div>
                <div class="form-group">
                    <label>Durasi (Jam)</label>
                    <select class="form-control" name="durasi">
                      <option selected="selected">1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                </div>
            </form>
              <!-- /.box-body -->

              <div class="box-footer">
                <a class="btn btn-danger" href="<?php echo base_url()?>transaksi">Back</a>
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