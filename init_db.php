<?php
	$db_name = 'mazda';

	$link = mysql_pconnect('localhost', 'root', '');
	if (! $link) {
		die('Could not connect' . mysql_error());
    }
	
	if (! mysql_query("CREATE DATABASE $db_name", $link)) {
		die('Could create database' . mysql_error());
	}
	//Create table
	mysql_select_db("$db_name", $link);
	$sql_crete_user_types = "CREATE TABLE user_types (id long, name varchar(5))";
    mysql_query($sql_crete_user_types, $link);


?>