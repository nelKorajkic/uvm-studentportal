<?php require("includes/top.php");
      require("includes/nav.php");
      ?>

<form action="viewFile.php" method="POST" enctype="multipart/form-data">

<table align="center">
<body id = 'login'>
<div class="container content-container">
	<div class="row">
		<div class="col-sm-12"  style="margin-top: 30px">
			<div class="col-sm-offset-3 col-sm-6">
				<div class="panel panel-default">
					<!-- HEADER -->
					<div class="panel-heading">
						<h4 class="text-center">Upload or submit a new file</h4>
					</div>

					<!-- BODY -->
					<!-- <div class ="form-group">
								<label class="control-label col-sm-3">Class:  </label>
								<div class="col-sm-9">
								<select name = "formClass">
								<option value="">Select...</option>
								<option value="96445">96445</option>
								<option value="12345">12345</option>
								<option value="Stats111">Stats111</option>
								</select>
								</div>
							</div> -->

							<div id="uploadBox" class="form-group">
							  <label for="sel1">Select class:</label>
							  <select class="form-control" id="sel1">
							    <?php foreach ($_SESSION[courseNames] as $name): ?>
							      <option><?php echo $name; ?></option>
							    <?php endforeach; ?>
							  </select>
							</div>
					<div class="panel-body">
						<p>
							<input type="submit" name="upload" value="Browse"/>
								</div>
							</div>

						</form>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>
</body>
<?php require("includes/footer.php"); ?>

<br>
<tr>
	<td align="center">

         <textarea name="txt" rows="28" cols="150" onfocus="this.select()"></textarea>
         <br>
         <input type="submit"/>
         </td>
         </tr>


</form>

<?php require("includes/footer.php"); ?>
