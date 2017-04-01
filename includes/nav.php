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


  	<a type="button" id="floatRight" class="btn btn-default" href="login.php">
    	<span aria-hidden="true">Login</span>
  	</a>

		<a type="button" id="floatRight" class="btn btn-default" href="login.php">
    	<span aria-hidden="true">Logout</span>
  	</a>


	<?php if (isset($_SESSION['user'])): ?>
  	<a type="button" id="floatRight" class="btn btn-default" aria-label="Left Align">
    	<span aria-hidden="true">Upload</span>
  	</a>
	<?php endif; ?>

</nav>
