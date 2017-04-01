<?php require("includes/top.php"); ?>
<?php require("includes/nav.php"); ?>
<body id = 'login'>
<div class="container content-container">
	<div class="row">
		<div class="col-sm-12"  style="margin-top: 30px">
			<div class="col-sm-offset-3 col-sm-6"> 
				<div class="panel panel-default">
					<!-- HEADER -->
					<div class="panel-heading">
						<h4 class="text-center">Be a Note Taker</h4>
					</div>
					
					<!-- BODY -->
					<div class="panel-body">
						<form class="form-horizontal" action="" mehtod="post">
							<div class="form-group">
								<label class="control-label col-sm-3">First Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" placeholder="John" name="firstName" value="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-3">Last Name</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" placeholder="Smith" name="lastName" value="">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-3">Net ID</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" placeholder="jsmith" name="netID" value="">
								</div>
							</div>
							<div class ="form-group">
								<label class="control-label col-sm-3">Class</label>
								<div class="col-sm-9">
								<select name = "formClass">
								<option value="">Select...</option>
								<option value="Bio001">Bio001</option>
								<option value="CS205">CS205</option>
								<option value="Stats111">Stats111</option>
								</select>	
								</div>
							</div>
						</form>
					</div>
					
					<!-- FOOTER -->
					<div class="panel-footer">
						<p class="text-right"><input type="submit" class="btn btn-success" value="Sign Up" name="signUp"></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<?php require("includes/footer.php"); ?>