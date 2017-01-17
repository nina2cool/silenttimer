		  </td>
          <td width="43%"><div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><?php $now = date("M d Y");  echo $now; ?></font></div></td>
        </tr>
      </table>
	 </TD>
	 <TD><IMG SRC="<? echo $https; ?>images/spacer.gif" WIDTH=1 HEIGHT=32 ALT=""></TD>
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
            <td width="43%" valign="top"> <div align="left"> 
                <form action="<?echo $http;?>storelocator.php" method="post" name="frmZipSubmit" id="frmZipSubmit">
                  <table width="100%" border="0" cellspacing="0" cellpadding="2">
                    <tr> 
                      <td colspan="2"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Find
                             a store near you.<font size="2" face="Arial, Helvetica, sans-serif"> |
                             <a href="http://www.silenttimer.com/locations.php">View
                             US map</a></font></strong></font></td>
                    </tr>
                    <tr> 
                      <td width="54%"><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><em>Enter
                               your US zipcode:</em></font></div></td>
                      <td width="46%"><input name="ZipCode" type="text" id="ZipCode2" size="7" maxlength="5"> 
                        <input name="SubmitStoreLocation" type="submit" id="SubmitStoreLocation" value="Go"> </td>
                    </tr>
                  </table>
                  <font size="2" face="Arial, Helvetica, sans-serif"></font> 
                </form>
                <font size="2" face="Arial, Helvetica, sans-serif"><strong> 
                </strong></font></div></td>
            <td width="18%" valign="middle"> <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><img src="<? echo $https;?>pics/BN_college_small.jpg" width="103" height="30" border="0" usemap="#MapMapMapMap"><br>
                <img src="<? echo $https;?>pics/Borders_small.JPG" width="95" height="30" border="0" usemap="#Map2"></font> 
                <map name="MapMapMapMap">
                  <area shape="rect" coords="1,1,104,32" href="<? echo $http;?>locations.php">
                </map>
                <map name="MapMap">
                  <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
                </map>
            </div></td>
            <td width="39%" valign="middle"><div align="left"> 
                <p align="center"><font size="2" face="Arial, Helvetica, sans-serif"><strong><a href="<? echo $http;?>locations.php">Available
                         at Barnes &amp; Noble College, Other College Campus
                         Stores, and now Borders Books</a></strong>!</font>
                  <map name="MapMapMap">
                    <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
                  </map>
                </p>
                </div></td>
          </tr>
        </table>
     
		<map name="Map">
		  <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
		</map>

	<?
	}
	?>
  <map name="Map2">
    <area shape="rect" coords="-1,1,97,31" href="<? echo $http;?>locations.php">
  </map>
