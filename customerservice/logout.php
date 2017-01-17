<?php

		//code to log out person and go to login page.
		session_start();
		
		if (session_is_registered('custID'))
		{
			$custID= NULL; // empty the variable
			session_unregister('custID'); // unregister it
			session_destroy(); // kill the session

			require "include/url.php";
			header("location: $http/customerservice/index.php"); //sends user to root page, login...
		
		}
		else
		{
			header("location: $http/customerservice/index.php"); //sends user to root page, login...
		}
?>