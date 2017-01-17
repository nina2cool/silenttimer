		  </td>
          <td width="43%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php $now = date("M d Y");  echo $now; ?></font></div></td>
        </tr>
      </table>
	 </TD>
	 <TD><IMG SRC="<? echo $http; ?>images/spacer.gif" WIDTH=1 HEIGHT=32 ALT=""></TD>
  </TR>
  <TR> 
    <TD width="661" ROWSPAN=2 align="left" valign="top"><div align="left"> 
        <table width="100%" border="0" cellspacing="0" cellpadding="7" class = "main">
          <tr>
            <td>
	
	<?
	# show on all pages accept...
	if($REQUEST_URI != "/testhome/sat-act-silent-timer.php" AND $REQUEST_URI != "/testhome/sat-act-silent-timer.php?a=cb")
	{
	?>
			
<script>
	function lockButton(buttonValue)
	{
		if (buttonValue == "Go")
		{
			document.frmZipSubmit.SubmitStoreLocation.value = "Searching...";
			return true;
			//alert(document.frmZipSubmit.Order.value);
		}
		else
		{
			alert ("Searching...");
			return false;
		}
	}
</script>
			
			
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="61%" valign="top"> <div align="left"> 
                <form action="<?echo $http;?>storelocator.php" method="post" name="frmZipSubmit" id="frmZipSubmit" onSubmit=" return lockButton(document.frmZipSubmit.SubmitStoreLocation.value);">
                  <table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr> 
                      <td width="64%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Find
                              <u>The Silent Timer</u> in a store near you<em><br>
                              <font size="1" face="Arial, Helvetica, sans-serif"> <i><a href="<? echo $http; ?>location_search.php"><font size="1" face="Arial, Helvetica, sans-serif">Customize
                              your store search</font></a></i> | <a href="http://silenttimer.com/locations_country.php?country=CA">Canadian
                              Stores</a> </font></em></font></div></td>
                      <td width="36%">&nbsp;</td>
                    </tr>
                  </table>
                   
                </form>
                </div></td>
            <td width="1%" valign="middle"> <div align="center">
              <map name="MapMap">
                  <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
                </map>
            </div></td>
            <td width="32%" valign="middle"><div align="left"> 
                <p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customerservice">My
                Account</a> | <a href="<? echo $http; ?>shoppingcart.php">Shopping Cart</a> </font></p>
            </div></td>
            <td width="6%" valign="middle"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>shoppingcart.php"><img src="http://www.silenttimer.com/images/cart.jpg" alt="Shopping Cart" width="25" height="25" border="0"></a></font></div></td>
          </tr>
        </table>
     
		<map name="Map">
		  <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
		</map>

	<?
	}
	?>
          