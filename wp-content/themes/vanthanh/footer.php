<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package vanthanh
 */

?>
<?php
$footer_address   = get_field( 'address', 'option' );
$footer_social    = get_field( 'social', 'option' );
$footer_phone     = get_field( 'phone', 'option' );
$footer_mail      = get_field( 'mail', 'option' );
$footer_copyright = get_field( 'copyright', 'option' );
?>

<footer class="site-footer">
    <div class="info_wrap ">
        <div class="info_wrap_inner LR_pad">
            <?php the_custom_logo(); ?>

            <div class="_info">
                <?php if ( $footer_address ) { ?>
                    <div class="_line">
                        <?= file_get_contents( get_template_directory() . '/images/ico-home.svg' ); ?>
                        <div class="_txt"><?= $footer_address ?></div>
                    </div>
                <?php } ?>

                <?php if ( $footer_social ) { ?>
                    <div class="_line">
                        <?= file_get_contents( get_template_directory() . '/images/ico-fb.svg' ); ?>
                        <div class="_txt"><?= $footer_social ?></div>
                    </div>
                <?php } ?>

                <?php if ( $footer_phone ) { ?>
                    <div class="_line">
                        <?= file_get_contents( get_template_directory() . '/images/ico-phone.svg' ); ?>
                        <div class="_txt"><?= $footer_phone ?></div>
                    </div>
                <?php } ?>

                <?php if ( $footer_mail ) { ?>
                    <div class="_line">
                        <?= file_get_contents( get_template_directory() . '/images/ico-mail.svg' ); ?>
                        <div class="_txt"><?= $footer_mail ?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

	<?php if ( $footer_copyright ) { ?>
        <div class="copyright">
            <div class="LR_pad">
                <p><?= $footer_copyright ?></p>
            </div>
        </div>
	<?php } ?>
</footer>

</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
