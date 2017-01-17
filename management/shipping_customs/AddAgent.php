<?php // Begin PHP

//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has top header in it.
require "../include/headertop.php";


// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";


// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// ----------- CODE-------------------





	//this IF statement checks to see if the "Submit" button has been clicked. 
	// it prevents the code from executing until you click Submit
	If ($_POST['Submit'] == "Add Agent") // Add Agent - Name of Button
	{
	
		// --> connect to the database. --------------------------
		//$location = "localhost";
	    //$user = "proace";
		//$pass = "erikSQL";
		//$db = "proace";

		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		//-- end of database connection ----------------------------------
		


		// code to insert value from the form into the database.
		$query = "INSERT INTO tblCustomsAgent (FirstName, LastName, Phone, Email)
		VALUES('$txtFirstName', '$txtLastName', '$txtPhone', '$txtEmail')"; //this is where you build your SQL statement

			
		mysql_query($query); //this executes the SQL and inserts the values into the database
		echo "<meta http-equiv='refresh' content='0;URL=CustomsAgent.php'>";	
		mysql_close($link); //this closes the database connection
	
	} // end of IF statement
	
	
//all the code below is HTML is to build the simple input form.
?> 
<blockquote>
  <h1><font color="#400080" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
    a Customs Agent</strong></font></h1>
</blockquote>
<form name="form" method="post" action="">
  <table width="72%" border="0">
    <tr> 
      <td width="32%"><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">First 
          Name&nbsp; </font></div></td>
      <td width="68%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtFirstName" type="text" id="txtFirstName3" size="30" maxlength="30">
        </font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Last 
          Name&nbsp; </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtLastName" type="text" id="txtLastName3" size="30" maxlength="30">
        </font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Phone&nbsp; 
          </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtPhone" type="text" id="txtPhone3" size="30" maxlength="30">
        </font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Email&nbsp; 
          </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtEmail" type="text" id="txtEmail" size="50" maxlength="50">
        </font></td>
    </tr>
  </table>

    <blockquote> 
      <blockquote>
        <blockquote>
<p>
            <input type="submit" name="Submit" value="Add Agent">
            <!--Button mentioned at top of code also -->
            <%
echo "<meta http-equiv='refresh' content='0;URL=CustomsAgent.php'>";
%>
            <input type="reset" name="Submit2" value="Reset">
          </p>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>
</form>


<? // -------------- END MY CODE -------------------
// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";





// finishes security for page
}
else
{
?>
	<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>