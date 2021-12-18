<?php get_header(); ?>

    <div id="main" class="site-main page-main page-template" role="main">

		<?php
		// Start the loop.
		while (have_posts()) : the_post();

			$page_sections = get_field('page_sections');

			if ($page_sections && is_array($page_sections)) {
				foreach ($page_sections as $section) {
					$layout = $section['acf_fc_layout'];

					get_template_part('acf-layout/section', $layout, $section);
					?>
				<?php } ?>

			<?php } ?>

		<?php
		endwhile;
		// End of the loop.
		?>

    </div><!-- .site-main -->

<?php get_footer(); ?>