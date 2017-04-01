<?php require("includes/top.php");
      require("includes/nav.php");
      ?>

<form action="addFile.php" method="POST" enctype="multipart/form-data">

<table align="center">
<body id = 'uploadBackground'>
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
							 <select name="crn" class="form-control" id="sel1">
                                                            <?php for($i = 0; $i < count($_SESSION['noteTakerClasses']); $i++): ?>
                                                            <option value="<?php echo $_SESSION['noteTakerIds'][$i]; ?>"><?php echo $_SESSION['courseNames'][$i]; ?></option>
                                                        <?php endfor; ?>
                                                         </select>
							</div>
					<div class="panel-body">
						<p>
							<input class="btn btn-primary" type="submit" name="upload" value="Browse"/>
								</div>
							</div>

              <div class="form-group">
              <label for="comment">Notes Title:</label>
              <textarea method ="POST" name="title" class="form-control" onfocus="this.select()" rows="1" id="comment"></textarea>

              </div>

              <div class="form-group">
              <label for="comment">Date (YYYYMMDD):</label>
              <textarea method ="POST" name="date" class="form-control" onfocus="this.select()" rows="1" id="comment"></textarea>

              </div>



              <div class="form-group">
              <label for="comment">Write Notes:</label>
              <textarea method ="POST" name="txt" class="form-control" onfocus="this.select()" rows="5" id="comment"></textarea>
              <input class="btn btn-success" type="submit"/>
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


<?php require("includes/footer.php"); ?>
