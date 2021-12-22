<?php
get_header();
?>
    <main id="primary" class="site-main single-vtproduct-template">

		<?php
		$type   = '';
		$postId = '';
		while ( have_posts() ) :
			the_post();
			$postId         = get_the_ID();
			$type           = get_post_type() ?: '';
			$title          = get_the_title();
			$regular_price  = get_field( 'regular_price', $postId );
			$sale_price     = get_field( 'sale_price', $postId );
			$summary        = get_field( 'summary', $postId );
			$gallery        = get_field( 'gallery', $postId );
			$specifications = get_field( 'specifications', $postId );
			$content_list   = get_field( 'content_list', $postId );

			$categories     = get_the_terms( $postId, 'vtproduct_taxonomies' );
			$hero_img_url   = '';
			$category_title = '';
			if ( isset( $categories[0] ) ) {
				$category_image = get_field( 'category_image', $categories[0] );
				$hero_img_url   = $category_image['url'] ?? '';
				$category_title = $categories[0]->name ?? '';
			}
			?>

            <div class="anh_bia_section">
				<?php if ( $hero_img_url ) { ?>
                    <div class="_inner" style="background-image: url(<?= $hero_img_url ?>)">
						<?php if ( $category_title ) { ?>
                            <h2 class="_title blue h0"><?= $category_title ?></h2>
						<?php } ?>
                    </div>
				<?php } ?>
            </div>

            <div class="LR_pad detail-product-wrap">
                <div class="DP_gallery">
                    <?php if ($gallery && is_array($gallery)) { ?>
                    <div class="slick_gallery">
                        <?php foreach ($gallery as $image) {
                            ?>
                            <div class="slick-gallery-item"><img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>"/></div>
                        <?php } ?>
                    </div>
                    <div class="slick_gallery-nav slick_nav">
                        <?php foreach ($gallery as $image) { ?>
                            <div class="slick-gallery-item"><img src="<?= $image['sizes']['thumbnail'] ?>" alt="<?= $image['alt'] ?>"/></div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>

                <div class="DP_right_summary">
	                <?php if ($title) { ?>
                        <h1 class="DP_title h0"><?= $title ?></h1>
	                <?php } ?>

	                <?php if ($summary) { ?>
                        <div class="DP_summary DP_txt"><?= $summary ?></div>
	                <?php } ?>

                    <div class="DP_price_wrap h3">
	                    <?php if ($sale_price) { ?>
                            <h4 class="DP_sale_price"><?= price_format($sale_price) ?></h4>
	                    <?php } ?>
	                    <?php if ($regular_price) { ?>
                            <h4 class="DP_regular_price"><?= price_format($regular_price) ?></h4>
	                    <?php } ?>
                    </div>

                    <?= render_call_button() ?>

                </div>

                <?php if ($specifications || $content_list) { ?>
                    <h2 class="DP_heading_underline"><span>Chi tiết sản phẩm</span></h2>
                <?php } ?>

	            <?php if ( $specifications && is_array( $specifications ) ) { ?>
                    <div class="DP_specifications">
                        <h3 class="DP_heading">Thông số kỹ thuật</h3>
                        <ul class="DP_txt _params">
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
                                <h3 class="DP_heading">
									<?= $item['heading'] ?>
                                </h3>
							<?php } ?>
							<?php if ( isset( $item['content'] ) && $item['content'] ) { ?>
                                <div class="DP_txt"><?= $item['content'] ?></div>
							<?php } ?>
						<?php } ?>
                    </div>
				<?php } ?>
            </div>

		<?php endwhile; ?>

    </main>

<?php
get_footer();
