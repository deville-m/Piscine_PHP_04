<?php

function auth($login, $passwd) {
	if ($login == "" || $passwd == "")
		return FALSE;
	if (($content = @file_get_contents("../private/passwd")) === FALSE)
		return FALSE;
	if (($data = @unserialize($content)) === FALSE)
		return FALSE;
	$passwd = hash("Whirlpool", $passwd);
	return ($data[$login] === $passwd);
}

?>