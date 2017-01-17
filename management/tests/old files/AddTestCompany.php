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
	If ($_POST['Submit'] == "Add Company") // Add Agent - Name of Button
	{
	
	
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database");
		//-- end of database connection ----------------------------------
		

		// code to insert value from the form into the database.
		$query = "INSERT INTO tblTestCompany (CompanyName, Address, City, State, ZipCode, 
		ContactPerson, Phone, Email)
		VALUES('$txtCompanyName', '$txtAddress', '$txtCity', '$txtState', 
		'$txtZipCode', '$txtContactPerson', '$txtPhone', '$txtEmail')"; 
		//this is where you build your SQL statement

			
		mysql_query($query); //this executes the SQL and inserts the values into the database
		echo "<meta http-equiv='refresh' content='0;URL=ViewTestCompany.php'>";	
		mysql_close($link); //this closes the database connection
	
	} // end of IF statement
	
	
//all the code below is HTML is to build the simple input form.
?> 
<blockquote> 
  <h1><font color="#400080" face="Arial, Helvetica, sans-serif">&nbsp;<font size="5">&nbsp;&nbsp;<font color="#000099">&nbsp;<strong>Add 
    a Test Company</strong></font></font></font></h1>
</blockquote>
<form name="form" method="post" action="">
  

  
  <table width="88%" border="0">
    <tr> 
      <td width="30%"><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Company 
          Name&nbsp; </font></div></td>
      <td width="70%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtCompanyName" type="text" id="txCompanyName3" size="40" maxlength="50">
        </font></td>
    </tr>
	
	
	    <tr> 
      <td width="30%"><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Address 
          &nbsp; </font></div></td>
      <td width="70%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtAddress" type="text" id="txtAddress3" size="40" maxlength="100">
        </font></td>
    </tr>
	
	
	    <tr> 
      <td width="30%"><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">
          City&nbsp; </font></div></td>
      <td width="70%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtCity" type="text" id="txtCity3" size="40" maxlength="100">
        </font></td>
    </tr>
	
	    <tr> 
      <td width="30%"><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">
          State&nbsp; </font></div></td>
      <td width="70%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtState" type="text" id="txtState3" size="2" maxlength="2">
        </font></td>
    </tr>
	
		    <tr> 
      <td width="30%"><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">
          ZipCode&nbsp; </font></div></td>
      <td width="70%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtZipCode" type="text" id="txtZipCode3" size="15" maxlength="30">
        </font></td>
    </tr>
	
	
	
    <tr> 
      <td><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Contact 
          Person&nbsp; </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtContactPerson" type="text" id="txtContactPerson3" size="40" maxlength="100">
        </font></td>
    </tr>
	
    <tr> 
      <td><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Phone&nbsp; 
          </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtPhone" type="text" id="txtPhone3" size="20" maxlength="30">
        </font></td>
    </tr>
    <tr> 
      <td><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Email&nbsp; 
          </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtEmail" type="text" id="txtEmail" size="40" maxlength="100">
        </font></td>
    </tr>
	

	
  </table>

    <blockquote> 
      <blockquote>
        <blockquote>
<p>
            <input type="submit" name="Submit" value="Add Company">
            <!--Button mentioned at top of code also -->

            <%
echo "<meta http-equiv='refresh' content='0;URL=ViewTestCompany.php'>";
%>

           <input type="reset" name="Submit2" value="Reset">
          </p>
        </blockquote>
      </blockquote>
    </blockquote>
  </blockquote>



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
?>