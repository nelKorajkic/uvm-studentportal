<?php
	require("includes/top.php");
	// Unset all of the session variables.
	$_SESSION = array();

	// If it's desired to kill the session, also delete the session cookie.
	// Note: This will destroy the session, and not just the session data!
	if (ini_get("session.use_cookies")) {
		$params = session_get_cookie_params();
		setcookie(session_name(), '', time() - 42000,
			$params["path"], $params["domain"],
			$params["secure"], $params["httponly"]
		);
	}

	// Finally, destroy the session.
	session_destroy();
?>
<div class="container content-container" id="logoutBg">
	<div class="row">
		<div class="jumbotron text-center">
  <h1>Thanks for using NoTaker!</h1>
  <p>Click on the button below to log in again.</p>
  <p><a class="btn btn-primary btn-lg" href="login.php" role="button">Login</a></p>
		</div>
	</div>
</div>
