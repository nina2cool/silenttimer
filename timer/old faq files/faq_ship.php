<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> 
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><a name="top"></a>FAQ
      - Shipping and Returns</strong></font></p>
<table width="100%" border="0">
  <tr>
    <td width="50%" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Shipping Questions</strong></font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#1">When will my order
          be shipped?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#2">How do I know my order was shipped?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#3">What is my tracking number?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#4">What
          company do you use for shipping?</a></font></li>
        <li><a href="#16"><font size="2" face="Arial, Helvetica, sans-serif">How are the shipping options and shipping charges derived?</font> </a></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#5">What
              happens if it arrives when I&rsquo;m
            not home?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#6">How long will it take to get to me?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#7">I paid for Express, but my
          timer arrived late. What do I do?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#8">What happens if my order gets
            lost or damaged during shipping?</a></font></li>
    </ul></td>
    <td width="50%" valign="top"><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Returns, Exchanges, and Refunds</strong></font></p>
      <ul>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#9">What is the procedure for returning my timer?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#10">What is the procedure for
          getting a replacement timer?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#11">Under what conditions will my timer be replaced?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#12">When
          will my refund be processed?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#13">How do I know my refund was processed?</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#14">My
          card was charged twice.</a></font></li>
        <li><font size="2" face="Arial, Helvetica, sans-serif"><a href="#15">The charge on my credit card is wrong.</a></font></li>
    </ul></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">  If you still need more help or information after browsing through the site, 
  don't hesitate to <a href="../contactus.php">contact us</a> at any time. We 
  even have AOL instant messenger (screen name: SilentTimer) so that we may serve 
  you better!</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">Check out the <a href="../warranty.php">warranty</a>  page to read about our limited six month warranty.</font></p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="faq.php">Back
      to FAQ Home Page</a><br>
</font></p>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Shipping FAQ </font></strong></p>
<table width="100%" border="0" cellspacing="0" cellpadding="8">
  <tr> 
    <td width="97%" bgcolor="#FFFFCC"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="1"></a></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong>When
                        will my order be shipped? </strong></font></strong></font></strong></font></strong></font></strong></td>
    <td width="3%" align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p><font size="2" face="Arial, Helvetica, sans-serif">Domestic orders received prior to 3:00PM are usually
        shipped that same business day, if not the next business day. International
        orders are shipped within 3 business days. Ship times may vary depending
        on holidays and order volume. You will be notified if your order will
        be delayed longer than 3 business days.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><font size="2" face="Arial, Helvetica, sans-serif"><br>
    </font></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="2"></a>How
              do I know my order was shipped? </strong></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2" align="left"> <p><font size="2" face="Arial, Helvetica, sans-serif">You will receive an email confirmation with
        your tracking number. Remember to check your junk mail or spam folders
        for the email as sometimes they get filtered out (especially with Hotmail
        account users). You can also email <a href="mailto:info@silenttimer.com">info@silenttimer.com</a> or
        call 800-552-0325.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="3"></a>What
          is my tracking number? </strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr valign="top"> 
    <td colspan="2" align="left"> <p><font size="2" face="Arial, Helvetica, sans-serif">Your tracking number is located in the Shipment
        Confirmation email that is sent to you after your order has been shipped.
        International orders shipped through the <a href="http://www.usps.com" target="_blank">US
        Post Office</a> will not have
        a tracking number. <a href="../contactus.php">Contact us</a> if you have any questions.</font></p>      
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="4"></a>What
              company do you use for shipping? </strong></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">We
          currently use <a href="http://www.dhl-usa.com" target="_blank">DHL</a> for
          domestic shipping; US Post Office (<a href="http://www.usps.com" target="_blank">USPS</a>)
          for post office boxes, military addresses, and offshore US locations.
        We also use the USPS for most international orders. The options available
          may vary, depending on where you live, when you order, or what companies
          we have available. </font></p>      
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
      </p></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC"><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="16" id="16"></a>How
              are the shipping options and shipping charges derived? </strong></font></strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr>
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">The
          shipping options depend on the weight and size of the items you purchased,
          as well as your location. Some items are so small that they can be
          mailed through USPS with a regular stamp. Others are large and need
          to be shipped with another carrier. For example, we usually use USPS
          for international shipments because it is more economical and just
          as reliable as DHL, UPS, or FedEx. </font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">The shipping charges
          depend on  which shipping option you chose. For example, express
          shipments will be more expensive than ground shipments. The more items
          you purchase (higher weight) will also increase shipping charges.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a><br>
      </p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="5"></a>What
          happens if it arrives when I'm not home? </strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"> <div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong></strong></font></strong></font></strong></font></strong></font><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p><font size="2" face="Arial, Helvetica, sans-serif">In
          most cases, the DHL driver will leave it on your doorstep if the driver
          feels that it will be safe there. They may also return it to the local
          station, where you can pick it up after making arrangements with DHL.
          If you live in an apartment complex or condo, check with the office
          to see if it was delivered there. If you have questions about your
          package&rsquo;s
          location and status, call <a href="http://www.dhl-usa.com" target="_blank">DHL</a> directly at 1-800-CALL-DHL. The US Post
          Office (<a href="http://www.usps.com" target="_blank">USPS</a>) will leave it in your mail box, or if it is too large,
          they will return it to the station. Call USPS at 1-800-ASK-USPS.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a><br>
    </p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="6"></a>How
          long will it take to get to me?</strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">Once a ground order has been shipped through DHL, it will
        take 2-4 business days, depending on your relative proximity to Austin,
        Texas. You can go to <a href="http://www.dhl-usa.com/TransitTimes/USTTimeStart.asp?nav=TransitTimes" target="_blank">http://www.dhl-usa.com/TransitTimes/USTTimeStart.asp?nav=TransitTimes</a> (enter
        the origin postal code as 78731) and it will calculate the transit time.
        International shipments through US Post Office (<a href="http://www.usps.com" target="_blank">USPS</a>) are usually between
        5 and 8 business days (the transit times are faster for residents in
        major cities as opposed to more rural areas). Regular Priority shipments
        via USPS take 2-3 business days.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif"><a href="map.php" target="_blank">You can estimate
          DHL shipping time with this map.</a> </font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
        Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="7" id="7"></a>I
          paid for Express, but my order arrived late. What do I do? </strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr align="left" valign="top"> 
    <td colspan="2"> <p><font size="2" face="Arial, Helvetica, sans-serif">Call us at 800-552-0325 and let us know the situation.
        We will refund the difference.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
  <tr> 
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="8" id="8"></a>What
    happens if my order gets lost or damaged during shipping? </strong></font></td>
    <td align="center" valign="top" bgcolor="#003399"><div align="center"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></div></td>
  </tr>
  <tr> 
    <td colspan="2"> <p><font size="2" face="Arial, Helvetica, sans-serif">If
          your order is damaged during shipping, please let us know immediately.
          Our company will file a complaint again the shipper. <a href="forms/Replacement_Form_53105.pdf" target="_blank">Fill
          out this form</a>, and return the damaged product to us along with
          a description of what happened. We will ship new items to you as soon
          as possible.</font></p>      
      <p><font size="2" face="Arial, Helvetica, sans-serif">If you suspect that
          your timer was lost or stolen during shipping, please contact the shipping
          carrier first. They have more up-to-date information to work with.
          Then call us and let us know the status, so that we may send you replacement
          items if necessary.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^ 
    Back to Top</font></strong></a></p></td>
  </tr>
</table>
<br>
<p><strong><font size="3" face="Arial, Helvetica, sans-serif">Returns, Exchanges, and Refunds </font></strong></p>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="9" id="9"></a>What
          is the procedure for returning my timer? </strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p><font size="2" face="Arial, Helvetica, sans-serif">You
          may return your timer for a full refund within 30 days of your purchase.
          If it is longer than 30 days, the ability to return it and the amount
          is subject to management approval. <a href="forms/Return_Form_53105.pdf" target="_blank">Fill
        out this form</a> and
        follow the instructions outlined.</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">We DO NOT refund
          shipping costs or any other costs incurred by you,
          only the cost of the product. If you ordered your timer with free shipping,
          you will get the full $29.95. If you ordered extra products or overnight
          shipping, only $29.95 will be returned. If you have questions, <a href="../contactus.php">contact
          us</a>.</font></p>
      <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="10" id="10"></a>What
          is the procedure for getting a replacement timer? </strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p> <font size="2" face="Arial, Helvetica, sans-serif">If
          there is something wrong and it is covered in our <a href="../warranty.php">6-month
          limited warranty</a>        (See THE SILENT TIMER &trade; Manual),
          the product must be returned in the original condition, and in the
          original packaging. As soon as we have the broken product, a new one
          will be shipped within 24 hours at our cost. If it is not covered or
          for any other problems,
          <a href="../contactus.php">contact us</a> for more help.</font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="11" id="11"></a>Under
          what conditions will my timer be replaced? </strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p> <font size="2" face="Arial, Helvetica, sans-serif">Your
          timer will be replaced if the defects or damage are covered in our <a href="../warranty.php">6-month
          limited warranty</a>. Refer to your manual for
        more information.</font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="12" id="12"></a>When
          will my refund be processed? </strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p> <font size="2" face="Arial, Helvetica, sans-serif">Your
          refund will be processed within 5 business days upon receipt of the
          returned product. An email confirmation will be sent to the email address
          provided on the form. It may take up to two weeks for the return to
          show up on your credit card statement. </font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="13" id="13"></a>How
          will I know if my refund was processed? </strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p> <font size="2" face="Arial, Helvetica, sans-serif">You
          will receive an email confirmation to the email address you provided.
          Don&rsquo;t
          forget to check your junk mail or spam folders in case it was filtered
          out. You will also see the refund posted on your credit card statement
          within two weeks of processing. As always, <a href="../contactus.php">contact
          us</a> if you need more
          help. </font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="14" id="14"></a>My
          card was charged twice. </strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p> <font size="2" face="Arial, Helvetica, sans-serif">If you card was charged twice, please contact us to find
        out what is wrong. We will refund the extra charge once it has been determined
        to be an error. </font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="8" cellspacing="0">
  <tr>
    <td width="97%" bgcolor="#FFFFCC"><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><strong><a name="15" id="15"></a>The
          charge on my credit card is incorrect. </strong></font></td>
    <td bgcolor="#003399"><strong><font color="#FFFFFF" size="2" face="Arial, Helvetica, sans-serif">&lt;</font></strong></td>
  </tr>
  <tr>
    <td colspan="2"><p> <font size="2" face="Arial, Helvetica, sans-serif">If you feel you were charged incorrectly, please <a href="../contactus.php">contact
        us</a>.</font></p>
        <p align="right"><a href="#top"><strong><font size="2" face="Arial, Helvetica, sans-serif">^
                Back to Top</font></strong></a></p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p><font size="2" face="Arial, Helvetica, sans-serif">&lt; <a href="faq.php">Back
to FAQ Home Page</a></font></p>
<p align="left">&nbsp;</p>
            <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "../include/sidemenu.php";
?>