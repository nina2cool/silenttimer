<?

		$goto = "../product_detail.php?p=33";
		header("location: $goto");


/*
//security for page
session_start();

# variable sent from page
	$Add = $_POST['add_to_cart'];
	$Cart = $_POST['view_cart'];
if ($Cart == "yes")
{
	header("location: test_shoppingcart.php");

}
	# if supposed to Add...
	if($Add == "yes")
	{
	# variables sent from page
		$tempProductID = $_POST['productID'];
		$tempQuantity =  $_POST['quantity'];
		$tempWeight2 = $_POST['weight'];
	# check if cart is already active... if it is, add item to the array
		if (session_is_registered('PreorderShoppingCart'))
		{
			$k = count($PreorderShoppingCart);
			$added = 'n';
			#echo "a: $k";
			# check if item exists in array add to quantity
			for($i=0; $i < $k; $i++)
			{
				$CurrentQuantity = $PreorderShoppingCart[$i][1];
				$CurrentWeight = $PreorderShoppingCart[$i][2];
				if ($PreorderShoppingCart[$i][0] == $tempProductID) 
				{
					
						$PreorderShoppingCart[$i][1] = $CurrentQuantity + $tempQuantity;
						$PreorderShoppingCart[$i][2] = $CurrentWeight + $tempWeight2;
						$added = 'y';
					
				}
				
			}
			if ($added == 'n') 
				{
					
					$PreorderShoppingCart[$k][0] = $tempProductID;			
					$PreorderShoppingCart[$k][1] = $tempQuantity;
					$PreorderShoppingCart[$k][2] = $tempWeight2;
				}
					
		}
		else # not activated, create session and add product to array...
		{
			session_register('PreorderShoppingCart');
			$k = count($PreorderShoppingCart);
			#echo "b: $k";					
			#$k = 0;			
			$tempQuantity = 1;
			$PreorderShoppingCart[$k][0] = $tempProductID;			
			$PreorderShoppingCart[$k][1] = $tempQuantity;
			$PreorderShoppingCart[$k][2] = $tempWeight2;
			$Quantity = $PreorderShoppingCart[$k][1];
		}
		
	header("location: preorder1.php");
	}
	
// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "include/headerbottom2.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

//connect to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>
<p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr bgcolor="#FFFFCC">
    <td><p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><b><a name="Top"></a>Meet The Silent
            Timer&#8482;&rsquo;s
      NEW Sidekick:</b></font></p>
      <p><font size="3" face="Arial, Helvetica, sans-serif"><b>The LSAT Silent
            Timer&#8482; will now be packaged with a simpler, Bonus Timer at no extra
      cost!</b></font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">The
    Silent Timer&#8482; LSAT Bonus Combo meets all of your preparation and test
    taking needs.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><b><i>LSAT
      Students</i></b>: With this unbeatable combination, you will be able to
      improve your pacing skills through practice with The Silent Timer&#8482;, while using
    the Bonus Timer on test day*.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="#Learn">Learn
            More</a></font></p></td>
    <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><b><font color="#003399" size="4">The
          Bonus Timer </font></b><br>
    <img src="../pics/bonus-red-buttons.jpg" alt="Bonus Timer!" width="135" height="128"></font></div></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b><font color="#FF0000">Please
        Note:</font> The Silent Timer&#8482; LSAT Bonus Combo is NOT currently
        in stock. Our first supply is now sold out, but a new supply will
        be available online by September 11. To make sure you will get yours
        before the September LSAT, preorder it today! </b></font></p>
<form name="Add_To_Cart" method="post" action="">
  <div align="center">
    <p><font size="2" face="Arial, Helvetica, sans-serif"> <a name="Reservation" id="Reservation"></a>
      <input name="productID" type="hidden" value="33">
      <input name="quantity" type="hidden" value="1">
      <input name="weight" type="hidden" value="0.5">
      <input name="Add To Cart" type="image" id="Add To Cart" value="Add To Cart" src="../images/Reservation-red.jpg" width="315" height="56" alt="Make My Reservation!">
      </font>
      <input name="add_to_cart" type="hidden" id="add_to_cart" value="yes">
</p>
  </div>
</form>
<hr noshade>
<p><font color="#003399"><b><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif"><a name="Learn"></a></font><font size="5" face="Arial, Helvetica, sans-serif">2 Timers for the price of 1! </font></b></font></p>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr bgcolor="#003399">
    <td colspan="2"><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif"><b>I. In Practice</b></font>      </td>
  </tr>
  <tr>
    <td width="78%"><p><font size="2" face="Arial, Helvetica, sans-serif">Use The Silent
          Timer&#8482;&rsquo;s <a href="http://silenttimer.com/timer/features.php">unique
          testing features</a> in practice to:</font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Become accustomed to the time constraints of test day</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Learn vital pacing skills and develop an internal pacing clock </font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Finish more questions, on average, than before!</font></li>
    </ul></td>
    <td width="22%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><img src="../gallery/pics/big/front-nice.jpg" alt="The Silent Timer" width="188" height="141"></font></div></td>
  </tr>
</table>
<font size="2" face="Arial, Helvetica, sans-serif"><br>
</font>
<table width="100%"  border="0" cellspacing="0" cellpadding="5">
  <tr bgcolor="#003399">
    <td colspan="2"><font color="#FFFFFF" size="4" face="Arial, Helvetica, sans-serif"><b>II. On Test Day</b></font></td>
  </tr>
  <tr>
    <td><p><font size="2" face="Arial, Helvetica, sans-serif">After improving
          your pacing skills with The Silent Timer&#8482;, use the Bonus Timer on test
          day* to silently keep track of time. </font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">Features:</font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Completely Silent
            - will not distract other test takers!</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Counts Up &amp; Down
        (from 99 min and 59 sec)</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Large LCD read out for easy viewing: 2.2 x 4.4 cm</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Kick Stand</font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif">Simple enough to meet the test day requirements of exams that allow
          digital desktop timers, but do not allow multifunctional timers (such
          as LSAT)</font></li>
    </ul></td>
    <td><font size="2" face="Arial, Helvetica, sans-serif"><img src="../pics/bonus-red-buttons.jpg" alt="Bonus Timer!" width="188" height="177"></font></td>
  </tr>
</table>
<p>  <font size="2" face="Arial, Helvetica, sans-serif"><i> * Bonus Timer meets
      the test day requirements of exams, such as the LSAT, that allow digital
      desktop timers but do not allow multifunctional timers. Please check with
      the exam board of your specific test for most current rules about the use
      of digital desktop timers.</i></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b><font color="#FF0000">Please
        Note:</font> The Silent Timer&#8482; LSAT Bonus Combo is NOT currently
        in stock. Our first supply is now sold out, but a new supply will be
        available online by <em>September 11</em>. To make sure you will get yours before
the September LSAT, preorder it today! </b></font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif"><b>&gt; <a href="preorder_info.php" target="_blank">How does the reservation
    process work?</a></b></font></p>
<p><b><font size="2" face="Arial, Helvetica, sans-serif">&gt; <a href="preorder_faq.php" target="_blank">Pre-order FAQ</a> </font></b></p>
<form name="Add_To_Cart" method="post" action="">
<div align="center"><font size="2" face="Arial, Helvetica, sans-serif">
      <a name="Reservation" id="Reservation"></a>
      <input name="productID" type="hidden" value="33">
      <input name="quantity" type="hidden" value="1">
      <input name="weight" type="hidden" value="0.5">
      <input name="Add To Cart" type="image" id="Add To Cart" value="Add To Cart" src="../images/Reservation.jpg" width="325" height="55" alt="Make My Reservation!">
      </font>	 
	      <input name="add_to_cart" type="hidden" id="add_to_cart" value="yes"> 
  </div>
</form>



<p align="right"><font size="2" face="Arial, Helvetica, sans-serif">^ <a href="#Top">Back to Top </a></font></p>
<p>      <br>
</p>
<?
//}

	
		mysql_close($link);
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenublank.php";
*/

?>