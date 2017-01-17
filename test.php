<?
  if ($_POST['Submit'] == "Submit")
  {
  $Email = $_POST['e'];
  
  $Now = date("M d, Y H:j:s");
  
  mail("jenniferj@hacanet.org, nina@silenttimer.com", "Newsletter Request", "Newsletter request submitted $Now for: $Email", "From:Newsletter Request<jenniferj@hacanet.org>");
  
  }
?>

<table border="0" cellspacing="0" cellpadding="0">
<tr>
	<td width="64" height="26"><a href=""><img src="images/icon_home.gif" width="64" height="26" border="0" alt="Go to Home Page" /></a></td>
	<td width="93" height="26"><a href="about_haca/contact.php"><img src="images/icon_contact.gif" width="93" height="26" border="0" alt="Go to Contact Us Page" /></a></td>
	<td width="83" height="26"><a href="http://www.hacanet.org/text.php?directory=<?PHP print($directory);?>&filename=<?php print($filename);?>&pagename=<?php print($pagename);?>" target="_blank"><img src="images/icon_text.gif" width="83" height="26" border="0" alt="View Page without Site Graphics" /></a></td>
</tr>
</table>

<table width="240"  border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width="237"><form action="http://www.hacanet.org/searchpro/index.php" method="get" enctype="application/x-www-form-urlencoded" name="qs" id="qs">
      <center>
        <table width="196"  border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="189"><div align="right">
                <input class="sp2_field" name="q" type="text" id="q" maxlength="255" size="20" value = "Site Search" onfocus='if(this.value == "Site Search") this.value = ""' onblur='if(this.value == "") this.value = "Site Search"'>
            </div></td>
            <td width="56"><input class="sp2_btn" name="search" type="submit" id="search" value="Search"></td>
          </tr>
        </table>
      </center>
    </form></td>
  </tr>
</table>

<?php

If ($nav_global_id == "about") {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"about_haca/mission.php\" class=\"nav_sub1\"> Mission and Vision</a><br />";
	print "<a href=\"about_haca/history.php\" class=\"nav_sub1\"> History</a><br />";
	print "<a href=\"about_haca/board.php\" class=\"nav_sub1\"> Board of Commissioners</a><br />";
	print "<a href=\"about_haca/awards.php\" class=\"nav_sub1\"> Awards and Accomplishments</a><br />";
	print "<a href=\"about_haca/planning.php\" class=\"nav_sub1\"> Planning and Development</a><br />";
	print "<a href=\"about_haca/do_business.php\" class=\"nav_sub1\"> How To Do Business With HACA</a><br />";
	print "<a href=\"about_haca/faq.php\" class=\"nav_sub1\"> Frequently Asked Questions</a><br />";
	print "<a href=\"about_haca/contact.php?subject=housing\" class=\"nav_sub1\"> Ask a Question</a><br />";
	print "<a href=\"about_haca/contact.php\" class=\"nav_sub1\"> Contact Us</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";

} elseif ($nav_global_id == "obtain") {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"how_to_obtain_housing/vouchers.php\" class=\"nav_sub1\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"how_to_obtain_housing/public_housing.php\" class=\"nav_sub1\"> Public Housing Information</a><br />";
	print "<a href=\"how_to_obtain_housing/faq.php\" class=\"nav_sub1\"> Frequently Asked Questions</a><br />";
	print "<a href=\"how_to_obtain_housing/wait_list.php\" class=\"nav_sub1\"> Wait List</a><br />";
	print "<a href=\"about_haca/contact.php?subject=housing\" class=\"nav_sub1\"> Ask a Question</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";

} elseif ($nav_global_id == "services") {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"services/homeownership_programs.php\" class=\"nav_sub1\"> Home Ownership Programs</a><br />";
	print "<a href=\"services/6_star_resident_program.php\" class=\"nav_sub1\"> Six Star Resident Program</a><br />";
	print "<a href=\"services/self_sufficiency.php\" class=\"nav_sub1\"> Family Self-sufficiency</a><br />";
	print "<a href=\"services/youth_services.php\" class=\"nav_sub1\"> Youth Services</a><br />";
	print "<a href=\"services/seniors.php\" class=\"nav_sub1\"> Senior Information</a><br />";
	print "<a href=\"services/economic_development.php\" class=\"nav_sub1\"> Economic Development</a><br />";
	print "<a href=\"services/partners.php\" class=\"nav_sub1\"> Community Partners</a><br />";
	print "<a href=\"services/resident_councils.php\" class=\"nav_sub1\"> Resident Councils</a><br />";
	print "<a href=\"services/scholarships.php\" class=\"nav_sub1\"> Scholarships</a><br />";
	print "<a href=\"services/safety.php\" class=\"nav_sub1\"> Resident Watch and Safety</a><br />";
	print "<a href=\"services/needs_assistance.php\" class=\"nav_sub1\"> Basic Needs Assistance</a><br />";
	print "<a href=\"calendar/agenda.php3?modeagenda=calendar\" class=\"nav_sub1\"> Community Calendar</a><br />";
	print "<a href=\"press/newsletters.php\" class=\"nav_sub1\"> Newsletters</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";

} elseif ($nav_global_id == "communities") {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_sub1\"> Map of Sites</a><br />";
	print "<a href=\"haca_communities/booker_t_washington.php\" class=\"nav_sub1\"> Booker T. Washington</a><br />";
	print "<a href=\"haca_communities/bouldin_oaks.php\" class=\"nav_sub1\"> Bouldin Oaks</a><br />";
	print "<a href=\"haca_communities/chalmers_courts.php\" class=\"nav_sub1\"> Chalmers Court</a><br />";
	print "<a href=\"haca_communities/coronado_hills.php\" class=\"nav_sub1\"> Coronado Hills Apartments</a><br />";
	print "<a href=\"haca_communities/gaston_place.php\" class=\"nav_sub1\"> Gaston Place Apartments</a><br />";
	print "<a href=\"haca_communities/georgian_manor.php\" class=\"nav_sub1\"> Georgian Manor</a><br />";
	print "<a href=\"haca_communities/goodrich_place.php\" class=\"nav_sub1\"> Goodrich Place</a><br />";
	print "<a href=\"haca_communities/lakeside_apts.php\" class=\"nav_sub1\"> Lakeside Apartments</a><br />";
	print "<a href=\"haca_communities/manchaca_2.php\" class=\"nav_sub1\"> Manchaca II</a><br />";
	print "<a href=\"haca_communities/manchaca_village.php\" class=\"nav_sub1\"> Manchaca Village</a><br />";
	print "<a href=\"haca_communities/meadowbrook.php\" class=\"nav_sub1\"> Meadowbrook</a><br />";
	print "<a href=\"haca_communities/northgate.php\" class=\"nav_sub1\"> Northgate</a><br />";
	print "<a href=\"haca_communities/north_loop.php\" class=\"nav_sub1\"> North Loop</a><br />";
	print "<a href=\"haca_communities/rio_lado_apts.php\" class=\"nav_sub1\"> Rio Lado Apartments</a><br />";
	print "<a href=\"haca_communities/rosewood_courts.php\" class=\"nav_sub1\"> Rosewood Courts</a><br />";
	print "<a href=\"haca_communities/salina_apts.php\" class=\"nav_sub1\"> Salina Apartments</a><br />";
	print "<a href=\"haca_communities/santa_rita_courts.php\" class=\"nav_sub1\"> Santa Rita Courts</a><br />";
	print "<a href=\"haca_communities/shadowbend_ridge.php\" class=\"nav_sub1\"> Shadowbend Ridge</a><br />";
	print "<a href=\"haca_communities/thurmond_heights_apts.php\" class=\"nav_sub1\"> Thurmond Heights Apartments</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";

} elseif ($nav_global_id == "vouchers") {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"housing_choice_vouchers/landlords/\" class=\"nav_sub1\"> <b>Landlord Information</b></a><br />";
	print "<a href=\"housing_choice_vouchers/landlords/news.php\" class=\"nav_sub2\"> News and Seminars</a><br />";
	print "<a href=\"housing_choice_vouchers/landlords/current_listings.php\" class=\"nav_sub2\"> Current Listings</a><br />";
	print "<a href=\"housing_choice_vouchers/landlords/forms.php\" class=\"nav_sub2\"> Forms</a><br />";
	print "<a href=\"housing_choice_vouchers/tenants/\" class=\"nav_sub1\"> <b>Tenant Information</b></a><br />";
	print "<a href=\"housing_choice_vouchers/tenants/newsletter.php\" class=\"nav_sub2\"> Newsletter</a><br />";
	print "<a href=\"housing_choice_vouchers/tenants/available_units.php\" class=\"nav_sub2\"> Available Units</a><br />";
	print "<a href=\"housing_choice_vouchers/tenants/wait_list.php\" class=\"nav_sub2\"> Wait List</a><br />";
	print "<a href=\"housing_choice_vouchers/tenants/resources.php\" class=\"nav_sub2\"> Resources</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";

} elseif ($nav_global_id == "employment") {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"haca_employment/jobs.php\" class=\"nav_sub2\"> Job Openings</a><br />";
	print "<a href=\"haca_employment/benefits.php\" class=\"nav_sub2\"> Benefits</a><br />";
	print "<a href=\"haca_employment/training.php\" class=\"nav_sub2\"> Training and Development</a><br />";
	print "<a href=\"haca_employment/safety.php\" class=\"nav_sub2\"> Safety Committee</a><br />";
	print "<a href=\"haca_employment/recognition.php\" class=\"nav_sub2\"> Employee Recognition Committee</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";

} elseif ($nav_global_id == "press") {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"press/annual_reports.php\" class=\"nav_sub2\"> Annual Reports</a><br />";
	print "<a href=\"press/press_releases/\" class=\"nav_sub2\"> Press Releases</a><br />";
	print "<a href=\"press/ideas.php\" class=\"nav_sub2\"> Story Ideas</a><br />";
	print "<a href=\"press/media_mentions.php\" class=\"nav_sub2\"> Media Mentions</a><br />";
	print "<a href=\"press/media_kit.php\" class=\"nav_sub2\"> Media Kit</a><br />";
	print "<a href=\"press/calendar.php\" class=\"nav_sub2\"> Events Calendar</a><br />";
	print "<a href=\"press/artwork.php\" class=\"nav_sub2\"> HACA Seal and Artwork</a><br />";
	print "<a href=\"press/newsletters.php\" class=\"nav_sub2\"> Newsletters</a><br />";
	print "<a href=\"about_haca/contact.php\" class=\"nav_sub2\"> Contact HACA</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";

} else {
	print "<a href=\"about_haca/\" class=\"nav_global\"> About HACA</a><br />";
	print "<a href=\"how_to_obtain_housing/\" class=\"nav_global\"> How To Obtain Housing</a><br />";
	print "<a href=\"services/\" class=\"nav_global\"> Community Development</a><br />";
	print "<a href=\"haca_communities/\" class=\"nav_global\"> HACA Communities</a><br />";
	print "<a href=\"housing_choice_vouchers/\" class=\"nav_global\"> Housing Choice Voucher Program</a><br />";
	print "<a href=\"haca_employment/\" class=\"nav_global\"> Career Opportunities</a><br />";
	print "<a href=\"press/\" class=\"nav_global\"> Press Room</a><br />";
	print "<a href=\"resources/\" class=\"nav_global\"> Resources</a><br />";
	print "<a href=\"shcc/\" class=\"nav_global\"> SW Housing Compliance Corp.</a><br />";
}
?>
    
  <br />

  
  <table width="240"  border="0" cellspacing="0" cellpadding="6">
    <tr>
      <td width="237"><form action="" method="post" enctype="" name="Email" id="Email">
          <center>
            <table width="196"  border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td width="189">
                  <div align="left"><font size="2" face="Arial, Helvetica, sans-serif">Subscribe
                          to our free monthly newsletter!<br> 
                  Enter
                      your email below:
                      </font>
                    <input class="sp2_field2" name="e" type="text" id="e" maxlength="255" size="20" value = "enter email here" onfocus='if(this.value == "enter email here") this.value = ""' onblur='if(this.value == "") this.value = "enter email here"'>
                  </div></td>
                <td width="56"><input class="sp2_btn2" name="Submit" type="submit" id="Submit" value="Submit"></td>
              </tr>
            </table>
          </center>
      </form></td>
    </tr>
  </table>
  

  <br />