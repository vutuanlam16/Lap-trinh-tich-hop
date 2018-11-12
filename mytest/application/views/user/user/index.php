<div class="container">


	<h3>Edit User</h3>



	<div class="row">
		<form method="post" action="https://savsoftquiz.com/savsoftquiz_v4.0_enterprise/index.php/user/update_user/5">

			<div class="col-md-8">
				<br> 
				<div class="login-panel panel panel-default">
					<div class="panel-body"> 





						<div class="form-group">   
							Group name: Free (Price: 0)

						</div>


						<div class="form-group">   
							<label for="inputEmail" class="sr-only">Email Address</label> 
							<input type="email" id="inputEmail" name="email" value="user@example.com" readonly="readonly" class="form-control" placeholder="Email Address" required="" autofocus="">
						</div>
						<div class="form-group">    
							<label for="inputPassword" class="sr-only">Password</label>
							<input type="password" id="inputPassword" name="password" value="" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">   
							<label for="inputEmail" class="sr-only">First Name</label> 
							<input type="text" name="first_name" class="form-control" value="Userss" placeholder="First Name" autofocus="">
						</div>
						<div class="form-group">   
							<label for="inputEmail" class="sr-only">Last Name</label> 
							<input type="text" name="last_name" class="form-control" value="User" placeholder="Last Name" autofocus="">
						</div>

						<div class="form-group">   
							<label for="inputEmail" class="sr-only">Contact Number</label> 
							<input type="text" name="contact_no" class="form-control" value="1234567890" placeholder="Contact Number" autofocus="">
						</div>

						<div class="form-group">   
							<label for="inputEmail" class="sr-only">Skype ID </label> 
							<input type="text" name="skype_id" class="form-control" value="" placeholder="Skype ID " autofocus="">
						</div>


						<div class="form-group">   
							<label for="inputEmail">School Name</label> 
							<input type="text" name="custom[1]" class="form-control" value="" pattern="[A-Za-z0-9]{1,100}">
						</div>

						<div class="form-group">   
							<label for="inputEmail">Registration Number</label> 
							<input type="text" name="custom[2]" class="form-control" value="" pattern="[A-Za-z0-9]{1,100}">
						</div>

						<div class="form-group">   
							<label for="inputEmail">Mobile No</label> 
							<input type="text" name="custom[3]" class="form-control" value="1234567890" pattern="[0-9]{1,11}">
						</div>


						<button class="btn btn-default" type="submit">Submit</button>

					</div>
				</div>




			</div>
		</form>
	</div>

	<div class="row">
		<div class="col-md-8">
			<h3>Payment History</h3>
			<div class="table-responsive">
				<table class="table table-striped valign-middle">
					<thead>
						<tr></tr><tr>
							<th>Payment Gateway</th>
							<th>Paid Date </th>
							<th>Amount</th>
							<th>Transaction ID </th>
							<th>Status </th>
						</tr>
					</thead>

					<tbody> 
						<tr>
							<td colspan="5">No record found!</td>
						</tr> 
					</tbody>
				</table>
			</div>

		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div>