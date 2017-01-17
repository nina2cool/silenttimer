<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

$PageTitle = "Silent Timer Partner - Previous Reports";

//security check
If (session_is_registered('a'))
{

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

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
		$Rate = $row[Rate];
	}

?>

	
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Reporting 
  Tools </strong></font></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="70%" align="left" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Previous 
        Reports<br>
        </strong></font><font size="2" face="Arial, Helvetica, sans-serif"> Select 
        a r<strong>ange of dates</strong> to report on a certain period. Or, select 
        a <em><strong>payment period</strong></em> from the dropdown list. Click 
        &quot;<strong>New Report</strong>&quot; when you are done selecting your 
        report criteria.</font></p>
      <form name="form1" method="post" action="previousreport.php">
        <p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong>
          <input name="report" type="radio" value="date" checked <? if($Report == "date") {echo "checked";}?>>
          Date Range</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr> 
            <td width="50%"><strong><font size="2" face="Arial, Helvetica, sans-serif">From<br>
              </font> </strong> <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr> 
                  <td width="14%"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <select name="DateMonth">
                      <option value="01" <? if($m == "01"){echo "selected";}?>>January</option>
                      <option value="02" <? if($m == "02"){echo "selected";}?>>February</option>
                      <option value="03" <? if($m == "03"){echo "selected";}?>>March</option>
                      <option value="04" <? if($m == "04"){echo "selected";}?>>April</option>
                      <option value="05" <? if($m == "05"){echo "selected";}?>>May</option>
                      <option value="06" <? if($m == "06"){echo "selected";}?>>June</option>
                      <option value="07" <? if($m == "07"){echo "selected";}?>>July</option>
                      <option value="08" <? if($m == "08"){echo "selected";}?>>August</option>
                      <option value="09" <? if($m == "09"){echo "selected";}?>>September</option>
                      <option value="10" <? if($m == "10"){echo "selected";}?>>October</option>
                      <option value="11" <? if($m == "11"){echo "selected";}?>>November</option>
                      <option value="12" <? if($m == "12"){echo "selected";}?>>December</option>
                    </select>
                    </font></strong></td>
                  <td width="8%"> <strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <select name="DateDay">
                      <? 
					  		for($i=1;$i<=31;$i++) // count out days in month...
							{
					  ?>
                      <option value="<? echo $i;?>" <? if($d == $i){echo "selected";}?>><? echo $i;?></option>
                      <?
					  		}
						
							$year = date("Y");
					  ?>
                    </select>
                    </font></strong></td>
                  <td width="78%"> <strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <select name="DateYear">
                      <option value="<? echo ($year-1);?>" <? if($y == ($year-1)){echo "selected";}?>><? echo ($year-1);?></option>
					  <option value="<? echo $year;?>" <? if($y == $year){echo "selected";}?>><? echo $year;?></option>
                      <option value="<? echo ($year+1);?>" <? if($y == ($year+1)){echo "selected";}?>><? echo ($year+1);?></option>
                    </select>
                    </font></strong></td>
                </tr>
              </table></td>
          </tr>
          <tr> 
            <td width="50%"><strong><font size="2" face="Arial, Helvetica, sans-serif">To<br>
              </font> </strong> <table width="100%" border="0" cellspacing="0" cellpadding="2">
                <tr> 
                  <?
					# if no date is entered, make todays date show up as default...
					if($m2 == "")
					{
						$m2 = date("m");
						$d2 = date("d");
						$y2 = date("Y");
					}
				?>
                  <td width="14%"><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <select name="DateMonth2" id="DateMonth2">
                      <option value="01" <? if($m2 == "01"){echo "selected";}?>>January</option>
                      <option value="02" <? if($m2 == "02"){echo "selected";}?>>February</option>
                      <option value="03" <? if($m2 == "03"){echo "selected";}?>>March</option>
                      <option value="04" <? if($m2 == "04"){echo "selected";}?>>April</option>
                      <option value="05" <? if($m2 == "05"){echo "selected";}?>>May</option>
                      <option value="06" <? if($m2 == "06"){echo "selected";}?>>June</option>
                      <option value="07" <? if($m2 == "07"){echo "selected";}?>>July</option>
                      <option value="08" <? if($m2 == "08"){echo "selected";}?>>August</option>
                      <option value="09" <? if($m2 == "09"){echo "selected";}?>>September</option>
                      <option value="10" <? if($m2 == "10"){echo "selected";}?>>October</option>
                      <option value="11" <? if($m2 == "11"){echo "selected";}?>>November</option>
                      <option value="12" <? if($m2 == "12"){echo "selected";}?>>December</option>
                    </select>
                    </font></strong></td>
                  <td width="8%"> <strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <select name="DateDay2" id="DateDay2">
                      <? 
					  		for($i=1;$i<=31;$i++) // count out days in month...
							{
					  ?>
                      <option value="<? echo $i;?>" <? if($d2 == $i){echo "selected";}?>><? echo $i;?></option>
                      <?
					  		}
						
							$year = date("Y");
					  ?>
                    </select>
                    </font></strong></td>
                  <td width="78%"> <strong><font size="2" face="Arial, Helvetica, sans-serif"> 
                    <select name="DateYear2" id="DateYear2">
                      <option value="<? echo ($year-1);?>" <? if($y2 == ($year-1)){echo "selected";}?>><? echo ($year-1);?></option>
					  <option value="<? echo $year;?>" <? if($y2 == $year){echo "selected";}?>><? echo $year;?></option>
                      <option value="<? echo ($year+1);?>" <? if($y2 == ($year+1)){echo "selected";}?>><? echo ($year+1);?></option>
                    </select>
                    </font></strong></td>
                </tr>
              </table></td>
          </tr>
        </table>
        <p><font size="2" face="Arial, Helvetica, sans-serif"> <strong>
          <input type="radio" name="report" value="payment" <? if($Report == "payment") {echo "checked";}?>>
          Payment Period</strong></font></p>
        <table width="100%" border="0" cellspacing="0" cellpadding="8">
          <tr>
            <td><select name="CheckDate" id="CheckDate">
                <option selected>Select Payment Date</option>
                <option>--------------</option>
				<?
				# get total commission for this affiliate
				$sql = "SELECT PaymentID, DATE_FORMAT(DateTime, '%m/%d/%y') AS Date, Amount, StartPurchase FROM tblAffiliatePayment WHERE AffiliateID = '$aID'";
				$result2 = mysql_query($sql) or die("Cannot calculate total sales.  Please try again.");
						
				while($row = mysql_fetch_array($result2))
				{
					$PaymentID2 = $row[PaymentID];
					$Date = $row[Date];
					$Amount = $row[Amount];
					$StartPID = $row[StartPurchase];
					
					# get total commission for this affiliate
					$sql3 = "SELECT DATE_FORMAT(OrderDateTime, '%m/%Y') AS Date FROM tblPurchase2 WHERE PurchaseID = '$StartPID'";
					$result3 = mysql_query($sql3) or die("Cannot calculate total sales.  Please try again.");
							
					while($row3 = mysql_fetch_array($result3))
					{
						$Period = $row3[Date];
					}
					
				?>
				<option value="<? echo $PaymentID2;?>" <? if($PaymentID == $PaymentID2){echo "selected";}?>><? echo $Period; ?> - $<? echo number_format($Amount,2); ?></option>
				<?
				}
				?>
              </select></td>
          </tr>
        </table>
        <p>
          <input type="submit" name="Submit" value="New Report">
        </p>
        </form>
      
	  <p>&nbsp;</p>
      <p><br>
      </p>
      </td>
    <td width="30%" align="left" valign="top" bgcolor="#FFFFCC"> <table width="100%" border="0" cellspacing="6" cellpadding="0">
        <tr> 
          <td><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif">Sales and Activity</font></strong></td>
        </tr>
        <tr> 
          <td align="right" bgcolor="#000000"><img src=../../../pics/transparent-pixel.gif width=1 height=1 vspace=0 hspace=0></td>
        </tr>
        <tr> 
          <td align="left" valign="top"> <font size="2" face="Arial, Helvetica, sans-serif">
            <p> <font size="2" face="Arial, Helvetica, sans-serif"><a href="index.php"><strong>&gt; 
              Current Pay Period</strong></a><strong><br>
              <a href="previous.php">&gt; Search Previous Pay Periods</a></strong></font><strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><br>
              <a href="payments.php"><font size="2">&gt; Payment History</font></a></font></strong></p>
            </font>
            <p> <strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><a href="terms.php"><font size="2">&gt; 
              Definitions</font></a></font></strong></p>
		  </td>
        </tr>
      </table></td>
  </tr>
</table>
<?
mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";

// finishes security for page
}
else
{
	$http .= "partner";
	header("location: $http"); //redirects user via PHP to this page... better than meta refresh...
}
?>
