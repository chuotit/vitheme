</div>
</section><!-- .content-area -->

<footer id="footer" class="site-footer">
	<div class="container">
		<div class="copyright">
			<p>&copy; <?php echo the_date('Y'); ?> - <a href="#"><?php bloginfo('sitename'); ?></a></p>
		</div>
		<div class="site-info">
			<?php printf( __( 'Theme: %1$s by %2$s.', 'vi_theme' ),
					'Vifonic',
					'<a href="http://automattic.com/" rel="designer">Vifonic</a>'
				);
			?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>