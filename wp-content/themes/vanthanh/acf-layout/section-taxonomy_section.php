<?php
$postId = get_the_ID();

if ( isset( $args ) && $args ) { ?>

    <div class="taxonomy_section">
        <div class="LR_pad top_pad">
            <div class="_inner">
				<?php if ( $args['heading'] ) { ?>
                    <h2 class="_section_title h2 blue"><?= $args['heading'] ?></h2>
				<?php } ?>

				<?php
				if ( $args['taxonomy'] ) {
					$taxonomyType = $args['taxonomy'];
					$categories   = get_terms( [
						'taxonomy'   => $taxonomyType,
						'hide_empty' => false,
					] );

					if ( is_array( $categories ) && count( $categories ) > 0 ) {
						?>
                        <div class="taxonomy_section_list">
							<?php foreach ( $categories as $cat ) {
								$category_image = get_field( 'category_image_square', $cat );
								if ( ! $category_image ) {
									$category_image = get_field( 'category_image', $cat );
								}
								$alt = $category_image['alt'] ?? $category_image['title'];
								?>
                                <div class="taxonomy_section_list_item">
                                    <a href="<?= $cat->slug ?>">
                                        <div class="_cat_img" style="background-image: url('<?= $category_image['url'] ?>')"></div>
                                        <h3 class="_heading s18"><?= $cat->name ?></h3>
                                    </a>
                                </div>
							<?php } ?>

                        </div>
					<?php } ?>
				<?php } ?>
            </div>
        </div>

    </div>

<?php } ?>