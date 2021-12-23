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

    <main id="primary" class="site-main archive-template">
        <header class="page-header">
			<?php
			$cat            = get_queried_object();
			$category_image = get_field( 'category_image', $cat );
			$hero_bg        = $category_image['url'] ?? getDefaultImg();
			?>
            <div class="anh_bia_section">
                <div class="_inner" style="background-image: url('<?= $hero_bg ?>')">
					<?php
					the_archive_title( '<h1 class="_title blue h0">', '</h1>' );
					?>
                </div>
            </div>
        </header>

        <div class="LR_pad top_pad archive_page_inner">
			<?php if ( have_posts() ) : ?>
                <div class="archive_list_4cols">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/grid_item', get_post_type() );
					endwhile;
					?>
                </div>

                <div class="pagination _right">
					<?php
					echo paginate_links( array(
						'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
						'current'      => max( 1, get_query_var( 'paged' ) ),
						'format'       => '?paged=%#%',
						'show_all'     => false,
						'type'         => 'plain',
						'end_size'     => 2,
						'mid_size'     => 1,
						'prev_next'    => true,
						'prev_text'    => '<i></i>',
						'next_text'    => '<i></i>',
						'add_args'     => false,
						'add_fragment' => '',
					) );
					?>
                </div>

			<?php else :
				get_template_part( 'template-parts/content', 'none' );
			endif;
			// get_sidebar();
			?>
        </div>

    </main>

<?php
get_footer();
