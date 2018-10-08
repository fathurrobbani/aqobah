  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3.1.1 -->
<script src="<?php echo base_url();?>assets/backend/plugins/jQuery/jquery-3.1.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/backend/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/backend/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/backend/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/backend/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/backend/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/backend/js/demo.js"></script>
<!-- page script -->
<script type="text/javascript" src="<?php echo base_url();?>assets/backend/js/jquery.timesetter.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/backend/js/jquery-clock-timepicker.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/backend/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/moment.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/backend/js/jquery-ui.min.js"></script> -->
<script src="<?php echo base_url();?>assets/backend/js/fullcalendar.min.js"></script>
<script src="<?php echo base_url();?>assets/backend/js/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?php echo base_url();?>assets/backend/js/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?php echo base_url();?>assets/backend/js/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?php echo base_url();?>assets/backend/js/jquery.flot.categories.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

    $('.jam').clockTimePicker();

    $('#tanggal').datepicker({
      autoclose: true,
      startDate: '0d',
      format: 'yyyy-mm-dd'
    });

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: ''
      },
      events: [
        <?php if(!empty($jadwal_futsal)){ for($i=0; $i < count($jadwal_futsal); $i++){ ?>
        {
          title: '<?php echo $jadwal_futsal[$i]['kode_lapangan'];?> <?php echo $jadwal_futsal[$i]['jam_awal'];?>'+' - <?php echo $jadwal_futsal[$i]['jam_akhir'];?>',
          start: new Date('<?php echo $jadwal_futsal[$i]['tgl_sewa'];?>'),
          backgroundColor: "#00c0ef",
          borderColor: "#00c0ef",
          allDay: false
        },
        <?php }} ?>
      ]
    });

    var data_trx = [[6,6],[7,8],[8,9],[9,10],[10,12],[11,14]]
    var line_data1 = {
      data: data_trx,
      color: "#3c8dbc"
    };
    
    $.plot("#line-chart", [line_data1], {
      grid: {
        hoverable: true,
        borderColor: "#f3f3f3",
        borderWidth: 1,
        tickColor: "#f3f3f3"
      },
      series: {
        shadowSize: 0,
        lines: {
          show: true
        },
        points: {
          show: true
        }
      },
      lines: {
        fill: false,
        color: ["#3c8dbc", "#f56954"]
      },
      yaxis: {
        show: true,
      },
      xaxis: {
        show: true,
        ticks: [[0,'Jan'],[1,'Feb'],[2,'Mar'],[3,'Apr'],[4,'Mei'],[5,'Jun'],[6,'Jul'],[7,'Aug'],[8,'Sep'],[9,'Okt'],[10,'Nov'],[11,'Des']]
      }
    });
  });
  $('#change_password').click(function (e) { 
    e.preventDefault();
    $('#modal_form').modal('show');
  });
</script>
</body>
</html>