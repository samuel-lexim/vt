<?php
$link  = esc_url( get_permalink() );
$type  = get_post_type();
$title = get_the_title();

?>
<div class="grid-item-product" data-id="<?php the_ID(); ?>" data-type="<?= $type ?>">
    <div class="_inner_post">
        <div class="_thumb">
			<?php the_post_thumbnail( 'medium' ); ?>
        </div>

        <h4 class="_name s18"><?= $title ?></h4>
        <h4 class="_price s18 blue"><?= 'Giá: ' . getFinalPrice( get_the_ID() ) ?></h4>
		<?= render_blue_button( $link ) ?>
    </div>
</div>
