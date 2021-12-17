<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) { ?>
    <div class="doi-tac-section">
        <div class="LR_pad">
			<?php if ( $args['section_title'] ) { ?>
                <h2 class="_title"><?= $args['section_title'] ?></h2>
			<?php } ?>

			<?php if ( $args['summary'] ) { ?>
                <div class="_summary"><?= $args['summary'] ?></div>
			<?php } ?>

			<?php
			if ( $args['partner_list'] && is_array( $args['partner_list'] ) ) {
				foreach ( $args['partner_list'] as $grid ) { ?>

                    <div class="_item">
						<?php $link = $grid['link'] ?: 'javascript:void(0);'; ?>
                        <a href="<?= $link ?>">
							<?php if ( $grid['img'] && isset( $grid['img']['id'] ) ) {
								echo wp_get_attachment_image( $grid['img']['id'], 'full' );
							} ?>
                        </a>
                    </div>
				<?php } ?>
			<?php } ?>

        </div>

    </div>
<?php } ?>