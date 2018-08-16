
<?php
$MATCHES_OVERRIDE = -1;    //set to -1 to disable override
function ReturnMatches($q, $c, $s, $matches, $first, $ads)
{
    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   = '$s';
    $DATABASE_USER   = 'can_wes'
    $DATABASE_PASSWORD = 'gabe0810';
    global $MATCHES_OVERRIDE;
    if ($q) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 80;
        if (!$ads) {
            $ads = 0;
        }
        }
if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }
    
$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($s, $db);
        $query =  "SELECT List.* ";
        $query .= ",MATCH(City) AGAINST (' . \"$c\" . ' IN BOOLEAN MODE)";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(City) AGAINST (' . \"$c\" . ' IN BOOLEAN MODE)  ";
  $query .= "GROUP BY Name ASC ";
  $query .= "LIMIT " . $first . "," . $matches;
$result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");
        $row = mysql_fetch_array($result);
mysql_close($db);
echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n"; 
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n"; 
echo "  	<html>	\n"; 
echo "  	<head>	\n"; 
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n"; 	
echo " 	 <title>$c, $s Businesses</title>	\n"; 
echo "<meta name=\"keywords\" content=\"$c, $s Businesses \">\n"; 

?>
<link href="dub.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<div style="background-color:#FFFF00; width:100%; height:12px;">
    <h2 style="font-size:12px">Searchable Business Directory - All Canadian Provinces - Look2Canada.com</h2>
</div>
	
<div id="wrap">
<a href="index.php">
   	<div id="header" align="center"><br>
	<h1><strong>Canada</strong></h1>
	</div></a>
<div id="content">

<table border="0" width="100%">
  <tr>
        <td>
    <center>
    
    
  <?php
echo "       <b><font face=\"Verdana\" color=\"#000000\" size=\"2\">Search $c, $s Yellowpages</font> </b><br>\n";
      
echo " <center>     <form style=\"margin: 0px\" action=\"c.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
echo "              <input name=s type=hidden value=\"$s\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search\"></center></form>\n";
    
?>    
    
   
    
    
    
    </td>
  </tr>
  </table>
    <table width="100%" bgcolor="#FFFFD2" cellspacing="0" style="border-top:1px groove #000000; border-bottom:1px groove #000000;">
      <tr>
        <td><b><font face="Verdana" size="2">&nbsp; 
<?php
echo "        <a title=\"Go To $s$c Yellowpages Home\" href=\"city.php?c=$c&s=$s\">Home</a>\n";
?>
        <font face="Times New Roman" size="2">&#9642;</font>
<font face="Verdana" size="2">
<?php
echo "        <a title=\"Over 850 Business Categories\" href=\"city.php?c=$c&s=$s\">$c, $s Business Categories</a></font></b>\n";
?>
         
		

<?PHP

echo "</td></tr></table>\n"; 

echo "<table width=\"100%\" style=\"border-bottom:1px groove #000000; border-top:1px groove #000000; \">
<tr> <td width=\"80%\" valign=\"top\">\n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "cityaddon.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?keywords=" . urlencode('$s') . "&s=$s";
} else {
	$remote_url .= "?keywords=" . urlencode($s) . "&matches=$matches&first=$first";
}
//include
@include $remote_url;

echo "</td></tr></table>	\n";

echo "<table width=\"100%\" style=\"border-top:1px groove #000000; \">
<tr> <td width=\"100%\" valign=\"top\">\n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google3.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 
	
	

echo "      </td></tr></table><br />	\n"; 

 
echo "<table width=\"100%\"><tr><td width=\"50%\" align=\"left\" valign='top'>\n";
	echo " <font face='Verdana' color='#000000' size='3'> &nbsp;&nbsp;<b>Businesses in $c, $s</b> <br /> \n";

	
	if ($first == 0) {
		echo "";
	} else {
		echo "<a style=\"color:#800000;\" href=\"?q=" . $q . "&matches=" . $matches ."&s=" . $s . "&first=" . ($first-$matches) . "&c=" . $c . "\" ><font face=\"Verdana\" size=\"2\" color='#000000'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"color:#800000;\" href=\"?q=" . $q . "&matches=" . $matches . "&s=" . $s ."&first=" . ($first+$matches) .  "&c=" . $c . "\" ><font face=\"Verdana\" size=\"2\" color='#000000'>Next</a></font>&nbsp;&nbsp;<br />\n";
	}




echo "<ul>\n";
        if ($first == 0) {
            echo "";
        } else {
            echo "";
        }
        if ($no_results == 1) {
echo "No More Results";
        } else {
    }
  $no_results = 0;
        if ($row) {
            do {

echo "<font face='verdana' size='2' style=\"color:#000000;\">\n";
printf("<li><p align=\"left\"><a title=\"%s | Tel: %s | %s / %s \" href=\"bp.php?&s=$s&telephone=%s&geo=%s %s %s %s\" style=\"color:#800000;\"><b>%s</b></a></li></font><br>  \n", $row["Address"], $row["Telephone"], $row["Keywords1"], $row["Keywords2"], $row["Telephone"], $row["Address"], $row["City"], $row["Province"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["Province"], $row["Zip"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Category:</b> <i>%s</i> <br> \n", $row["Keywords1"], $row["Keywords2"]); 
printf(" &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"street.php?q=%s&c=%s&s=$s\">View Businesses On This Street</a></font></center>\n", $row["Address"], $row["City"]);


echo " <br>\n";
            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "<center><hr noshade color=\"#000000\" width=\"90%\" size=\"1\"><font size='2' color='808080'><b>We have no more \"$q\" records for $c, $s</b></font><br> ";
            echo "<br><a href=\"s.php?q=$q&s=$s\">Click Here</a> to broaden your search to all of $s.<hr noshade color=\"#000000\" width=\"100%\" size=\"1\"></center> ";
        
            if ($first == 0) {
            } else {
                echo "<br>\n";
 
            }
        }
}
}
    ReturnMatches($q, $c, $s, $matches, $first, $ads);
     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }
        if ($no_results == 1) {
 
echo "No More Results";
        } else {
    }
	
	
	echo "</td><td width='50%' valign='top'> \n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google5.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 
	
	

echo "      </td>	\n"; 
echo "    </tr>	\n"; 
echo "  </table>	\n"; 

echo"<div id=\"footer\">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com 
</div> \n";
echo "</div></div></center></body></html>     \n";
$GLOBALS['adl_count_params']=true;
@include_once $GLOBALS['HTTP_SERVER_VARS']['DOCUMENT_ROOT'].'/twatch_include/logger.php';

?> 
