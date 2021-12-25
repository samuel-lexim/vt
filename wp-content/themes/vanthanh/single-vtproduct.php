<?php
get_header();
?>
    <main id="primary" class="site-main single-vtproduct-template">

		<?php
		$type   = '';
		$postId = '';
		while ( have_posts() ) :
			the_post();
			$postId           = get_the_ID();
			$type             = get_post_type() ?: '';
			$title            = get_the_title();
			$regular_price    = get_field( 'regular_price', $postId );
			$sale_price       = get_field( 'sale_price', $postId );
			$summary          = get_field( 'summary', $postId );
			$gallery          = get_field( 'gallery', $postId );
			$specifications   = get_field( 'specifications', $postId );
			$content_list     = get_field( 'content_list', $postId );
			$related_products = get_field( 'related_products', $postId );


			$categories     = get_the_terms( $postId, 'vtproduct_taxonomies' );
			$hero_img_url   = '';
			$category_title = '';
			if ( isset( $categories[0] ) ) {
				$category_image = get_field( 'category_image', $categories[0] );
				$hero_img_url   = $category_image['url'] ?? getDefaultImg();
				$category_title = $categories[0]->name ?? '';
			}
			?>

            <div class="anh_bia_section">
				<?php if ( $hero_img_url ) { ?>
                    <div class="_inner" style="background-image: url(<?= $hero_img_url ?>)">
						<?php if ( $category_title ) { ?>
                            <h2 class="_title blue fw700 h0"><?= $category_title ?></h2>
						<?php } ?>
                    </div>
				<?php } ?>
            </div>

            <div class="LR_pad detail-product-wrap">
                <div class="DP_gallery">
					<?php if ( $gallery && is_array( $gallery ) ) { ?>
                        <div class="slick_gallery">
							<?php foreach ( $gallery as $image ) {
								?>
                                <div class="slick-gallery-item"><img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"/></div>
							<?php } ?>
                        </div>
                        <div class="slick_gallery-nav slick_nav">
							<?php foreach ( $gallery as $image ) { ?>
                                <div class="slick-gallery-item"><img src="<?= $image['sizes']['thumbnail'] ?>" alt="<?= $image['alt'] ?>"/></div>
							<?php } ?>
                        </div>
					<?php } ?>
                </div>

                <div class="DP_right_summary">
					<?php if ( $title ) { ?>
                        <h1 class="DP_title h0"><?= $title ?></h1>
					<?php } ?>

					<?php if ( $summary ) { ?>
                        <div class="DP_summary DP_txt"><?= $summary ?></div>
					<?php } ?>

                    <div class="DP_price_wrap h3">
						<?php if ( $sale_price ) { ?>
                            <h4 class="DP_sale_price fw500"><?= price_format( $sale_price ) ?></h4>
						<?php } ?>
						<?php if ( $regular_price ) { ?>
                            <h4 class="DP_regular_price fw500"><?= price_format( $regular_price ) ?></h4>
						<?php } ?>
                    </div>

					<?= render_call_button() ?>

                </div>

				<?php if ( $specifications || $content_list ) { ?>
                    <h2 class="DP_heading_underline fw500 s24"><span>Chi tiết sản phẩm</span></h2>
				<?php } ?>

				<?php if ( $specifications && is_array( $specifications ) ) { ?>
                    <div class="DP_specifications">
                        <h3 class="DP_heading fw500 s22">Thông số kỹ thuật</h3>
                        <ul class="DP_txt _params s18">
							<?php foreach ( $specifications as $param ) { ?>
								<?php if ( isset( $param['param'] ) && $param['param'] ) { ?>
                                    <li class="DP_txt"><?= $param['param'] ?></li>
								<?php } ?>
							<?php } ?>
                        </ul>
                    </div>
				<?php } ?>

				<?php if ( $content_list && is_array( $content_list ) ) { ?>
                    <div class="DP_content_list">
						<?php foreach ( $content_list as $item ) { ?>
							<?php if ( isset( $item['heading'] ) && $item['heading'] ) { ?>
                                <h3 class="DP_heading fw500 s22">
									<?= $item['heading'] ?>
                                </h3>
							<?php } ?>
							<?php if ( isset( $item['content'] ) && $item['content'] ) { ?>
                                <div class="DP_txt s18"><?= $item['content'] ?></div>
							<?php } ?>
						<?php } ?>
                    </div>
				<?php } ?>
            </div>

			<?php if ( $related_products && is_array( $related_products ) ) { ?>
            <div class="DP_related_products scheme_blue">
                <div class="LR_pad top_pad">
                    <div class="_inner">
                        <h2 class="_section_title s24 fw500">Sản phẩm liên quan</h2>

                        <div class="related_products_slick slick_top_arrow">
							<?php foreach ( $related_products as $vt_product ) {
								$link   = esc_url( get_permalink( $vt_product ) );
								$type   = get_post_type( $vt_product );
								$title  = $vt_product->post_title;
								$postId = $vt_product->ID;


								?>
                                <div class="related_products_slick_item">
                                    <div class="grid-item-product" data-id="<?= $postId ?>" data-type="<?= $type ?>">
                                        <div class="_inner_post">
                                            <div class="_thumb">
												<?php echo get_the_post_thumbnail( $vt_product, 'medium' ); ?>
                                            </div>

                                            <h4 class="_name s18"><?= $title ?></h4>
                                            <h4 class="_price s18 blue"><?= 'Giá: ' . getFinalPrice( $vt_product ) ?></h4>
											<?= render_blue_button( $link ) ?>
                                        </div>
                                    </div>
                                </div>

							<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
		<?php } ?>

		<?php endwhile; ?>

    </main>

<?php
get_footer();
