
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
        $query .= ",MATCH(Address) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(City) AGAINST (' . \"$c\" . ' IN BOOLEAN MODE) HAVING Relevance > 0.95  ";
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
echo " 	 <title>Businesses Near $q in $c, $s</title>	\n"; 
echo "<meta name=\"keywords\" content=\"$c, $s $q \">\n"; 

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
    <td width="377">
    
        
  <?php
echo "       <b><font face=\"Verdana\" color=\"#000000\" size=\"2\">Search $c, $s Yellowpages</font> </b><br>\n";
      
echo " <center>     <form style=\"margin: 0px\" action=\"c.php\" method=get> \n";
echo "              <input name=c type=hidden value=\"$c\">\n";
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
echo "        <a style=\"text-decoration: none; color: #000000\" title=\"Go To $s$c Yellowpages Home\" href=\"city.php?c=$c&s=$s\">$c Home</a>\n";
?>
        <font face="Times New Roman" size="2">&#9642;</font>
<font face="Verdana" size="2">
<?php
echo "        <a style=\"text-decoration: none; color: #000000\" title=\"Over 850 Business Categories\" href=\"citycategories.php?c=$c&s=$s\">$c, $s\n";
?>
        Business Categories</a></font></b></td>
      </tr>
</table>

<?php
echo "    <br />	\n"; 
echo "<table width=\"100%\" cellspacing=\"0\"><tr><td width=\"50%\" style=\"border-top:1px groove #000000; border-bottom:1px groove #000000;\">\n";
echo " <font face='Verdana' color='#000000' size='3'> &nbsp;&nbsp;<b>Businesses Near $q in $c, $s</b><br /> \n";

echo "<br /><b>\n";
	if ($first == 0) {
		echo "";
	} else {
echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches ."&s=" . $s . "&first=" . ($first-$matches) . "&c=" . $c . "\" ><font face=\"Verdana\" size=\"2\" color='#000000'>Prev</a>  | ";
	}
echo "   ";
	if ($no_results == 1) {
echo "Next";
	} else {
echo "<a style=\"text-decoration: none\" href=\"?q=" . $q . "&matches=" . $matches . "&s=" . $s ."&first=" . ($first+$matches) .  "&c=" . $c . "\" ><font face=\"Verdana\" size=\"2\" color='#000000'>Next</a></font>&nbsp;&nbsp;\n";
	}
echo  "</b><br /><br />  n";


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
echo "<font face='verdana' size='2'>\n";
printf("<img src=\"clip.gif\"> <a href=\"bp.php?&s=$s&telephone=%s&geo=%s %s %s %s\"  style=\"color:#800000;\"><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["Province"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["Province"], $row["Zip"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s</font><br><br> \n", $row["Keywords1"], $row["Keywords2"]); 

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
echo "  </td> \n";	
echo "  <td valign='top' width='50%'>	\n";
	
	$DIRECTORY_SERVER_AND_PATH = "http://www.look2canada.com/";
	$remote_url  = $DIRECTORY_SERVER_AND_PATH . "google5.php";
	if ($MATCHES_OVERRIDE > 0) {
		$remote_url .= "?keywords=" . urlencode($q) . "&c=$c";
	} else {
		$remote_url .= "?keywords=" . urlencode($q) . "&matches=$matches&first=$first";
	}
	//include
	@include $remote_url; 
	

echo " 	  </td>	\n"; 

echo " 	</tr>	\n"; 
echo " 	</table>  \n"; 
echo"<div id=\"footer\">
Copyright (c) 2006-2007 All Rights Reserved - Look2 Yellowpages.com 
</div> \n";
echo "</div></div></center></body></html>     \n";
$GLOBALS['adl_count_params']=true;
@include_once $GLOBALS['HTTP_SERVER_VARS']['DOCUMENT_ROOT'].'/twatch_include/logger.php';
?>  