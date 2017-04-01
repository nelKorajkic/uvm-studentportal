<?php 
	require("includes/top.php");
	if(!$_SESSION['user']):
		$submit = (isset($_POST["btnLogIn"])) ? $_POST["btnLogIn"] : "";
		if($submit == "Log In"){
			try{
				$db->beginTransaction();
				$query = "SELECT * FROM tblUsers WHERE pmkNetId = '" . $_POST['netId'] . "'";
				$statement = $db->prepare($query);
				$statement->execute();
				$results = $statement->fetchAll(PDO::FETCH_ASSOC);
				$db->commit();
			}catch(PDOException $e){
				$db->rollBack();
				echo $e->getMessage();
			}
			
			if(!empty($results)){
				if($_POST['password'] == $results[0]['fldPassword']){
					$_SESSION["user"] = $results[0];
					session_write_close();
					
					header("Location:hub.php");
				}else{
					$errorMessage = "Wrong Credentials";
				}
			}
		}
?>
<style>
	#login {
		background: url('https://assets6.irisreading.com/wp-content/uploads/2014/11/note-taking.jpg') no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		margin: 0; padding: 0;
	}
</style>
<body id = 'login'>
<div class="container content-container">
	<div class="row">
		<div class="col-sm-12"  style="margin-top: 30px">
			<div class="col-sm-offset-3 col-sm-6"> 
				<div class="panel panel-default">
					<!-- HEADER -->
					<div class="panel-heading">
						<h4 class="text-center">Welcome to NoteTaker</h4>
					</div>
					
					<!-- BODY -->
					<div class="panel-body">
						<?php
							if(!empty($errorMessage)){
								echo "<h4 class='text-center' style='color:red'>$errorMessage</h4>";
							}
						?>
						<form class="form-horizontal" action="" method="post">
							<div class="form-group">
								<label class="control-label col-sm-3">Net ID</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" placeholder="Please enter your NetID....." name="netId" value="tnguye20">
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-sm-3">Password</label>
								<div class="col-sm-9">
									<input type="password" class="form-control" placeholder="Please enter your password....." name="password" value="aaaaaa">
								</div>
							</div>
					</div>
					
					<!-- FOOTER -->
					<div class="panel-footer">
							<p class="text-right"><input type="submit" class="btn btn-success" value="Log In" name="btnLogIn"></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<?php 
		require("includes/footer.php"); 
	else:
		header("Location:hub.php");
	endif;
?>