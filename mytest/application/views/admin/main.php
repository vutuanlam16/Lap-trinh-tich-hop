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

	<style type="text/css" media="screen">

	.pagination { margin: auto; width: auto; text-align: center; margin-top: 30px; }
	.pagination {
		display: block;
		padding: 5px 10px;
		float:right;
	}
	.pagination a {
		background: #f3f3f3;
		border: 1px solid #c4c4c4;
		border-radius: 2px;
		box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
		color: #717171;
		display: inline-block;
		float: left;
		font-weight: 700;
		line-height: 25px;
		margin-right: 4px;
		min-height: 25px;
		padding: 0 10px;
		text-decoration: none;
	}
	.pagination strong{
		background: #f3f3f3;
		border: 1px solid #c4c4c4;
		border-radius: 2px;
		box-shadow: 0 1px 0 #eaeaea, 0 1px 0 #ffffff inset;
		color: maroon;
		display: inline-block;
		float: left;
		font-weight: 700;
		line-height: 25px;
		margin-right: 4px;
		min-height: 25px;
		padding: 0 10px;
		text-decoration: none;
	}
	.raty img{width:16px !important;height:16px !important;}
	.parameter {
		margin-left: -10px;
		display: block;
		position: relative;
		overflow: hidden;
		background: #fff;
		padding-top: 10px;
	}
	.parameter li {

		display: table;
		background: #fff;
		width: 100%;
		border-top: 1px solid #eee;
		padding: 5px 0;
	}
	.parameter li p {
		display: table-cell;
		width: 40%;
		vertical-align: top;
		padding: 5px 0;
		font-size: 13px;
		color: #666;
	}
	.parameter li div {
		display: table-cell;
		width: auto;
		vertical-align: top;
		padding: 6px 5px;
		font-size: 14px;
		color: #333;
	}
	.parameter li div a {
		color: #288ad6;
	}
	.parameter ul li a{
		color: #288ad6;
	}




</style>

<script>
	var BASE_URL = "<?php echo base_url(); ?>"
	var PUBLIC_URLdd = "<?php echo public_url(); ?>"
</script>  
<script src="<?php echo public_url(); ?>admin/assets/ckeditor/ckeditor.js"></script> 

</head>

<body class="no-skin">
	<!-- header -->

	<?php $this->load->view('admin/header'); ?>
	<!-- end header -->
	

	<div class="main-container" id="main-container">
		<!-- sider -->

		<?php $this->load->view('admin/slider'); ?>
		<!-- end sider -->

		<div class="main-content" >

			<!-- main content -->
			<?php  

			$this->load->view($temp,$this->data);
			
			?>

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
