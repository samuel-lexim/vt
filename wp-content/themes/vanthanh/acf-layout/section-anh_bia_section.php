<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	$class = '';
	?>

    <div class="anh_bia_section">
		<?php if ( $args['hero_img'] ) { ?>

            <div class="_inner <?= $class ?>" style="background-image: url(<?= $args['hero_img']["url"] ?>)">
				<?php if ( $args['hero_title'] ) { ?>
                    <h1 class="_title"><?= $args['hero_title'] ?></h1>
				<?php } ?>
            </div>

		<?php } ?>
    </div>

<?php } ?>