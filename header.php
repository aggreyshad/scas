<?php  // important for collecting data for currently logged in user
$stmt = $db_con->prepare("SELECT * FROM users WHERE user_id=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo (isset($page_name) ? $page_name : $system_name) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="ionicons-2.0.1/css/ionicons.min.css">
    <!-- Select 2 -->
    <link href="select2-4.0.2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-green for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="dist/css/skins/skin-green.min.css">
    <link rel="stylesheet" href="my-css.css">
    
    <!-- horizontalAccordion -->
    <link rel="stylesheet" type="text/css" media="screen" href="horizontalAccordion/css/horizontalAccordion.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- DATA TABLES -->
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- intl-tel-input-master -->
    <link rel="stylesheet" href="intl-tel-input-master/build/css/intlTelInput.css">
    

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<link rel="stylesheet" href="dist/css/bootstrapValidator.css" />
    <script type="text/javascript" src="dist/js/bootstrapValidator.min.js"></script>
	<!-- fusion charts-->
	<script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
	<script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.ocean.js"></script>
    <!--Scripts for the date picker-->
    <link rel="stylesheet" href="scripts/date-picker/jquery-ui.css">
    <script src="scripts/date-picker/jquery-ui.js"></script>
    <script>
    $(function() {
    $( "#dob" ).datepicker({
    changeMonth: true,
    changeYear: true,
    defaultDate: new Date(2000 - 1, 1),
    gotoCurrent: true
    });
    });
    </script>
    <!-- file input -->
    <link href="bootstrap-fileinput/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<!-- canvas-to-blob.min.js is only needed if you wish to resize images before upload.
     This must be loaded before fileinput.min.js -->
<script src="bootstrap-fileinput/js/plugins/canvas-to-blob.min.js" type="text/javascript"></script>
<script src="bootstrap-fileinput/fileinput.min.js" type="text/javascript"></script>

	<!-- fusion charts-->
    <script type="text/javascript" src="fusioncharts/fusioncharts.js"></script>
    <script type="text/javascript" src="fusioncharts/themes/fusioncharts.theme.ocean.js"></script>
  </head>
    <body class="hold-transition skin-green sidebar-mini">
    <div class="wrapper">