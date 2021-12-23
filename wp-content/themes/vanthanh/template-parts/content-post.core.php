<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vanthanh
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title s24 fw700 blue">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title s24 fw700">', '</h2>' );
		endif;
		?>

        <div class="entry-meta">
			<?php
			vanthanh_posted_on();
			//vanthanh_posted_by();
			?>
        </div>
    </header>

	<?php // vanthanh_post_thumbnail(); ?>

    <div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'vanthanh' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
    </div>
</article>
