<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) {
	?>

    <div class="tit_sum_img_list_section <?= $args["bg_color"] ?>">
        <div class="_inner">
			<?php if ( $args['section_title'] ) { ?>
                <h1 class="_title"><?= $args['section_title'] ?></h1>
			<?php } ?>

			<?php if ( $args['first_content'] ) { ?>
                <div class="_first_content"><?= $args['first_content'] ?></div>
			<?php } ?>

			<?php if ( $args['img'] && isset( $args['img']['id'] ) ) {
				echo wp_get_attachment_image( $args['img']['id'], 'full' );
			} ?>

			<?php if ( $args['contents'] && is_array( $args['contents'] ) ) { ?>
				<?php foreach ( $args['contents'] as $part ) { ?>
                    <div class="_content_list">
						<?php if ( $part['heading'] ) { ?>
                            <h4><?= $part['heading'] ?></h4>
						<?php } ?>
						<?php if ( $part['content_of_heading'] ) { ?>
                            <div class="_txt"><?= $part['content_of_heading'] ?></div>
						<?php } ?>
                    </div>
				<?php } ?>
			<?php } ?>
        </div>


    </div>

<?php } ?>