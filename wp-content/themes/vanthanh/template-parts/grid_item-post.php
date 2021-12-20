<?php
$link  = esc_url( get_permalink() );
$type  = get_post_type();
$title = get_the_title();

//$publishedDate = '<span class="_date">' . get_the_date( 'd' ) .
//                 '</span><span class="_month">TH ' . get_the_date( 'm' ) . "</span>";

?>
<div data-id="post-<?php the_ID(); ?>" class="grid-item-post">
    <a href="<?= $link ?>">
        <div class="_inner_post">
            <div class="_thumb">
	            <?php vanthanh_post_thumbnail(true); ?>
            </div>

            <h4 class="_name h4 gray"><?= $title ?></h4>
        </div>
    </a>
</div>
