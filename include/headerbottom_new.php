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
			
			<table width="100%" border="0" cellspacing="0" cellpadding="2">
          <tr> 
            <td width="61%" valign="top"> <div align="left"> 
                <form action="<?echo $http;?>storelocator.php" method="post" name="frmZipSubmit" id="frmZipSubmit">
                  <table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr> 
                      <td width="64%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Find
                              The Silent Timer in a store near you:<em><br>
                              <font size="1" face="Arial, Helvetica, sans-serif">Enter
                              your U.S. zip code</font></em></font></div></td>
                      <td width="36%"><input name="ZipCode" type="text" id="ZipCode2" size="7" maxlength="5">
                        <input name="SubmitStoreLocation" type="submit" id="SubmitStoreLocation" value="Go">
                        <img src="../images/BN_college_notso_small.jpg" width="52" height="15"><img src="../images/Borders_notso_small.jpg" width="46" height="15"> </td>
                    </tr>
                  </table>
                  <font size="2" face="Arial, Helvetica, sans-serif"></font> 
                </form>
                <font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                </strong></font></div></td>
            <td width="1%" valign="middle"> <div align="center">
              <map name="MapMap">
                  <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
                </map>
            </div></td>
            <td width="32%" valign="middle"><div align="left"> 
                <p align="right"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customerservice">My
                Account</a> | <a href="<? echo $http; ?>shoppingcart.php">Shopping Cart</a> </font></p>
            </div></td>
            <td width="6%" valign="middle"><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>shoppingcart.php"><img src="../images/cart.jpg" alt="Shopping Cart" width="25" height="25" border="0"></a></font></div></td>
          </tr>
        </table>
     
		<map name="Map">
		  <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
		</map>

	<?
	}
	?>
          