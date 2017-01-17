<?php // Begin PHP

//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{


// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";


// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// ----------- CODE-------------------

	
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	//-- end of database connection ----------------------------------
	

	//this IF statement checks to see if the "Submit" button has been clicked. 
	// it prevents the code from executing until you click Submit
	If ($_POST['Submit'] == "Add Test") // Add Agent - Name of Button
	{
		
		$Name = $_POST['txtName'];
		$Description = $_POST['txtDescription'];
		$WebSite = $_POST['txtWebSite'];
		
		// code to insert value from the form into the database.
		$query = "INSERT INTO tblTests(Name, Description, WebSites)
			  VALUES('$Name', '$Description', '$WebSite')"; //this is where you build your SQL statement
		mysql_query($query); //this executes the SQL and inserts the values into the database

	
	} // end of IF statement
	
?>
<p><strong><font color="#003399" size="5" face="Arial, Helvetica, sans-serif">Add 
  a Test</font></strong></p>
<blockquote>
  <div align="left"><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"></font></div>
</blockquote>

     	 

<form name="form" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr> 
      <td width="18%"><div align="left"><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif"> Name&nbsp; </font></font></div></td>
      <td width="82%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtName" type="text" id="txtName" size="30" maxlength="30">
        </font></td>
    </tr>
    <tr> 
      <td><div align="left"><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif"> Description </font></font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <textarea name="txtDescription" cols="40" rows="3" id="txtDescription"></textarea>
        </font></td>
    </tr>
    <tr> 
      <td><div align="left"><font color="#000000" size="2"><font face="Arial, Helvetica, sans-serif"> Web
      Site (include http://) </font></font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtWebSite" type="text" id="txtWebSite" size="50">
        </font></td>
    </tr>
  </table>

    
  <p>&nbsp; </p>
  <p>
    <input type="submit" name="Submit" value="Add Test">
    <input type="reset" name="Submit2" value="Reset">
  </p>

</form>


<? // -------------- END MY CODE -------------------

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
mysql_close($link); //this closes the database connection
?>