<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('custID'))
{
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";


// has top header in it.
require "../include/headertop.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";

// has top menu for this page in it, you can change these links in this folders include folder.
//require "include/topmenu.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	$custID = $_SESSION['custID'];
	$CustomerID = $custID;

	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Databaasdfasdfasdfasdfdsse2");			
	
	#need to check purchase dates
	#only allow customers in the past 6 months to log in
	
	$sql2 = "SELECT MAX(OrderDateTime) as Max, PurchaseID, OrderDateTime FROM tblPurchase2 WHERE CustomerID = '$CustomerID' GROUP BY CustomerID";
	//echo $sql2;
	$result2 = mysql_query($sql2) or die("Cannot get purchase info");
	
	while($row2 = mysql_fetch_array($result2))
	{
			$PurchaseID = $row2[PurchaseID];
			$LastDate = $row2[Max];
			$OrderDateTime = $row2[OrderDateTime];
	}
	
	//echo $OrderDateTime;
	
	//echo $LastDate;
	
	#check last date - make sure it is within past 6 months
	
	$CurrentYear = date("Y");
	$CurrentMonth = date("m");
	$CurrentDay = date("d");
	
	//get timestamp for past/future date I want
	$pf_time = strtotime("-180 days");
	//format the date using the timestamp generated
	$pf_date = date("Y-m-d", $pf_time);
	
	//find date 30 days from Order Date to see if eligible for survey
	$pf_PurchaseDate = strtotime("$OrderDateTime+30 days");
	

	
	$PurchaseDate = date("Y-m-d", $pf_PurchaseDate);
	
	//echo $PurchaseDate;
	$PurchaseDate_format = date("m/d/Y", $pf_PurchaseDate);
	//echo $pf_date;
	
	if($LastDate >= $pf_date)
	{
	

	//$day = 7; // Day in the future 
	//$month = 5; // Month in the future 
	//$year = 2005; // Year in the future 

	// $days is the number of days between the dates 
	//$Days = (int)((mktime (0,0,0,$CurrentMonth,$CurrentDay,$CurrentYear) - time(void))/86400); 
	//$Days = $Days * -1;

	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
	$result = mysql_query($sql) or die("Cannot execute query!");
			
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
	}

	
	// to test whether $number is odd you could use the arithmetic
	// operator '%' (modulus) like this
	if( $odd = $custID%2 )
	{
		// $odd == 1; the remainder of 25/2
		//echo 'ODD Number!';
		$Page = "surveypp1b.php";
	}
	else
	{
		// $odd == 0; nothing remains if e.g. $number is 48 instead,
		// as in 48 / 2
		//echo 'EVEN Number!';
		$Page = "surveypp2b.php";
	}


?>

<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; My
          Account</strong></font></td>
    <td><div align="right"><font color="#33CC33" size="3" face="Arial, Helvetica, sans-serif"><strong><em>Welcome, <? echo $FirstName; ?> <? echo $LastName; ?></em></strong></font></div></td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellpadding="8" cellspacing="0" bordercolor="#CCCCCC">
  <tr valign="top">
    <td bgcolor="#FFCCFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">Orders and
    Account Information</font></strong></td>
    <td bgcolor="#FFFF99"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Friend
          Referral Program<br>
    </strong><font color="#FF0000"><strong>GET YOUR PURCHASE
          FOR FREE!</strong></font> </font></td>
  </tr>
  <tr valign="top">
    <td width="50%"><ul><li><p><font size="2" face="Arial, Helvetica, sans-serif"><a href="test_orderhistory.php">View
                Order History</a></font></p>
    </li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="test_BonusTimer.php">Order the LSAT
            Bonus Timer</a></font>
          <p></p>
        </li>
    </ul></td>
    <td rowspan="3">
      <ul><li>
        <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="test_Referral_Info.php">Step
              1: How the program works</a></font></p>
        </li>
        <li>
          <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="test_Referral_Emails.php">Step
                2: Send emails to my friends</a></font></p>
        </li>
        <li>
          <p><a href="test_Referral_Tips.php"><font size="2" face="Arial, Helvetica, sans-serif">Step
                3: Referral Tips</font></a></p>
        </li>
        <li>
          <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="test_Referral_Rebates.php">Step
                4: Print in-store rebate forms</a> </font></p>
        </li>
        <li>
          <p><a href="test_Referral_History.php"><font size="2" face="Arial, Helvetica, sans-serif">Step
                5: Track my referral sales</font></a></p>
        </li>
    </ul></td>
  </tr>
  <tr valign="top">
    <td bgcolor="#CCCCFF"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Customer Service
    and/or Troubleshooting </strong></font></td>
  </tr>
  <tr valign="top">
    <td><ul>
      <li>
        <p><a href="test_downloads.php"><font size="2" face="Arial, Helvetica, sans-serif">Download
              User Manual &amp; Timing Guide</font></a></p>
      </li>
      <li>
        <p><a href="test_comment.php"><font size="2" face="Arial, Helvetica, sans-serif" align="left">Give
              a testimonial or comment</font></a></p>
      </li>
      <li>
        <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="mailto:info@silenttimer.com?subject=Book%20Suggestion">Suggest
              a book</a> for our recommended <a href="http://www.silenttimer.com/books/" target="_blank">book
              pages</a></font></p>
      </li>
    </ul>
      <ul>
        <? 
		$Now = date("Y-m-d");
		
		
		
		if($Now >= $PurchaseDate)
		{
		?>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Take the <a href="http://www.silenttimer.com/survey/<? echo $Page; ?>?cust=<? echo $CustomerID; ?>" target="_blank">Post
              Purchase Survey</a> and tell us what you think </font></li>
        <?
		}
		else
		{
		?>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Survey will be
            available on <? echo $PurchaseDate_format; ?> (30 days from date
            of purchase)</font></li>
        <?
		}
		?>
      </ul></td>
  </tr>
  <tr valign="top">
    <td width="50%" rowspan="2"><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font></td>
    <td bgcolor="#FFCC33"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Coming Soon</strong></font></td>
  </tr>
  <tr valign="top">
    <td><ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Testing links</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Special deals
            for previous customers</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Easy re-order</font></li>
    </ul></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><br>

</font></p>
<p align="left">&nbsp;</p>
<p align="left">
<?

		// has side menu, and bottom HTML TAGS - found in local folder
require "include/test_sidemenu.php";

} #end where date is valid
else
{
?>
</p>
<p align="left">&nbsp;</p>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif" align="left">Sorry, but your
    account access has expired.  It has been longer than 6 months since your last
    purchase.  Please <a href="http://www.silenttimer.com/contactus.php">contact
    Customer Service</a> for assistance.</font></p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">
  <?
}
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
		mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";



// finishes security for page
}
else
{
?>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/test_index.php'>
<?
}
?>