<nav class="nav">


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
	$status = isset($_SESSION['user']['fldStatus']) ? $_SESSION['user']['fldStatus'] : "";
	if ($status == 'N'):
	?>
  	<a type="button" id="floatRight" class="btn btn-default" aria-label="Left Align" href="uploadFile.php">
    	<span aria-hidden="true">Upload</span>
  	</a>
	<?php endif; ?>

</nav>
