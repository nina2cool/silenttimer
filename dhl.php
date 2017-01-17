<?		
		#############################################################################
		function shipment_status($tracking_number)
		{
			#connect to DHL website and pass tracking number to page.
			#Grab resulting HTML page and get shipment status
			$ch=curl_init("http://track.dhl-usa.com/TrackByNbr.asp?ShipmentNumber=$tracking_number"); //initiates cURL w/ protocol & URL of remote host
			curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1); //sets type normal POST request
			#curl_setopt($ch,CURLOPT_POSTFIELDS,$data); //inputs field data to the transfer
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); //sets response to return as variable
			$response=curl_exec($ch); //traps response into $response var
			curl_close($ch); //closes cURL transfer
			
			$r = split("td",$response); //split response into array
			
			#store corrrect array line for shipment status - 110
			$string = $r[110];
			
			#strip out unneccessary text from string
			$string = str_replace('class="txtContentSm">',"",$string);
			$string = str_replace('.</','',$string);
			$string = str_replace('<font class="txtContentRedSm">','',$string);
			$string = str_replace('font>','',$string);
			$string = str_replace('</','',$string);
			
			#return shipment status
			return trim($string);
		}
		#############################################################################


		#$weighbill_number = "9216922551";
		$weighbill_number = "9216922584";

		$status = shipment_status($weighbill_number);
		
		if($status == "Shipment delivered")
		{
			$status = 1;
		}
?>