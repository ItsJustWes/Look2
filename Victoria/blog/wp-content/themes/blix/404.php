<?php get_header(); ?>

<div id="content">

<h2>Error 404 &ndash; File not Found</h2>
	
<p>Sorry, but the page you were looking for could not be found.</p>

<? include("adsense.php"); ?>
<div style="text-align:center;">
<script type="text/javascript"><!--
google_ad_client = "<?=$GoogleADID?>";
google_ad_width = 336;
google_ad_height = 280;
google_ad_format = "336x280_as";
google_ad_type = "text_image";
google_ad_channel ="";
google_color_border = "<?=$Googleborder?>";
google_color_bg = "<?=$Googlebg?>";
google_color_link = "<?=$Googlelink?>";
google_color_url = "<?=$Googleurl?>";
google_color_text = "<?=$Googletext?>";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>