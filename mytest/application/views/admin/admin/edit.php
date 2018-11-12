<?php $this->load->view('admin/admin/header'); ?>
<div class="page-header">
	<h1 style="margin-left: 25.5%">
		Chỉnh sửa
	</h1>
</div>
<div class="col-xs-12" style="margin-top:20px;">
	<form class="form-horizontal" role="form" method="post" action="<?php echo admin_url('admin/edit/'.$user_info->id); ?>">

		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên biệt danh</b>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="name" id="param_name" value="<?php echo $user_info->name; ?>" />
				<div class="clear error"><?php echo form_error('name'); ?></div>
			</div>
		</div>
		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên tài khoản</b>

			<div class="col-sm-9">
				<input type="text" id="form-field-1" placeholder="" class="col-xs-10 col-sm-5" name="username" id="param_username" readonly value="<?php echo $user_info->username; ?>" />
				<div class="clear error"><?php echo form_error('username'); ?></div>
			</div>
		</div>
		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1"> Mật khẩu</b>

			<div class="col-sm-9">
				<input type="password" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="password" id="param_password" />
				<div class="clear error"><?php echo form_error('password'); ?></div>
				
			</div>
			<br>
			<div class="col-sm-9 col-sm-offset-3">
				<p>(Nếu cập nhật mật khẩu thì mới nhập giá trị)</p>
			</div>

			
		</div>
		<div class="form-group">
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1">Nhập lại mật khẩu</b>

			<div class="col-sm-9">
				<input type="password" id="form-field-1" placeholder="" class="col-xs-10 col-sm-3" name="repassword" id="param_repassword" />
				<div class="clear error"><?php echo form_error('repassword'); ?></div>
			</div>
		</div>
		<br>
		<div class="form-group">
			
			<b class="col-sm-3 control-label no-padding-right" for="form-field-1">Quyền</b>
			
			<div class="col-sm-9">
				<span class="oneTwo">
					<select name="role" id="param_owner">
						<?php foreach ($list1 as $rows): ?>
										<option value="<?php echo $rows->id;  ?> " <?php if($user_info->role_id==$rows->id) echo 'selected'; ?>><?php echo $rows->name; ?></option>
									<?php endforeach ?>
					</select>
				</span>
				<div class="clear error"></div>
			</div>
			
		</div>
		<div class="form-group" style="margin-left: 25.5%;">
			<button class="btn btn-info btn-primary" type="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Cập nhật
			</button>

			<button type="button" onclick="location.href = '<?php echo admin_url('admin');?>'" class="btn btn-primary btn-inverse">
				<i class="ace-icon fa fa-times"></i>
				Hủy bỏ
			</button>
		</div>
	</form>
</div>
