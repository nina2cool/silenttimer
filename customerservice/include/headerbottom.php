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
			
			<div align="right">
	  <map name="Map">
	        <area shape="rect" coords="0,1,103,32" href="<? echo $http;?>bn.php">
		    </map>
  
	<?
	}
	?>
      <font face="Times New Roman, Times, serif"><font face="Times New Roman, Times, serif"><font face="Arial, Helvetica, sans-serif"><font size="2" face="Arial, Helvetica, sans-serif"><a href="<? echo $http; ?>customerservice/logout.php">Log
      Out</a></font><font face="Arial, Helvetica, sans-serif"></font></font></font></font>      <map name="Map2">
        <area shape="rect" coords="-1,1,97,31" href="<? echo $http;?>locations_chains.php?chain=Borders">
      </map>
            </div>
      