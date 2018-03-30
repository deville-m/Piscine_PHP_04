<?php

function auth($login, $passwd) {
	if ($login == "" || $passwd == "")
		return FALSE;
	if (($content = @file_get_contents("../private/passwd")) === FALSE)
		return FALSE;
	if (($data = @unserialize($content)) === FALSE)
		return FALSE;
	$passwd = hash("whirlpool", $passwd);
	if ($data[$login] === $passwd)
		return TRUE;
	else
		return FALSE;
}

if (!isset($_POST))
	exit("ERROR\n");
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'] || $_POST['submit'] !== "OK")
	exit("ERROR\n");
if (!auth($_POST['login'], $_POST['oldpw']))
	exit("ERROR\n");
if (($content = @file_get_contents("../private/passwd")) === FALSE || ($data = @unserialize($content)) === FALSE)
	exit("ERROR\n");
$data[$_POST['login']] = hash("whirlpool", $_POST['newpw']);
if (($content = @serialize($data)) === FALSE)
	exit("ERROR\n");
if (@file_put_contents("../private/passwd", $content) === FALSE)
	exit("ERROR\n");
echo "OK\n";

?>