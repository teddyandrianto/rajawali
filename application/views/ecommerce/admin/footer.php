
  <footer class="main-footer aksi">
    <div class="pull-right hidden-xs aksi">
      <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

<script src="<?php echo base_url('assets/ecommerce/admin')?>/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url()?>assets/ecommerce/admin/jquery/npm.js"></script>
  <script src="<?php echo base_url();?>assets/ecommerce/admin/datatable/js/jquery.dataTables.min.js"></script>  
<script src="<?php echo base_url();?>assets/ecommerce/admin/datatable/js/dataTables.bootstrap.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#id_table').DataTable( {
        "scrollX": true
    } );
} );
</script>


   <?=$this->session->flashdata('pesan')?>   

</body>
</html>
