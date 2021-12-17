<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="gioi_thieu_section top_pad <?= $args["bg_color"] ?>">
        <div class="LR_pad">

            <div class="_inner">
				<?php if ( $args['section_title'] ) { ?>
                    <h2 class="_title h1 blue"><?= $args['section_title'] ?></h2>
				<?php } ?>

				<?php if ( $args['first_content'] ) { ?>
                    <div class="_first_content h4 fw300"><?= $args['first_content'] ?></div>
				<?php } ?>

				<?php if ( $args['img'] && isset( $args['img']['id'] ) ) {
					echo wp_get_attachment_image( $args['img']['id'], 'full' );
				} ?>

				<?php if ( $args['contents'] && is_array( $args['contents'] ) ) { ?>
					<?php foreach ( $args['contents'] as $part ) { ?>
                        <div class="_content_list">
							<?php if ( $part['heading'] ) { ?>
                                <h4 class="blue h4"><?= $part['heading'] ?></h4>
							<?php } ?>
							<?php if ( $part['content_of_heading'] ) { ?>
                                <div class="_txt"><?= $part['content_of_heading'] ?></div>
							<?php } ?>
                        </div>
					<?php } ?>
				<?php } ?>
            </div>

        </div>
    </div>

<?php } ?>