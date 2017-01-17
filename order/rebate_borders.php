<?
//security for page
session_start();

//keeps the info from disapearing if there was an error on page.
header("Cache-control : private");
$Custom = "no";

// has http variable in it to populate links on page.
require "../include/url.php";

require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		$ZipCode = $_GET['zip'];
		$BusinessCustomerID = $_GET['rebate'];
		$z = $_GET['z'];
		//$x = $_GET['x'];

		//echo $z;
		
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database2");
		
		
		$now = date("Y-m-d H:i:s");
		
		if($z == 3)
		{
			$sql3 = "INSERT INTO tblRebate(DateTime, BusinessCustomerID, CustomerZipCode, Link)
			VALUES ('$now','$BusinessCustomerID', '$ZipCode', 'storelocator-rebate.php')";
			//echo $sql3;
			mysql_query($sql3) or die("Cannot insert email, please try again.");
			
			$sql4 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
			$result4 = mysql_query($sql4) or die("Cannot get business info");
			
			while($row4 = mysql_fetch_array($result4))
			{
			
				$Name1 = $row4[Name];
				$Address1 = $row4[Address];
				$Address21 = $row4[Address2];
				$Address31 = $row4[Address3];
				$City1 = $row4[City];
				$State1 = $row4[State];
				$Chain1 = $row4[Chain];
				$ZipCode1 = $row4[ZipCode];
			}
			/*
			mail("info@silenttimer.com, dina@silenttimer.com", "Storelocator Rebate:  $Chain1 - $Name1", "This email from storelocator-rebate was submitted on $now...\nBusinessCustomerID: $BusinessCustomerID, Zip Code = $ZipCode...\n$City1, $State1 $ZipCode1", "From:Store Rebate Email<info@silenttimer.com>");
			*/
		}
		
		if($z == 2)
		{
			$sql11 = "INSERT INTO tblRebate(DateTime, BusinessCustomerID, CustomerZipCode, Link)
			VALUES ('$now','$BusinessCustomerID', '$ZipCode', 'rebate.php')";
			//echo $sql11;
			mysql_query($sql11) or die("Cannot insert email, please try again.");
			
			
			$sql4 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
			$result4 = mysql_query($sql4) or die("Cannot get business info");
			
			while($row4 = mysql_fetch_array($result4))
			{
			
				$Name1 = $row4[Name];
				$Address1 = $row4[Address];
				$Address21 = $row4[Address2];
				$Address31 = $row4[Address3];
				$City1 = $row4[City];
				$State1 = $row4[State];
				$Chain1 = $row4[Chain];
				$ZipCode1 = $row4[ZipCode];
			}
			
			/*
			mail("info@silenttimer.com, dina@silenttimer.com", "Order2 Rebate:  $Chain1 - $Name1", "This email was submitted on $now...\nBusinessCustomerID: $BusinessCustomerID, Zip Code = $ZipCode...\n$City1, $State1 $ZipCode1", "From:Rebate Email<info@silenttimer.com>");
			*/
		}
		
		
		if($z == 4)
		{
			$sql3 = "INSERT INTO tblRebate(DateTime, BusinessCustomerID, CustomerZipCode, Link)
			VALUES ('$now','$BusinessCustomerID', '$ZipCode', 'locations_state.php')";
			//echo $sql3;
			mysql_query($sql3) or die("Cannot insert email, please try again.");
			
			
			$sql4 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
			$result4 = mysql_query($sql4) or die("Cannot get business info");
			
			while($row4 = mysql_fetch_array($result4))
			{
			
				$Name1 = $row4[Name];
				$Address1 = $row4[Address];
				$Address21 = $row4[Address2];
				$Address31 = $row4[Address3];
				$City1 = $row4[City];
				$State1 = $row4[State];
				$Chain1 = $row4[Chain];
				$ZipCode1 = $row4[ZipCode];
			}
			/*
			mail("info@silenttimer.com, dina@silenttimer.com", "Locations_State Rebate:  $Chain1 - $Name1", "This email from locations_state was submitted on $now...\nBusinessCustomerID: $BusinessCustomerID...\n$City1, $State1 $ZipCode1", "From:State Rebate Email<info@silenttimer.com>");
			*/
		}
		


		if($z == 5)
		{
			$sql3 = "INSERT INTO tblRebate(DateTime, BusinessCustomerID, CustomerZipCode, Link)
			VALUES ('$now','$BusinessCustomerID', '$ZipCode', 'storelocator-search.php')";
			//echo $sql3;
			mysql_query($sql3) or die("Cannot insert email, please try again.");
			
			
			$sql4 = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
			$result4 = mysql_query($sql4) or die("Cannot get business info");
			
			while($row4 = mysql_fetch_array($result4))
			{
			
				$Name1 = $row4[Name];
				$Address1 = $row4[Address];
				$Address21 = $row4[Address2];
				$Address31 = $row4[Address3];
				$City1 = $row4[City];
				$State1 = $row4[State];
				$Chain1 = $row4[Chain];
				$ZipCode1 = $row4[ZipCode];
			}
			
			/*
			mail("info@silenttimer.com, dina@silenttimer.com", "StoreLocator-Search Rebate:  $Chain1 - $Name1", "This email from storelocator-search was submitted on $now...\nZip Code: $ZipCode...\nwithin $RadiusGiven miles", "From:Search Rebate Email<info@silenttimer.com>");
			*/
		}
		

?> 
<title>Rebate for Borders</title>
<table width="600" height="800"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="30%" rowspan="2" bordercolor="#FFFFFF"><div align="center">
      <p><font size="9"><img src="pics/off2.jpg" width="147" height="127"></font></p>
    </div></td>
    <td colspan="3"><p align="center"><font size="6"><strong>The Silent Timer&#8482;</strong></font></p>
      <p align="center"><font size="4">The <u><em>only</em></u> timer
      made for your test!</font></p>
    <div align="center"></div></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center"><strong><font size="3">$5 </font></strong><font size="3"><strong>Mail-In
            Rebate</strong>
      </font></div>
      <div align="center"><font size="3">Buy at Borders to save $$$!!! </font></div>
    <div align="center"><font size="3"><strong>Expires: December 31, 2005</strong></font></div>      <div align="center"></div></td>
    <td width="26%"><div align="center"><img src="pics/circle.jpg" width="102" height="88"></div></td>
  </tr>
  <tr>
    
	
	
	<td colspan="2">	       
      <p><font size="3"><strong>This Silent Timer Rebate is valid for the
              following Borders location:</strong></font></p>
      <table border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <?	
  

			$sql = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			
			$NumStores2 = mysql_num_rows($result);
			//echo $NumStores2;
			while($row = mysql_fetch_array($result))
			{
				$NameS = $row[Name];
				$AddressS = $row[Address];
				$Address2S = $row[Address2];
				$Address3S = $row[Address3];
				$CityS = $row[City];
				$StateS = $row[State];
				$ZipCodeS = $row[ZipCode];
				$PhoneS = $row[Phone1];
				$WebsiteS = $row[Website];
				$Chain = $row[Chain];
				

				
				

		
  ?>
        <tr>
          <?
  if($Chain <> '')
  {
  ?>
          <td width="400"><p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong> <font color="#666666" size="3"> <font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666" size="3"> <font color="#000000"><? echo $Chain;?></font></font></strong></font> - <font color="#000000"><? echo $NameS;?></font><br>
              </font> </strong> <? echo "$AddressS";?><br>
              <? if($Address2S != ""){echo "$Address2S<br>";}?>
              <? if($Address3S != ""){echo "$Address3S<br>";}?>
              <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
              <strong><? echo "$PhoneS";?></strong><br>
          </font></p></td>
          <?
	}
	else
	{
	?>
          <td width="400"><p> <font size="2" face="Arial, Helvetica, sans-serif"> <strong> <font color="#666666" size="3"> <font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#666666" size="3"> </font></strong></font><font color="#000000"><? echo $NameS;?></font><br>
              </font> </strong> <? echo "$AddressS";?><br>
              <? if($Address2S != ""){echo "$Address2S<br>";}?>
              <? if($Address3S != ""){echo "$Address3S<br>";}?>
              <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?><br>
              <strong><? echo "$PhoneS";?></strong><br>
          </font></p></td>
          <?
	}
	?>
        </tr>
        <?	
  
		
		

  ?>
      </table>
      <p>&nbsp;</p>
      <table width="100%"  border="0" align="center" cellpadding="5" cellspacing="0">
        <tr>
          <td><div align="center"><strong><font size="3" face="Arial, Helvetica, sans-serif">If they
                  don't have it - <br>
  they can order it for you!</font></strong></div></td>
        </tr>
      </table>      
      <br></td>
    <td colspan="2" bordercolor="#FFFFFF"><p align="center"><font size="3" face="Times New Roman, Times, serif"><strong><u>In order to
          receive your rebate check: </u></strong></font></p>
    <ol>
      <li><font size="3" face="Times New Roman, Times, serif">Buy The Silent
          Timer at a participating location of Borders (http://www.silenttimer.com/locations.php)</font></li>
      <li><font size="3" face="Times New Roman, Times, serif"> Photocopy your
          receipt.</font></li>
      <li><font size="3" face="Times New Roman, Times, serif"> Cut out the UPC
          symbol from the box.</font></li>
      <li><font size="3" face="Times New Roman, Times, serif"> Fill out the form
          on this sheet.</font>        </li>
      <li><font size="3" face="Times New Roman, Times, serif"> Mail UPC symbol,
          form, and photocopy of receipt to:</font>
        <blockquote>
          <p><font size="3" face="Times New Roman, Times, serif"><strong>Silent Technology LLC<br>
              ATTN: Rebates<br>
              3415 Greystone Drive, Ste 103<br>
              Austin, TX 78731</strong></font></p>
        </blockquote>
      </li>
      </ol>    
    <p><font size="3" face="Times New Roman, Times, serif">Please print legibly.<strong> Rebate
    offer expires Dec. 31, 2005.</strong></font></p></td>
  </tr>
  <tr bordercolor="#000000">
    <td colspan="4"><table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><p align="left"><font size="3" face="Times New Roman, Times, serif">Name:___________________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">Address:_________________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">City, State
                Zip:_____________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">Test (<em>circle</em>):
                LSAT | MCAT | SAT | ACT | OTHER</font></p>
          <p><font size="3" face="Times New Roman, Times, serif">Email:___________________________________________________________________</font></p></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="4"><p><font size="2" face="Times New Roman, Times, serif">      Receive
          $5 mail-in rebate following purchase of The Silent Timer. Offer valid
          on purchases of eligible products from August 1, 2005 through Dec 31,
          2005. For check delivery, please allow 2-4 weeks following receipt
          of properly completed rebate submission. Submission must be postmarked
          no later than Dec 31, 2005, must include copies of dated purchase receipt
          and eligible product UPC code. Offer invalid for online or telephone
          orders. Offer invalid and rebate checks are void if not cashed within
          90 days of issuance. Silent Technology LLC reserves the right to request
          additional information to validate a claim, making it subject to U.S.
          postal regulations. Offer void where prohibited, taxed or restricted
          by law. Silent Technology LLC is not responsible for claims lost, damaged,
          or delayed in transit. Submitted materials become Silent Technology
          LLC property. Products for which rebate is claimed may not be returned.
          Offer valid only in the United States, excluding territories. Store
          name must be clearly printed on receipt. </font><font size="2" face="Times New Roman, Times, serif">&copy; 2005
          Silent Technology LLC. All rights reserved. Information provided by
          you through participation in rebate or premium programs is protected
          and governed in accordance with Silent Technology LLC's Privacy Policy.
          To view our Privacy Policy visit http://silenttimer.com/legal/privacy.php.</font></p>
      </td>
  </tr>
</table>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
}
mysql_close($link);
?>
