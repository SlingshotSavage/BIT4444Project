<?php
$restricted_level = -1;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/BIT4444Project/Resources/lib/session_controller.php');

if (isset($_POST['login_submit']) && $_POST['login_submit'] != "") {
	$username = null;
	$password = null;
	$error = false;
	
	if (isset($_POST['username']) && $_POST['username'] != "") {
		$username =  $_POST['username'];
	} else {
		$error = true;
	}
	if (isset($_POST['password']) && $_POST['password'] != "") {
		$password =  $_POST['password'];
	} else {
		$error = true;
	}
	
	if (!$error) {
		if(login($username, $password)) {
			header('location: ' . redirect_prefix('index'));
		} else {
			$password_error = true;
		}
	}
}
?>
<!doctype html>
<html lang="en">
 <?php generate_head('Login'); ?>
 <body>
  <?php generate_main_beginning(); ?>
   <form method="POST">
    <input type="text "name="username" placeholder="Username" />
    <input type="password" name="password" placeholder="Password" />
    <input type="submit" name="login_submit" />
   </form>
  <?php generate_main_end(); ?>
  <?php generate_header('Login'); ?>
  <?php generate_footer(); ?>
 </body>
</html>