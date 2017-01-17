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
			
			<map name="Map">
		  <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
		</map>

	<?
	}
	?>