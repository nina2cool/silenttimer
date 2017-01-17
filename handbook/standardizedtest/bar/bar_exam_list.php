<?
//security for page
session_start();

// has http variable in it to populate links on page.
require "../../../include/url.php";

// has database username and password, so don't need to put it in the page.
require "../../../include/dbinfo.php";

// has top header in it.
require "../../../include/headertop.php";

// has top menu for this page in it, you acn change these links in this folders include folder.
require "../../../include/topmenu.php";

// has bottom header in it, ths goes under the top menu for this page.
require "../../include/headerbottom.php";

// -------------------------- YOUR CODE GOES BELOW THIS LINE ------------------------------------------------------------------- >>>>>
?> <strong><font color="#003399" size="4" face="Times New Roman, Times, serif"> 
</font></strong><font color="#003399" size="3" face="Arial, Helvetica, sans-serif"><strong><font size="4" face="Times New Roman, Times, serif"><font size="2">THE 
SILENT TIMER</font><font color="#000000" size="2" face="Arial, Helvetica, sans-serif">&#8482;</font></font><font color="#000000" size="2"> 
<em>Handbook</em></font></strong></font>
<p><font size="4" face="Arial, Helvetica, sans-serif"><strong>List 
                    of State BAR Exams</strong></font></p>
                  
<table width="100%" border="0" cellpadding="6" cellspacing="0">
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Alabama</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Alabama State Bar Admissions Office<br>
      P.O. Box 671<br>
      Montgomery, AL 36101<br>
      Telephone: (334) 269-1515<br>
      <a href="mailto:admit@alabar.org">admit@alabar.org</a><br>
      <a href="http://www.alabar.org" target="_blank">http://www.alabar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Alaska</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Alaska Bar Association<br>
      P.O. Box 100279<br>
      Anchorage, AK 99510-0279<br>
      Telephone: (907) 272-7469<br>
      <a href="http://www.alaskabar.org" target="_blank">http://www.alaskabar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Arizona</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Committee on Examinations<br>
      Supreme Court of Arizona<br>
      1501 W. Washington<br>
      Phoenix, AZ 85007-3231<br>
      Telephone: (602) 364-0369<br>
      <a href="http://www.supreme.state.az.us/admis" target="_blank">http://www.supreme.state.az.us/admis</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Arkansas</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      625 Marshall Street<br>
      120 Justice Building<br>
      Little Rock, Arkansas 72201<br>
      Telephone: (501) 374-1855<br>
      <a href="http://courts.state.ar.us/courts/ble.html" target="_blank">http://courts.state.ar.us/courts/ble.html</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>California</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Office of Admissions<br>
      State Bar of California<br>
      180 Howard Street<br>
      San Francisco, CA 94105-1639<br>
      Telephone: (415) 538-2300<br>
      <strong>- or -</strong><br>
      Office of Admissions<br>
      State Bar of California<br>
      1149 South Hill Street<br>
      Los Angeles, California 90015-2299<br>
      Telephone: (213) 765-1500<br>
      <a href="http://www.calbar.org" target="_blank">http://www.calbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Colorado</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      600 17th Street, Suite 520-S<br>
      Denver, CO 80202<br>
      Telephone: (303) 893-8096<br>
      <a href="mailto:information@lawexaminers.state.co.us">information@lawexaminers.state.co.us</a><br>
      <a href="http://www.courts.state.co.us" target="_blank">http://www.courts.state.co.us</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Connecticut</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Bar Examining Committee<br>
      80 Washington Street<br>
      East Hartford, CT 06106<br>
      Telephone: (860) 756-7901<br>
      <a href="http://www.ctbar.org" target="_blank">http://www.ctbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Delaware</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      Office of the Secretary<br>
      200 West Ninth Street, Suite 300-B<br>
      Wilmington, DE 19801-1717<br>
      Telephone: (302) 577-7038<br>
      Fax: (302) 577-7037<br>
      <a href="http://courts.state.de.us/bbe" target="_blank">http://courts.state.de.us/bbe</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Florida</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Florida Board of Bar Examiners<br>
      1891 Eider Court<br>
      Tallahassee, FL 32399-1750<br>
      Telephone: (850) 487-1292<br>
      Fax: (850) 414-9822<br>
      <a href="http://www.barexam.org/florida" target="_blank">http://www.barexam.org/florida</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Georgia</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      P.O. Box 38466<br>
      Atlanta, GA 30334<br>
      Telephone: (404) 656-3490<br>
      <a href="http://www2.state.ga.us/" target="_blank">http://www2.state.ga.us/</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Hawaii</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      Supreme Court of Hawaii<br>
      417 South King Street<br>
      Honolulu, HI 96813<br>
      Telephone: (808) 539-4977<br>
      Information Line: (808) 539-4907 (recording)<br>
      <a href="http://www.hsba.org" target="_blank">http://www.hsba.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Idaho</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Idaho State Bar<br>
      P.O. Box 895<br>
      Boise, ID 83701<br>
      Telephone: (208) 334-4500<br>
      <a href="http://www.state.id.us/isb" target="_blank">http://www.state.id.us/isb</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Illinois</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Admissions to the Bar<br>
      625 South College Street<br>
      Springfield, IL 62704<br>
      Telephone: (217) 522-5917<br>
      <a href="http://www.ibaby.org" target="_blank">http://www.ibaby.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Indiana</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      State Board of Law Examiners<br>
      115 West Washington Street<br>
      Suite 1070 South Tower<br>
      Indianapolis, IN 46204-3417<br>
      Telephone: (317) 232-2552<br>
      <a href="http://www.inbar.org" target="_blank">http://www.inbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Iowa</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      Supreme Court of Iowa<br>
      State Capitol Building<br>
      Des Moines, IA 50319<br>
      Telephone: (515) 281-5911<br>
      <a href="http://www.iowabar.org" target="_blank">http://www.iowabar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Kansas</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Attorney Admissions<br>
      Kansas Judicial Center<br>
      301 S.W. 10th Street, Rm. 374<br>
      Topeka, KS 66612<br>
      Telephone: (785) 296-8410<br>
      Fax: (785) 296-1028<br>
      <a href="http://www.ksbar.org" target="_blank">http://www.ksbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Kentucky</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Examiners<br>
      1510 Newtown Pike<br>
      Lexington, KY 40511<br>
      Telephone: (606) 246-2381<br>
      <a href="http://www.kyoba.org/" target="_blank">http://www.kyoba.org/</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Louisiana</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Committee on Bar Admissions<br>
      601 St. Charles Avenue<br>
      New Orleans, LA 70130<br>
      Telephone: (504) 566-1600<br>
      <a href="http://www.lsba.org" target="_blank">http://www.lsba.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Maine</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      P.O. Box 30<br>
      Augusta, ME 04332-0030<br>
      Telephone: (207) 623-2464<br>
      <a href="http://www.mainebarexaminers.org/" target="_blank">http://www.mainebarexaminers.org/</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Maryland</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Maryland Board of Bar Examiners<br>
      District Court Building<br>
      3rd Floor<br>
      251 Rowe Boulevard<br>
      Annapolis, MD 21401<br>
      Telephone: (410) 260-1975<br>
      <a href="mailto:sble@courts.state.md.us">sble@courts.state.md.us</a><br>
      <a href="http://www.courts.state.md.us" target="_blank">http://www.courts.state.md.us</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Massachusetts</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      77 Franklin Street<br>
      Boston, MA 02110<br>
      Telephone: (617) 482-4466 (recording)<br>
      (617) 482-4467 (other inquiries)<br>
      <a href="http://www.state.ma.us/bbe" target="_blank">http://www.state.ma.us/bbe</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Michigan</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      200 Washington Square<br>
      Lower Level<br>
      P.O. Box 30104<br>
      Lansing, MI 48909<br>
      Telephone: (517) 334-6992<br>
      <a href="http://www.michbar.org" target="_blank">http://www.michbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Minnesota</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      Minnesota Judicial Center<br>
      25 Constitution Avenue<br>
      St. Paul, MN 55155<br>
      Telephone: (651) 297-1800<br>
      <a href="http://www.ble.state.mn.us" target="_blank">http://www.ble.state.mn.us</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Mississippi</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Admissions<br>
      Court of Appeals Building<br>
      656 North State Street, 1st Floor<br>
      Jackson, MS 39202<br>
      Telephone: (601) 354-6055<br>
      <a href="http://www.mssc.state.ms.us" target="_blank">http://www.mssc.state.ms.us</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Missouri</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      Supreme Court Building<br>
      P.O. Box 150<br>
      Jefferson City, MO 65102<br>
      Telephone: (573) 751-4144<br>
      Fax: (573) 751-5335<br>
      <a href="http://www.osca.state.mo.us" target="_blank">http://www.osca.state.mo.us</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Montana</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      State Bar of Montana<br>
      P.O. Box 577<br>
      Helena, MT 59624<br>
      Telephone: (406) 442-7660<br>
      <a href="http://www.montanabar.org" target="_blank">http://www.montanabar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Nebraska</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Nebraska State Bar Commission<br>
      635 South 14th Street<br>
      P.O. Box 81809-1809<br>
      Lincoln, NE 68501<br>
      Telephone: (402) 475-7091<br>
      <a href="http://www.nebar.com" target="_blank">http://www.nebar.com</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Nevada</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      State Bar of Nevada<br>
      600 East Charleston Blvd.<br>
      Las Vegas, NV 89104<br>
      Telephone: (702) 382-2200<br>
      <a href="http://www.nvbar.org" target="_blank">http://www.nvbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>New Hampshire</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Office of the Clerk<br>
      Supreme Court of New Hampshire<br>
      Noble Drive<br>
      Concord, NH 03301<br>
      Telephone: (603) 271-2646<br>
      <a href="http://www.nhbar.org" target="_blank">http://www.nhbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>New Jersey</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      25 Market Street<br>
      8th Floor - North Wing CN-973<br>
      Trenton, NJ 08625<br>
      Telephone: (609) 984-7783<br>
      <a href="http://www.njbarexams.org" target="_blank">http://www.njbarexams.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>New Mexico</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      9420 Indian School Road, N.E.<br>
      Albuquerque, NM 87112<br>
      Telephone: (505) 271-9706<br>
      Fax: (505) 271-9768<br>
      <a href="mailto:info@nmexam.org">info@nmexam.org</a><br>
      <a href="http://www.nmexam.org" target="_blank">http://www.nmexam.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>New York</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      State Board of Law Examiners<br>
      7 Executive Centre Drive<br>
      Albany, NY 12203-5195<br>
      Telephone: (518) 452-8700<br>
      (800) 342-3335 (in NY only)<br>
      <a href="http://www.nybarexam.org" target="_blank">http://www.nybarexam.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>North Carolina</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      One Exchange Plaza<br>
      Suite 700<br>
      Raleigh, NC 27602<br>
      Telephone: (919) 828-4886<br>
      <a href="http://www.barlinc.org" target="_blank">http://www.barlinc.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>North Dakota</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Bar Admissions Administrator<br>
      State Board of Bar Examiners<br>
      Judicial Wing, 1st Floor<br>
      600 E. Boulevard Avenue, Dept. 180<br>
      Bismarck, ND 58505-0530<br>
      Telephone: (701) 328-4201<br>
      <a href="http://www.court.state.nd.us/" target="_blank">http://www.court.state.nd.us/</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Ohio</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Admissions Office<br>
      Supreme Court of Ohio<br>
      30 East Broad Street<br>
      Columbus, OH 43215<br>
      Telephone: (614) 466-1528<br>
      <a href="mailto:admissions@sconet.state.oh.us">admissions@sconet.state.oh.us</a><br>
      <a href="http://www.sconet.state.oh.us/Admissions" target="_blank">http://www.sconet.state.oh.us/Admissions</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Oklahoma</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      P.O. Box 53036<br>
      1901 North Lincoln Boulevard<br>
      Oklahoma City, OK 73152<br>
      Telephone: (405) 524-2365<br>
      <a href="http://www.okbar.org/publicinfo/admissions" target="_blank"> http://www.okbar.org/publicinfo/admissions</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Oregon</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        Oregon State Board of Bar Examiners<br>
        5200 S.W. Meadows Road<br>
        P.O. Box 1689<br>
        Lake Oswego, OR 97035-0889<br>
        Telephone: (503) 620-0222<br>
        <a href="http://www.osbar.org/programs/admissions" target="_blank">http://www.osbar.org/programs/admissions</a></font></p></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Pennsylvania</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Pennsylvania Board of Law Examiners<br>
      5035 Ritter Road, Suite 1100<br>
      AOPC Building<br>
      Mechanicsburg, PA 17055<br>
      Telephone: (717) 795-7270<br>
      <a href="http://www.pable.org" target="_blank">http://www.pable.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Rhode Island</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Clerk, Supreme Court<br>
      Providence County Courthouse<br>
      250 Benefit Street<br>
      Providence, RI 02903<br>
      Telephone: (401) 222-3272<br>
      <a href="http://www.courts.state.ri.us" target="_blank">http://www.courts.state.ri.us</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>South Carolina</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      The Supreme Court of South Carolina<br>
      P.O. Box 11330<br>
      Columbia, SC 29211<br>
      Telephone: (803) 734-1080<br>
      <a href="http://www.judicial.state.sc.us/bar" target="_blank">http://www.judicial.state.sc.us/bar</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>South Dakota</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      State Capitol<br>
      500 East Capitol Avenue<br>
      Pierre, SD 57501<br>
      Telephone: (605) 773-4898<br>
      <a href="http://www.state.sd.us/state/judicial" target="_blank">http://www.state.sd.us/state/judicial</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Tennessee</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Tennessee Board of Law Examiners<br>
      706 Church Street, Suite 100<br>
      Nashville, TN 37243<br>
      Telephone: (615) 741-3234<br>
      <a href="mailto:ib27ble02@smtpaoc.tsc.state.tn.us">ib27ble02@smtpaoc.tsc.state.tn.us</a><br>
      <a href="http://www.state.tn.us/lawexaminers" target="_blank">http://www.state.tn.us/lawexaminers</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Texas</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      P.O. Box 13486<br>
      Austin, TX 78711-3486<br>
      Telephone: (512) 463-1621<br>
      <a href="mailto:info@ble.state.tx.us">info@ble.state.tx.us</a><br>
      <a href="http://www.ble.state.tx.us" target="_blank">http://www.ble.state.tx.us</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Utah</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Utah State Bar<br>
      645 South 200 East<br>
      Salt Lake City, UT 84111<br>
      Telephone: (801) 531-9077<br>
      <a href="mailto:adm@utahbar.org">adm@utahbar.org</a><br>
      <a href="http://www.utahbar.org" target="_blank">http://www.utahbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Vermont</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      109 State Street<br>
      Montpelier, VT 05609-0702<br>
      Telephone: (802) 828-3281<br>
      <a href="http://www.vtbar.org" target="_blank">http://www.vtbar.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Virginia</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Virginia Board of Bar Examiners<br>
      Shockhoe Center, Suite 225<br>
      11 South 12th Street<br>
      Richmond, VA 23219<br>
      Telephone: (804) 786-7490<br>
      (recorded message<br>
      phone answered 10am-12pm &amp; 2pm-4pm)<br>
      <a href="http://www.vsb.org" target="_blank">http://www.vsb.org</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Washington</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Washington State Bar Association<br>
      2101 4th Avenue, 4th Floor<br>
      Seattle, WA 98121<br>
      Telephone: (206) 443-WSBA<br>
      (800) 945-WSBA<br>
      Fax: (206) 727-8320<br>
      <a href="http://www.wsba.org" target="_blank">http://www.wsba.org/</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>West Virginia</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Law Examiners<br>
      910 Quarrier Street<br>
      Suite 212, Davidson Bldg.<br>
      Charleston, WV 25301<br>
      Telephone: (304) 558-7815<br>
      <a href="http://www.state.wv.us/wvsca" target="_blank">http://www.state.wv.us/wvsca</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><font size="3" face="Arial, Helvetica, sans-serif"><strong>Wisconsin</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
      Board of Bar Examiners<br>
      110 East Main Street<br>
      Madison, WI 53703<br>
      Telephone: (608) 266-9760<br>
      <a href="mailto:BBE@courts.state.wi.us">BBE@courts.state.wi.us</a><br>
      <a href="http://www.courts.state.wi.us/bbe/" target="_blank">http://www.courts.state.wi.us/bbe/</a></font></td>
  </tr>
  <tr align="left" valign="top"> 
    <td><p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Wyoming</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        State Board of Law Examiners<br>
        P.O. Box 109<br>
        Cheyenne, WY 82003-0109<br>
        Telephone: (307) 632-9061</font></p>
      <p><font size="2" face="Arial, Helvetica, sans-serif">For application:<br>
        Clerk, Wyoming Supreme Court<br>
        Supreme Court Building<br>
        Cheyenne, WY 82002<br>
        Telephone: (307) 777-7316<br>
        <a href="http://www.wyomingbar.org" target="_blank">http://www.wyomingbar.org</a></font></p></td>
  </tr>
  <tr align="left" valign="top"> 
    <td> <p><font size="3" face="Arial, Helvetica, sans-serif"><strong>Washington 
        D.C.</strong></font><font size="2" face="Arial, Helvetica, sans-serif"><br>
        Committee on Admissions<br>
        District of Columbia Court of Appeals<br>
        500 Indiana Avenue, N.W. Room 4200<br>
        Washington, D.C. 20001<br>
        Telephone: (202) 879-2710<br>
        <a href="http://www.dcbar.org" target="_blank">http://www.dcbar.org</a></font></p></td>
  </tr>
</table>
<p><font size="2" face="Arial, Helvetica, sans-serif">E-mail <a href="mailto:info@silenttimer.com">info@silenttimer.com</a> 
  for updates or corrections.</font></p>
<p>
  <?
// -------------------------- YOUR CODE GOES ABOVE THIS LINE ------------------------------------------------------------------- >>>>>

// has links that show up at the bottom in it.
require "../../include/footerlinks.php";

// has side menu, and bottom HTML TAGS
require "include/sidemenu.php";
?>
</p>
