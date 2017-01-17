<?

	// has database username and password, so don't need to put it in the page.
	require "../../include/dbinfo.php";

	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	$tID = $_GET['tID'];
	
	if($tID ==''){header("location: index.php");}
	

	//code to insert a new task if correct button is pressed...
	if ($_POST['Update'] == "Update")
	{
		$Name = $_POST['Name'];
		$Priority = $_POST['Priority'];
		$Type = $_POST['Type'];
		$Task = $_POST['Task'];
		$Percent = $_POST['Percent'];
		
		
		
		$sql = "UPDATE tblTasks 
				SET Person='$Name', Priority='$Priority', Type='$Type', Task='$Task', Percent='$Percent' 
				WHERE TaskID='$tID';";
		mysql_query($sql) or die("Cannot Update Task, try again!");
		
		header("location: tasks.php?pID=$Name");

	}
	
	//get person's tasks!!!
	$sql = "SELECT tblTasks.Task, tblTasks.Percent, tblTasks.Type, tblTasks.Priority, tblTasks.Person
			FROM tblTasks 
			WHERE tblTasks.TaskID = '$tID';";

	//put SQL statement into result set for loop through records
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot get task information!");
	
	while($row = mysql_fetch_array($result))
	{
		$task = $row[Task];
		$percent = $row[Percent];
		$type = $row[Type];
		$person = $row[Person];
		$priority = $row[Priority];
	}
	
	if ($_POST['Cancel'] == "Cancel")
	{
		header("location: tasks.php?pID=$person");
	}
	
		require "include/header.php";
	require "include/sidemenu.php";

	
?>


<title>To Do List</title>
<div align="center">
  <table width="100%"  border="0" cellspacing="8" cellpadding="5">
    <tr>
      <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Edit
      Task</strong></font></td>
      <td>&nbsp;</td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="100%"  border="1" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><form action="" method="post" name="frmCreate" id="frmCreate">
        <table width="100%"  border="0" cellpadding="5" cellspacing="0" bordercolor="#CCCCCC">
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Task</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <textarea name="Task" cols="50" id="textarea3"><? echo $task;?></textarea>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">% Complete</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Percent">
                <option value="0"<? if($percent=='0'){echo "selected";}?>>0</option>
                <option value="5"<? if($percent=='5'){echo "selected";}?>>5</option>
                <option value="10"<? if($percent=='10'){echo "selected";}?>>10</option>
                <option value="15"<? if($percent=='15'){echo "selected";}?>>15</option>
                <option value="20"<? if($percent=='20'){echo "selected";}?>>20</option>
                <option value="25"<? if($percent=='25'){echo "selected";}?>>25</option>
                <option value="30"<? if($percent=='30'){echo "selected";}?>>30</option>
                <option value="35"<? if($percent=='35'){echo "selected";}?>>35</option>
                <option value="40"<? if($percent=='40'){echo "selected";}?>>40</option>
                <option value="45"<? if($percent=='45'){echo "selected";}?>>45</option>
                <option value="50"<? if($percent=='50'){echo "selected";}?>>50</option>
                <option value="55"<? if($percent=='55'){echo "selected";}?>>55</option>
                <option value="60"<? if($percent=='60'){echo "selected";}?>>60</option>
                <option value="65"<? if($percent=='65'){echo "selected";}?>>65</option>
                <option value="70"<? if($percent=='70'){echo "selected";}?>>70</option>
                <option value="75"<? if($percent=='75'){echo "selected";}?>>75</option>
                <option value="80"<? if($percent=='80'){echo "selected";}?>>80</option>
                <option value="85"<? if($percent=='85'){echo "selected";}?>>85</option>
                <option value="90"<? if($percent=='90'){echo "selected";}?>>90</option>
                <option value="95"<? if($percent=='95'){echo "selected";}?>>95</option>
                <option value="100"<? if($percent=='100'){echo "selected";}?>>100</option>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Name</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Name" id="select5">
                <option selected>Select</option>
                <?
					//get list of Company Reps!
					$sql = "SELECT EmployeeID, FirstName, LastName 
							FROM tblEmployee
							WHERE Status = 'active'
							ORDER BY FirstName;";
					//put SQL statement into result set for loop through records
					$result = mysql_query($sql) or die("Cannot get rep names!");
					while($row = mysql_fetch_array($result))
					{
							
			  ?>
                <option value="<? echo $row[EmployeeID];?>" <? if($person==$row[EmployeeID]){echo "selected";}?>><? echo "$row[FirstName] $row[LastName]";?></option>
                <?
			  		}
			  ?>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Priority</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Priority" id="select6">
                <option value="high" <? if($priority=='high'){echo "selected";}?>>HI</option>
                <option value="medium" <? if($priority=='medium'){echo "selected";}?>>MEDIUM</option>
                <option value="low" <? if($priority=='low'){echo "selected";}?>>LOW</option>
              </select>
            </font></td>
          </tr>
          <tr>
            <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
            <td><font size="2" face="Arial, Helvetica, sans-serif">
              <select name="Type" id="select7">
                <option value="work" <? if($type=='work'){echo "selected";}?>>Work</option>
                <option value="personal" <? if($type=='personal'){echo "selected";}?>>Personal</option>
              </select>
            </font></td>
          </tr>
        </table>
        <p align="left"> <br>
            <input name="Update" type="submit" id="Update2" value="Update">
&nbsp;&nbsp;&nbsp;
    <input name="Cancel" type="submit" id="Cancel2" value="Cancel">
        </p>
      </form></td>
    </tr>
  </table>
  <p>
  </p>
  <p align="left">&nbsp;</p>
  <p align="left">&nbsp;</p>
  <p>&nbsp;</p>
</div>
<?
	//close connection to database
	mysql_close($link);
	
	require "include/footer.php";
?>