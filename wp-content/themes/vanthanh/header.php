<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vanthanh
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <!-- Jquery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
<!--    <a class="skip-link screen-reader-text" href="#primary"><1?php esc_html_e( 'Skip to content', 'vanthanh' ); ?></a>-->

    <header id="masthead" class="site-header">
        <?php
            $top_header_icon = get_field( 'top_header_icon', 'option' );
            $top_header_text = get_field( 'top_header_text', 'option' );
        ?>
        <?php if ($top_header_icon && $top_header_text) { ?>
        <div class="top-header">
            <div class="LR_pad">
                <div class="hotline">
                    <img class="svg" src="<?= $top_header_icon ?>" alt="Hotline Tư vấn sản phẩm & Giải pháp"/>
                    <div class="_txt"><?= $top_header_text ?></div>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="bottom-header">
            <div class="inner_bottom_header LR_pad">
                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                </div>
                <!-- menu -->
                <div class="nav-button-wrap">
                    <div class="nav-icon" id="NavMenuButton">
                        <span></span>
                    </div>
                </div>
                <nav id="site-navigation" class="main-navigation">
                    <button style="display: none" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                        <?php esc_html_e( 'Menu', 'vanthanh' ); ?></button>
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                    ]);
                    ?>
                </nav>
            </div>
        </div>
    </header>
