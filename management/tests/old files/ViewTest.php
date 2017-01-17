<?
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

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>



<?
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

		$sql = "Select * FROM tblTests";



	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	
	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");

?>
<font size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Tests</strong></font>
<form>
			
  
    <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			    
?>
  <table width="80%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFFFCC"> 
      <td class=sort><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Details</strong></font></div></td>
      <td class=sort> 
        <div align="center"><font color="#000000"><a href="../tests/ViewTest.php?sort=tblTests.TestID&d=<? if ($sortBy=="tblTests.TestID") {echo $sd;} else {echo "ASC";}?>"><strong><font size="2" face="Arial, Helvetica, sans-serif">Test 
      ID</font></strong></a></font></div></td>
      <!--  <td width="64" class=sort> <div align="center"><font color="#003399"><strong><font size="2" 
				       face="Arial, Helvetica, sans-serif">Details</font></strong></font></div></td>
					   
-->
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				     face="Arial, Helvetica, sans-serif"><a href="../tests/ViewTest.php?sort=tblTests.Name&d=<? if ($sortBy=="tblTests.Name") {echo $sd;} else {echo "ASC";}?>">Test 
      </a></font></strong></font></div></td>
      <td class=sort> <div align="center"><font color="#000000"><strong><font size="2" 
				      face="Arial, Helvetica, sans-serif"><a href="../tests/ViewTest.php?sort=tblTests.Description&d=<? if ($sortBy=="tblTests.Description") {echo $sd;} else {echo "ASC";} ?>">Description 
      </a></font></strong></font></div></td>
    </tr>
    <!--     
		-->
    <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{ 
				$TestID = $row[TestID];
				$Name = $row[Name];
				$Description = $row[Description];
				$WebSite = $row[WebSite];
				
					if($Description == "") { $Description = "-"; }
								
			  ?>
    <tr> 
      <td height="35"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="EditTest.php?t=<? echo $TestID; ?>">Edit</a></font></div></td>
      <td> 
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $TestID; ?></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">
	    
	  <? if($WebSite <> "") { ?>
	    <a href="<? echo $WebSite; ?>" target="_blank"><? echo $Name; ?></a>
	    <? } else { ?>
	    <? echo $Name; ?>
	    <? } ?>
	    
	  </font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Description; ?></font></div></td>
    </tr>
    <?
			  	}
				//close connection to database
				mysql_close($link);
			  ?>
  </table> 
		
</form>
  
  
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
// has links that show up at the bottom in it.

require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
