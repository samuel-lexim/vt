<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package vanthanh
 */

get_header();
?>

    <main id="primary" class="site-main single-template after_header_pad before_footer_pad">
        <div class="LR_pad">
            <div class="detail-page-2col-wrap">

                <div class="left_detailPage">
					<?php
					$type   = '';
					$postId = '';
					while ( have_posts() ) :
						the_post();
						$postId = get_the_ID();
						$type   = get_post_type() ?: '';
						get_template_part( 'template-parts/content', get_post_type() );

//						the_post_navigation(
//							array(
//								'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'vanthanh' ) . '</span> <span class="nav-title">%title</span>',
//								'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'vanthanh' ) . '</span> <span class="nav-title">%title</span>',
//							)
//						);

						// If comments are open or we have at least one comment, load up the comment template.
						//if ( comments_open() || get_comments_number() ) {
						//	comments_template();
						//}

					endwhile;
					?>
                </div>

                <div class="right_detailPage sidebar-wrap">
					<?php
					$args_posts = array(
						'post_type'    => $type,
						'posts_per_page'   => 7,
						'orderby'      => 'publish_date',
						'order'        => 'DESC',
						'post__not_in' => [ $postId ],
						'post_status'  => 'publish'
					);
					$postsList  = new WP_Query( $args_posts );
					$heading    = $type === 'post' ? 'TIN TỨC MỚI' : 'NEW ' . $type;

					if ( $postsList->have_posts() ) { ?>
                        <h3 class="sidebar_heading h3 blue"><?= $heading ?></h3>
                        <div class="sidebar-row-list">
							<?php while ( $postsList->have_posts() ) :
								$postsList->the_post();
								get_template_part( 'template-parts/sidebar_rowItem', $type );
							endwhile;
							?>
                        </div>

					<?php } ?>
                </div>

            </div>
        </div>

    </main>

<?php
get_footer();
