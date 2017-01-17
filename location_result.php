<?

	$radio = $_POST['radiobutton'];
	$txtZipCode = $_POST['txtZipCode'];
	$txtState = $_POST['txtState'];
	$txtCountry = $_POST['txtCountry'];
	$txtChain = $_POST['txtChain'];
	$txtAll = $_POST['txtAll'];
	$RadiusGiven = $_POST['Radius'];
	
	$Chain = $_GET['chain'];
	
	
	if($txtChain == "Barnes & Noble")
	{
	$txtChain = 2;
	}
	
if($txtAll <> 'y')
{
	
			

	if($radio == "State")
	{
		$goto = "locations_state.php?state=$txtState";
		header("location: $goto");

	}
	
	if($radio == "Chain")
	{
		$goto = "locations_chains.php?chain=$txtChain";
		header("location: $goto");
	}
	
	if($radio == "Country")
	{
		$goto = "locations_country.php?country=$txtCountry";
		header("location: $goto");
	}
	
	if($radio == "All")
	{
		$goto = "locations_all.php";
		header("location: $goto");
	
	}
}
else
{
		$goto = "locations_all.php";
		header("location: $goto");
}

?>
