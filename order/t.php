<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>


<p>
  <script>

// Expiration Date Check

function CheckOrder()
{
				
				
				
				//set error variable equal to 0
				var e = 0;
				var eText = "";
			
			
				var now = new Date();
				var month = now.getMonth() + 1;
				var year = (now.getYear()+"").substring(2,4);
				
				alert(parseInt(document.frmOrder.cboExpMonth.value) + "  " + parseInt(year,10));
	
				
				
				if (parseInt(document.frmOrder.cboExpYear.value,10) < parseInt(year,10))
				{
					if(eText != "")
					{
						eText = eText + ", and Credit Expiration Date 1";
					}
					else
					{
						eText = "Credit Expiration Date 1";
					}
	
					e = 1;
				}
				else
				{
					if (parseInt(document.frmOrder.cboExpYear.value,10) == parseInt(year,10))
					{
						if (parseInt(document.frmOrder.cboExpMonth.value) < parseInt(month))
						{
							if(eText != "")
							{
								eText = eText + ", and Credit Expiration Date 2";
							}
							else
							{
								eText = "Credit Expiration Date 2";
							}
							
							e = 1;	
						}
					}
				}
				
			
			// if an error occurs, don't submit form, and tell them what to fill in.
			if (e == 1) 
			{
				alert("Please correct the following:\n\n" + eText + ".   " + parseInt(document.frmOrder.cboExpYear.value) + "  ?>  " + parseInt(year));
				return false;
			}
			else //if all is clear, send them to next confirm page...
			{
				return true;
			}
}
</script>
</p>
<form name="frmOrder" method="post" action="" onSubmit="return CheckOrder();">
  <p><font color="#000033" size="2" face="Arial, Helvetica, sans-serif"><strong>Expiration 
    Date *</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
    <select name="cboExpMonth" id="select">
      <option value="1" selected>01</option>
      <option value="2" <? if($ExpMonth == "2"){echo "selected";}?>>02</option>
      <option value="3" <? if($ExpMonth == "3"){echo "selected";}?>>03</option>
      <option value="4" <? if($ExpMonth == "4"){echo "selected";}?>>04</option>
      <option value="5" <? if($ExpMonth == "5"){echo "selected";}?>>05</option>
      <option value="6" <? if($ExpMonth == "6"){echo "selected";}?>>06</option>
      <option value="7" <? if($ExpMonth == "7"){echo "selected";}?>>07</option>
      <option value="8" <? if($ExpMonth == "8"){echo "selected";}?>>08</option>
      <option value="9" <? if($ExpMonth == "9"){echo "selected";}?>>09</option>
      <option value="10" <? if($ExpMonth == "10"){echo "selected";}?>>10</option>
      <option value="11" <? if($ExpMonth == "11"){echo "selected";}?>>11</option>
      <option value="12" <? if($ExpMonth == "12"){echo "selected";}?>>12</option>
    </select>
    <? $year = date("Y"); ?>
    <? $year2 = date("y"); ?>
    <select name="cboExpYear" id="cboExpYear">
      <option value="<? echo $year2; ?>" selected><? echo $year; ?></option>
      <?
			  //this year plus 15 years... go into a loop.
			  $x = 1;
			  while ($x <= 10)
			  {
			  		$year = $year + 1;
					$year2 = $year2 + 1;	
		      ?>
      <option value="<? if($year2<10){$year2 = "0$year2";} echo $year2; ?>" <? if($year2 == $ExpYear){echo "selected";}?>><? echo $year; ?></option>
      <? 
		  	  		$x = $x + 1;
			  } 
		      ?>
    </select>
    </font></p>
  <p>
    <input name="Order" type="submit" id="Order" value="Order Timer">
  </p>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
