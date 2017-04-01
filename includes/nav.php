<nav class="nav">
	<?php $currentPage = $_SERVER["SCRIPT_NAME"];?>
	<?php if (!isset($_SESSION['user'])): ?>
		<a class="btn btn-default" id="logo" aria-label="Left Align" href="#">
			<img src="images/smallLogo.png"></img>
		</a>
	<a type="button" id="floatRight" class="btn btn-default" href="login.php">
    	<span aria-hidden="true">Login</span>
  	</a>
		<?php endif; ?>

		<?php if (isset($_SESSION['user'])): ?>
			<a class="btn btn-default" id="logo" aria-label="Left Align" href="hub.php">
		    <img src="images/smallLogo.png"></img>
		  </a>
		<a type="button" id="floatRight" class="btn btn-default" href="logout.php">
    	<span aria-hidden="true">Logout</span>
  	</a>
		<?php endif; ?>

	<?php
	$noteTaker = isset($_SESSION['noteTakerIds']) ? $_SESSION['noteTakerIds'] : "";
	if ($noteTaker !== ""):
	?>
  	<a type="button" id="floatRight" class="btn btn-default" aria-label="Left Align" href="uploadFile.php">
    	<span aria-hidden="true" <?php if($currentPage == "/uvm-studentportal/uploadFile.php") echo "style='color:pink'"; ?>>Upload</span>
  	</a>
	<?php endif; ?>

</nav>
