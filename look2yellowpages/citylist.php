

<html>	 
<head>	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">	
<?php
echo" <title>$s Yellowpage Directory by Look2 Yellowpages</title> \n";
echo" <meta name=\"keywords\" content=\"$s Yellowpage Directory\">\n";
?>
<meta name="description" content="Yellowpages"> 

<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Expires" CONTENT="-1">
<meta http-equiv="Content-Language" content="en-us">
 <SCRIPT LANGUAGE="JavaScript">function selecturl(s) 
{
  var gourl = s.options[s.selectedIndex].value;
  if ((gourl != null) && (gourl != "") )
  {
    window.top.location.href = gourl;
  }
}
</SCRIPT>

<link href="dub.css" rel="stylesheet" type="text/css">

<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>


</head>

<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">Searchable Business Directory - over 23 Million Records - Look2Yellowpages.com</h2>
</div>
	
<div id="wrap">
<a href="/">
   	<div id="header" align="center"><br>
	<h1><strong>Yellowpages</strong></h1>
	</div></a>
	
	
<div id="content">


<table border="0" width="100%">
  <tr>
    <td>
    <center>
    
  <?php
echo "       <b><font face=\"Verdana\" color=\"#000000\" size=\"2\">Search $s Yellowpages</font> </b><br>\n";
      
echo " <center>     <form style=\"margin: 0px\" action=\"s.php\" method=get> \n";
echo "              <input name=s type=hidden value=\"$s\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search $s YP\"></center></form>\n";
    
?>  
</td>
  </tr>
  </table>
    <table width="100%" bgcolor="#FFFFD2" cellspacing="0" style="border-top:1px groove #000000; border-bottom:1px groove #000000;">
      <tr>
        <td><b><font face="Verdana" size="2">&nbsp; 
<?php
echo "        <a title=\"Go To $s Yellowpages Home\" href=\"state.php?s=$s\">Home</a>\n";
?>
<font face="Times New Roman" size="2">&#9642;</font>
<?php

echo "       <a title=\"Over 850 Business Categories\" href=\"statecategories.php?s=$s&c=$c\">$s Business Categories</a>\n";
?>
<font face="Times New Roman" size="2">&#9642;</font>
<?php
        

echo "  <a href=\"citylist.php?s=$s&c=$c\">Complete City List</a></font></b></td></tr></table>\n";


echo "<table width=\"100%\" style=\"border-bottom:1px groove #000000;\">
<tr> <td width=\"80%\" valign=\"top\">\n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "cityaddon.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?keywords=" . urlencode('$s') . "&s=$s";
} else {
	$remote_url .= "?keywords=" . urlencode($s) . "&matches=$matches&first=$first";
}
//include
@include $remote_url;

echo "</td></tr></table>\n";
echo " 
<table width=\"100%\">
  <tr> <br /><td width=\"50%\" valign=\"top\">\n";

echo "       <b><font face=\"Verdana\" color=\"#000000\" size=\"3\">Search $s Cities</font> </b><br />\n";
echo "<font face=\"Verdana\" color=\"#800000\">\n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "citylist1.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?keywords=" . urlencode('$s') . "&s=$s";
} else {
	$remote_url .= "?keywords=" . urlencode($s) . "&matches=$matches&first=$first";
}
//include
@include $remote_url;

echo "</font></td> \n";



echo "<td width=\"50%\" valign=\"top\">\n";
echo "<center>     \n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2yellowpages.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google5.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 
echo "</center>     \n";



echo "</td>  </tr></table>\n";



?>  

<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2303224; 
var sc_invisible=1; 
var sc_partition=21; 
var sc_security="a349c1c3"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c22.statcounter.com/counter.php?sc_project=2303224&amp;java=0&amp;security=a349c1c3&amp;invisible=1" alt="free stats" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

<div id="footer">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com 
</div>

   </div></div> 
     </center>    	
  </body></html>