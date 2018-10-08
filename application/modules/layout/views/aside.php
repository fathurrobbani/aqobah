  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/backend/img/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $nama;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo base_url();?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Data</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <?php if($sess[0]['namalevel'] == 'admin' || $sess[0]['namalevel'] == 'operator'){?>
              <li><a href="<?php echo base_url();?>lapangan"><i class="fa fa-circle-o"></i> Data Lapangan </a></li>
              <li><a href="<?php echo base_url();?>jadwal_futsal"><i class="fa fa-circle-o"></i> Data Jadwal Futsal </a></li>
              <li><a href="<?php echo base_url();?>operator"><i class="fa fa-circle-o"></i> Data Operator </a></li>
              <li><a href="<?php echo base_url();?>member"><i class="fa fa-circle-o"></i> Data Member </a></li>
              <li><a href="<?php echo base_url();?>berita"><i class="fa fa-circle-o"></i> Data Berita </a></li>
            <?php } ?>
            <?php if($sess[0]['namalevel'] == 'member'){?>
            <li><a href="<?php echo base_url();?>jadwal_futsal"><i class="fa fa-circle-o"></i> Data Jadwal Futsal </a></li>
            <?php } ?>
          </ul>
        </li>
        <?php if($sess[0]['namalevel'] == 'admin' || $sess[0]['namalevel'] == 'operator'){?>
        <li>
          <a href="<?php echo base_url();?>transaksi">
            <i class="fa fa-th"></i> <span>Transaksi</span>
          </a>
        </li>
        <?php } ?>
        <?php if($sess[0]['namalevel'] == 'member'){?>
        <li>
          <a href="<?php echo base_url();?>transaksi">
            <i class="fa fa-th"></i> <span>Transaksi</span>
          </a>
        </li>
        <?php } ?>
    </section>
    <!-- /.sidebar -->
  </aside>