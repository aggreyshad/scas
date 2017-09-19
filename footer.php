<!-- DATA TABES SCRIPT -->
    <script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
	<!-- page script -->
    <script type="text/javascript">
      $(function () {
        $(".example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": true,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
		$('.example3').dataTable({
          "bPaginate": false,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": false,
          "bAutoWidth": false
        });
		$('.bestdone_olevel').dataTable({
          "bPaginate": false,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": false,
          "bAutoWidth": false,
		  "order": [[ 2, "asc" ]] //sort based on aggregate
        });
      });
    </script>


<!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
          Final Year Project
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#"><?php echo (isset($group_name) ? $group_name : 'Group 5 - Jinja Campus' ) ?></a>.</strong> All rights reserved.
      </footer>
</div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
	<script  src="select2-4.0.2/dist/js/select2.full.min.js"></script>
	<script  src="select2-4.0.2/dist/js/select2.sortable.js"></script>
    <script>
      $(function () {
        //Initialize Select2 Elements
        $(".select2").select2({
  		maximumSelectionLength: 3 //max number of subjects you can select
		});
      });
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script  src="scripts/bootstrap-confirmation.js"></script>
    <script src="scripts/jquery.searchable-ie-1.1.0.min.js"></script>
    <!-- CK Editor 4.4.5-->
    <script src="ckeditor/ckeditor.js"></script>
    <script>
      $(function () {
        // Replace the <textarea id="career_details"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('career_details');
        //bootstrap WYSIHTML5 - text editor
        $(".textarea").wysihtml5();
      });
    </script>
<!--	<script src="http://code.jquery.com/jquery-1.9.1.min.js" type="text/javascript"></script> -->
<script src="horizontalAccordion/js/horizontalAccordion.js" type="text/javascript"></script>
<!-- the fileinput plugin initialization -->
    <script>
    var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
        'onclick="alert(\'Call your custom code here.\')">' +
        '<i class="glyphicon glyphicon-tag"></i>' +
        '</button>'; 
    $("#avatar").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="uploads/user.jpg" alt="Your Avatar" style="width:160px">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
    </script>
    <!-- couting animated -->
    <script type="text/javascript">
		$('.Count').each(function () {
 		var $this = $(this);
  		jQuery({ Counter: 0 }).animate({ Counter: $this.text() }, {
		duration: 1000,
		easing: 'swing',
		step: function () {
      	$this.text(Math.ceil(this.Counter));
    }
  });
});
	</script>
  </body>
</html>
