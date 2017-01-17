<? require ("include/top.php");?>
<? require ("include/dbinfo.php");?>
<? 
// has database username and password, so don't need to put it in the page.
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>


	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

		$Radius = 25;
		$StoreClose = "n";
	
		$sql = "SELECT * FROM tblCustomer WHERE CustomerID = '$CustomerID'";
		$result = mysql_query($sql) or die("Cannot execute query customerID!");
		while($row = mysql_fetch_array($result))
		{
			$zipOne = $row[ZipCode];
			$Name = $row[FirstName];
			$LastName = $row[LastName];
		}
	
		include_once ("../../include/db_mysql.inc");
		include_once ("../../include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);

		#echo "hello world<br><br>";
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			$NumStores = mysql_num_rows($result);
			
			while($row = mysql_fetch_array($result))
			{
				$StoreClose = "y";
			}
		}
	
	$i=1;
	while($row = mysql_fetch_array($result))
	{
		$BreedID = $row[BreedID];
		$BreedName = $row[BreedName];
		$Image = $row[Image];
	
		# get image name for this image!
		$sql2 = "SELECT * FROM tblImages WHERE ImageID = '$Image'";
		$result2 = mysql_query($sql2) or die("Cannot get Breed Image.  Please try again.");
		$NumLitters = mysql_num_rows($result2);
		
		while($row = mysql_fetch_array($result2))
		{
			$ImageName = $row[ImageName];
		}
		
		
		# count active litters...
		$sql2 = "SELECT * FROM tblLitter WHERE Status = 'available' AND BreedID = '$BreedID'";
		$result2 = mysql_query($sql2) or die("Cannot get Litter Number.  Please try again.");
		$NumLitters = mysql_num_rows($result2);
		
		$array[$i][0] = $BreedID;
		$array[$i][1] = $ImageName;
		$array[$i][2] = $NumLitters;
		$array[$i][3] = $BreedName;
		
		$i++;
	}



?>

<table width="500" border="1" cellpadding="5" cellspacing="0" bordercolor="#FFCCCC">
          <?
	
	# LOOP through images and display on page...
	$j=1;
	while($j <= $NumPics)
	{
	
?>
          <tr align="center" valign="top"> 
                  
            <td width="20%" <? if ($array[$j][1] > 0) {?>bgcolor="#FFFFCC"<? }?>> 
              <? if($array[$j][0] !=""){?>
              <table width="100" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr> 
                  <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="litter.php?b=<? echo $array[$j][0];?>&name=<? echo $array[$j][3];?>"><? echo $array[$j][3];?></a></font></strong></div></td>
                </tr>
                <tr> 
                  <td><div align="center"><font size="2"><a href="litter.php?b=<? echo $array[$j][0];?>&name=<? echo $array[$j][3];?>"><img src="<? echo $image_path . $array[$j][1];?>" width="112" height="83" border="0"><br>
                      </a></font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $array[$j][2];?> Litter(s)</font><font size="2"><a href="litter.php?b=<? echo $array[$j][0];?>&name=<? echo $array[$j][3];?>"> 
                      <br>
                      </a></font></div></td>
                </tr>
              </table> 
              <div align="center"></div>
                    <? $array[$j][0]= ""; }?>
            </td>
                  
            <td width="20%" <? if ($array[$j+1][2] > 0) {?>bgcolor="#FFFFCC"<? }?>> 
              <? if($array[$j+1][0]!=""){?>
              <table width="100" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr> 
                  <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="litter.php?b=<? echo $array[$j+1][0];?>&name=<? echo $array[$j+1][3];?>"><? echo $array[$j+1][3];?></a></font></strong></div></td>
                </tr>
                <tr> 
                  <td><div align="center"><font size="2"><a href="litter.php?b=<? echo $array[$j+1][0];?>&name=<? echo $array[$j+1][3];?>"><img src="<? echo $image_path . $array[$j+1][1];?>" width="112" height="83" border="0"><br>
                      </a></font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $array[$j+1][2];?> 
                      Litter(s)</font><font size="2"><a href="litter.php?b=<? echo $array[$j+1][0];?>&name=<? echo $array[$j+1][3];?>"> 
                      <br>
                      </a></font></div></td>
                </tr>
              </table> 
              <div align="center">
                      
              </div>
                    <? $array[$j+1][0]= ""; }?>
            </td>
                  
            <td width="20%" <? if ($array[$j+2][2] > 0) {?>bgcolor="#FFFFCC"<? }?>> 
              <? if($array[$j+2][0]!=""){?>
              <table width="100" border="0" align="center" cellpadding="5" cellspacing="0">
                <tr> 
                  <td><div align="center"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="litter.php?b=<? echo $array[$j+2][0];?>&name=<? echo $array[$j+2][3];?>"><? echo $array[$j+2][3];?></a></font></strong></div></td>
                </tr>
                <tr> 
                  <td><div align="center"><font size="2"><a href="litter.php?b=<? echo $array[$j+2][0];?>&name=<? echo $array[$j+2][3];?>"><img src="<? echo $image_path . $array[$j+2][1];?>" width="112" height="83" border="0"><br>
                      </a></font><font size="2" face="Arial, Helvetica, sans-serif"><? echo $array[$j+2][2];?> 
                      Litter(s)</font><font size="2"><a href="litter.php?b=<? echo $array[$j+2][0];?>&name=<? echo $array[$j+2][3];?>"> 
                      <br>
                      </a></font></div></td>
                </tr>
              </table> 
              <div align="center">
                      
              </div>
                    <? $array[$j+2][0]= ""; }?>
            </td>
  </tr>
                <?
	
		# move item numbers forward 5 products!
		$j=$j+3;	
	}
	
?>
</table>
              
<?
	}
?>
        <? require ("include/bottom.php");?>
