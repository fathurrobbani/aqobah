
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Berita
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
              <a class="btn btn-primary" href="<?php echo base_url()?>berita/tambah_berita">Tambah Berita</a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Id Berita</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Sub Judul</th>
                  <th>Tanggal posting</th>
                  <th>Isi</th>
                  <th>Penulis</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1;for($i=0; $i < count($berita); $i++){ ?>
                    <tr>
                      <td><?php echo $no;?></td>
                      <td><?php echo $berita[$i]['id_postingan'] ?></td>
                      <td><?php echo $berita[$i]['gambar'] ?></td>
                      <td><?php echo $berita[$i]['judul'] ?></td>
                      <td><?php echo $berita[$i]['subjudul'] ?></td>
                      <td><?php echo $berita[$i]['tgl_posting'] ?></td>
                      <td><?php echo $berita[$i]['isi'] ?></td>
                      <td><?php echo $berita[$i]['username'] ?></td>
                      <td><a href="<?php echo base_url()?>berita/hapus/<?php echo $berita[$i]['id_postingan'];?>" class="btn btn-danger">Delete</a><a href="<?php echo base_url()?>berita/edit/<?php echo $berita[$i]['id_postingan'];?>" class="btn btn-info">Edit</a></td>
                    </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>s
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