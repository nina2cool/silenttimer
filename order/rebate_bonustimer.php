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
		
		$z = $_GET['z'];

		//echo $z;
		
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database2");
		
		
		$now = date("Y-m-d H:i:s");
		
		if($z == 6)
		{
			$sql3 = "INSERT INTO tblRebate(DateTime, Link)
			VALUES ('$now', 'rebate-bonustimer.php')";
			//echo $sql3;
			mysql_query($sql3) or die("Cannot insert email, please try again.");
			
			/*
			mail("info@silenttimer.com, dina@silenttimer.com", "Storelocator Rebate:  $Chain1 - $Name1", "This email from storelocator-rebate was submitted on $now...\nBusinessCustomerID: $BusinessCustomerID, Zip Code = $ZipCode...\n$City1, $State1 $ZipCode1", "From:Store Rebate Email<info@silenttimer.com>");
			*/
		}
		
		mysql_close($link);

?> 
<title>Bonus Timer Request Form</title>
<table width="650" height="800"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td bordercolor="#FFFFFF"><div align="center">
      <p><font size="6"><strong>Bonus Timer Request Form </strong></font></p>
    </div>      </td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><div align="left">
      <p>If you purchased your Silent Timer&#8482; at
        a local bookstore, fill out this form to receive your bonus timer.</p>
      <p><strong>The cost is $5 for shipping and handling.</strong> Please make
        checks payable to: Silent Technology LLC.</p>
      </div>
    </td>
  </tr>
  <tr>
	<td>	       
      <p><font size="3" face="Times New Roman, Times, serif"><strong><u>In order
      to receive your bonus timer: </u></strong></font></p>      <ol>
        <li><font size="3" face="Times New Roman, Times, serif">You must have
            bought The Silent Timer&#8482; at a participating bookstore location
            within the past 6 months (http://www.silenttimer.com/locations.php)</font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Photocopy your
            receipt.</font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Cut out the
            UPC symbol from the box. <em><font size="2">If you already submitted your UPC symbol
            for a mail-in rebate, please call 800-552-0325 for an authorization
            code. AUTH code: _______. </font></em></font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Fill out the
            form below.</font></li>
        <li><font size="3" face="Times New Roman, Times, serif">Write a check
            or money order for $5.00 made payable to Silent Technology LLC. </font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Mail UPC symbol,
            form, check for $5.00, and photocopy of receipt to:</font>
          <blockquote>
            <p><font size="3" face="Times New Roman, Times, serif"><strong>Silent Technology LLC<br>
              ATTN: Bonus Timer Request <br>
              PO Box 27037 <br>
              Austin, TX 78755</strong></font></p>
          </blockquote>
        </li>
        <li>Once all the above materials have been submitted properly, your bonus
          timer will be mailed to you via USPS First Class mail. You
          will be notified via e-mail upon shipment.</li>
      </ol>      
      <p><font size="2" face="Times New Roman, Times, serif">Please print legibly.<strong> Bonus
            timer 
    offer expires November 30, 2006. </strong>Only 1 per customer.</font></p></td>
  </tr>
  <tr bordercolor="#000000">
    <td><table width="100%"  border="1" cellpadding="10" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><p align="left"><font size="3" face="Times New Roman, Times, serif">Name:___________________________________________________________________</font></p>
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
          Offer valid on purchases of eligible products through November 30,
          2006. For bonus timer shipment, please allow 2 business days following
          receipt of properly completed  submission.  Submission
          must be postmarked no later than November 30, 2006,
          must include copies of dated purchase receipt,  eligible product
          UPC code (or authorization code), and check for $5 made payable to
          Silent Technology LLC. Offer invalid for online or telephone orders.
           Silent Technology LLC reserves the right to request additional
          information to validate a claim, making it subject to U.S. postal regulations.
          Offer void where prohibited, taxed or restricted by law. Silent Technology
          LLC is not responsible for claims lost, damaged, or delayed in transit.
          Submitted materials become Silent Technology LLC property. Products
          for which bonus timer is claimed may not be returned. Offer valid only
          in the United States, excluding territories. Store name must be clearly
          printed on receipt. &copy; 2006
          Silent Technology LLC. All rights reserved. Information provided by
          you through participation in rebate or premium programs is protected
          and governed in accordance with Silent Technology LLC's Privacy Policy.
          To view our Privacy Policy visit http://silenttimer.com/legal/privacy.php.</font></p>
    </td>
  </tr>
</table>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
?>
