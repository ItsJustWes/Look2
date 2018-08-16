
<?php

$MATCHES_OVERRIDE = -1;    //set to -1 to disable override








function ReturnMatches($q, $city, $name, $matches, $first, $ads)
{

    $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
    $DATABASE_NAME   ='vic_vic';
    $DATABASE_USER   = 'vic_dub';
    $DATABASE_PASSWORD = 'gabe0810';




    global $MATCHES_OVERRIDE;

    if ($q) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 30;
        if (!$ads) {
            $ads = 0;
        }
        }

if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }

    
    
   
$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);


        $query =  "SELECT List.* ";
        $query .= ",MATCH(Keywords1, City, Name) AGAINST (' . $q . ' IN BOOLEAN MODE) AS Relevance  ";
        $query .= "FROM List ";
        $query .= "WHERE MATCH(Keywords1, City, Name) AGAINST (' . $q . ' IN BOOLEAN MODE) HAVING Relevance > 0.03  ";

  $query .= "ORDER BY Relevance DESC ";
  $query .= "LIMIT " . $first . "," . $matches;








$result = mysql_query($query, $db)

            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);

echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n"; 
echo "<html>	\n"; 
echo "<head>	\n"; 
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n"; 	
echo "<title>$q Victoria | Victoria British Columbia</title>	\n"; 
echo "<meta name=\"keywords\" content=\"$q Victoria, Victoria, Victoria British Columbia, Victoria business, British Columbia yellowpages, Look2 yellowpages, british columbia business \">\n"; 
echo "<meta name=\"description\" content=\"$q Victoria - British Columbia business search results - \">  \n"; 
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
?>

<script language="JavaScript">
function blockError(){return true;}
window.onerror = blockError;
</script>

<style fprolloverstyle>A:hover {color: #800000}
</style>


</head>
<body><center>
<div id="wrap">
<div id="header"><img src="/look2yellowpages1.jpg" align="left" alt="Victoria business"><h1><strong>Victoria</strong><br>BC Business</h1>
</div>
<div id="content">

<div align="center"> 

<p><font face="Verdana" size="2" color="#000000"><b>BC Business</b>:</font></p>

<form style="margin: 0px" action="search.php" method=get> 
  
<input name="q" type="text" value="" size="31">
    
  
<INPUT TYPE=submit value="Search" class="current"></form>
</div>



<div align="center">
  <table border="0" width="600" cellspacing="0" cellpadding="2">
  <tr>
  <td width="600px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; Victoria Category 
      Listings:&nbsp;&nbsp; </font>
      
      <a href="cat.php" style="color:#800000;">All Categories</a>
	  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="/" style="color:#800000">Home</a></b>
	  </td>
    </tr>
</table>
</div>

<?PHP


    



echo "<table width=\"100%\" cellspacing=\"0\"><tr><td width=\"50%\">\n";

echo " <font face='Verdana' color='#000000' size='2'> &nbsp;&nbsp;<b>$q</b>\n";

echo " 	 <font color=\"#000000\" face=\"Verdana\" size=\"2\">Listings " . ($first+1) . "  to " . ($first+30) . "	\n"; 

echo "      </td>\n";

 

echo "<td width=\"50%\"><p align=\"right\"><b>\n";

	if ($first == 0) {
		echo "";
	} else {
		echo "<a style=\"text-decoration: none\" href=\"search.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first-$matches) . "&ads=" . ($ads-3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Prev</a>  | ";
	}
	echo "   ";
	if ($no_results == 1) {
		echo "Next";
	} else {
	echo "<a style=\"text-decoration: none\" href=\"search.php?q=" . $q . "&matches=" . $matches . "&first=" . ($first+$matches) .  "&ads=" . ($ads+3) . "\" ><font face=\"Verdana\" size=\"2\" color='#800000'>Next</a></font>&nbsp;&nbsp;\n";
	}

echo "</td><hr align=\"center\" width=\"100%\" size=\"1px\" color=\'#000000'></tr></table></b>&nbsp;&nbsp;\n";






echo "<table width=\"100%\" cellspacing=\"0\"><tr><td width=\"50%\" valign=\"top\"> \n";




    include 'google.php';







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





echo "<font face='verdana' size='2' color='#800000'>\n";
printf("<img src=\"clip.gif\"> <a href=\"businesspage.php?telephone=%s&geo=%s %s %s %s\" ><b>%s</b></a></font><br>  \n", $row["Telephone"], $row["Address"], $row["City"], $row["Province"], $row["Zip"], $row["Name"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;%s    \n", $row["Address"]);
printf("  %s, %s %s</font><br>\n", $row["City"], $row["Province"], $row["zip"]);
printf(" <font face='verdana' size='2'>&nbsp;&nbsp;&nbsp;&nbsp;Tel: %s   &nbsp;&nbsp;Fax: %s</font><br>\n", $row["Telephone"], $row["Fax"]);
printf(" <font face='verdana' size='1'>&nbsp;&nbsp;&nbsp;&nbsp;<b>Cat:</b> %s | %s<br><br></font> \n", $row["Keywords1"], $row["Keywords2"]); 










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

    ReturnMatches($q, $city, $name, $matches, $first, $ads);



     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {

 

echo "No More Results";



        } else {



    }








echo "</td></tr></table> \n";
?>



<hr align="center" width="800px" size="1px" color="#000000">

<div align="center">
      <table align="center" border="0" width="800" cellspacing="0" cellpadding="2">
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; More Look2 Business Search Directories:</b><br /><a href="http://www.look2britishcolumbia.com">British Columbia Business Search</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.look2alberta.com">Alberta Business</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="http://www.look2quebec.com">Quebec Business</a></font></td>
  </tr>
  <tr>
    
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2fortcollins.com">Fort Collins Colorado</a> <br />
  <a href="http://www.look2indianapolis.com">Indianapolis Indiana</a><br />
  <a href="http://www.look2portland.com">Portland Oregon</a><br />
  <a href="http://www.look2spokane.com">Spokane Washington</a><br />
  <a href="http://www.look2lasvegas.com">Las Vegas Nevada</a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2mesa.com">Mesa Arizona</a><br />
  <a href="http://www.look2chandler.com">Chandler Arizona</a><br />
  <a href="http://www.look2tucson.com">Tucson Arizona</a><br />
  <a href="http://www.look2albuquerque.com">Albuquerque NM </a><br />
  <a href="http://www.look2raleigh.com">Raleigh NC </a><br /></font>
       </td>
    <td width="200" valign="top"><font size="1">
  <a href="http://www.look2henderson.com">Henderson Nevada</a><br />
  <a href="http://www.look2oregon.com">Oregon</a><br />
  <a href="http://www.look2newmexico.com">New Mexico</a><br />
  <a href="http://www.look2utah.com">Utah</a><br />
  <a href="http://www.look2washington.com">Washington State</a><br /></font>
        </td>
  <td width="200" valign="top"><font size="1">
  <a href="http://www.look2phoenix.com">Phoenix Arizona</a><br />
  <a href="http://www.look2charlotte.net">Charlotte NC</a><br /> 
  <a href="http://www.look2omaha.com">Omaha Nebraska </a><br />
  <a href="http://www.look2reno.com">Reno Nevada </a><br /> 
  <a href="http://www.look2glendale.com">Glendale Arizona</a><br /></font>
  </td>
  </tr>
</table>
</div>
<!-- Start of StatCounter Code -->
<script type="text/javascript" language="javascript">
var sc_project=2337356; 
var sc_invisible=1; 
var sc_partition=21; 
var sc_security="41fb5fe2"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c22.statcounter.com/counter.php?sc_project=2337356&amp;java=0&amp;security=41fb5fe2&amp;invisible=1" alt="free web hit counter" border="0"></a> </noscript>
<!-- End of StatCounter Code -->

<div id="footer">Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://www.look2victoria.com/privacypolicy.html">Privacy Policy 
</div>
</div>
</div></center>
</body></html>




