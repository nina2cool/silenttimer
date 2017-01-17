<?
//security for page
session_start();

require "../../include/url.php";
require "../../include/dbinfo.php";

# security check - if not logged in, send to login page.
If (session_is_registered('userName'))
{

# Title for page.
$Title = "";

//connect to database
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

require "../include/top.php";
require "include/sidemenu.php";


function escapeQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("'","||",$var);
			$string = str_replace('"','||||',$string);
		}

		return $string;
	}
	
	function removeBars($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}

	function addQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("\'","'",$var);
			$string = str_replace('\"','"',$string);
		}

		return $string;
	}
	
	function dbQuote($var)
	{
		if (isset($var))
		{
			$string = str_replace("||","'",$var);
			$string = str_replace('||||','"',$string);
		}

		return $string;
	}




	//grab variables to get purchase info from DB.
	$SubCatID = $_GET['subcat'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
	
	if($_GET['DeleteImage'] == 'y')
	{
		$ID = $_GET['ImageID'];
		
		$sql = "DELETE FROM tblImage
				WHERE ImageID = '$ID'";
	
		#echo $sql;
		mysql_query($sql) or die("Cannot delete category image <br><br> $sql <br><br>" . mysql_error());
	
	}
	
				

	# SAVE button being pushed>
	if ($_POST['Save'] == "Save")
	{
		
		$Subcategory = dbQuote($_POST['Subcategory']);
		$Details = dbQuote($_POST['Details']);
		$BelongsTo = $_POST['Category'];
		$Image_Radio = $_POST['image_radio'];
		


		# NOW, update information for current position...
		$sql = "UPDATE tblCategory
				SET Name = '$Subcategory' ,
				BelongsTo = '$BelongsTo',
				ImageID = '$Image_Radio',
				Details = '$Details'
				WHERE CategoryID = '$SubCatID'";
		
		mysql_query($sql) or die("Cannot update SubCategory information");
			
		$Subcategory = addQuote($Subcategory);
		$Details = addQuote($Details);

	} 
	
	
	
	# upload photo and insert into tblImage... ONLY if there is a new image to be uploaded...
	if(is_uploaded_file($_FILES['mediaFile']['tmp_name']) AND $_FILES['mediaFile']['tmp_name'] != "")
	{
	
		move_uploaded_file($_FILES['mediaFile']['tmp_name'], "../../images/category/" . $_FILES['mediaFile']['name']);
	
		$encoding = $_FILES['mediaFile']['type'];
		$fileName = $_FILES['mediaFile']['name'];
		$fileSize = $_FILES['mediaFile']['size']/1000000;
		
		$image_absolute_path = $image_path . $fileName;
		$imageinfo = GetImageSize($image_absolute_path);
		$fileHeight = $imageinfo[1];
		$fileWidth = $imageinfo[0];
				
		# insert the image information into the tblImage
		$sql = "INSERT INTO tblImage(Type, FileName, CategoryID) 
				VALUES ('Category', '$fileName', '$SubCatID')";	
		mysql_query($sql) or die("Cannot Insert New Image, try again!");		
		
		# get image ID that was inserted! Then use that to insert into tblManufacturer...
		$sql = "SELECT * FROM tblImage WHERE Type = 'Category' AND FileName = '$fileName' AND CategoryID = '$SubCatID'";
		$result = mysql_query($sql) or die("Cannot get ImageID.  Please try again.");
		while($row = mysql_fetch_array($result))
		{
			$ImageID = $row[ImageID];
		}
		
		$sql = "UPDATE tblCategory
		SET ImageID = '$ImageID'
		WHERE CategoryID = '$SubCatID'";	
		mysql_query($sql) or die("Cannot update Category information");	
		#echo "$sql";
		
	}	
	
	#------------------------------------------------------------------------------------------->>>>
	#End of Image Func
	
	
	

		$sql3 = "SELECT * FROM tblCategory WHERE CategoryID = '$SubCatID'";

		//put SQL statement into result set for loop through records
		$result3 = mysql_query($sql3) or die("Cannot execute query Category!");
		
		while($row = mysql_fetch_array($result3))
		{
			$Subcategory = escapeQuote($row[Name]);
			$CategoryImage = $row[ImageID];
			$BelongsTo = $row[BelongsTo];
			$Details = escapeQuote($row[Details]);
		}
	
	
	#------------------------------------------------------------------------------------------------------->>>>
	#IMAGE FUNC		
	
	
		
	
	
				
	?>		

<p><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit 
  Subcategory Information</strong></font></p>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr> 
      <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
          <tr> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Subcategory 
                Name</strong><br>
                <input name="Subcategory" type="text" id="Subcategory" value="<? echo dbQuote($Subcategory);?>" size="50">
                </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Belongs 
                To (Main Category)</strong><br>
                <select name="Category" class="text" id="select">

                  <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql2 = "SELECT CategoryID, Name, Type
								FROM tblCategory
								WHERE Type = 'Category'
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result2 = mysql_query($sql2) or die("Cannot execute query belongs to!");
						
						while($row2 = mysql_fetch_array($result2))
						{
					?>
                  <option value="<? echo $row2[CategoryID];?>" <? if($row2[CategoryID] == $BelongsTo){echo "selected";}?>><? echo $row2[Name];?></option>
                  <?
						}
					?>
                </select>
              </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Description</strong><br>
              </font>
                <textarea name="Details" cols="60" rows="5" id="Details"><? echo dbQuote($Details);?></textarea>
              </p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#FF0000">Images
              - NOT READY YET - DON'T USE </font></strong></font><font size="2" face="Arial, Helvetica, sans-serif"><strong><br>
                </strong>Select which image you would like to display for this
                product. Or, upload a new photo below. To delete an image, press <strong>Delete</strong>.
                If you delete an image, it will be gone forever. </font>
                <?

	# set path to image folder:
	$image_path = "../../images/category/";
	
	# image ---------------------------------------------------------------------------------------
	if ($SubCatID <> "")
	{
		# get all pictures from Db, and list them out baby!!!
		$sql = "SELECT * FROM tblImage WHERE CategoryID = '$SubCatID' GROUP BY FileName";
		$result = mysql_query($sql) or die("Cannot get pictures.  Please try again.");	
		$NumPics = mysql_num_rows($result);
		
		
		$i=1;
		while($row = mysql_fetch_array($result))
		{
			$ID = $row[ImageID];
			$Image = $row[FileName];
			$H = $row[Height];
			$W = $row[Width];
			
			$array[$i][0] = $ID;
			$array[$i][1] = $Image;
			$array[$i][2] = $H;
			$array[$i][3] = $W;
			
			$i++;
		}
	}	
		
	
		### if there are images, show the table and images... 
		### if not, give message that there are no images for this product
		if($NumPics != 0)
		{

?>
              </p>
              <table width="100%" border="0" cellpadding="5" cellspacing="0" bordercolor="#FFCCCC">
                <?
	
	# LOOP through images and display on page...
	$j=1;
	while($j <= $NumPics)
	{
	
?>
                <tr align="center" valign="top">
                  <td width="20%"><? if($array[$j][1]!=""){?>
                      <div align="center">
                        <p><font size="2"><img src="<? echo $image_path . $array[$j][1];?>" width="112" height="83"></font></p>
                        <p><font size="2">
                          <input name="image_radio" type="radio" value="<? echo $array[$j][0];?>" <? if($CategoryImage == $array[$j][0]){echo "checked";}?>>
                          <? if($CategoryImage != $array[$j][0]){?>
&nbsp;&nbsp; <font face="Arial, Helvetica, sans-serif"> <a href="SubcategoryEdit.php?subcat=<? echo $SubCatID;?>&DeleteImage=y&ImageID=<?  echo $array[$j][0];?>">Delete</a> </font>
          <? }?>
                        </font></p>
                      </div>
                      <? $array[$j][1]= ""; }?>
                  </td>
                  <td width="20%"><? if($array[$j+1][1]!=""){?>
                      <div align="center">
                        <p><font size="2"><img src="<? echo $image_path . $array[$j+1][1];?>" width="112" height="83"></font></p>
                        <p><font size="2">
                          <input type="radio" name="image_radio" value="<? echo $array[$j+1][0];?>" <? if($CategoryImage == $array[$j+1][0]){echo "checked";}?>>
                          <? if($CategoryImage != $array[$j+1][0]){?>
&nbsp;&nbsp; <font face="Arial, Helvetica, sans-serif"> <a href="SubcategoryEdit.php?subcat=<? echo $SubCatID;?>&DeleteImage=y&ImageID=<? echo $array[$j+1][0];?>">Delete</a> </font>
          <? }?>
                        </font></p>
                      </div>
                      <? $array[$j+1][1]= ""; }?>
                  </td>
                  <td width="20%"><? if($array[$j+2][1]!=""){?>
                      <div align="center">
                        <p><font size="2"><img src="<? echo $image_path . $array[$j+2][1];?>" width="112" height="83"></font></p>
                        <p><font size="2">
                          <input type="radio" name="image_radio" value="<? echo $array[$j+2][0];?>" <? if($CategoryImage == $array[$j+2][0]){echo "checked";}?>>
                          <? if($CategoryImage != $array[$j+2][0]){?>
&nbsp;&nbsp; <font face="Arial, Helvetica, sans-serif"> <a href="SubcategoryEdit.php?subcat=<? echo $SubCatID;?>&DeleteImage=y&ImageID=<?  echo $array[$j+2][0];?>">Delete</a> </font>
          <? }?>
                        </font></p>
                      </div>
                      <? $array[$j+2][1]= ""; }?>
                  </td>
                  <td width="20%"><? if($array[$j+3][1]!=""){?>
                      <div align="center">
                        <p><font size="2"><img src="<? echo $image_path . $array[$j+3][1];?>" width="112" height="83"></font></p>
                        <p><font size="2">
                          <input type="radio" name="image_radio" value="<? echo $array[$j+3][0];?>" <? if($CategoryImage == $array[$j+3][0]){echo "checked";}?>>
                          <? if($CategoryImage != $array[$j+3][0]){?>
&nbsp;&nbsp; <font face="Arial, Helvetica, sans-serif"> <a href="SubcategoryEdit.php?subcat=<? echo $SubCatID;?>&DeleteImage=y&ImageID=<?  echo $array[$j+3][0];?>">Delete</a> </font>
          <? }?>
                        </font></p>
                      </div>
                      <? $array[$j+3][1]= ""; }?>
                  </td>
                  <td width="20%"><? if($array[$j+4][1]!=""){?>
                      <div align="center">
                        <p><font size="2"><img src="<? echo $image_path . $array[$j+4][1];?>" width="112" height="83"></font></p>
                        <p><font size="2">
                          <input type="radio" name="image_radio" value="<? echo $array[$j+4][0];?>" <? if($CategoryImage == $array[$j+4][0]){echo "checked";}?>>
                          <? if($CategoryImage != $array[$j+4][0]){?>
&nbsp;&nbsp; <font face="Arial, Helvetica, sans-serif"> <a href="SubcategoryEdit.php?subcat=<? echo $SubCatID;?>&DeleteImage=y&ImageID=<?  echo $array[$j+4][0];?>">Delete</a> </font>
          <? }?>
                        </font></p>
                      </div>
                      <? $array[$j+4][1]= ""; }?>
                  </td>
                </tr>
                <?
	
		# move item numbers forward 5 products!
		$j=$j+5;	
	}
	
?>
              </table>
              <?
	} # end of IF statement for images.
	else
	{
?>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><em>There
                    are no images available.</em></font></p>
              <?	
	}
?>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Upload
                    Image</strong></font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong> <font size="2" face="Arial, Helvetica, sans-serif">
                <input name="mediaFile" type="file" id="mediaFile">
              </font> </strong></font></p>
              <p></p>
              <p><br>
              </p></td>
          </tr>
        </table> </td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
    <input name="Save" type="submit" id="Save" value="Save">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  <p align="left">
</form>

 <?
require "../include/bottom.php";
mysql_close($link);



// finishes security for page
}
else
{
	header("location: $http_admin"); //redirects user via PHP to this page... better than meta refresh...
}
?>
