<?php
		//code to log out person and go to login page.
		session_start();
		
		if (session_is_registered('a'))
		{
			$aID = NULL; // empty the variable
			session_unregister('a'); // unregister it
			session_destroy(); // kill the session
			
			require "../../include/url.php";
			
			$http .= "tpr";
			
			header("location: $http"); //sends user to root page, login...
		
		}
		else
		{
			header("location: $http"); //sends user to root page, login...
		}
?>