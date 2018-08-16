<?php get_header(); ?>

<div id="content">

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<h1><?php the_title(); ?></h1>

<? include("adsense.php"); ?>
<div style="float:right; padding-bottom:10px;">
<script type="text/javascript"><!--
google_ad_client = "<?=$GoogleADID?>";
google_ad_width = 250;
google_ad_height = 250;
google_ad_format = "250x250_as";
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

<?php the_content(); ?>

<?php endwhile; ?>

<?php endif; ?>

</div>

<div style="padding-top:10px;text-align:center;">
<script type="text/javascript"><!--
google_ad_client = "<?=$GoogleADID?>";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
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

<?php get_footer(); ?>