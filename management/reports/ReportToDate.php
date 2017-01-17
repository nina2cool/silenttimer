<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];

	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

		$Today = date("d");
		$Month = date("m");
		
		$TD2003 = "2003-$Month-$Today";
		$Yr2003 = "2003-$Month-01";
		
		$TD2004 = "2004-$Month-$Today";
		$Yr2004 = "2004-$Month-01";
		
		$TD2005 = "2005-$Month-$Today";
		$Yr2005 = "2005-$Month-01";
		
		$TD2006 = "2006-$Month-$Today";
		$Yr2006 = "2006-$Month-01";

		$TD2007 = "2007-$Month-$Today";
		$Yr2007 = "2007-$Month-01";
		
		$Now = date("M d, Y");

	?>
<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><b>Sales
      Report To Date: <? echo $Now; ?></b></font></p>

<p><strong><font size="3" face="Arial, Helvetica, sans-serif">YTD 2003</font></strong></p>
<table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr bgcolor="#FFCC00">
	
	<?
	$sql = "SELECT tblProductNew.ProductID, tblProductNew.Nickname, tblProductNew.Color FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2 ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblProductNew on tblPurchaseDetails2.ProductID = tblProductNew.ProductID
	WHERE tblPurchase2.OrderDateTime >= '$Yr2003' AND tblPurchase2.OrderDateTime <= '$TD2003' GROUP BY tblProductNew.ProductID ORDER BY Nickname ASC";
	
	
	//echo "<br><br>sql = " .$sql;

		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	?>
	
	
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
              Ordered</font></strong></div></td>
      <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
              Ordered for Which Type </font></strong></div></td>
    </tr>
<?

		
		while($row = mysql_fetch_array($result))
				{
				
				$Nickname = $row[Nickname];
				$ProductID = $row[ProductID];
				$Color = $row[Color];

				$NumOrdered = 0;
				
				$sql2 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2003' AND tblPurchase2.OrderDateTime <= '$TD2003' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblPurchaseDetails2.ProductID";
				
				//echo "<br><br>sql2 = " .$sql2;
				
				$result2 = mysql_query($sql2) or die("cannot get NumOrdered");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$NumOrdered = $row2[NumOrdered];
				}

	
				if($NumOrdered == 0)
				{ $NumOrdered = "-"; }
				
				
?>	
	    <tr>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Nickname; ?></strong></font></font></div></td>
      <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumOrdered; ?></strong></font></div></td>
      <td>
	    <ul>
	      
	      <?
	  			
	  
	  			$sql4 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered, tblCustomer.Type
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblCustomer
				ON tblPurchase2.CustomerID = tblCustomer.CustomerID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2003' AND tblPurchase2.OrderDateTime <= '$TD2003' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblCustomer.Type";
				
				//echo "<br><br>sql4 = " .$sql4;
				
				$result4 = mysql_query($sql4) or die("cannot get NumOrdered");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$NumOrderedType = $row4[NumOrdered];
				$TypeID = $row4[Type];
				
									$sql5 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
									$result5 = mysql_query($sql5) or die("cannot get NumOrdered");
									
									while($row5 = mysql_fetch_array($result5))
									{
									$Type = $row5[Type];
									
				if($NumOrderedType == "" OR $NumOrderedType == "0")
				{ $NumOrderedType = "-"; }
				
	  
	  
	  ?>
	      
	  
	      <li><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?> - <?php echo $NumOrderedType; ?></strong></font></li>
          
	  <?
	  
	  }
	  
	  }
	  ?>
      
	    
        </ul></td>
    </tr>
	
	<?

	}
	
	
	?>
	
</table>
 

 <p><strong><font size="3" face="Arial, Helvetica, sans-serif">YTD 2004</font></strong></p>
 <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
   <tr bgcolor="#FFCCCC">
     <?
	$sql = "SELECT tblProductNew.ProductID, tblProductNew.Nickname, tblProductNew.Color FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2 ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblProductNew on tblPurchaseDetails2.ProductID = tblProductNew.ProductID
	WHERE tblPurchase2.OrderDateTime >= '$Yr2004' AND tblPurchase2.OrderDateTime <= '$TD2004' GROUP BY tblProductNew.ProductID ORDER BY Nickname ASC";
	
	
	//echo "<br><br>sql = " .$sql;

		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	?>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
     Ordered</font></strong></div></td>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
     Ordered for Which Type </font></strong></div></td>
   </tr>
   <?

		
		while($row = mysql_fetch_array($result))
				{
				
				$Nickname = $row[Nickname];
				$ProductID = $row[ProductID];
				$Color = $row[Color];

				$NumOrdered = 0;
				
				$sql2 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2004' AND tblPurchase2.OrderDateTime <= '$TD2004' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblPurchaseDetails2.ProductID";
				
				//echo "<br><br>sql2 = " .$sql2;
				
				$result2 = mysql_query($sql2) or die("cannot get NumOrdered");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$NumOrdered = $row2[NumOrdered];
				}

	
				if($NumOrdered == 0)
				{ $NumOrdered = "-"; }
				
				
?>
   <tr>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Nickname; ?></strong></font></div></td>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumOrdered; ?></strong></font></div></td>
     <td><ul>
         <?
	  			
	  
	  			$sql4 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered, tblCustomer.Type
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblCustomer
				ON tblPurchase2.CustomerID = tblCustomer.CustomerID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2004' AND tblPurchase2.OrderDateTime <= '$TD2004' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblCustomer.Type";
				
				//echo "<br><br>sql4 = " .$sql4;
				
				$result4 = mysql_query($sql4) or die("cannot get NumOrdered");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$NumOrderedType = $row4[NumOrdered];
				$TypeID = $row4[Type];
				
									$sql5 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
									$result5 = mysql_query($sql5) or die("cannot get NumOrdered");
									
									while($row5 = mysql_fetch_array($result5))
									{
									$Type = $row5[Type];
									
				if($NumOrderedType == "" OR $NumOrderedType == "0")
				{ $NumOrderedType = "-"; }
				
	  
	  
	  ?>
         <li><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?> - <?php echo $NumOrderedType; ?></strong></font></li>
         <?
	  
	  }
	  
	  }
	  ?>
     </ul></td>
   </tr>
   <?

	}
	
	
	?>
 </table>
 <p><strong><font size="3" face="Arial, Helvetica, sans-serif">YTD 2005</font></strong></p>
 <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
   <tr bgcolor="#CCCCFF">
     <?
	$sql = "SELECT tblProductNew.ProductID, tblProductNew.Nickname, tblProductNew.Color FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2 ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblProductNew on tblPurchaseDetails2.ProductID = tblProductNew.ProductID
	WHERE tblPurchase2.OrderDateTime >= '$Yr2005' AND tblPurchase2.OrderDateTime <= '$TD2005' GROUP BY tblProductNew.ProductID ORDER BY Nickname ASC";
	
	
	//echo "<br><br>sql = " .$sql;

		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	?>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
     Ordered</font></strong></div></td>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
     Ordered for Which Type </font></strong></div></td>
   </tr>
   <?

		
		while($row = mysql_fetch_array($result))
				{
				
				$Nickname = $row[Nickname];
				$ProductID = $row[ProductID];
				$Color = $row[Color];

				$NumOrdered = 0;
				
				$sql2 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2005' AND tblPurchase2.OrderDateTime <= '$TD2005' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblPurchaseDetails2.ProductID";
				
				//echo "<br><br>sql2 = " .$sql2;
				
				$result2 = mysql_query($sql2) or die("cannot get NumOrdered");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$NumOrdered = $row2[NumOrdered];
				}

	
				if($NumOrdered == 0)
				{ $NumOrdered = "-"; }
				
				
?>
   <tr>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Nickname; ?></strong></font></div></td>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumOrdered; ?></strong></font></div></td>
     <td><ul>
         <?
	  			
	  
	  			$sql4 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered, tblCustomer.Type
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblCustomer
				ON tblPurchase2.CustomerID = tblCustomer.CustomerID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2005' AND tblPurchase2.OrderDateTime <= '$TD2005' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblCustomer.Type";
				
				//echo "<br><br>sql4 = " .$sql4;
				
				$result4 = mysql_query($sql4) or die("cannot get NumOrdered");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$NumOrderedType = $row4[NumOrdered];
				$TypeID = $row4[Type];
				
									$sql5 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
									$result5 = mysql_query($sql5) or die("cannot get NumOrdered");
									
									while($row5 = mysql_fetch_array($result5))
									{
									$Type = $row5[Type];
									
				if($NumOrderedType == "" OR $NumOrderedType == "0")
				{ $NumOrderedType = "-"; }
				
	  
	  
	  ?>
         <li><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?> - <?php echo $NumOrderedType; ?></strong></font></li>
         <?
	  
	  }
	  
	  }
	  ?>
     </ul></td>
   </tr>
   <?

	}
	
	
	?>
 </table>
 <p><strong><font size="3" face="Arial, Helvetica, sans-serif">YTD 2006</font></strong></p>
 <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
   <tr bgcolor="#FFFF99">
     <?
	$sql = "SELECT tblProductNew.ProductID, tblProductNew.Nickname, tblProductNew.Color FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2 ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblProductNew on tblPurchaseDetails2.ProductID = tblProductNew.ProductID
	WHERE tblPurchase2.OrderDateTime >= '$Yr2006' AND tblPurchase2.OrderDateTime <= '$TD2006' GROUP BY tblProductNew.ProductID ORDER BY Nickname ASC";
	
	
	//echo "<br><br>sql = " .$sql;

		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	?>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
     Ordered</font></strong></div></td>
     <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
     Ordered for Which Type </font></strong></div></td>
   </tr>
   <?

		
		while($row = mysql_fetch_array($result))
				{
				
				$Nickname = $row[Nickname];
				$ProductID = $row[ProductID];
				$Color = $row[Color];

				$NumOrdered = 0;
				
				$sql2 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2006' AND tblPurchase2.OrderDateTime <= '$TD2006' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblPurchaseDetails2.ProductID";
				
				//echo "<br><br>sql2 = " .$sql2;
				
				$result2 = mysql_query($sql2) or die("cannot get NumOrdered");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$NumOrdered = $row2[NumOrdered];
				}

	
				if($NumOrdered == 0)
				{ $NumOrdered = "-"; }
				
				
?>
   <tr>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Nickname; ?></strong></font></div></td>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumOrdered; ?></strong></font></div></td>
     <td><ul>
         <?
	  			
	  
	  			$sql4 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered, tblCustomer.Type
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblCustomer
				ON tblPurchase2.CustomerID = tblCustomer.CustomerID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2006' AND tblPurchase2.OrderDateTime <= '$TD2006' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblCustomer.Type";
				
				//echo "<br><br>sql4 = " .$sql4;
				
				$result4 = mysql_query($sql4) or die("cannot get NumOrdered");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$NumOrderedType = $row4[NumOrdered];
				$TypeID = $row4[Type];
				
									$sql5 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
									$result5 = mysql_query($sql5) or die("cannot get NumOrdered");
									
									while($row5 = mysql_fetch_array($result5))
									{
									$Type = $row5[Type];
									
				if($NumOrderedType == "" OR $NumOrderedType == "0")
				{ $NumOrderedType = "-"; }
				
	  
	  
	  ?>
         <li><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?> - <?php echo $NumOrderedType; ?></strong></font></li>
         <?
	  
	  }
	  
	  }
	  ?>
     </ul></td>
   </tr>
   <?

	}
	
	
	?>
 </table>
 <p><strong><font size="3" face="Arial, Helvetica, sans-serif">YTD 2007</font></strong></p>
 <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
   <tr bgcolor="#FFFF99">
     <?
	$sql = "SELECT tblProductNew.ProductID, tblProductNew.Nickname, tblProductNew.Color FROM tblPurchase2
	INNER JOIN tblPurchaseDetails2 ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
	INNER JOIN tblProductNew on tblPurchaseDetails2.ProductID = tblProductNew.ProductID
	WHERE tblPurchase2.OrderDateTime >= '$Yr2007' AND tblPurchase2.OrderDateTime <= '$TD2007' GROUP BY tblProductNew.ProductID ORDER BY Nickname ASC";
	
	
	//echo "<br><br>sql = " .$sql;

		$result = mysql_query($sql) or die("Cannot execute get monthly data!");
	?>
     <td bgcolor="#00FF66"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">Product</font></strong></div></td>
     <td bgcolor="#00FF66"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
       Ordered</font></strong></div></td>
     <td bgcolor="#00FF66"><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif">#
       Ordered for Which Type </font></strong></div></td>
   </tr>
   <?

		
		while($row = mysql_fetch_array($result))
				{
				
				$Nickname = $row[Nickname];
				$ProductID = $row[ProductID];
				$Color = $row[Color];

				$NumOrdered = 0;
				
				$sql2 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2007' AND tblPurchase2.OrderDateTime <= '$TD2007' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblPurchaseDetails2.ProductID";
				
				//echo "<br><br>sql2 = " .$sql2;
				
				$result2 = mysql_query($sql2) or die("cannot get NumOrdered");
				
				while($row2 = mysql_fetch_array($result2))
				{
				$NumOrdered = $row2[NumOrdered];
				}

	
				if($NumOrdered == 0)
				{ $NumOrdered = "-"; }
				
				
?>
   <tr>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $Nickname; ?></strong></font></div></td>
     <td><div align="center"><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><?php echo $NumOrdered; ?></strong></font></div></td>
     <td><ul>
         <?
	  			
	  
	  			$sql4 = "SELECT sum(tblPurchaseDetails2.Quantity) as NumOrdered, tblCustomer.Type
				FROM tblPurchase2
				INNER JOIN tblPurchaseDetails2
				ON tblPurchase2.PurchaseID = tblPurchaseDetails2.PurchaseID
				INNER JOIN tblCustomer
				ON tblPurchase2.CustomerID = tblCustomer.CustomerID
				WHERE tblPurchase2.OrderDateTime >= '$Yr2007' AND tblPurchase2.OrderDateTime <= '$TD2007' AND tblPurchase2.Status = 'active'
				AND tblPurchaseDetails2.Status <> 'cancel' AND tblPurchaseDetails2.ProductID = '$ProductID'
				GROUP BY tblCustomer.Type";
				
				//echo "<br><br>sql4 = " .$sql4;
				
				$result4 = mysql_query($sql4) or die("cannot get NumOrdered");
				
				while($row4 = mysql_fetch_array($result4))
				{
				$NumOrderedType = $row4[NumOrdered];
				$TypeID = $row4[Type];
				
									$sql5 = "SELECT * FROM tblCustomerType WHERE TypeID = '$TypeID'";
									$result5 = mysql_query($sql5) or die("cannot get NumOrdered");
									
									while($row5 = mysql_fetch_array($result5))
									{
									$Type = $row5[Type];
									
				if($NumOrderedType == "" OR $NumOrderedType == "0")
				{ $NumOrderedType = "-"; }
				
	  
	  
	  ?>
         <li><font color="<? echo $Color; ?>" size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $Type; ?> - <?php echo $NumOrderedType; ?></strong></font></li>
       <?
	  
	  }
	  
	  }
	  ?>
     </ul></td>
   </tr>
   <?

	}
	
	
	?>
 </table>
<p>&nbsp;</p>
 <p></p>
<p></p>
 <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>


//close connection to database
mysql_close($link);
// has side menu, and bottom HTML TAGS - found in local folder
require "include/sidemenu.php";
// has links that show up at the bottom in it - found in home management folder
require "../include/footerlinks.php";

// finishes security for page
}
else
{
?>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>