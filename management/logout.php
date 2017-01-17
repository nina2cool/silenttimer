<?php

		//code to log out person and go to login page.
		session_start();
		
		if (session_is_registered('userName'))
		{
			$userName= NULL; // empty the variable
			session_unregister('userName'); // unregister it
			session_destroy(); // kill the session
			
			require "include/url.php";
			header("location: $http"); //sends user to root page, login...
		
		}
		else
		{
			header("location: $http"); //sends user to root page, login...
		}
?>