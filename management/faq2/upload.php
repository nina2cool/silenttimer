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


require "include/sidemenu.php";

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// has functions for management in it...
require "../include/functions.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?>

<table border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="14" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="6" align="left" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td width="30">&nbsp;</td>
    <td width="650" align="left" valign="top"> <p><font size="2" face="Arial, Helvetica, sans-serif"><br>
        Enter in the necessary file information. Then click &quot;upload&quot; 
        to complete the process.</font></p>
      <form action="" method="post" enctype="multipart/form-data" name="Login" id="Login">
        <p><font color="#FF0000" size="4" face="Arial, Helvetica, sans-serif"><strong>File Information</strong></font></p>
        <p><strong><font size="2" face="Arial, Helvetica, sans-serif">File to 
          upload<br>
          <input type="file" name="mediaFile">
          </font></strong><strong><font size="2" face="Arial, Helvetica, sans-serif"><br>
          </font></strong></p>
        <p> 
          <input name="Clicked" type="submit" id="Clicked" value="Upload">
        </p>
      </form>

      
      <?
If ($_POST['Clicked'] == "Upload")
{
	//get file information for encoding, fileSize, fileName;
	//copy file to correct directory
	
	if(is_uploaded_file($_FILES['mediaFile']['tmp_name']))
	{
		move_uploaded_file($_FILES['mediaFile']['tmp_name'], "../../pup_image/".$_FILES['mediaFile']['name']);
	
		$encoding = $_FILES['mediaFile']['type'];
		$fileName = $_FILES['mediaFile']['name'];
		$fileSize = $_FILES['mediaFile']['size']/1000000;
		
		$image_absolute_path = $_SERVER['DOCUMENT_ROOT'] . "/client/dog/pup_image/$fileName";
		$imageinfo = GetImageSize($image_absolute_path);
		$image_width_height = $imageinfo[3];
		$fileHeight = $imageinfo[1];
		$fileWidth = $imageinfo[0];
		
		#echo "<br><br>$fileName - $encoding - $fileHeight - $fileWidth - $fileSize<br><br><br>file uploaded successfully!!!<br><br>";
		
		# abslute path, image width, image quality, path to image folder, file name	
		image_resize($image_absolute_path, 112, 80, "../../pup_image/", $fileName);
		
		
		
		?>
		
			<p><img src="../../pup_image/<? echo $fileName;?>"></p>
			<p><img src="../../pup_image/<? echo "small_" . $fileName?>"></p>
		
		
		<?
		
		
		

	}	# end is uploaded
} # end if upload is clicked...




/*
$fileonserver = $pathonserver.$file_name;
while (file_exists($fileonserver))
{
	$rand = rand(0, 9);
	$file_name = $rand.$file_name;
	$fileonserver = $pathonserver.$file_name;
} 
*/

?>
      
    </td>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<p>&nbsp; </p>



<?


// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

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
