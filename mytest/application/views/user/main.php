<!DOCTYPE html>
<html lang="en">
<head>
	<title>Header</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Dashboard - Ace Admin</title>

	<meta name="description" content="overview &amp; stats" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="<?php echo public_url(); ?>admin/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="<?php echo public_url(); ?>admin/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="<?php echo public_url(); ?>admin/assets/fonts/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="<?php echo public_url(); ?>admin/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
	<!-- 	<link rel="stylesheet" href="<?php echo public_url(); ?>admin/assets/css/bootstrap.min.css" /> -->

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="public/be/<?php echo public_url(); ?>admin/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="public/be/<?php echo public_url(); ?>admin/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo public_url(); ?>admin/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="public/be/<?php echo public_url(); ?>admin/assets/js/html5shiv.min.js"></script>
		<script src="public/be/<?php echo public_url(); ?>admin/assets/js/respond.min.js"></script>


	<![endif]-->
	<script src="<?php echo public_url(); ?>admin/assets/ckeditor/ckeditor.js"></script> 

</head>

<body class="no-skin">
	<!-- header -->

	<?php $this->load->view('user/header'); ?>
	<!-- end header -->
	

	<div class="main-container" id="main-container">

		<div class="main-content-inner">
			<div class="row">
				<div class="col-xs-12">

					<!-- main content -->
					<?php  

					$this->load->view($temp,$this->data);
					
					?>
				</div>
			</div>
		</div>

	</div><!-- /.main-content -->
	
	<!-- footer -->
	<?php $this->load->view('admin/footer'); ?>
	<!-- end footer -->

</div><!-- /.main-container -->

<!--[if !IE]> -->
<script type="text/javascript">
	window.jQuery || document.write("<script src='<?php echo public_url(); ?>admin/assets/js/jquery.min.js'>"+"<"+"/script>");
</script>

<!-- <![endif]-->
<script src="<?php echo public_url('site'); ?>/js/jquery.min.js"></script>   
<!-- 	 <script src="<?php echo public_url('site'); ?>/js/site1.js"></script>   --> 

<script src="<?php echo public_url(); ?>admin/assets/js/custom_admin.js"></script>

<script src="<?php echo public_url(); ?>admin/assets/js/custom_admin1.js"></script>


<script src="<?php echo public_url(); ?>admin/assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="<?php echo public_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo public_url(); ?>admin/assets/js/jquery.dataTables.bootstrap.min.js"></script>
<script src="<?php echo public_url(); ?>admin/assets/js/dataTables.tableTools.min.js"></script>
<script src="<?php echo public_url(); ?>admin/assets/js/dataTables.colVis.min.js"></script>

<!-- ace scripts -->
<script src="<?php echo public_url(); ?>admin/assets/js/ace-elements.min.js"></script>
<script src="<?php echo public_url(); ?>admin/assets/js/ace.min.js"></script>

<script type="text/javascript" src="<?php echo public_url(); ?>/site/raty/jquery.raty.js"></script>
<script type="text/javascript" src="<?php echo public_url(); ?>js/jquery/number/jquery.number.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
