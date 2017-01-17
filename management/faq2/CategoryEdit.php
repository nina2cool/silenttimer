<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{



// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	


function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("'","||",$var);
			$string = str_replace('"','||||',$string);
		}

		return $string;
	}
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
		}

		return $string;
	}
	
	function dbQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}




	//grab variables to get purchase info from DB.
	$CategoryID = $_GET['cat'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	# SAVE button being pushed>
	if ($_POST['Save'] == "Save")
	{
		
		$Category = dbQuote($_POST['Category']);
		$Status = $_POST['Status'];
		$Priority = $_POST['Priority'];
		$Type = $_POST['Type'];
		


		# NOW, update information for current position...
		$sql = "UPDATE tblCategory
				SET Name = '$Category',
				Priority = '$Priority',
				Type = '$Type',
				Status = '$Status'
				WHERE CategoryID = '$CategoryID'";
		
		mysql_query($sql) or die("Cannot update Category information");
			
		$Category = addQuote($Category);

		header("location: index.php");
		
	} 


		$sql3 = "SELECT * FROM tblCategory WHERE CategoryID = '$CategoryID'";

		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query Category!");
		
		while($row = mysql_fetch_array($result3))
		{
			$Category = escapeQuote($row[Name]);
			$Priority = $row[Priority];
			$Type = $row[Type];
			$Status = $row[Status];
		}
	
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

?>		

<p><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit 
  Category Information</strong></font></p>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr> 
      <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="5">
          <tr> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Category 
                Name</strong><br>
                <input name="Category" type="text" id="Category" value="<? echo dbQuote($Category);?>" size="50">
</font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Priority</strong><br>
                <input name="Priority" type="text" id="Priority" value="<? echo $Priority; ?>" size="4">
              </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Type</strong><br>
                <input name="Type" type="text" id="Type" value="<? echo $Type; ?>" size="20">
</font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font><font size="2" face="Arial, Helvetica, sans-serif">
                <br>
                <input name="Status" type="text" id="Status" value="<? echo $Status; ?>" size="20">
              </font><br>
</p></td>
          </tr>
        </table> </td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  <p align="left">
</form>

 <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
