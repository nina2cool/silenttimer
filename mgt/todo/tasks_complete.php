<?

	// has database username and password, so don't need to put it in the page.
	require "../../include/dbinfo.php";
	require "include/header.php";
	require "include/sidemenu.php";
	
	
	$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
	mysql_select_db($db) or die("Cannot select Database");

	// get person's ID from last page
	$pID = $_GET['pID'];
	if($pID =='home'){header("location: index.php");}
	
	
	//sorting information pulled form the url line
	$sortBy = $_GET['sort'];
	$sortDirection = $_GET['d'];
	
	
	
	// get person's full name!
	$sql = "SELECT FirstName, LastName 
			FROM tblEmployee 
			WHERE EmployeeID = '$pID';";

	//put SQL statement into result
	$result = mysql_query($sql) or die("Cannot execute query!");
	
	#get name from ID
	while($row = mysql_fetch_array($result))
	{
		$FirstName = $row[FirstName];
		$LastName = $row[LastName];
	}
	
	
	//code to insert a new task if correct button is pressed...
	if ($_POST['NewTask'] == "Create")
	{
		$Name = $_POST['Name'];
		$Priority = $_POST['Priority'];
		
		$Type = $_POST['Type'];
		$Task = $_POST['Task'];
		
		$Now = date("Y-m-d H:i:s");
		
		$sql = "INSERT INTO tblTasks(Person, Task, Priority, Type, DateCreate, Status) 
				VALUES ('$Name', '$Task', '$Priority', '$Type', '$Now', 'active');";
		mysql_query($sql) or die("Cannot Insert New Task, try again!");

	}
	


	if($_GET['Complete'] == "YES")
	{
		$theTask = $_GET['tID'];
		
		$Now = date("Y-m-d H:i:s");
		
		$sql = "UPDATE tblTasks
				SET Status = 'active' 
				WHERE TaskID = '$theTask';";
		mysql_query($sql) or die("Cannot Insert New Task, try again!");
	}
	
	
	//get person's tasks!!!
	$sql = "SELECT Task, TaskID, Type, DATE_FORMAT(DateCreate, '%m/%d/%y') AS DateCreate, DATE_FORMAT(DateComplete, '%m/%d/%y') AS DateComplete, Priority 
			FROM tblTasks 
			WHERE Status = 'complete' AND Person = '$pID'";
			
	//sort results.....
	if ($sortBy == "")
	{
		$sql .= " ORDER BY Type DESC, DateComplete DESC";
	}
	
	if ($sortBy != "")
	{
		$sql .= " ORDER BY $sortBy $sortDirection";
	}

	//put SQL statement into result set for loop through records
	//echo $sql;
	$result = mysql_query($sql) or die("Cannot execute query2!");
?>


<title>To Do List</title>
<link href="../../code/style.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<div align="center">
  <table width="100%"  border="0" cellspacing="8" cellpadding="5">
    <tr>
      <td><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong><? echo $FirstName;?>'s
      Completed Tasks</strong></font></td>
      <td><div align="right"><strong><font size="2" face="Arial, Helvetica, sans-serif"><a href="tasks.php?pID=<? echo $pID;?>">&gt;
              View Active Tasks</a></font></strong></div></td>
    </tr>
  </table>
  <br>
  <div align="left"></div>
  <table width="100%" border="1" cellpadding="4" cellspacing="0" bordercolor="#CCCCCC">
    <?
			   // code to handle sort direction
			   // this following code just switches teh ascending order to descending and vice verca when necessary.
			   // The links in the titles of the colum fields are changed depending on the value in this variable and
			   // depending on what is being sorted by.
			   if ($sortDirection == "ASC")
			   {
			   		$sd = "DESC";
			   }
			   else
			   {
			   		$sd = "ASC";
			   }

			  ?>
    <tr bgcolor="#FFFFCC">
      <td width="5%" height="29"><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><a href="tasks_complete.php?pID=<? echo $pID;?>&sort=tblTasks.Priority&d=<? if ($sortBy=="tblTasks.Priority") {echo $sd;} else {echo "ASC";}?>">Priority</a></font></strong></div></td>
      <td width="7%"><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif"><a href="tasks_complete.php?pID=<? echo $pID;?>&sort=tblTasks.DateCreate&d=<? if ($sortBy=="tblTasks.DateCreate") {echo $sd;} else {echo "ASC";}?>">Date
                Created </a></font></strong></div></td>
      <td width="7%"><div align="center"><strong><font color="#003399" size="2" face="Arial, Helvetica, sans-serif">Date
              Complete </font></strong></div></td>
      <td width="71%"><div align="center"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><a href="tasks_complete.php?pID=<? echo $pID;?>&sort=tblTasks.Task&d=<? if ($sortBy=="tblTasks.Task") {echo $sd;} else {echo "ASC";}?>">Task</a></font></font></strong></div></td>
      <td width="7%"><div align="center"><strong><font color="#003399"><font size="2" face="Arial, Helvetica, sans-serif"><a href="tasks_complete.php?pID=<? echo $pID;?>&sort=tblTasks.Type&d=<? if ($sortBy=="tblTasks.Type") {echo $sd;} else {echo "ASC";}?>">Type</a></font></font></strong></div></td>
      <td width="2%"><div align="center"><strong><font color="#003399"><font size="3" face="Arial, Helvetica, sans-serif">+</font></font></strong></div></td>
    </tr>
    <?
			  	// this code loops through the returned recordset and saves the different fields into these variable, then prints it all out in a nice table format
			  
				while($row = mysql_fetch_array($result))
				{
					$tID = $row[TaskID];
					$task = $row[Task];
					$percent = $row[Percent];
					$type = $row[Type];
					$dc = $row[DateCreate];
					$dco = $row[DateComplete];
					$priority = $row[Priority];
					
					if($priority == "high") { $Color = "#FF0000"; }
					if($priority == "medium") { $Color = "#9966FF"; }
					if($priority == "low") { $Color = "#33CC66"; }

			  ?>
    <tr class="info" <? if($type=='personal'){echo "bgcolor='#CCCCFF'";}?>>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $priority;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $dc;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $dco;?></font></div></td>
      <td><div align="left"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $task;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><? echo $type;?></font></div></td>
      <td><div align="center"><font size="2" face="Arial, Helvetica, sans-serif"><a href="tasks_complete.php?<? echo "pID=$pID&Complete=YES&tID=$tID";?>">A</a></font></div></td>
    </tr>
    <?
			  	}
			  ?>
  </table>
  <p>&nbsp;</p>
  <table width="100%" border="1" cellpadding="7" cellspacing="0" bordercolor="#CCCCCC">
    <tr>
      <td><form action="" method="post" name="frmCreate" id="frmCreate">
          <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Create
                New Task</strong></font></p>
          <table width="100%"  border="0" cellspacing="0" cellpadding="5">
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Task</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <textarea name="Task" cols="50" id="textarea"></textarea>
              </font></td>
            </tr>
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Name</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="Name" id="Name">
                  <option>Select</option>
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
                  <option value="<? echo $row[EmployeeID];?>" <? if($pID==$row[EmployeeID]){echo "selected";}?>><? echo "$row[FirstName] $row[LastName]";?></option>
                  <?
			  		}
			  ?>
                </select>
              </font></td>
            </tr>
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Priority</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="Priority" id="select">
                  <option value="high">HI</option>
                  <option value="medium">MEDIUM</option>
                  <option value="low" selected>LOW</option>
                </select>
              </font></td>
            </tr>
            <tr>
              <td><font size="2" face="Arial, Helvetica, sans-serif">Type</font></td>
              <td><font size="2" face="Arial, Helvetica, sans-serif">
                <select name="Type" id="select2">
                  <option value="work" selected>Work</option>
                  <option value="personal">Personal</option>
                </select>
              </font></td>
            </tr>
          </table>
          <p>
            <input name="NewTask" type="submit" id="NewTask" value="Create">
          </p>
          </form></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</div>
<?
	//close connection to database
	mysql_close($link);
	
	require "include/footer.php";
?>