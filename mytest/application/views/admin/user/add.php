<?php $this->load->view('admin/admin/header'); ?>
 <div class="page-header">
	<h1 style="margin-left: 25.5%">
		Thêm mới
	</h1>
</div>
<div class="col-xs-12" style="margin-top:20px;">
	<form class="form-horizontal" role="form" method="post"  action="<?php echo admin_url('admin/add'); ?>">

		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên biệt danh:</b>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="name" id="param_name"  value="<?php echo set_value('name'); ?>" />
				<div class="clear error"><?php echo form_error('name'); ?></div>
			</div>
		</div>
		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên tài khoản:</b>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="username" id="param_username"  value="<?php echo set_value('username'); ?>" />
				<div class="clear error"><?php echo form_error('username'); ?></div>
			</div>
		</div>
		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mật khẩu:</b>

			<div class="col-sm-9">
				<input type="password" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="password" id="param_password"  value="<?php echo set_value('password'); ?>" />
				<div class="clear error"><?php echo form_error('password'); ?></div>
			</div>
		</div>
		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1">Nhập lại mật khẩu:</b>

			<div class="col-sm-9">
				<input type="password" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="repassword" id="param_repassword"  value="<?php echo set_value('repassword'); ?>" />
				<div class="clear error"><?php echo form_error('repassword'); ?></div>
			</div>
		</div>
		<br>
		<div class="form-group" style="margin-left: 25.5%;">
			<input type="submit" class="btn btn-info btn-primary "  name="submit" value="Thêm sản phẩm">
			<input type="reset" class="btn btn-info btn-warning "  value="Hủy bỏ" >
		</div>
	</form>
</div>
