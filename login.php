<?php
	require("includes/top.php");
	$_SESSION['user'] = isset($_SESSION['user']) ? $_SESSION['user'] : "";
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

					try{
						$db->beginTransaction();
						$query = "SELECT fnkCourseId FROM tblUsersClasses WHERE fnkNetId = '" . $_POST['netId'] . "'";
						$statement = $db->prepare($query);
						$statement->execute();
						$courseIds = $statement->fetchAll(PDO::FETCH_ASSOC);
						$db->commit();
					}catch(PDOException $e){
						$db->rollBack();
						echo $e->getMessage();
					}

					$courseNames = array();
					$ids = array();

					foreach($courseIds as $course){
						$query = "SELECT fldDepartment, fldCourseNum FROM tblClasses WHERE pmkCourseId = '". $course['fnkCourseId'] . "'";
						$statement = $db->prepare($query);
						$statement->execute();
						$temp = $statement->fetchAll(PDO::FETCH_ASSOC);
						$courseNames[] = $temp[0]['fldDepartment'] . " " . $temp[0]["fldCourseNum"];
						$ids[] = $course['fnkCourseId'];
					}

					$query = "SELECT fnkCourseId FROM tblUsersClasses WHERE fnkNetId = '" . $_POST['netId'] . "' AND fldNoteTaker = 'T'";
					$statement = $db->prepare($query);
					$statement->execute();
					$temp2 = $statement->fetchAll(PDO::FETCH_ASSOC);

					$noteTakerClasses = array();
					$noteTakerIds = array();
					foreach($temp2 as $t){
						$query = "SELECT fldDepartment, fldCourseNum FROM tblClasses WHERE pmkCourseId = '". $t['fnkCourseId'] . "'";
						$statement = $db->prepare($query);
						$statement->execute();
						$a = $statement->fetchAll(PDO::FETCH_ASSOC);
						$noteTakerClasses[] = $a[0]['fldDepartment'] . " " . $a[0]["fldCourseNum"];
						$noteTakerIds[] = $t['fnkCourseId'];
					}

					$_SESSION['courseIds'] = $ids;
					$_SESSION['noteTakerIds'] = $noteTakerIds;
					$_SESSION['courseNames'] = $courseNames;
					$_SESSION['noteTakerClasses'] = $noteTakerClasses;
					session_write_close();

					header("Location:hub.php");
				}else{
					$errorMessage = "Wrong Credentials";
				}
			}
		}
?>

<body id = 'login'>
<div class="container content-container">
	<div class="row">
		<div class="col-sm-12"  style="margin-top: 30px">
			<div class="col-sm-offset-3 col-sm-6">
				<div class="panel panel-default">
					<!-- HEADER -->
					<div class="panel-heading">
						<h4 class="text-center">Welcome to NoTaker</h4>
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
</div>
</body>
<?php
	else:
		header("Location:hub.php");
	endif;
?>
