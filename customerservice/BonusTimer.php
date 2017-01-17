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

// has top menu for this page in it, you can change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom.php";


//CODE GOES BELOW-----------------------------------------------------------



	# --------------------------------------------------------------------------------------------
	#   Function to insert back slashes into characters with a single or a double quote in them.
	# --------------------------------------------------------------------------------------------
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
			$string = str_replace("||","\'",$var);
			$string = str_replace('||||','\"',$string);
		}

		return $string;
	}



	$custID = $_SESSION['custID'];
	$CustomerID = $custID;
	
	$Now = date("Y-m-d H:i:s");
	$IP = $_SERVER["REMOTE_ADDR"];

	
	# set up link to DB
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$custID'";
	$result = mysql_query($sql) or die("Cannot execute query customerID!");
		
		while($row = mysql_fetch_array($result))
		{
			
			$FirstName = $row[FirstName];
			$LastName = $row[LastName];
			$Address = $row[Address];
			$Address2 = $row[Address2];
			$City = $row[City];
			$State = $row[State];
			$StateOther = $row[StateOther];
			$ZipCode = $row[ZipCode];
			$CountryID = $row[CountryID];
			$Email = $row[Email];
			$CompanyName = $row[BusinessName];
		}
	

		$sql2 = "SELECT * FROM tblShipLocation WHERE LocationID = '$CountryID'";
		$result2 = mysql_query($sql2) or die("Cannot execute query countryID!");
		
		while($row2 = mysql_fetch_array($result2))
		{
			$Country = $row2[Name];
		}
			
	
		$sql3 = "SELECT Max(PurchaseID) as MaxPurchaseID, OrderDateTime FROM tblPurchase2 WHERE CustomerID = '$CustomerID' GROUP BY PurchaseID";
		//echo $sql3;
		$result3 = mysql_query($sql3) or die("Cannot execute query! purchase ID");
	
		while($row3 = mysql_fetch_array($result3))
		{
				$MaxPurchaseID = $row3[MaxPurchaseID];
				$LastOrderDateTime = $row3[OrderDateTime];
		}
		
		
		$sql4 = "SELECT * FROM tblPurchase2 WHERE PurchaseID = '$MaxPurchaseID'";
		$result4 = mysql_query($sql4) or die("Cannot execute query! purchase2 details");
	
		while($row4 = mysql_fetch_array($result4))
		{
				$TestID = $row4[TestID];
				$Same = $row4[SameAsShip];
				$FirstNameB = $row4[FirstNameB];
				$LastNameB = $row4[LastNameB];
				$AddressB = $row4[AddressB];
				$CityB = $row4[CityB];
				$StateB = $row4[StateB];
				$OtherStateB = $row4[OtherStateB];
				$ZipCodeB = $row4[ZipB];
				$CountryB = $row4[CountryIDB];
				$CardType = $row4[CardType];
				$LastFourCr = $row4[LastFourCr];
				$IsCheck = $row4[IsCheck];
		}
	

	#<Add button being pushed>
	if ($_POST['Order'] == ">> Order my Bonus Timer")
	{
			
			$chkContract = $_POST['chkContract'];
			
			if($chkContract == "y")
			{
			
			
				//Purchase Details Table
				$Notes = $_POST['Comment'];
				$IP = $_POST['IP'];
		
					//now, the customer is in the customer table, we have their customerID....we have all the totals......INSERT order into tblPurchase...
					$sql = "INSERT INTO tblPurchase2(CustomerID, Tax, Subtotal,  Discount, OrderDateTime, 
					ShipCostID, ShippingCost, PromotionCodeID, IP, SameAsShip, FirstNameB, LastNameB, AddressB, CityB, StateB, 
					OtherStateB, CountryIDB, ZipB, Paid, Status, Shipped, Notes, ShipNotes, Preorder, Preordered)
					VALUES ('$CustomerID', '0', '0', '0', '$Now', '37', '5', 
					'bonustimer', '$IP', '$Same', '$FirstNameB', '$LastNameB', '$AddressB', '$CityB', '$StateB',  '$State_OtherB',
					'$CountryB', '$ZipCodeB', 'n', 'active', 'n', '', '$Notes', 'y', 'y')";
		
					mysql_query($sql) or die("Cannot insert purchase, please try again. $sql");
			
						
					//now, get purchase ID for this puchase, and enter info into tblPurchaseDetails......
					$sql2 = "SELECT PurchaseID FROM tblPurchase2 WHERE CustomerID = '$CustomerID' AND IP = '$IP' AND OrderDateTime = '$Now'";
					$result2 = mysql_query($sql2) or die("Cannot get Purchase ID, please try again.");
							
					while($row2 = mysql_fetch_array($result2))
					{
						$PurchaseID = $row2[PurchaseID];
					}

					
					// Insert into purchase details table
					$sql3 = "INSERT INTO tblPurchaseDetails2(PurchaseID, ProductID, Quantity, PurchasePrice, EbayItemNumber, Shipped, Status) 
					VALUES ('$PurchaseID', '27', '1', '0', '', 'n', 'preorder');";
					mysql_query($sql3) or die("Cannot Insert Purchase Details information, try again!");
					
					$sql4 = "UPDATE tblProductNew SET WebInventory = WebInventory - 1 WHERE ProductID = '27'";
					$result4 = mysql_query($sql4) or die("Cannot update WebInventory 1");
					
					$sql5 = "INSERT INTO tblPurchasePreorder(PurchaseID, CardType, LastFourCr, Status, Amount, DateTime)
					VALUES('$PurchaseID', '$CardType', '$LastFourCr', 'active', '$Amount', '$LastOrderDateTime');";
					$result5 = mysql_query($sql5) or die("Cannot insert into tblPurchasePreorder");
					
					mail("$Email, info@silenttimer.com", "Your LSAT Bonus Timer Order", "$FirstName, your request for the Bonus Timer has been received.\n\nIt has been input into our system for shipment by September 15, 2006. You will receive an email receipt once your card has been charged.  When your order has been shipped, you will also receive an email with your tracking number.\n\nIf you have any questions or need help, please email us at info@silenttimer.com. We will be glad to help you!\n\nGood luck!\nThe SilentTimer.com Team\n1-800-552-0325\nwww.SilentTimer.com", "From:The Silent Timer Team<info@silenttimer.com>");
			
					

			}# end of chkContract = "y"
			else
			{
			?>
			<strong><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif">Your
			request was not submitted because the Terms and Conditions were not
			agreed to. Please check the box and try again.</font></strong> 
			<?
			}
			
		?>
		<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/home.php'>
		<?

	
	}#end of submit button

if($IsCheck <> "y")
{
?>
            <p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>&gt; Order
        My LSAT Bonus Timer</strong></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">If you purchased The Silent Timer&#8482; before our bonus timer was available, you
  can purchase it separately for a small $5 charge (for shipping and handling).</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">It will be shipped via
    USPS First Class mail to the same shipping address below (unless you notify
    us otherwise in the comment box). <strong>The bonus timer will not shipped until
    September 15, 2006. </strong></font></p>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellpadding="5" cellspacing="0" bordercolor="#000099">
    <tr bgcolor="#CCCCCC" >
      <td ><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Qty</strong></font></div></td>
      <td ><div align="center"><strong><font color="#000099" size="2" face="Arial, Helvetica, sans-serif">Description</font></strong></div></td>
      <td ><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Price</strong></font></div></td>
      <td ><div align="center"><font color="#000099" size="2" face="Arial, Helvetica, sans-serif"><strong>Total</strong></font></div></td>
    </tr>
    <tr>
      <td align="center"><font size="2" face="Arial, Helvetica, sans-serif">1</font></td>
      <td><p><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><b>LSAT
              Bonus Timer</b></font></p></td>
      <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$
            0.00</font></div></td>
      <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">$
            0.00 </font></div></td>
    </tr>
    <tr >
      <td colspan="3"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>Subtotal</strong></font> </td>
      <td><div align="center"><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><strong>$
              0.00</strong></font></div></td>
    </tr>
    <tr bordercolor="#003399" >
      <td colspan="3"><font  size="2" face="Arial, Helvetica, sans-serif">Shipping
          and Handling Charges </font></td>
      <td><div align="center"><font  size="2" face="Arial, Helvetica, sans-serif">$
            5.00 </font></div></td>
    </tr>
    <tr bordercolor="#003399" >
      <td colspan="3"><font size="2" face="Arial, Helvetica, sans-serif">Tax</font></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif">$
            0.00 </font></div></td>
    </tr>
    <tr bordercolor="#003399" bgcolor="#FFFFCC">
      <td colspan="3"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Total
            (this amount will be charged to your <? echo $CardType; ?> card ending in &quot;<? echo $LastFourCr; ?>&quot;.) </strong></font></td>
      <td><div align="center"><font color="#CC0000" size="2" face="Arial, Helvetica, sans-serif"><strong>$
              5.00 </strong></font></div></td>
    </tr>
  </table>
  <br>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr valign="top">
      <td width="50%"><p><font size="2" face="Arial, Helvetica, sans-serif">Your shipping
            address on file is: </font></p>
        <blockquote>
          <p><font size="2" face="Arial, Helvetica, sans-serif">
            <? if($CompanyName <> "") { ?>
            <? echo $CompanyName; ?><br>
            <? } ?>
            <? echo $FirstName; ?> <? echo $LastName; ?><br>
            <?php echo $Address; ?><br>
            <? if($Address2 <> "") { ?>
            <? echo $Address2; ?><br>
            <? } ?>
            <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
            <?php echo $Country; ?></font></p>
      </blockquote></td>
      <td><p><font size="2" face="Arial, Helvetica, sans-serif">Your billing address on file is: </font></p>
	  <p><font size="2" face="Arial, Helvetica, sans-serif">
	  
	  <? if($Same == "n") { ?>
	  
          <? echo $FirstNameB; ?> <? echo $LastNameB; ?><br>
          <?php echo $AddressB; ?><br>
          <?php echo $CityB; ?>, <?php echo $StateB; ?> <?php echo $ZipCodeB; ?>
          </font></p>
		  
		  <? } else { ?>
		  
		  	<? echo $FirstName; ?> <? echo $LastName; ?><br>
            <?php echo $Address; ?><br>
            <?php echo $City; ?>, <?php echo $State; ?> <?php echo $ZipCode; ?><br>
            <?php echo $Country; ?></font></p>
		  
		  <? } ?>
		  
	  </td>
    </tr>
    <tr>
      <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif">Your shipment notification
      will be e-mailed to: <a href="mailto:<?php echo $Email; ?>"><?php echo $Email; ?></a></font> </td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p><font size="2" face="Arial, Helvetica, sans-serif">If you need to change the shipping address, billing address, or credit card
    to use, please say so in the comment box below:</font></p>
  <p>
    <textarea name="Comment" cols="75" rows="5" id="Comment"></textarea> 
  </p>
  <p><font size="2" face="Arial, Helvetica, sans-serif">Your card will be charged
      upon shipment of the Bonus Timer.</font></p>
  <p>    <font size="2" face="Arial, Helvetica, sans-serif">
    <input name="chkContract" tabindex="21" type="checkbox" id="chkContract" value="y" <? if ($Contract == "y"){echo "checked";}?>>
    <font color="#000000">By checking this box you agree to our <a href="<? echo $http; ?>legal/termscontract.php" target="_blank">Terms
  and Conditions</a>.</font></font><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>*<font color="#000000">  I
  also authorize Silent Technology LLC to charge $5.00 to my <? echo $CardType; ?> credit card ending
  in &quot;</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif"><? echo $LastFourCr; ?></font><font color="#000000">&quot; when the bonus timer is ready for shipment. </font></strong></font></p>
  <p>
    <input name="Order" type="submit" id="Order" value="&gt;&gt; Order my Bonus Timer">
  </p>
</form>
<p></p>
<p></p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

<?
}# end of Is Check <> "y"
else
{
?>
		
<table width="650" height="800"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td bordercolor="#FFFFFF"><div align="center">
      <p><font size="6"><strong>Bonus Timer Request Form </strong></font></p>
    </div>      </td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="left">
      <p>Since you purchased your Silent Timer&#8482; with an electronic check,
        fill out this form to receive your bonus timer.</p>
      <p><strong>The cost is $5 for shipping and handling.</strong> Please make
        checks payable to: Silent Technology LLC.</p>
      </div>
    </td>
  </tr>
  <tr>
	<td>	       
      <p><font size="3" face="Times New Roman, Times, serif"><strong><u><br>
        In order
      to receive your bonus timer: </u></strong></font></p>      <ol>
        <li><font size="3" face="Times New Roman, Times, serif"> Fill out the
        form below.</font></li>
        <li><font size="3" face="Times New Roman, Times, serif">Write a check
            or money order for $5.00 made payable to Silent Technology LLC. </font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Mail the completed
            form and check for $5.00 to:</font>
          <blockquote>
            <p><font size="3" face="Times New Roman, Times, serif"><strong>Silent Technology LLC<br>
              ATTN: Bonus Timer Request <br>
              9111 Jollyville Road, Suite 245 <br>
              Austin, TX 78759</strong></font></p>
          </blockquote>
        </li>
        <li>Once all the above materials have been submitted properly, your bonus
          timer will be mailed to you via USPS First Class mail. The timer will
          not be mailed until September 15, 2006. You will be notified via e-mail
          upon shipment.</li>
      </ol>      
      <p><font size="2" face="Times New Roman, Times, serif">Please print legibly.<strong> Bonus
            timer 
    offer expires October 31, 2006. </strong>Only 1 per customer.</font></p></td>
  </tr>
  <tr bordercolor="#000000">
    <td><table width="100%"  border="1" cellpadding="10" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><p align="left"><font size="3" face="Times New Roman, Times, serif">Name:_________________________________________
                Purchase ID: <? echo $MaxPurchaseID; ?></font></p>
            <p><font size="3" face="Times New Roman, Times, serif">Shipping Address:__________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">City, State
                Zip:____________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">Phone:___________________________
                Test (<em>circle</em>):
                LSAT | MCAT | SAT | ACT | OTHER</font></p>
          <p><font size="3" face="Times New Roman, Times, serif">Email (for shipment
              notification only):____________________________________________</font></p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td><p><font size="2" face="Times New Roman, Times, serif">      Receive
          the bonus timer for $5 following purchase of The Silent Timer&#8482;.
          Offer valid on purchases of eligible products through October 31, 2006.
          For bonus timer shipment, please allow 2 business days  following
          receipt of properly completed  submission (after 9/15/06).  Submission
          must be postmarked no later than October 31, 2006,
          must include a check for $5 made payable to
          Silent Technology LLC. Silent Technology LLC reserves the right to
          request additional information to validate a claim, making it subject
          to U.S. postal regulations. Offer void where prohibited, taxed or restricted
          by law. Silent Technology LLC is not responsible for claims lost, damaged,
          or delayed in transit. Submitted materials become Silent Technology
          LLC property. Products for which bonus timer is claimed may not be
          returned. Offer valid only in the United States, excluding territories.
          Store name must be clearly printed on receipt. &copy; 2006
          Silent Technology LLC. All rights reserved. Information provided by
          you through participation in rebate or premium programs is protected
          and governed in accordance with Silent Technology LLC's Privacy Policy.
          To view our Privacy Policy visit http://silenttimer.com/legal/privacy.php.</font></p>
    </td>
  </tr>
</table>
<?
}
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);

// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
            <meta http-equiv='refresh' content='0;URL=<? echo $http; ?>customerservice/index.php'>
<?
}
?>