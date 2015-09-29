<?php
/**
 * @package vi
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-thumbnail">
		<?php vi_theme_entry_thumbnail( 'thumbnail' ); ?>
	</div><!-- .entry-thumbnail -->
	<div class="entry-header">
		<?php vi_theme_entry_header(); ?>
		<?php vi_theme_entry_meta(); ?>
	</div><!-- .entry-header -->
	<div class="entry-content">
		<?php vi_theme_entry_content(); ?>
	</div><!-- .entry-content -->
	<div class="entry-footer">
		<?php vi_theme_entry_tag(); ?>
	</div><!-- .entry-footer -->
</article><!-- #post-## -->