<?php $this->load->view('admin/admin/header'); ?>
<div class="line"></div>
<div class="wrapper">
	<form action="" method="post" enctype="multipart/form-data">
		<label>Picture:</label>
		<input type="file" name="userfile">
		<br>
		<label>Images:</label>
		<input type="file" name="images[]" multiple>
		<br>
		<input type="submit" name="submit" value="submit">
	</form>
</div>
