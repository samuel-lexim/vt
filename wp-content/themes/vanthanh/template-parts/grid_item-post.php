<?php
$link  = esc_url( get_permalink() );
$type  = get_post_type();
$title = get_the_title();

?>
<div class="grid-item-post" data-id="<?php the_ID(); ?>" data-type="<?= $type ?>">
    <a href="<?= $link ?>">
        <div class="_inner_post">
            <div class="_thumb">
	            <?php vanthanh_post_thumbnail(true); ?>
            </div>

            <h4 class="_name s16 fw700 gray"><?= $title ?></h4>
        </div>
    </a>
</div>
