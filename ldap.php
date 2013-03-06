<?php
	/**
	 * User:        FMK
	 * Date:        15.04.12
	 * Time:        18:52
	 * Filename:    ldap.php
	 */

	if (isset($_POST) && isset($_POST['loginName']) && isset($_POST['loginPassword'])){
		$loginName = $_POST['loginName'];
		$loginPassword = $_POST['loginPassword'];

		$ldap = ldap_connect('ldaps://ldap.ruhr-uni-bochum.de', 389);
		$dn = "uid=".$loginName.",ou=users,dc=ruhr-uni-bochum,dc=de";
		$bind = ldap_bind($ldap, $dn, $loginPassword);
		if ($bind){
			echo 'Login success!';
			return true;
		}else{
			echo 'Login false!';
			return false;
		}
	}
?>

<!DOCTYPE html>
<html lang="de">
<head>
	<title>RUB-LDAP PHP Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="RUB-LDAP PHP Login">
	<meta name="author" content="FMK">
</head>
<body>
<fieldset>
	<legend>Login</legend>
	<form method="post" action="ldap.php">
		<label>Login</label>
		<input type="text" name="loginName" placeholder="Login ID">
		<label>Passwort</label>
		<input type="password" name="loginPassword" placeholder="Passwort">
		<button type="submit">Login</button>
	</form>
</fieldset>
</body>
</html>
