<!DOCTYPE html>
<html>
<head>
    <title> PHP-Variables! </title>
    <meta charset = "utf-8" />
</head>
<body>

<h1>Let's play with variables in PHP</h1>
<?php
	$str = "This is a string";
	$int = 1234; $flt = 12.3456;
	$non = NULL;
   	// NULL means no value
	echo "Value stored in variables<br />------------------------------<br />";
	echo "String str: $str<br />";
	echo "Integer int: $int<br />";
	echo "Float flt: $flt<br />";
	echo "Null non: $non<br />";
	
	echo "<br />Demonstrating unset and isset<br />--------------------------------------<br />";
	$yes = isset($str);
	echo "Is the string variable assigned a value? $yes<br />";
	unset($str);
	$yes = is_empty($str);
	echo " Now? $yes<br />";
?>
 

</body>
</html>