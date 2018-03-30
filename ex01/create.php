<?php

if (!isset($_POST) || !$_POST["login"] || !$_POST["passwd"] || !$_POST['submit'])
	echo "ERROR\n";
else {
	@mkdir("../private");
	if (($content = @file_get_contents("../private/passwd")) === FALSE)
		$data = array();
	else if (($data = @unserialize($content)) === FALSE || isset($data[$_POST['login']]))
		exit ("ERROR\n");
	$data[$_POST["login"]] = hash("whirlpool", $_POST["passwd"]);
	if (($content = @serialize($data)) === FALSE)
		exit ("ERROR\n");
	if (@file_put_contents("../private/passwd", $content) === FALSE)
		exit("ERROR\n");
	echo "OK\n";
}

?>