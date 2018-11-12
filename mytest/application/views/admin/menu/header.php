<div class="breadcrumbs" id="breadcrumbs">
	<script type="text/javascript">
		try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
	</script>
	<div class="col-xs-8" style="margin-left: -25px;">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<strong style="font-size: 16px"><a href="<?php echo admin_url('home');?>">Trang chủ</a></strong>
			</li>
			<li class="active" style="font-size: 15px">Cấu hình</li>
			<i class="ace-icon fa fa-angle-double-right"></i>
			Menu
		</ul><!-- /.breadcrumb -->
	</div>
	<div class="col-xs-4">
		<div style="float: right;">
			<button type="button" onclick="location.href = '<?php echo admin_url('menu/add');?>'" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-plus"></span> Thêm mới 
			</button>
			<button type="button" onclick="location.href = '<?php echo admin_url('menu');?>'" class="btn btn-sm btn-danger">
				<span class="glyphicon glyphicon-list-alt"></span> Danh sách
			</button>
		</div>
	</div>
</div>
<?php $this->load->view('admin/message', $message); ?>
