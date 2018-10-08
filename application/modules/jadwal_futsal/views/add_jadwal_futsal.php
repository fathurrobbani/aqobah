
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Member
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
            <form method="post" action="<?php echo base_url()?>jadwal_futsal/proses_tambah_jadwal">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal</label>
                  <input type="text" class="form-control" name="tanggal" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Jam Awal</label>
                  <input type="text" class="form-control" name="jamawal" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jam Akhir</label>
                  <input type="text" class="form-control" name="jamakhir" required>
                </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <a class="btn btn-danger" href="<?php echo base_url()?>jadwal_futsal">Back</a>
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