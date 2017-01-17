<?
//security for page
session_start();

require "../../include/url.php";
require "../../include/dbinfo.php";

# security check - if not logged in, send to login page.
If (session_is_registered('userName'))
{

# Title for page.
$Title = "";

//connect to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

require "../include/top.php";
require "include/sidemenu.php";


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
	$CatID = $_GET['cat'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	$sql2 = "SELECT * FROM tblCategory WHERE CategoryID = '$CatID'";

	//put SQL statement into result set for loop through records
	$result2 = mysql_query($sql2) or die("Cannot execute query!");
	
		while($row2 = mysql_fetch_array($result2))
		{
			$Category = $row2[Name];	
		}
	

	
				

	# Add button being pushed>
	if ($_POST['Add'] == "Add")
	{
		
		$Subcategory = dbQuote($_POST['Subcategory']);
		
		


		# NOW, update information for current position...
		$sql = "INSERT INTO tblCategory(Name, BelongsTo, Type)
		VALUES('$Subcategory', '$CatID', 'Subcategory')";
				
		mysql_query($sql) or die("Cannot insert SubCategory information");
			
		#header("location: BreedView.php");				

		$Subcategory = addQuote($Subcategory);

	} 



				
	?> 
<p><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Add 
  Subcategory for <? echo $Category; ?></strong></font></p>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr> 
      <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
          <tr> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Subcategory 
                Name</strong><br>
                <input name="Subcategory" type="text" id="Subcategory" size="50">
                </font><br>
              </p>
              </td>
          </tr>
        </table> </td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
    <input name="Add" type="submit" id="Add" value="Add">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  <p align="left">
</form>

 <?
require "../include/bottom.php";
mysql_close($link);



// finishes security for page
}
else
{
	header("location: $http_admin"); //redirects user via PHP to this page... better than meta refresh...
}
?>
