<?php

echo " 	<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\"	\n";
echo "  	\"http://www.w3.org/TR/html4/loose.dtd\">\n";
echo "  	<html>	\n";
echo "  	<head>	\n";
echo "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "  <title>Vancouver British Columbia Business Search - Results</title>\n";
echo "<meta name=\"keywords\" content=\"Vancouver yellowpages, Look2 yellowpages, Vancouver yellow pages, business pages, directory, business directory, business yellow pages, Vancouver business search \">\n"; 
echo "<meta name=\"description\" content=\"Vancouver British Columbia Business Search\">  \n";
echo "<link rel=\"stylesheet\" href=\"/dub.css\" type=\"text/css\"/>\n";
?>

<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAAoIxEzse0hCAeXEJftW8hWhRKh03_toDkEWLCrGNccJClGk3lnBSuU42NGxRl4lgZi5HYFSgpl48G3Q"
        type="text/javascript">
</script>

<script type="text/javascript">
    //<![CDATA[

    var map = null;
    var geocoder = null;

    function load() {
      if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("map"));
        map.setCenter(new GLatLng(49.253976, -123.108091), 12);
        geocoder = new GClientGeocoder();
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
              map.setCenter(point, 13);
              var marker = new GMarker(point);
              map.addOverlay(marker);
              marker.openInfoWindowHtml(address);
            }
          }
        );
      }
    }
    //]]>
    </script>



</head><body onLoad="load()" onUnload="GUnload()"><center> 

<form action="#" onSubmit="showAddress(this.address.value); return false">
      <p>
	  
    <input type="text" size="60" name="address" value="Vancouver" />

        <input type="submit" value="Go!" />
      </p>
      <div id="map" style="width: 500px; height: 300px"></div>
    </form>

</center></body></html>