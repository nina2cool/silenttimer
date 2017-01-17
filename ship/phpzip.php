<?
// has database username and password, so don't need to put it in the page.
require "../include/dbinfo.php";

class zipLocator
{
    /**
     * Short description.
     * This method returns the distance in Miles between two zip codes
     * Detail description
     * This method returns the distance in Miles between two zip codes, if either of the zip code is not found and error is retruned
     * @param      zipOne - The first zip code
     * @param      zipTwo - The second zip code
     * @global     db - the database object
     * @since      1.0
     * @access     public
     * @return     string
     * @update
    */
    function distance($zipOne,$zipTwo)
    {
       global $db;
       $query = "SELECT * FROM zipData WHERE ZipCode = $zipOne";

       $db->query($query);
       if(!$db->nf()) {
           return "First Zip Code not found";
       }else{
           $db->next_record();
           $lat1 = $db->f("Lat");
           $lon1 = $db->f("Long");
       }

       $query = "SELECT * FROM zipData WHERE ZipCode = $zipTwo";

       $db->query($query);
       if(!$db->nf()) {
           return "Second Zip Code not found";
       }else{
           $db->next_record();
           $lat2 = $db->f("Lat");
           $lon2 = $db->f("Long");
       }

       /* Convert all the degrees to radians */
       $lat1 = $this->deg_to_rad($lat1);
       $lon1 = $this->deg_to_rad($lon1);
       $lat2 = $this->deg_to_rad($lat2);
       $lon2 = $this->deg_to_rad($lon2);

       /* Find the deltas */
       $delta_lat = $lat2 - $lat1;
       $delta_lon = $lon2 - $lon1;

       /* Find the Great Circle distance */
       $temp = pow(sin($delta_lat/2.0),2) + cos($lat1) * cos($lat2) * pow(sin($delta_lon/2.0),2);

       $EARTH_RADIUS = 3956;
       $distance = $EARTH_RADIUS * 2 * atan2(sqrt($temp),sqrt(1-$temp));

       return $distance;

    } // end func

    /**
     * Short description.
     * Converts degrees to radians
     * @param      deg - degrees
     * @global     none
     * @since      1.0
     * @access     private
     * @return     void
     * @update
    */
    function deg_to_rad($deg)
    {
        $radians = 0.0;
        $radians = $deg * M_PI/180.0;
        return($radians);
    }


    /**
     * Short description.
     * This method retruns an array of zipcodes found with the radius supplied
     * Detail description
     * This method returns an array of zipcodes found with the radius supplied in miles, if the zip code is invalid an error string is returned
     * @param      zip - The zip code
     * @param      radius - The radius in miles
     * @global     db - instance of database object
     * @since      1.0
     * @access     public
     * @return     array/string
     * @update     date time
    */
    function inradius($zip,$radius)
    {
        global $db;
        $query="SELECT * FROM zipData WHERE ZipCode='$zip'";
        $db->query($query);

        if($db->affected_rows()<>0) {
            $db->next_record();
            $lat=$db->f("lat");
            $lon=$db->f("lon");
            $query="SELECT zipcode FROM zipData WHERE (POW((69.1*(Long-\"$lon\")*cos($lat/57.3)),\"2\")+POW((69.1*(Lat-\"$lat\")),\"2\"))<($radius*$radius) ";
            $db->query($query);
            if($db->affected_rows()<>0) {
                while($db->next_record()) {
                    $zipArray[$i]=$db->f("zipcode");
                    $i++;
                }
            }
        }else{
            return "Zip Code not found";
        }
     return $zipArray;
    } // end func

} // end class




// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>

# link to Database...
$link = mysql_connect($location, $user, $pass) or die("Cannot connect to server");
mysql_select_db($db) or die("Cannot select Database");

	
	#<Add button being pushed>
	if ($_POST['Add'] == "Add")
	{

		$zipOne = $_POST['ZipOne'];
		$zipTwo = $_POST['zipTwo'];
		
		$distance = distance($zipOne,$zipTwo);	
}
	?>		



<p><font color="#003399" size="5" face="Arial, Helvetica, sans-serif"><strong>Find 
  Distances Between Zip Codes</strong></font></p>
<form name="form1" method="post" action="">
  <font size="2" face="Arial, Helvetica, sans-serif"><strong> </strong></font> 
  <p>&nbsp;</p>
  <p>Zip One
    <input name="ZipOne" type="text" id="ZipOne">
  </p>
  <p>Zip Two
    <input name="ZipTwo" type="text" id="ZipTwo">
  </p>
  <p>Distance = <font size="2" face="Arial, Helvetica, sans-serif"><? echo $distance; ?></font></p>
  <p><strong><font size="2" face="Arial, Helvetica, sans-serif">
    <input name="Add" type="submit" id="Add" value="Add">
    </font></strong></p>
  </form>
<p>&nbsp;</p>

<?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>



?>