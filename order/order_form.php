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

		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database2");
		
		
		$now = date("Y-m-d H:i:s");
		$IP = $_SERVER["REMOTE_ADDR"];
		
		
		
		$sql11 = "INSERT INTO tblRebate(DateTime, Link, IP)
		VALUES ('$now','order_form.php', '$IP')";
		//echo $sql11;
		mysql_query($sql11) or die("Cannot insert email, please try again.");
				
	
		mail("info@silenttimer.com", "Order Form Download", "Someone viewed the order form page", "From:The Silent Timer Team<info@silenttimer.com>");



		

?> 
<title>Order Form</title>
<table width="600" height="800"  border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td width="30%" bordercolor="#FFFFFF"><div align="center">
      <p><img src="../images/Logo.jpg" width="190" height="123"></p>
    </div></td>
    <td colspan="3"><p align="center"><font size="5"><strong>The Silent Timer&#8482;</strong></font></p>
      <p align="center"><strong><font size="6">Order Form </font></strong></p>
      <p align="center"><font size="4">The <u><em>only</em></u> timer
      made for your test!</font></p>
    <div align="center"></div></td>
  </tr>
  <tr>
    
	
	
	<td colspan="4"><p><font size="3" face="Times New Roman, Times, serif"><strong><u>To
              order via mail: </u></strong></font></p>      <ol>
        <li><font size="3" face="Times New Roman, Times, serif">Fill out this form
            in full. PRINT LEGIBLY.</font></li>
        <li><font size="3" face="Times New Roman, Times, serif">Choose your method
            of payment. If paying by check, enclose check with order form. If paying
            by credit card, include credit card information on this form. </font></li>
        <li><font size="3" face="Times New Roman, Times, serif"> Mail the form
            and check (if applicable) to:</font>
          <blockquote>
            <p><font size="3" face="Times New Roman, Times, serif"><strong>Silent
                  Technology LLC<br>
              ATTN: Orders <br>
              9111 Jollyville Road, Suite 245 <br>
              Austin, TX 78759</strong></font></p>
          </blockquote>
        </li>
    </ol>      <p><font size="3" face="Times New Roman, Times, serif">Please print legibly.</font></p></td>
  </tr>
  <tr bordercolor="#000000">
    <td colspan="4"><p>Product Information:</p>
      <table width="100%"  border="1" cellspacing="0" cellpadding="5">
	  <?
	  
	  
		  $sql2 = "SELECT * FROM tblProductNew WHERE OnHand > '0' AND Status = 'active' ORDER BY Nickname";
		//put SQL statement into result set for loop through records
		$result2 = mysql_query($sql2) or die("Cannot execute query!");

	  ?>

        <tr>
          <td><div align="center"><strong>Product</strong></div></td>
          <td><div align="center"><strong>Unit Price </strong></div></td>
          <td><div align="center"><strong>Qty</strong></div></td>
          <td><div align="center"><strong>Subtotal</strong></div></td>
        </tr>
        <tr>
		
		<?
		
				while($row2 = mysql_fetch_array($result2))
				{
				$ProductID = $row2[ProductID];
				$ProductName = $row2[ProductName];
				$ISBN = $row2[ISBN];
				$Description = $row2[Description];
				$Price = $row2[OnlinePrice];
				$RetailPrice = $row2[RetailPrice];
				$Quantity = 1;
				$ImageID = $row2[ImageID];
				$Weight = $row2[Weight];
				$WebInventory = $row2[WebInventory];
				$FreeShipping = $row2[FreeShipping];
				$Priority = $row2[Priority];
	  
		
		
		?>
		
          <td><? echo $ProductName; ?></td>
          <td><div align="right">$ <? echo $Price; ?></div></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr> 
        <?
		  }
		  ?>
	
		  
      </table>      
      <p>&nbsp;</p>
      <p><br>
      </p>
      <table width="42%"  border="1" align="right" cellpadding="5" cellspacing="0">
        <tr>
          <td width="35%">Shipping Cost </td>
          <td width="65%">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>      
      <p>&nbsp; </p></td>
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
    <td colspan="4"><p><font size="2" face="Times New Roman, Times, serif">      </font></p>
    </td>
  </tr>
</table>
<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

mysql_close($link);
?>
