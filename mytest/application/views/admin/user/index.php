<?php $this->load->view('admin/user/header'); ?>
<div class="col-xs-12" style="padding: 0 5px 0 0; ">
	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">

		<table class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info" id="checkAll">
			<thead>
				<tr>
					<td colspan="9">
						<b>Tổng số lượng: <?php echo $total; ?></b>
					</td>
				</tr>
				<tr role="row">
					<th style="width: 20px;">
						<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" class="ace" /><span class="lbl"></span></span>
						<span class="lbl"></span>
					</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Mã số</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Tên người dùng</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Ảnh đại diện</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Email</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Phone</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Địa chỉ</th>
					<th>Trạng thái | Thao tác</th>
					<th tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Hành động</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($list as $row): ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>" class="ace"/><span class="lbl"></span></td>

						<td class="textC"><?php echo $row->id; ?></td>

						<td><span title="<?php echo $row->name; ?>" class="tipS"><?php echo $row->name; ?></span></td>

						<td><img src="<?php echo upload_url('user/'.$row->avatar); ?>" height="100" alt="<?php echo $row->avatar; ?>" ></td>

						<td><span title="<?php echo $row->email; ?>" class="tipS"><?php echo $row->email; ?></span></td>
						<td><span title="<?php echo $row->phone; ?>" class="tipS"><?php echo $row->phone; ?></span></td>
						<td><span title="<?php echo $row->address; ?>" class="tipS"><?php echo $row->address; ?></span></td>
						<td>
							<div class="col-sm-8">	
								<?php echo $row->is_delete == 0?'Hoạt động':($row->is_delete == 1?'Khóa':'Không xác định') ?>
								
							</div>	
							<div class="col-sm-4">
								<?php if($row->is_delete==0){ ?>
								<a href="<?php echo admin_url('user/ban/'.$row->id); ?>" title="Khóa tài khoản" class="tipS verify_action2"> 
									<i class="fa fa-lock" style="color: red; font-size: 17px;"></i>
								</a>
								<?php }else if($row->is_delete==1){ ?>
								<a href="<?php echo admin_url('user/unban/'.$row->id); ?>" title="Khóa tài khoản" class="tipS verify_action1"> 
									<i class="fa fa-unlock" style="color: green; font-size: 17px;" ></i>
								</a>
								<?php } ?>
							</div>
							
						</td>

						<td class="option">
							<div class="hidden-sm hidden-xs action-buttons">
								<a href="<?php echo admin_url('user/edit/'.$row->id); ?>" title="Chỉnh sửa" class="tipS "> 
									<img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png">	
								</a>
								<a href="<?php echo admin_url('user/delete/'.$row->id); ?>" title="Xóa" class="tipS verify_action"> 
									<img src="<?php echo public_url(); ?>/admin/images/icons/color/delete.png">
								</a>
							</div>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="row">
			<div class="col-xs-6">
				<div class="list_action itemActions">
					<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('user/delete_all'); ?>"> <span>Xóa nhiều</span>
					</a>
				</div>
			</div>
			<div class="col-xs-6">

				<div class='pagination'>
					<?php echo $this->pagination->create_links(); ?>
				</div>	


			</div>
		</div>
	</div>

</div>
			<!-- / table -->