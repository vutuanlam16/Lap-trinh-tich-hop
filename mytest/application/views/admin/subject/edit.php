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
					<h3>Edit Subject</h3>
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
										<tr>
											<td>
												<input name="subject_name" type="text" class="form-control" value="<?php echo $info->name ?>" >
											</td>
											<td class="option">
												<input type="submit" class="btn btn-info btn-primary "  name="submit" value="Cập nhật">
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