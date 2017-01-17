<? require ("include/top.php");?>
<? require ("include/dbinfo.php");?>
<? 
// has database username and password, so don't need to put it in the page.
// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

	//connect to database
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	# set path to image folder:
	$image_path = "images/small_";

	# get all pictures from Db, and list them out baby!!!
	$sql = "SELECT * FROM tblBreed WHERE Status = 'active' ORDER BY BreedName";
	$result = mysql_query($sql) or die("Cannot get Breeds.  Please try again.");
	$NumPics = mysql_num_rows($result);
	
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


	### if there are images, show the table and images... 
	### if not, give message that there are no images for this puppy
	if($NumPics != 0)
	{
?>
</p>
<p align="left"><font color="#FF0000" size="2" face="Arial, Helvetica, sans-serif"><strong>Scroll
       down for shipping information and payment options. </strong></font></p>
<p align="left"><font color="#9900FF" size="2" face="Arial, Helvetica, sans-serif"><strong>*We 
  do have a variety of litters available that are not listed yet : More cockapoos, 
  malte poos, plus Poodles, Shih Tzus, Schnauzers, Schnorkies, Toy Fox Terriers, 
  Chihuahuas. We will be listing them on this page <u>ASAP</u>. If you do not 
  see what you are interested in Please <a href="mailto:wildwind@restel.net?subject=Puppy%20Inquiry..">email</a> 
  with inquiries. Thank you!</strong></font><strong><br>
  <font color="#9900FF" size="2" face="Arial, Helvetica, sans-serif">- Judie </font></strong></p>
<table width="500" border="1" cellpadding="5" cellspacing="0" bordercolor="#FFCCCC">
          <?
	
	# LOOP through images and display on page...
	$j=1;
	while($j <= $NumPics)
	{
	
?>
          <tr align="center" valign="top"> 
                  
            <td width="20%" <? if ($array[$j][2] > 0) {?>bgcolor="#FFFFCC"<? }?>> 
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
	} # end of IF statement for images.
	else
	{
?>
        <p><font size="2" face="Arial, Helvetica, sans-serif"><em>No puppies are 
          available. Please try back soon!</em></font></p>
              
        <?	
	}
?>
        
<p align="left"><FONT COLOR="#000000" size="3" FACE="Arial, Helvetica, sans-serif"><strong>Puppy
       Information and <font color="#FF0000" size="4">SHIPPING INFORMATION</font> </strong></FONT></p>
<ul>
  <li> 
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Shipping is through
           Northwest Airlines out of Minot, ND or Bismarck, ND.</FONT></div>
  </li>
  <li> 
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Pups are ready approximately
           9 to 10 weeks of age...but cannot be shipped until temp is 10 degrees
          or  above in winter, and not if over 84 degrees in summer.</FONT></div>
  </li>
  <li>
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Small pups may not
           be ready to go until 12 to 14 weeks of age. PLEASE do not ask us to
          ship  before we feel they are ready.</FONT></div>
  </li>
  <li> 
    <div align="left"><FONT COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Puppies
           are inspected by a veterinarian before shipping. 1 year written genetic
           guarantee.</FONT></div>
  </li>
  <li> 
    <div align="left"><FONT COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Avid
           Microchips available. Permanent, painless method of identification.
          24/7  World Wide hotline available to return your lost or stolen pet
          to you. </FONT></div>
  </li>
  <li><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">Deposit
      is required to hold...NON-REFUNDABLE if you change your mind. Deposits
      can be made by Money Order, 
    Cashier's Check or Bank Wire Deposit. NO personal checks. Sorry, but several,
  recent, NSF checks make this necessary.</font></li>
  <li> 
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Handling charges
           of $60...for the crate, vet check, health certificate, trip to vet,
          trip  to airline.</FONT></div>
  </li>
  <li> 
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Air fare to most
           places in the U.S. is $150.00...$150 is the base price for the smaller
          puppies  in the smaller crate.. plus taxes, fuel surcharge, and security
          charge (based  on weight). Exact cost not known until puppy and crate
          is weighed at airport.</FONT></div>
  </li>
  <li>
    <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Most airports take COD payment for the air fare. Payable when 
    puppy is picked up at your airport. Any form of payment is acceptable.</font></div>
  </li>
  <li>
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Shipping to major
       hub airports only. </FONT></div>
  </li>
  <li> 
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Extra photos available
           to serious buyers.</FONT></div>
  </li>
  <li> 
    <div align="left"><FONT
COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Please let us know
           how we can help you...thanks, Judie</FONT> </div>
  </li>
</ul>
<p align="left"><font size="2" face="Arial, Helvetica, sans-serif"><strong>PLEASE</strong> 
  be sure your puppy plus handling is paid in full by 8 weeks of age. There are 
  many details and paperwork to complete before shipping and it is difficult if 
  it is left until they are ready to go. Late payment may delay shipping of your 
  puppy. Thank you for timely payment.</font></p>
<P align="left"><FONT COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif"><strong><em>We 
          do not sell to pet shops or brokers.....only individual families....Our 
          goal is to produce healthy, happy family pets. </em></strong></FONT></P>
        <P align="left"><FONT COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">Vet 
          and Buyer References available...Written health and genetic guarantee. 
          Call 701-848-2427 or email wildwind@restel.net</FONT></P>
        <P align="left"><FONT COLOR="#000000" size="2" FACE="Arial, Helvetica, sans-serif">WE 
          RESPOND TO ALL EMAILS UNLESS THERE IS A PROBLEM WITH OUR SERVER, YOUR 
          SERVER, OR YOUR EMAIL ADDRESS... IF NO EMAIL IS RETURNED...PLEASE TRY 
          AGAIN...OR CALL!</FONT></P>

<? require ("include/bottom.php");?>
