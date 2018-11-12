<?php if(isset($message) && $message): ?>
	<div class="alert alert-block alert-success" style="margin-bottom: 0px;">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>

		<i class="ace-icon fa fa-check green"></i>

		Thông báo: 
		<strong class="green">
			<a href="#" title=""><?php echo $message; ?></a>
		</strong>

	</div>
<?php endif; ?>