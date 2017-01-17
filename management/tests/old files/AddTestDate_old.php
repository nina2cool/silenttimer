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
	If ($_POST['Submit'] == "Add Date") // Add Agent - Name of Button
	{
		
		$vTest = $_POST['cboTest'];
		$vDate = $_POST['txtDate'];
		$vInfo = $_POST['txtInfo'];

		// code to insert value from the form into the database.
		$query = "INSERT INTO tblTestDates (TestID, Date, Info)
			  VALUES('$vTest', '$vDate', '$vInfo')"; //this is where you build your SQL statement
		mysql_query($query); //this executes the SQL and inserts the values into the database
		
		echo "<meta http-equiv='refresh' content='0;URL=ViewTestDate.php'>";	
	
	} // end of IF statement
	
?> 

<blockquote> 
  <h1><font color="#400080" size="5" face="Arial, Helvetica, sans-serif"><strong> 
    &nbsp;&nbsp;&nbsp;Add a Test Date</strong></font></h1>
</blockquote>

     	 

<form name="form" method="post" action="">
  
  <table width="72%" border="0">
    <tr> 
     
      <td> <div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif">Select 
          Test</font><font color="#0000CC" face="Arial, Helvetica, sans-serif">&nbsp;<br>
          </font></div></td>
  
	  <td> 	   
	   <select name="cboTest" id="select">
	  
	<?    
		// build combo box for the test options from the database.
		// SQL to get data from test table
	
		$sql = "SELECT * FROM tblTests";
		//put SQL statement into result set for loop through records
		$result = mysql_query($sql) or die("Cannot execute 1st query!");
		
		while($row = mysql_fetch_array($result))
		{

	?>
			<option value="<? echo $row[TestID]; ?>" <? if ($row[TestID] == $TestID) {echo "selected";} ?>><? echo $row[Name]; ?></option>
	<?
		}
	?>
</select>


</td>
</tr>  
    
	<tr> 
      <td width="28%"><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
          Date&nbsp; </font></div></td>
      <td width="72%"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <input name="txtDate" type="text" id="txtDate" size="30" maxlength="30">
        </font></td>
    </tr>
   
    <tr> 
      <td><div align="right"><font color="#000099" face="Arial, Helvetica, sans-serif"> 
          Information&nbsp; </font></div></td>
      <td><font color="#000099" face="Arial, Helvetica, sans-serif"> 
        <textarea name="txtInfo" id="txtInfo"></textarea>
        </font></td>
    </tr>
  
 </table>

    <blockquote> 
      <blockquote>
        <blockquote>

<p>
            <input type="submit" name="Submit" value="Add Date">
     
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