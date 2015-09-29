<?php get_header(); ?>

<main id="main-content" class="main-content">

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'content', get_post_format() ); ?>

	<?php vi_theme_post_nav(); ?>

	<?php
		// If comments are open or we have at least one comment, load up the comment template
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	?>

<?php endwhile; // end of the loop. ?>

</main><!-- #main-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
