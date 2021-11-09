<?php

require_once("user.php");

$status = '';
$user = new User();

if (isset($_POST['submit'])) {
	if(! empty($_POST['username']) && ! empty($_POST['pass'])) {
		$username = $_POST['username'];
		$pass = $_POST['pass'];

		$login_status = $user->login($username, $pass);

		if($login_status === false) {
			$status = '<h3 style="color:red">Username sau parola introduse gresit.</h3>';
		}
	} else {
		$status = '<h3 style="color:red"> Toate campurile sunt obligatorii!</h3>';
	}
}

if($user->is_logged_in() === true) {
	$status = '<h3 style="color: green;">Utilizator autentificat!</h3>';
}

?>
<html>
	<head>
		<title>#1</title>
	</head>
	<body>
		<?php if(!empty($status)) { echo $status; } ?>
		<form method="POST" action="#">
			<label for="username">Username</label>
			<input type="text" name="username">
			<br>
			<label for="pass">Password</label>
			<input type="password" name="pass">
			<br>
			<?php echo "Lungimea obligatorie a parolei este de minim " . User::$prop_statica . " caractere!<br>"; ?>
			<input type="submit" name="submit" value="Login">
		</form>
	</body>
</html>