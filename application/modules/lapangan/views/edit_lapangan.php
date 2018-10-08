
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tambah Data Lapangan
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
            <form method="post" action="<?php echo base_url()?>lapangan/proses_edit_lapangan">
              <?php foreach($lapangan as $futsal){?>
              <div class="box-body">
                <input type="hidden" name="id_lapangan" value="<?php echo $futsal['id_lapangan'];?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode lapangan</label>
                  <input type="text" class="form-control" name="kode_lap" value="<?php echo $futsal['kode_lapangan'];?>" required>
                </div>
                <table class="table table-bordered table-striped">
                  <tr>
                    <td>Hari</td>
                    <th>Jam</th>
                    <th>Harga Umum</th>
                    <th>Harga Member</th>
                  </tr>
                  <tr>
                    <td rowspan="3">Senin - Jum'at</td>
                    <td>07:00-12:00</td>
                    <td><input type="number" class="form-control" name="weekdaypagi_umum" value="<?php echo $futsal['hrg_weekday07-12_umum'];?>"></td>
                    <td><input type="number" class="form-control" name="weekdaypagi_member" value="<?php echo $futsal['hrg_weekday07-12_member'];?>"></td>
                  </tr>
                  <tr>
                    <td>12:00-17:00</td>
                    <td><input type="number" class="form-control" name="weekdaysiang_umum" value="<?php echo $futsal['hrg_weekday12-17_umum'];?>"></td>
                    <td><input type="number" class="form-control" name="weekdaysiang_member" value="<?php echo $futsal['hrg_weekday12-17_member'];?>"></td>
                  </tr>
                  <tr>
                    <td>17:00-24:00</td>
                    <td><input type="number" class="form-control" name="weekdaymalam_umum" value="<?php echo $futsal['hrg_weekday17-24_umum'];?>"></td>
                    <td><input type="number" class="form-control" name="weekdaymalam_member" value="<?php echo $futsal['hrg_weekday17-24_member'];?>"></td>
                  </tr>
                  <tr>
                    <td rowspan="3">Sabtu - Minggu</td>
                    <td>07:00-12:00</td>
                    <td><input type="number" class="form-control" name="weekendpagi_umum" value="<?php echo $futsal['hrg_weekend07-12_umum'];?>"></td>
                    <td><input type="number" class="form-control" name="weekendpagi_member" value="<?php echo $futsal['hrg_weekend07-12_member'];?>"></td>
                  </tr>
                  <tr>
                    <td>12:00-17:00</td>
                    <td><input type="number" class="form-control" name="weekendsiang_umum" value="<?php echo $futsal['hrg_weekend12-17_umum'];?>"></td>
                    <td><input type="number" class="form-control" name="weekendsiang_member" value="<?php echo $futsal['hrg_weekend12-17_member'];?>"></td>
                  </tr>
                  <tr>
                    <td>17:00-24:00</td>
                    <td><input type="number" class="form-control" name="weekendmalam_umum" value="<?php echo $futsal['hrg_weekend17-24_umum'];?>"></td>
                    <td><input type="number" class="form-control" name="weekendmalam_member" value="<?php echo $futsal['hrg_weekend17-24_member'];?>"></td>
                  </tr>
                </table>
              
              <!-- /.box-body -->
              <?php } ?>
              </div>
              <div class="box-footer">
                <a class="btn btn-danger" href="<?php echo base_url()?>lapangan">Back</a>
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