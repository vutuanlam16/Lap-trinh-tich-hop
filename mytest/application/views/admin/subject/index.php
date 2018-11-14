<div class="main-content-inner">
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
			<li>
				<i class="ace-icon fa fa-home home-icon"></i>
				<a href="#">Home</a>
			</li>
			<li>
				<a href="#">Content</a>
			</li>
			<li class="">Subject</li>
		</ul><!-- /.breadcrumb -->
	</div>

	<div class="page-content">
		<div class="row">
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				<div class="container">
					<h3>Subject List</h3>
					<div class="row">
						<div class="col-md-9">
							<br> 
							<div id="message"></div>
							<form method="post" action="">

								<table class="table table-bordered">
									<tbody><tr>
										<th>Subject Name</th>
										<th>Action </th>
									</tr>
									<?php foreach ($list as $rows) {
										?>
										<tr>
											<td>
												<?php echo $rows->name; ?>
											</td>
											<td class="option">
												<a href="<?php echo admin_url('subject/edit/'.$rows->subject_id); ?>" title="Chỉnh sửa" class="tipS "> 
													<img src="http://localhost/mytest/public/admin/images/icons/color/edit.png">
												</a>
												<a href="<?php echo admin_url('subject/delete/'.$rows->subject_id); ?>" title="Xóa" class="tipS verify_action"> 
													<img src="http://localhost/mytest/public/admin/images/icons/color/delete.png">
												</a>
											</td>
										</tr>
										<?php 	}  ?>
										<tr>
											<td>
												<input type="text" class="form-control" name="subject_name" value="" placeholder="Subject Name" required=""></td>
												<td>
													<button class="btn btn-default" type="submit">Add new</button>

												</td>
											</tr>
										</tbody>
									</table>
								</form>
							</div>

						</div>



					</div>

					<!-- PAGE CONTENT ENDS -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.page-content -->
	</div>