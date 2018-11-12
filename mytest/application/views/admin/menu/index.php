<?php $this->load->view('admin/menu/header'); ?>
<div class="col-xs-12" style="padding: 0 5px 0 0; ">
	<!-- div.table-responsive -->

	<!-- div.dataTables_borderWrap -->
	<div id="dynamic-table_wrapper" class="dataTables_wrapper form-inline no-footer">

		
		<table id="checkAll" class="table table-striped table-bordered table-hover dataTable no-footer DTTT_selectable" role="grid" aria-describedby="dynamic-table_info">
			<thead>
				<tr role="row">
					<th style="width: 20px;">
						<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" class="ace" /><span class="lbl"></span></span>
						<span class="lbl"></span>
					</th>
					<th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">ID</th>
					<th>#</th>
					<th>Tiêu đề</th>
					<th>Vị trí</th>
					<th>Đường dẫn</th>
					<th>Trạng thái</th>
					<th style="width: 100px;">Hành động</th>
					
				</tr>
			</thead>

			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="8">
						<div class="list_action itemActions">
							<a href="#submit" id="submit"  url="<?php echo admin_url('menu/delete_all');?>"> <span>Xóa nhiều</span>
							</a>
						</div>
					</td>
				</tr>
			</tfoot>

			<tbody>

				<?php $i=1; foreach ($listMenuu as $row): ?>
				<tr>
					<td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>" class="ace"/><span class="lbl"></span></td>

					<td class="textC"><?php echo $row->id; ?></td>
					<td><span title="<?php echo $row->name; ?>" class="tipS"><?php echo $i; ?></span></td>


					<td><strong><?php echo $row->name ?></strong></td>



					<td><span title="<?php echo $row->ordering; ?>" class="tipS"><?php echo $row->ordering; ?></span></td>
					<td><span title="<?php echo $row->link; ?>" class="tipS"><?php echo $row->link; ?></span></td>

					<td>
						<?php if($row->status==1): ?>
							<span class="label label-sm label-success">Hiển thị</span>
						<?php else: ?>
							<span class="label label-sm label-warning">Ẩn</span>
						<?php endif ?>
					</td>

					<td class="option">
						<div class="hidden-sm hidden-xs action-buttons">
							<a href="<?php echo admin_url('menu/edit/'.$row->id); ?>" title="Chỉnh sửa" class="tipS "> 
								<img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png">

							</a>
							<a href="<?php echo admin_url('menu/delete/'.$row->id); ?>" title="Xóa" class="tipS verify_action"> 
								<img src="<?php echo public_url(); ?>/admin/images/icons/color/delete.png">
							</a>
						</div>
					</td>
				</tr>
				<?php if(!empty($row->subs) && count($row->subs) > 0): ?>
					<?php foreach ($row->subs as $sub): ?>

						<tr>
							<td><input type="checkbox" name="id[]" value="<?php echo $sub->id; ?>" class="ace"/><span class="lbl"></span></td>

							<td class="textC"><?php echo $sub->id; ?></td>
							<td><span class="tipS">..</span></td>


							<td>|--------<?php echo $sub->name ?></td>



							<td><span title="<?php echo $sub->ordering; ?>" class="tipS"><?php echo $sub->ordering; ?></span></td>
							<td><span title="<?php echo $sub->link; ?>" class="tipS"><?php echo $sub->link; ?></span></td>


							<td>
								<?php if($sub->status==1): ?>
									<span class="label label-sm label-success">Hiển thị</span>
								<?php else: ?>
									<span class="label label-sm label-warning">Ẩn</span>
								<?php endif ?>
							</td>


							<td class="option">
								<div class="hidden-sm hidden-xs action-buttons">
									<a href="<?php echo admin_url('menu/edit/'.$sub->id); ?>" title="Chỉnh sửa" class="tipS "> 
										<img src="<?php echo public_url(); ?>/admin/images/icons/color/edit.png">

									</a>
									<a href="<?php echo admin_url('menu/delete/'.$sub->id); ?>" title="Xóa" class="tipS verify_action"> 
										<img src="<?php echo public_url(); ?>/admin/images/icons/color/delete.png">
									</a>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
				<?php $i++; endforeach; ?>
			</tbody>
		</table>
	</div>

</div>
<!-- / table -->



