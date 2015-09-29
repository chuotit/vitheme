<?php
get_header(); ?>

<main id="main-content" class="main-content">

	<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>

		<?php vi_theme_paging_nav(); ?>

	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

</main><!-- #main-content -->
<div id="sidebar" class="sidebar">
	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
