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


		
		
?><title>Flier</title> 

    
      <table width="100%"  border="0" cellspacing="0" cellpadding="5">
      <tr>
        <?
  

			$sql = "SELECT * FROM tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status = 'active' AND NewBNStore = 'n' AND Chain = 'Barnes & Noble'";
			$result = mysql_query($sql) or die("Cannot pull Store Locations.  Please try again.");		
			
			$numstores = mysql_num_rows($result);
			
			$j = 0;
			
			while($j <= $numstores)
			{
			
			$sql = "SELECT * FROM tblBusinessCustomer WHERE CustomerType = 'Bookstore' AND Status = 'active' AND NewBNStore = 'n' AND Chain = 'Barnes & Noble'";
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
				
			
  				
  	
  ?>
        <td><div align="center"><font color="#000000" size="3" face="Arial, Helvetica, sans-serif"><strong><? echo $NameS;?><br>
             </strong> <font size="2"><? echo "$AddressS";?><br>
             <? if($Address2S != ""){echo "$Address2S<br>";}?>
             <? if($Address3S != ""){echo "$Address3S<br>";}?>
             <? echo "$CityS";?>, <? echo "$StateS";?> <? echo "$ZipCodeS";?></font><br>
             <strong><? echo "$PhoneS";?></strong></font></div></td>
        <?
}

?>
      </tr>
    </table>


  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>
//close connection to database
mysql_close($link);

}
?>