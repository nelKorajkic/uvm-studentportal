<style>
	.nav {
		background-color: black;
    width: 100%;
    padding-top: 10px;
    padding-bottom: 10px;
	}
  .nav a {
    margin-left: 5px;
    margin-right: 5px;

  }
  .nav #floatRight {
    float: right;
  }
</style>

<nav class="nav">
  <a class="btn btn-default" aria-label="Left Align">
    <img src="images/smallLogo.png"></img>
  </a>

	<?php if (!isset($_SESSION['user'])): ?>
  	<a type="button" id="floatRight" class="btn btn-default" href="login.php">
    	<span aria-hidden="true">Login</span>
  	</a>
		<?php endif; ?>

		<?php if (isset($_SESSION['user'])): ?>
		<a type="button" id="floatRight" class="btn btn-default" href="logout.php">
    	<span aria-hidden="true">Logout</span>
  	</a>
		<?php endif; ?>

	<?php
	$status = isset($_SESSION['user']['fldStatus']) ? $_SESSION['user']['fldStatus'] : "";
	if ($_SESSION['user']['fldStatus'] == 'N'): 
	?>
  	<a type="button" id="floatRight" class="btn btn-default" aria-label="Left Align">
    	<span aria-hidden="true">Upload</span>
  	</a>
	<?php endif; ?>

</nav>
