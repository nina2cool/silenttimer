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
	
	
	//grab variables to get purchase info from DB.
	$CategoryID = $_GET['cat'];
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	if($_GET['Delete'] == "YES")
	{
		
		$Now = date("Y-m-d");
		
		$sql5 = "DELETE FROM tblFAQ WHERE FAQID = '$FAQID'";
		mysql_query($sql5) or die("Cannot delete FAQID, try again!");
	
	}
	

	$sql3 = "SELECT * FROM tblCategory WHERE CategoryID = '$CategoryID'";
	$result3 = mysql_query($sql3) or die("Cannot find category");
	
	while($row3 = mysql_fetch_array($result3))
	{
	$Category = $row3[Name];
	}
	
	
	
	$sql = "SELECT * FROM tblFAQ WHERE CategoryID = '$CategoryID'";

	
	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblFAQ.Question ASC";
		$sortBy ="tblFAQ.Question";
		$sortDirection = "ASC";
	}
		


	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	

?>
<p><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Questions 
  for <? echo $Category; ?><br>
</strong></font></p>

  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
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
    <tr valign="top"> 
      <td width="25%" height="34"> <div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="../categories/index.php?sort=tblCategory3.Category&d=<? if ($sortBy=="tblCategory3.Category") {echo $sd;} else {echo "ASC";}?>">Question</a></font></strong></div></td>
      <td width="65%"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Answer</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Status</font></strong></div></td>
      <td width="10%"><div align="center"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><b>Delete</b></font></div></td>
    </tr>
    <?

		while($row = mysql_fetch_array($result))
		{
			$CategoryID = $row[CategoryID];
			$Question = $row[Question];
			$Answer = $row[Answer];
			$Status = $row[Status];
			$FAQID = $row[FAQID];
		

			
	?>
    <tr valign="top"<? if($Status == "inactive") { ?> bgcolor="#CCCCCC"<? } ?>> 
      <td width="25%"> <a href="QuestionEdit.php?q=<? echo $FAQID; ?>"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $Question; ?><br>
      </font></a></td>
      <td width="65%"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Answer; ?>&nbsp;</font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $Status; ?>&nbsp;</font></div></td>
      <td width="10%"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b><a href="QuestionView.php?Delete=YES&FAQID=<? echo $FAQID; ?>&cat=<? echo $CatID; ?>">X</a><font color="#FF0000">*</font></b></font></div></td>
      <?
  
  }
  ?>
    </tr>
</table>
  <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>&gt; <a href="QuestionAdd.php?cat=<? echo $CategoryID; ?>">Add
           a new question </a></strong></font></p>

  
  
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
