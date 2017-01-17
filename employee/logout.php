<?php
//code to log out person and go to login page.
session_start();

if (session_is_registered('e'))
{
	$eID = NULL; // empty the variable
	session_unregister('e'); // unregister it
	session_destroy(); // kill the session
	
	require "include/url.php";
	
	$http .= "employee";
	
	header("location: $http"); //sends user to root page, login...

}
else
{
	require "include/url.php";
	$http .= "employee";
	header("location: $http"); //sends user to root page, login...
}
?>