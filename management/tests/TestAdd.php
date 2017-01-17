<?php // Begin PHP

//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{




// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	

	If ($_POST['Submit'] == "Add Test")
	{
		
		$Name = $_POST['txtName'];
		$Description = $_POST['txtDescription'];
		$WebSite = $_POST['txtWebSite'];
		
		$query = "INSERT INTO tblTests(Name, Description, WebSites)
			  VALUES('$Name', '$Description', '$WebSite')";
		mysql_query($query) or die("Cannot insert new test");

		$goto = "TestView.php";
		header("location: $goto");
			
	}

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";


// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

	
?>
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">&gt; Add
a Test</font></strong></p>


<form name="form" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> Name&nbsp; </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtName" type="text" id="txtName" size="30">
      </font></td>
    </tr>
    <tr> 
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> Description </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <textarea name="txtDescription" cols="40" rows="3" id="txtDescription"></textarea>
        </font></td>
    </tr>
    <tr> 
      <td><div align="left"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"> Web
            Site (include http://) </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtWebSite" type="text" id="txtWebSite" size="50">
        </font></td>
    </tr>
  </table>

    
  <p>&nbsp; </p>
  
    <input type="submit" name="Submit" value="Add Test">
    <input type="reset" name="Submit2" value="Reset">
  

</form>
<p>&nbsp; </p>
<p>&nbsp; </p>
<p>&nbsp; </p>
<p>&nbsp; </p>

<? // -------------- END MY CODE -------------------
mysql_close($link); //this closes the database connection

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>