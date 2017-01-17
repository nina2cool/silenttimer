<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<?
	//get name of person/company	
	$aID = $_SESSION['a'];
	
	#connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");			
		
	$sql = "SELECT * FROM tblAffiliate WHERE AffiliateID = '$aID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$CompanyName = $row[CompanyName];
		$City = $row[City];
		$AffRate = $row[Rate];
	}
	
	
	// -- code to enter NEW deadlines. ---------------------------------->
	if($_POST['Submit'] == "Add Deadline")
	{
		$Date = $_POST['DateYear'] . "-" . $_POST['DateMonth'] . "-" . $_POST['DateDay'];
			
		$sql = "INSERT INTO tblAffOfficeDeadlines (AffiliateID, Date) VALUES ('$aID', '$Date')";
		#echo "$sql <p>";
				
		mysql_query($sql) or die("Cannot insert deadline, please try again.");	
	}
	



	
	$now = date("Y-m-d");
	# - get next deadline for this office
	$sql = "SELECT Date
			FROM tblAffOfficeDeadlines 
			WHERE AffiliateID = '$aID' AND Date >= '$now'
			ORDER BY Date ASC";
	$result = mysql_query($sql) or die("Can not get your office deadlines.  Please call 512-542-9981 to get help.  Sorry for the inconvenience.");

?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Shipment 
  Deadlines</strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr> 
    <td align="left" valign="top"> 
      <p><font size="2" face="Arial, Helvetica, sans-serif">Below you will find 
        your office deadlines. After each deadline, we will send timers to your 
        office along with a list of who is picking one up. You may edit your current 
        deadlines if they are <em><strong>more</strong></em> than 5 days away. 
        Deadlines must be at least 2 weeks apart.</font></p>
      
	 <?
	 	# if there are NO deadlines set, do not display table at all...
		if (mysql_num_rows($result) != 0)
		{
	 ?>
	  
	  <table width="350" border="1" cellpadding="4" cellspacing="0" bordercolor="#CCCCCC">
        <tr> 
          <td width="292" bgcolor="#003399"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Future 
            Deadlines</strong></font></td>
          <td width="42" bgcolor="#003399"><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif"><strong>Edit</strong></font></td>
        </tr>
    <?
			# list out deadlines...
			while($row = mysql_fetch_array($result))
			{
				$newDeadline = $row[Date];
				$newDeadlineFormat = substr($newDeadline,5,2) . "/" . substr($newDeadline,8,2) . "/" . substr($newDeadline,0,4);
				$newDeadline2 = strtotime($newDeadline);
				
				
				#find out if the date is editable.  Only if it is AT LEAST 5 days away... (>=)
				$five_days = mktime (0,0,0,date("m"),date("d")+5,  date("Y"));
				
				if($newDeadline2 >= $five_days)
				{
					$okay_edit = '1';
				}
				
	?>	
		<tr> 
          <td><font size="2" face="Arial, Helvetica, sans-serif"><? echo $newDeadlineFormat;?></font></td>
          <td><font size="2" face="Arial, Helvetica, sans-serif"><? if($okay_edit == '1'){?><a href="deadline_edit.php?deadline=<? echo $newDeadline;?>"><? }?>edit<? if($okay_edit == '1'){?></a><? }?></font></td>
        </tr>
	<?
			}
	?>
		
      </table>
	  
	<?
		}
		else
		{
			echo "<strong><font size='2' face='Arial, Helvetica, sans-serif'>You have no timer deadlines.  Please set up your next deadline below.</font></strong>";
		} // end checking if there are actually records to display...
	?>
      <strong><font size="3" face="Arial, Helvetica, sans-serif"><br>
      </font></strong><p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font size="3">Create 
        New Deadlines</font></strong></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">To create a new deadline, 
        enter the date below and click &quot;<strong>Add Deadline</strong>&quot;. 
        The date must be at least 1 week from now. Deadlines must be at least 
        2 weeks apart.</font></p>
      <form name="form1" method="post" action="">
        <table width="300" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="22%"><select name="DateMonth">
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
              </select></td>
            <td width="13%"> <select name="DateDay">
                <? 
					  		for($i=1;$i<=31;$i++) // count out days in month...
							{
			  ?>
                <option value="<? echo $i;?>"><? echo $i;?></option>
                <?
					  		}
							$year = date("Y");
		 	  ?>
              </select></td>
            <td width="65%"> <select name="DateYear">
                <option value="<? echo $year;?>"><? echo $year;?></option>
                <option value="<? echo ($year+1);?>"><? echo ($year+1);?></option>
              </select> </td>
          </tr>
        </table>
        <p>
          <input type="submit" name="Submit" value="Add Deadline">
        </p>
      </form>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><em>* Cannot edit 
        deadlines that are less then 5 days away from today's date.</em></font></p>
      <p>&nbsp;</p></td>
  </tr>
</table>

<?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "tpr";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
