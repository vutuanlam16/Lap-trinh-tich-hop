<?php $this->load->view('admin/admin/header'); ?>
 <div class="col-xs-12" style="padding: 0 5px 0 0; ">
	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">

		<table class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info" id="checkAll">
			<thead>
				<tr>
					<td colspan="8">
						<b>Số lượng: <?php echo $total; ?></b>

					</td>
				</tr>
				<tr role="row">
					<th style="width: 20px;">
						<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" class="ace" /><span class="lbl"></span></span>
						<span class="lbl"></span>
					</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Mã số</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Tên biệt danh</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Tên người dùng</th>
					<th tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Hành động</th>
				</tr>
			</thead>
			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						<div class="list_action itemActions">
							<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('admin/delete_all');?>"> <span>Xóa nhiều</span>
							</a>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody>

				<?php foreach ($list as $row): ?>
					<tr>
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>" class="ace"/><span class="lbl"></span></td>

						<td class="textC"><?php echo $row->id; ?></td>

						<td><span title="<?php echo $row->name; ?>" class="tipS"><?php echo $row->name; ?></span></td>

						<td><span title="<?php echo $row->username; ?>" class="tipS"><?php echo $row->username; ?></span></td>

						<td class="option">
							<div class="hidden-sm hidden-xs action-buttons">
								<a href="<?php echo admin_url('admin/edit/'.$row->id); ?>" title="Chỉnh sửa" class="tipS "> 
									<img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png">
									
								</a>
							</a>
							<a href="<?php echo admin_url('admin/delete/'.$row->id); ?>" title="Xóa" class="tipS verify_action"> 
								<img src="<?php echo public_url(); ?>/admin/images/icons/color/delete.png">

							</a>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>





		</tbody>
	</table>
</div>

</div>
			<!-- / table -->