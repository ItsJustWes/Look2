<?php get_header(); ?>

<div id="content" class="archive">

<?php if (have_posts()) : ?>

<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
<h1><?php echo single_cat_title(); ?></h1>

<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
<h2>Archive for <?php the_time('F jS, Y'); ?></h2>

<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
<h2>Archive for <?php the_time('F, Y'); ?></h2>

<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
<h2>Archive for <?php the_time('Y'); ?></h2>

<?php /* If this is a search */ } elseif (is_search()) { ?>
<h2>Search Results</h2>

<?php /* If this is an author archive */ } elseif (is_author()) { ?>
<h2>Author Archive</h2>

<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
<h2>Blog Archives</h2>

<?php } ?>

<?php while (have_posts()) : the_post(); ?>

<?php $custom_fields = get_post_custom(); ?>

<?php if (isset($custom_fields["BX_post_type"]) && $custom_fields["BX_post_type"][0] == "mini") { ?>

<hr class="low" />

<div class="minientry">

<p>
<?php echo BX_remove_p($post->post_content); ?>
<?php comments_popup_link('(0)', '(1)', '(%)', 'commentlink', ''); ?>
<a href="<?php the_permalink(); ?>" class="permalink" title="<?php the_title(); ?>"><?php the_time('M j, \'y') ?>, <?php the_time('h:ia')  ?></a>
<em class="author">By <?php the_author() ?></em>
</p>
</div>

<hr class="low" />

<?php } else { ?>

<div class="entry">

<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

<p class="info">
<em class="date"><?php the_time('F jS, Y') ?> at <?php the_time('h:ia')  ?></em> 
<em class="caty"><?php _e('Under'); ?> <?php the_category('+ ') ?></em>
</p>

<?php if ($wp_query->current_post == 0) include("first-ad.php"); ?>

<?php ($post->post_excerpt != "")? the_excerpt() : BX_shift_down_headlines($post->post_content); ?>

<p class="info">
<em class="author">By <?php the_author(); ?></em> 
<?php if ($post->post_excerpt != "") { ?>Continue Reading <a href="<?php the_permalink() ?>" class="more"><?php the_title(); ?></a><?php } ?>
<?php comments_popup_link('Add comment', '1 comment', '% comments', 'commentlink', ''); ?> 
<?php edit_post_link('Edit','<span class="editlink">','</span>'); ?>
</p>

</div>

<?php } ?>

<?php endwhile; ?>

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

<p><!-- this is ugly -->
<span class="next"><?php previous_posts_link('Next Posts') ?></span>
<span class="previous"><?php next_posts_link('Previous Posts') ?></span>
</p>

<?php else : ?>

<h2>Not Found</h2>
<p>Sorry, but you are looking for something that isn't here.</p>

<?php endif; ?>

</div> <!-- /content -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>