<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script language="javascript">
<!-- hide this script from non-javascript-enabled browsers
/*
JS_POPUP version 1.0
www.molotovbliss.com
written June 16, 2002

DESCRPTION: Display popup window, either fullscreen or normal popup of a specified dimension, along
with writing a cookie for each session to make sure ads are only displayed once.  By default this script
is configured to do a normal popup using the onExitFrames(); function so that the popup is only shown
after the user has left your domain.

*/

// setup variables
var address = "'http://www.js-x.com'"; //popup url
var contentframe = "http://www.yahoo.com"; //used with onExitFrames();
var fs=false; // fullscreen true/false
var w=640; // width
var h=480; // height

// comment out if you do not want an exit popup just use doPopUp(); for regular popups
onunload=doPopUp(",address, ",",fs,",",w,",",h,");

// ---------------------------------------
// FUNCTIONS
// ---------------------------------------

// normal popup
function popup(address, mylocation, mystatus, mytoolbar, scrollbar, w, h) {
  var extra = "location="+ mylocation +",status="+ mystatus +",toolbar="+ mytoolbar +",width="+ w +",height="+ h +",scrollbar="+ scrollbar;
  window.open(address,'newwindow',extra);
}

// fullscreen popup (netscape safe, hopefully)
function fullscreen(address) {
  if (detectBrowser()=="IE") {
    window.open(address, 'newwindow', 'fullscreen=yes,scroll=no');
  } else {
    mywindow = window.open(address, 'newwindow', 'location=no,status=no,toolbar=no,scrollbar=no,width='+screen.width+',height='+screen.height);
    mywindow.focus();
    mywindow.moveTo(50,50);
  }
}

// detect users agent (browser)
function detectBrowser() {
 if (parseInt(navigator.appVersion) >= 4) {
  if (navigator.appName == "Netscape") {
   browser = "Netscape";
  } else {
   browser = "IE";
  }
 }
 return browser;
}

// set cookie optional expire
function setCookie(name, value, expire) {
 document.cookie = name + "=" + escape(value)
 + ((expire == null) ? "" : ("; expires=" + expire.toGMTString()));
}

// get cookie value
function getCookie(Name) {
  var search = Name + "="
  if (document.cookie.length > 0) { // if there are any cookies
    offset = document.cookie.indexOf(search)
    if (offset != -1) { // if cookie exists
    offset += search.length
    end = document.cookie.indexOf(";", offset)
      if (end == -1)
       end = document.cookie.length
      return unescape(document.cookie.substring(offset, end))
    }
  } else {
    return false;
  }
}

//execute all functions together to perform a popup
function doPopUp(address, fs, w, h) {
  if (getCookie('popup')==false) {
    setCookie('popup',this.location.href);
    if (fs) {
      fullscreen(address);
    } else {
      popup(address,'no','no','no','no',w ,h);
    }
  }
}

// stop hiding -->
</script>



</head>
<body>
testing... leave popup 
</body>
</html>
