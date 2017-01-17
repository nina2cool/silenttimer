<?
//security for page
session_start();

//security check
If (session_is_registered('userName'))
{

// has http variable in it to populate links on page.
require "../include/url.php";

require "../include/dbinfo.php";


// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
		$BusinessCustomerID = $_GET['id'];
		//$CustomerID = $_GET['cust'];
		
		# link to Database...
		$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
		mysql_select_db($db) or die("Cannot select Database2");			

		$Radius = 20;
		$StoreClose = "n";
	
		$sql = "SELECT * FROM tblBusinessCustomer WHERE BusinessCustomerID = '$BusinessCustomerID'";
		$result = mysql_query($sql) or die("Cannot execute query BusinessCustomerID!");
		while($row = mysql_fetch_array($result))
		{
			$zipOne = $row[ZipCode];
			$Name = $row[FirstName];
		}
	
		include_once ("../../include/db_mysql.inc");
		include_once ("../../include/phpZipLocator.php");
		
		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);

		$num = count($zipArray);
		
		echo "<br>count=" .$num;
		
		$num5 = 0;
		
		for($i=1;$i < count($zipArray);$i++)
		{
		
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active' AND NewBNStore = 'y'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			
			$num2 = mysql_num_rows($result);

			
			while($row = mysql_fetch_array($result))
			{
				$StoreClose = "y";
			
			$num3 = $num2 + $num4;
			
			}

			$num4 = $num3 + $num5;
			
			echo "<br>num4 = " .$num4;
			
		}
			
			$numitems = $num4;
			echo "num items = " .$numitems;
		
		

		
		
?><title>Flier</title> 

<table width="100%" height="798"  border="1" cellpadding="5" cellspacing="0">
  <tr>
    <td><div align="center"><font size="10"><strong><font face="Arial, Helvetica, sans-serif"><u>SILENT</u>,<br>
    TEST-TAKING<br>
    TIMER</font></strong></font></div>      
      <div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><br>
        <img src="../../timer/pics/timerDetails2.jpg" width="170" height="142">        </font></div>      <font size="2" face="Arial, Helvetica, sans-serif">&nbsp;</font>    <p align="left"><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">The
                Silent Timer&#8482; is the only timer that is made specifically
                for you test. </font></strong></font><font size="4" face="Arial, Helvetica, sans-serif"><strong><font size="5">Key
                features include:</font></strong></font></p>
        <ul type="square">
        <li>
          <div align="left">            <font size="5" face="Arial, Helvetica, sans-serif">Counts time up
          or down</font></div>
        </li>
        <li>
          <div align="left">            <font size="5" face="Arial, Helvetica, sans-serif">Calculates amount
          of time available per question</font></div>
        </li>
        <li>
          <div align="left">            <font size="5" face="Arial, Helvetica, sans-serif">Alerts with a
          red, flashing light instead of an audible signal</font></div>
        </li>
        <li>
          <div align="left">            <font size="5" face="Arial, Helvetica, sans-serif">Improves time
                management skills and answering speed </font></div>
        </li>
      </ul>      
        <table width="100%"  border="1" cellspacing="0" cellpadding="5">
          <tr>
            <td><font size="3" face="Arial, Helvetica, sans-serif"><span class="vert">Sideways text</span></font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
            <td><font size="3" face="Arial, Helvetica, sans-serif">Sideways text </font></td>
          </tr>
        </table>        
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p align="center"><strong><font size="4" face="Arial, Helvetica, sans-serif"><br>
          <font size="5">Now available at a <u>Barnes &amp; Noble College</u>  bookstore
          near you!</font></font></strong></p>      
    <? if($StoreClose == "y"){?>
    <hr noshade>    
    <table width="100%"  border="0" cellspacing="0" cellpadding="5">
      <tr>
        <?
  
 		$db = new db_sql;
		$zipLoc = new zipLocator;
		$radius = $Radius;
		
		$zipArray = $zipLoc->inradius($zipOne,$radius);
		
		for($i=1;$i < count($zipArray);$i++)
		{
			$sql = "SELECT * FROM tblBusinessCustomer WHERE ZipCode= '$zipArray[$i]' AND CustomerType = 'Bookstore' AND Status = 'active' AND NewBNStore = 'y'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			while($row = mysql_fetch_array($result))
			{
				$NameS = $row[Name];
				$AddressS = $row[Address];
				$Address2S = $row[Address2];
				$Address3S = $row[Address3];
				$CityS = $row[City];
				$StateS = $row[State];
				$ZipCodeS = $row[ZipCode];
				$PhoneS = $row[Phone1];
				$WebsiteS = $row[Website];
				
				$db = new db_sql;
				$zipDistance = new zipLocator;
  				
  	
  ?>
        <td><div align="center"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $NameS;?><br>
             </strong> <font size="2"><? echo "$AddressS";?><br>
             <? if($Address2S != ""){echo "$Address2S<br>";}?>
             <? if($Address3S != ""){echo "$Address3S<br>";}?>
             <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?></font><br>
             <strong><? echo "$PhoneS";?></strong></font></div></td>
        <?
}
}
?>
      </tr>
    </table>
    <?
}
?>
    <hr noshade>    
    <p align="center"><strong><font size="4" face="Arial, Helvetica, sans-serif">www.SilentTimer.com</font><font size="4" face="Arial, Helvetica, sans-serif"><br>
    </font></strong><font size="2" face="Arial, Helvetica, sans-serif">&copy; 2005
    Silent Technology LLC. All rights reserved. Patent Pending.</font></p>
    <p align="center">&nbsp;</p></td>
  </tr>
</table>

  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

}
?>