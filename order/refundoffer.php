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
		
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database2");
		
		
		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
		if($z == 7)
		{
			$sql3 = "INSERT INTO tblRebate(DateTime, Link, IP)
			VALUES ('$now', 'refundoffer.php', '$IP')";
			//echo $sql3;
			mysql_query($sql3) or die("Cannot insert email, please try again.");
		}
		
		
		
		

?> 
<title>Refund Offer</title>
<table width="600" height="800"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="26%" rowspan="2" valign="top" bordercolor="#FFFFFF"><div align="center">
      <p><strong><font size="6" face="Arial, Helvetica, sans-serif">REFUND OFFER </font></strong></p>
    </div></td>
    <td width="74%"><p align="center"><font size="6"><strong>Receive up to $6<br>
            <font size="4">towards the purchase of an additional timer or watch
            for the Feb. LSAT exam</font></strong></font></p>
    </td>
  </tr>
  <tr>
    <td>This offer is only valid for our online customers, and those
      that can provide a receipt showing purchase of The Silent Timer at a retail
      store. </td>
  </tr>
  <tr>
    
	
	
	<td colspan="2"><p><font size="3" face="Times New Roman, Times, serif"><strong><u>In order
      to receive your refund check: </u></strong></font></p>      <ol>
        <li><font size="3" face="Times New Roman, Times, serif">Buy a timer or
            watch from a retail store.</font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Photocopy your
            receipt.</font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Cut out the
            UPC symbol from the box or packaging.</font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Fill out the form
            on this sheet.</font>        </li>
        <li><font size="3" face="Times New Roman, Times, serif"> Mail UPC symbol,
            form, and photocopy of purchase receipt, and photocopy of retail
            store Silent Timer purchase (if applicable) to:</font>
          <blockquote>
            <p><font size="3" face="Times New Roman, Times, serif"><strong>Silent Technology LLC<br>
              ATTN: Refund Offer<br>
              9111 Jollyville Road, Suite 245 <br>
              Austin, TX 78759</strong></font></p>
          </blockquote>
        </li>
      </ol>      
      <p><font size="3" face="Times New Roman, Times, serif">Please print legibly.<strong> Refund
    offer expires Feb. 4, 2006.</strong></font></p></td>
  </tr>
  <tr bordercolor="#000000">
    <td colspan="2"><table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#000000">
        <tr>
          <td><p align="left"><font size="3" face="Times New Roman, Times, serif">Name:___________________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">Address:_________________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">City, State
                Zip:_____________________________________________________________</font></p>
            <p><font size="3" face="Times New Roman, Times, serif">Purchase Order
                # or Store Purchased From: ____________________(include
                receipt if store) </font></p>
          <p><font size="3" face="Times New Roman, Times, serif">Email:___________________________________________________________________</font></p></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td colspan="2"><p><font size="2" face="Times New Roman, Times, serif">      Receive
          up to $6 for the purchase of a timer or watch from a retail store.
          The purchase must have been made on or before February 4, 2006. Offer
          valid on purchases of eligible products from Jan. 26, 2006 through
          Feb 4, 2006. For check delivery, please allow 2-4 weeks following
          receipt of properly completed refund submission. Funds are issued in
          U.S. dollars. Submission must be postmarked no later than Feb. 10,
          2006, must include copies of dated purchase receipt and eligible product
          UPC code. Offer invalid for online or telephone orders. Offer invalid
          and refund checks are void if not cashed within 90 days of issuance.
          Silent Technology LLC reserves the right to request additional information
          to validate a claim, making it subject to U.S. postal regulations.
          Offer void where prohibited, taxed or restricted by law. Silent Technology
          LLC is not responsible for claims lost, damaged, or delayed in transit.
          Submitted materials become Silent Technology LLC property. Products
          for which refund is claimed may not be returned. Offer valid only in
          the United States, excluding territories. Store name must be clearly
          printed on receipt. &copy; 2006
          Silent Technology LLC. All rights reserved. Information provided by
          you through participation in refund or premium programs is protected
          and governed in accordance with Silent Technology LLC's Privacy Policy.
          To view our Privacy Policy visit http://silenttimer.com/legal/privacy.php.</font></p>
    </td>
  </tr>
</table>