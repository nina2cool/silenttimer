<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
	
	$State = $_GET['state'];
	$Chain = $_GET['chain'];
	
	//echo $Chain;
	

	
	//echo $Link;
	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	?><HEAD>
<TITLE><? echo $Chain; ?> Letter</TITLE>
<STYLE>
@media print { DIV.PAGEBREAK {page-break-before: always}}
</STYLE>
</HEAD>

<?
	
	
	$sql9 = "SELECT * FROM tblEmployee WHERE EmployeeID = '10'";
	$result9 = mysql_query($sql9) or die("Cannot retrieve company info, please try again.");
	
		while($row9 = mysql_fetch_array($result9))
				{
				$CAddress = $row9['Address'];
				$CAddress2 = $row9['Address2'];
				$CCity = $row9['City'];
				$CState = $row9['State'];
				$CZipCode = $row9['ZipCode'];
				$CPhone = $row9['CellPhone'];
				$CFax = $row9['Fax'];
				$CEmail = $row9['Email'];
				}
				

				
				
	$sql = "SELECT * FROM tblBusinessCustomer WHERE Chain = 'Princeton Review' AND Status = 'active' AND Country = 'US' AND State = '$State' ORDER BY City ASC";
	//echo "<br>sql = " .$sql;
	$result = mysql_query($sql) or die("Cannot retrieve store info, please try again.");
	
	$Num = mysql_num_rows($result);
	//echo "<br>Number of Kaplans: " .$Num;
	if($Num > 0)
	{
	
	while($row = mysql_fetch_array($result))
			{
			$Name = $row['Name'];
			$Chain = $row['Chain'];
			$FirstName = $row['ContactFirstName'];
			$LastName = $row['ContactLastName'];
			$Address = $row['Address'];
			$Address2 = $row['Address2'];
			$Address3 = $row['Address3'];
			$City = $row['City'];
			$State = $row['State'];
			$StateOther = $row['StateOther'];
			$ZipCode = $row['ZipCode'];
			$Email = $row['Email'];
			$TypeID = $row['Type'];
			$Phone = $row['Phone'];
			$Email = $row['Email'];
			$CountryID = $row['Country'];
			$CheckStore = $row['CheckStore'];
			$zipOne = $row[ZipCode];
	
	
	
			if($FirstName == '')
			{
			$FirstName = "Director";
			}
			
			if($Chain == "Kaplan")
			{
			$Chain = "Kaplan Test Prep";
			}
	
		
		
	$Now = date("F d, Y");
		

	
?><title><? echo $Chain; ?> Letter</title>

<hr noshade>
<table width="650" border="0" cellpadding="5" cellspacing="0">
  <tr> 
    <td width="18%"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../../images/Front_Logo_01.jpg" width="102" height="65"></font></td>
    <td width="39%"><div align="left"><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="2">Silent 
        Technology LLC<br>
        </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><?php echo $CAddress; ?> <?php echo $CAddress2; ?><br>
        <?php echo $CCity; ?>, <?php echo $CState; ?> <?php echo $CZipCode; ?><br>
        Office: <?php echo $CPhone; ?><br>
        Fax: <?php echo $CFax; ?></font></div></td>
    <td width="39%"><font size="6" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
  </tr>
</table>
<hr noshade>
<p>&nbsp;</p>
<p><font size="3" face="Times New Roman, Times, serif">Center Director <br>
      <? echo $Chain; ?><br>
      <?
	  if($Address2 == '' AND $Address3 == '')
	  {
	  ?>
      <? echo $Address; ?> <br>
      <?
	  }
	  elseif($Address3 == '')
	  {
	  ?>
      <? echo $Address; ?><br>
</font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
    <?
	  }
	  else
	  {
	  ?>
	      
	  <? echo $Address; ?><br>
      </font> <font size="3" face="Times New Roman, Times, serif"><? echo $Address2; ?><br>
      </font> <? echo $Address3; ?><br>
      <?
	  }
	  ?>
  <? echo $City; ?>, <? echo $State; ?></font> <font size="3" face="Times New Roman, Times, serif"><? echo $ZipCode; ?></font> </p>
<font size="3" face="Times New Roman, Times, serif"><br>
<? echo $Now; ?><br>
<br>
<br>
</font>
<p><font size="3" face="Times New Roman, Times, serif"> Dear Center Director:</font></p>
<p>   <strong>Help your students improve their exam pacing! </strong><br>
  <br>
In the past, a number of your students have taken advantage of our rebate offers
for The Silent Timer&trade; . This innovative tool has helped test takers nationwide
develop a solid pacing strategy for some of the most difficult standardized exams.
With the LSAT around the corner, we would appreciate your help in letting your
students know about The Silent Timer&trade; .</p>
<p>  We now have an exclusive offer available for Princeton Review students until
May 15, 2006.</p>
<p>By purchasing The Silent Timer&trade; online, your students&nbsp;can receive&nbsp;2
  different timers for their practice and testing needs.&nbsp; This promotion
  is only available at <strong> www.SilentTimer.com/tpr</strong>.</p>
<p>Please post the attached flier in your office to let your teachers and students
  take advantage of this limited-time offer. Feel free to make additional copies,
  as needed.</p>
<p>If you have any questions or are interested in becoming an affiliate, you
  can contact me at <br>
  (512) 340-0338. You can also visit our web site at <strong>www.SilentTimer.com</strong> to
  read more about our products and partner opportunities.<br>
    <br>
  Thank you for working with&nbsp;us to help students increase their test scores!</p>
<p><font size="3" face="Times New Roman, Times, serif"><br>
  Kind Regards,<br>
  <img width="236" height="54" src="../../images/Dina.jpg"><br>
  </font>
  <font size="3" face="Times New Roman, Times, serif">

  <br>
Dina Kushner<br>
Marketing Director, Silent Technology LLC </font></p>
<font size="3" face="Times New Roman, Times, serif">


<DIV CLASS="PAGEBREAK"></DIV>
<?
}# end of looping through Kaplans
}#end of Num > 0
else
{
echo "No Locations in this state.";

}

// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);


// finishes security for page
}
else
{
?>

<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>

<?
}
?>
