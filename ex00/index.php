<?php

if (@session_start() === FALSE && isset($_GET))
	exit();

if ($_GET['login'] && $_GET['submit'] === "OK")
	$_SESSION['login'] = $_GET['login'];
if ($_GET['passwd'] && $_GET['submit'] === "OK")
	$_SESSION['passwd'] = $_GET['passwd'];

?>
<!DOCTYPE html>
<html>
	<body>
		<form action="index.php" method="get">
			Username: <input type="text" name="login" value=<?php echo '"' . $_SESSION['login'] . '"' ?>>
			<br />
			Password: <input type="test" name="passwd" value=<?php echo '"' . $_SESSION['passwd'] . '"' ?>>
			<br />
			<input type="submit" name="submit" value="OK">
		</form>
	</body>
</html>