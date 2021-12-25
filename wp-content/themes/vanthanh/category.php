<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vanthanh
 */

get_header();
?>

	<main id="primary" class="site-main category-template">
        <header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
        </header>

        <div class="LR_pad category_page_inner">
		<?php if ( have_posts() ) : ?>

			<?php
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			//the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;

		get_sidebar();

		?>
        </div>

	</main><!-- #main -->

<?php
get_footer();
