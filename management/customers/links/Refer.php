<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../../include/dbinfo.php";
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	
	$sql = "SELECT * FROM tblFriend WHERE Status = 'active' AND Type = 'sender'";
	
	//echo $sql;

	//sort results.....
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	else
	{
		$sql .= " ORDER BY tblFriend.DateTime DESC";
		$sortBy ="tblFriend.DateTime";
		$sortDirection = "DESC";
	}
		

	//put SQL statement into result set for loop through records
	$result = mysql_query($sql) or die("Cannot execute query!");
	$Num = mysql_num_rows($result);


	$sql3 = "SELECT * FROM tblFriend WHERE Status = 'active' AND Type = 'receiver'";
	$result3 = mysql_query($sql3) or die("Cannot execute query!");
	$NumReferred = mysql_num_rows($result3);

?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Email
      Referrals</strong></font></p>
<p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&gt;
      <a href="ReferPurchase.php">View friends who
      purchased</a></font></p>
<ul>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $Num; ?> people
      referred their friends</font></li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $NumReferred; ?> friends
      were referred </font></li>
</ul>
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
    <tr bgcolor="#FFFFCC"> 
      <td class=sort> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="Refer.php?sort=tblFriend.Name&d=<? if ($sortBy=="tblFriend.Name") {echo $sd;} else {echo "ASC";}?>"> Name</a> |
      <a href="Refer.php?sort=tblFriend.DateTime&d=<? if ($sortBy=="tblFriend.DateTime") {echo $sd;} else {echo "ASC";}?>">DateTime</a> </strong></font></div></td>
      <td width="50%" class=sort> <div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong>Referred
      People</strong></font></div></td>
      <td class=sort><div align="center"><font size="1" face="Arial, Helvetica, sans-serif"><strong><a href="Refer.php?sort=tblFriend.Note&d=<? if ($sortBy=="tblFriend.Note") {echo $sd;} else {echo "ASC";}?>">Special
                Note</a></strong></font></div></td>
      <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  	while($row = mysql_fetch_array($result))
				{
				$Name = $row['Name'];
				$Note = $row['Note'];
				$Email = $row['Email'];
				$DateTime = $row['DateTime'];
				$PromoCode = $row['PromotionCodeID'];
				$Link = $row['Link'];
				

				if($Note == "") { $Note = "-"; }
												
			  ?>
    <tr> 
      <td><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Name; ?></strong><br>
      <? if($PromoCode <> "") { ?><a href="../CustomerInfo.php?cust=<? echo $PromoCode; ?>" target="_blank">Promo
      Code: <? echo $PromoCode; ?></a><br><? } ?>
      <a href="mailto:<? echo $Email; ?>"><? echo $Email; ?></a><br>
      <font color="#FF00FF"><? echo $DateTime; ?></font>
      <br>
      </font><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Link; ?></font><font size="2" face="Arial, Helvetica, sans-serif">      <br>
      </font></td>
      
	  
	  
	  <td width="50%"><font size="1" face="Arial, Helvetica, sans-serif">
	  
	  <?
	  	$sql2 = "SELECT * FROM tblFriend WHERE ReferName = '$Name' AND ReferEmail = '$Email' AND Type = 'receiver' AND Status = 'active' AND DateTime = '$DateTime'";
		$result2 = mysql_query($sql2) or die("Cannot get receivers");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$ReferName = $row2[Name];
			$ReferEmail = $row2[Email];
			$Test = $row2[Test];
		?>
	  
	  </font>
	    <li><font size="1" face="Arial, Helvetica, sans-serif"><? echo $ReferName; ?> - <a href="mailto:<? echo $ReferEmail; ?>"><? echo $ReferEmail; ?></a> (<? echo $Test; ?>)</font></li>
	    <font size="1" face="Arial, Helvetica, sans-serif">
	    <? } ?>
	  
	  
	    </font></td>
	  
	  
	  
	  
	  
	  
      <td><font size="1" face="Arial, Helvetica, sans-serif"><? echo $Note; ?></font></td>
    </tr>
    <?
			  	}
				
			  ?>
  </table> 
		
            

  <p align="left">&nbsp;</p>

  
    <p align="left">&nbsp;</p>
  <?
  
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
				mysql_close($link);
				
				
// has links that show up at the bottom in it.

require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
?>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>
