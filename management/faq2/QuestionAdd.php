<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../include/url.php";

//security check
If (session_is_registered('userName'))
{

// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

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
	$CategoryID = $_GET['cat'];

	# link to Database...
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");
	
	
				

	# SAVE button being pushed>
	if ($_POST['Add'] == "Add")
	{
		
		$Question = $_POST['Question'];
		$Answer = $_POST['Answer'];
		$CategoryID = $_POST['Category'];
		$Status = $_POST['Status'];


		# NOW, update information for current position...
		$sql = "INSERT INTO tblFAQ(Question, Answer, CategoryID, Status)
				VALUES('$Question', '$Answer', '$CategoryID', '$Status');";
				
		
		mysql_query($sql) or die("Cannot update SubCategory information");
			
		//$Question = addQuote($Question);
		//$Answer = addQuote($Answer);

		header("location: QuestionView.php?cat=$CategoryID");


	} 
	
	

	
// has top header in it.
require "../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../include/headerbottom.php";

				
	?>		

<p><font color="#000000" size="5" face="Arial, Helvetica, sans-serif"><strong>Add
      a 
  Question</strong></font></p>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr> 
      <td align="left" valign="top">
<table width="100%" border="0" cellspacing="0" cellpadding="10">
          <tr> 
            <td><p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Question</strong><br>
                <textarea name="Question" cols="60" rows="5" id="Question"></textarea>
</font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Answer</strong> (must
                  be html) <br>
              </font>
                <font size="2" face="Arial, Helvetica, sans-serif">
                <textarea name="Answer" cols="60" rows="5" id="Answer"></textarea>
                </font>
</p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Category</strong><br>
                <select name="Category" class="text" id="select">

                  <?  
						// build combo box for states in DB
						// SQL to get data from shippingoption and shipper table
						$sql2 = "SELECT CategoryID, Name, Type
								FROM tblCategory
								WHERE Type = 'FAQ'
								ORDER BY Name";
						//put SQL statement into result set for loop through records
						$result2 = mysql_query($sql2) or die("Cannot execute query belongs to!");
						
						while($row2 = mysql_fetch_array($result2))
						{
					?>
                  <option value="<? echo $row2[CategoryID];?>" <? if($row2[CategoryID] == $CategoryID){echo "selected";}?>><? echo $row2[Name];?></option>
                  <?
						}
					?>
                </select>
              </font></p>
              <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Status</strong></font><br>
                <select name="Status" id="Status">
                  <option value="active" selected>active</option>
                  <option value="inactive">inactive</option>
                </select>
              </p>
              <p>&nbsp;              </p>
            </td>
          </tr>
        </table> </td>
    </tr>
  </table>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif"> 
    <input name="Add" type="submit" id="Add" value="Add">
    <input type="reset" name="Submit2" value="Reset">
    </font></strong></p>
  <p align="left">
</form>

 <?
//close connection to database
mysql_close($link);

// has links that show up at the bottom in it.

require "../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";

// finishes security for page
}
else
{
?>
</p>
</p>
<meta http-equiv='refresh' content='0;URL=<? echo $http; ?>index.php'>
<?
}
?>