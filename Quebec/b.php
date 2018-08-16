

<?php

$MATCHES_OVERRIDE = 5;    //set to -1 to disable override








function ReturnMatches($telephone, $geo, $s, $matches, $first)
{
                                $DATABASE_SERVER = ':/var/lib/mysql/mysql.sock';
	      $DATABASE_NAME   = 'quebec_quebec';
	      $DATABASE_USER   = 'quebec_dub';
	      $DATABASE_PASSWORD = 'gabe0810';


    global $MATCHES_OVERRIDE;

    if ($telephone) {
        if (!$first) {
            $first = 0;
        }
        if (!$matches) {
            //default
            $matches = 5;
        }

if ($MATCHES_OVERRIDE > 0) {
            $matches = $MATCHES_OVERRIDE;
        }


$db = @mysql_connect($DATABASE_SERVER, $DATABASE_USER, $DATABASE_PASSWORD)
            or die("<br><b>Error connecting to database or server too busy: Try again later.</b>");// . mysql_error());
        mysql_select_db($DATABASE_NAME, $db);

        $query =  "SELECT Quebec.* ";
        $query .= ",MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE)  ";
        $query .= "FROM Quebec ";
        $query .= "WHERE MATCH(Telephone) AGAINST (' . \"$telephone\" . ' IN BOOLEAN MODE) ";
		$query .= "ORDER BY `Name` ASC ";
        $query .= "LIMIT " . 0 . "," . 10;

            $result = mysql_query($query, $db)
            or die("<br><b>Error executing query: " . mysql_error() . "</b>\n");

        $row = mysql_fetch_array($result);

mysql_close($db);





echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
printf("<title>%s | %s | %s %s</title> \n", $row["Name"], $row["Keywords1"], $row["City"], $row["Province"]);
printf("<meta name=\"keywords\" content=\"%s, %s, %s, %s, %s, %s, quebec, %s %s\">  \n",  $row["Name"], $row["Telephone"], $row["Address"], $row["Keywords1"], $row["City"], $row["Province"], $row["Keywords1"], $row["City"]);
printf("<meta name=\"description\" content=\"%s  - %s - %s Quebec\">  \n",  $row["Name"], $row["Keywords1"], $row["City"]);
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
?>



<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAoIxEzse0hCAeXEJftW8hWhSGS7418P7BrY9iG85a0-8JNMFtLxQBEdBz9ldEuXcdH3Mr-aoAQE_Ngw"
        type="text/javascript">
</script>
<script type="text/javascript">
    //<![CDATA[

    var map = null;
    var geocoder = null;

    var icon = new GIcon("flag.png");
        icon.image = "flag.png";
        icon.shadow = "shadow-flag.png";
        icon.iconSize = new GSize(22, 20);
        icon.shadowSize = new GSize(22, 20);
        icon.iconAnchor = new GPoint(22, 20);
        icon.infoWindowAnchor = new GPoint(5, 1);

    function load() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
        map.setCenter(new GLatLng(52.038927, -72.751465), 7);
        geocoder = new GClientGeocoder();
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());

      }
    }

    function showAddress(address) {
      if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
              map.setCenter(point, 14);
              var marker = new GMarker(point, icon);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address)
            }
          }
        );
      }
    }
    //]]>
    </script>



</head><body onLoad="load()" onUnload="GUnload()"><center>


<?php

echo "<div style=\"background-color:#FFFF00; width:100%; height:12px;\"> \n";
echo "<h2 style=\"font-size:12px\">Quebec Business | Quebec Canada</h2></div> \n";

echo "<div id=\"wrap\"> \n";
echo "<div id=\"header\"><br /><h1><strong>Quebec</strong></h1>
</div>\n";
echo "<div id=\"content\"> \n";




   




echo "<center>\n";


echo "<table border=\"0\" width=\"350px\" align=\"left\" cellspacing=\"0\" cellpadding=\"0\"><tr><td width=\"350px\"><br />\n";

printf("<b><font face='verdana' size='3' color='#800000'>%s</b><br>  \n", $row["Name"]);
printf("<font face='verdana' size='2' color='#000000'>%s<br>  \n", $row["Address"]);
printf("<font face='verdana' size='2' color='#000000'>%s, %s %s<br> \n", $row["City"], $row["State"], $row["Zip"]);
printf("<font face='verdana' size='2' color='#000000' >Telephone: %s   <br>Fax: %s <br>\n", $row["Telephone"], $row["Fax"]);
printf("<font face='verdana' size='2' color='#000000'>Website: <a target=\"_blank\" href=\"http://%s\">%s</a><br>\n", $row["Web"], $row["Web"]);
printf("<font face='verdana' size='2' color='#000000'>eMail: <a href=\"mailto:%s\">%s</a><br>\n", $row["Email"], $row["Email"]);
printf("<font face='verdana' size='2'color='#000000' >Contact: %s  <br>Listing Id: %s<br><br>  \n", $row["Contact"], $row["Id"]);

printf("<br><font face='verdana' size='2' color='#000000'> \n",  $row["address"],  $row["city"],  $row["state"],  $row["zip"]);

?>

<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 336;
google_ad_height = 280;
google_ad_format = "336x280_as";
google_ad_type = "text";
//2007-02-27: look2#800000block
google_ad_channel = "8349406720";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "800000";
google_color_text = "000000";
google_color_url = "000000";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</td>  </tr></table>

<div align="right">
<form action="#" onSubmit="showAddress(this.address.value); return false">


	  <div align="center"><p>
<input type=text size=100 name=address value="<?echo $row["Address"],"&nbsp;",  $row["City"],"&nbsp;",  $row["Province"]?>"/>

        <input type="submit" value="Go there!" />
	  </p>
	  </div>


      <div id="map" style="width: 450px; height: 415px"></div>
  </form>
</div>


<?php

echo " <div align=\"center\"><font face='verdana' size='3' color='#000000'><b>&nbsp;Support \n";

printf("%s %s \n", $row["City"], $row["State"]);

echo "  Businesses</b></font></div><br /> \n";
?>

<div align=center>
<script type="text/javascript"><!--
google_ad_client = "pub-1757895371029345";
google_ad_width = 728;
google_ad_height = 90;
google_ad_format = "728x90_as";
google_ad_type = "text";
//2007-02-27: look2#800000banner
google_ad_channel = "7041940911";
google_color_border = "ffffff";
google_color_bg = "ffffff";
google_color_link = "800000";
google_color_text = "000000";
google_color_url = "000000";
//-->
</script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<?php
printf("<center><font face='verdana' size='2' color='#000000'><b>Internet Search for:</b> %s<br>\n", $row["Name"]);

printf("<b><a href=\"http://www.google.com/search?sourceid=navclient&ie=UTF-8&rls=GGLJ,GGLJ:2006-11,GGLJ:en&q=%s %s %s\">Google</a> |\n", $row["Name"], $row["City"], $row["State"]);
printf("<a href=\"http://search.yahoo.com/search?&ei=UTF-8&p=%s %s %s\">Yahoo!</a> |\n", $row["Name"], $row["City"], $row["State"]);
printf("<a href=\"http://www.live.com/?FORM=IE7&q=%s %s %s\">MSN Live</a><br></b>\n", $row["Name"], $row["City"], $row["State"]);









printf("<font face='verdana' size='2'>%s<br><font size=\"1\">If you are \"%s\" and would like to update your listing - email us at update@look2yellowpages.com</font>\n", $row["Description"], $row["Name"]);
echo "</font></center> \n";

printf("<font face='verdana' size='2'><b>Categories For \"%s\":</b></font><font face='verdana' size='1'> \n",  $row["Name"]);





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




printf("%s / %s<br>  \n", $row["Keywords1"], $row["Keywords1"], $row["Name"], $row["Keywords1"], $row["Keywords1"]);









            } while ($row = mysql_fetch_array($result));
        } else {
            $no_results = 1;
            echo "\n";
            if ($first == 0) {
                echo "\n";



            } else {
                echo "No more results found.<br>\n";
            }
        }



}
}

    ReturnMatches($telephone, $geo, $s, $matches, $first);



















     if ($first == 0) {
            echo "";
        } else {
            echo "";
        }


        if ($no_results == 1) {



echo "No More Results";



        } else {








    }
echo "<center><form name=\"form2\" action=\"javascript:window.print();\" method=\"post\">\n";
echo "<input type=\"submit\" name=\"Submit\" value=\"Print This Page\">\n";
echo "</form>  \n";
echo "</center>\n";


echo "    <br>\n";











?>

<div align="center">
      <table align="center" border="0" width="800" cellspacing="0" cellpadding="2">
  <tr>
    <td width="800px" valign="top" colspan="5">
<b><font face="Verdana" size="2">&nbsp; More Look2 Business Directories:</font></b><br /><a href="http://www.look2vancouver.com">Vancouver Business</a>|<a href="http://www.look2victoria.com">Victoria Business</a>|<a href="http://www.look2alberta.com">Alberta Business Search</a></td>
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
var sc_project=2574267; 
var sc_invisible=0; 
var sc_partition=25; 
var sc_security="feb12788"; 
</script>

<script type="text/javascript" language="javascript" src="http://www.statcounter.com/counter/counter.js"></script><noscript><a href="http://www.statcounter.com/" target="_blank"><img  src="http://c26.statcounter.com/counter.php?sc_project=2574267&java=0&security=feb12788&invisible=0" alt="website stats" border="0"></a> </noscript>
<!-- End of StatCounter Code -->
<div id="footer">
Copyright (c) 2006-2008 All Rights Reserved - Look2 Yellowpages - <a href="http://www.look2quebec.com/privacypolicy.html">Privacy Policy</a>
</div>
</div></div>
</center>
</body></html>
