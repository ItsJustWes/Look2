
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
            $matches = 20;
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
        $query .= ",MATCH(Keywords1) AGAINST (' . +$q . ' IN BOOLEAN MODE)  AS Relevance   ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(Keywords1) AGAINST (' . +$q . 'IN BOOLEAN MODE)  HAVING Relevance > 0.05 ";
  $query .= "ORDER BY Relevance DESC ";
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
echo " 	 <title>$q in $s</title>	\n"; 
echo "<meta name=\"keywords\" content=\"$s $q \">\n"; 

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

<table border="0" width="100%" id="table1">
  <tr>
    
    <td>
    <p align="center">
    
    
  <?php
echo "       <h2>Search $s Yellowpages</h2><br>\n";
      
echo " <center>     <form style=\"margin: 0px\" action=\"s.php\" method=get> \n";
echo "              <input name=s type=hidden value=\"$s\">\n";
echo "              <input size=35 name=q type=text value=\"\">\n";
echo "              <input type=submit value=\"Search $s\"></center></form>\n";
    
?>    
    
   
    
    
    
    </td>
  </tr>
  </table>
    <table width="100%" bgcolor="#FFFFD2" cellspacing="0" style="border-top:1px groove #000000; border-bottom:1px groove #000000;">
      <tr>
        <td><b><font face="Verdana" size="2">&nbsp; 
<?php
echo "        <a title=\"Go To $c Yellowpages Home\" href=\"province.php?s=$s\">Home</a>\n";
?>
        <font face="Times New Roman" size="2">&#9642;</font>
<font face="Verdana" size="2">
<?php
echo "        <a title=\"Over 850 Business Categories\" href=\"provincialcats.php?s=$s\">$s Business Categories</a></font></b></td></tr></table>\n";




echo "<table width=\"100%\" style=\"border-top:1px groove #000000;\">
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

echo "</td></tr></table>\n";
echo "<table width=\"100%\" style=\"border-top:1px groove #000000; border-bottom:1px groove #000000;\">
  <tr> <td width=\"50%\" valign=\"top\">\n";
  
  $DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "related.php";
    $remote_url .= "?keywords=" . urlencode($q) . "&s=" . urlencode($s) . "";
	@include $remote_url;
echo " </td></tr></table> \n";

echo "<center>     \n";

$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google3.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 
echo "</center><br>     \n";

echo " 	<table width=\"100%\">	\n"; 
echo " 	  <tr>\n"; 
echo "  <td valign='top' width='50%'>	\n"; 
 

echo " <font face='Verdana' color='#000000' size='3'> &nbsp;&nbsp;<b>$q in $s</b><br /><br /> \n";

	
	if ($first == 0) {
		echo "";
	} else {
		echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches ."&s=" . $s . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches . "&s=" . $s ."&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Next</a></font>&nbsp;&nbsp;\n";
	}


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

echo " <font face='verdana' size='1'> \n";
printf("<img src=\"clip.gif\"> <a href=\"bp.php?&s=$s&telephone=%s&geo=%s %s %s %s\" style=\"color:#800000;\"><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["Province"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["Province"], $row["Zip"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Category:</b> <i>%s</i> <br></font> \n", $row["Keywords1"], $row["Keywords2"]); 
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"c.php?q=$q&c=%s&s=$s\" style=\"color:#800000;\">Narrow To %s Only</a> | \n", $row["City"], $row["City"]);
printf(" <a href=\"street.php?q=%s&c=%s&s=$s\" style=\"color:#800000;\">View Businesses On This Street</a></font><br>\n", $row["Address"], $row["City"]);



echo " <br>\n";
            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
            } else {
                echo "No more results found.<br>\n";
 
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

$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google2.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 





echo "</td><td width='49%' valign='top'>\n";

echo "  <center><font face='verdana' size='3'><b>$q News</b></font></center><br><font face='verdana' size='1'>\n";
$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
$remote_url  = $DIRECTORY_SERVER_AND_PATH . "topicnews.php";
if ($MATCHES_OVERRIDE > 0) {
	$remote_url .= "?q=" . urlencode($q) . "&c=$c";
} else {
	$remote_url .= "?q=" . urlencode($q) . "&c=$c";
}
//include
@include $remote_url;
echo "<p>\n";

echo "</font></td>  </tr></table>\n";
echo "<br><br>\n";
        


echo " 	  </td>	\n"; 

echo " 	</tr>	\n"; 
echo " 	</table>\n";


echo "<div id=\"footer\">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com 
</div> \n";
echo "</div></div></center></body></html>     \n";


?>  