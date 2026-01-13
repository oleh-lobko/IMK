<?php
/**
 * Header.
 */

use theme\FoundationNavigation;

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Set up Meta -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta charset="<?php bloginfo('charset'); ?>">

    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes">
    <!-- Remove Microsoft Edge's & Safari phone-email styling -->
    <meta name="format-detection" content="telephone=no,email=no,url=no">

    <?php wp_head(); ?>
</head>

<body <?php body_class('no-outline fwp'); ?>>
<?php wp_body_open(); ?>

<!-- <div class="preloader hide-for-medium">
    <div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header">
    <div class="grid-container grid-container--s menu-grid-container">
        <div class="grid-x grid-margin-x align-justify header__container">
            <div class="cell auto large-2 header__logo">
                <div class="logo medium-text-left">
                    <h1>
                        <?php show_custom_logo(); ?><span
                            class="show-for-sr"><?php echo get_bloginfo(
                                'name'
                            ); ?></span>
                    </h1>
                </div>
            </div>
            <div class="cell auto large-9 header__content">
                <?php if (has_nav_menu('header-menu')) { ?>
                    <div class="title-bar hide-for-large"
                         data-responsive-toggle="main-menu"
                         data-hide-for="large">
                        <button class="menu-icon" type="button" data-toggle
                                aria-label="Menu" aria-controls="main-menu">
                            <span>Menu</span>
                        </button>
                    </div>

                    <nav class="top-bar" id="main-menu">
                        <?php wp_nav_menu([
                            'theme_location' => 'header-menu',
                            'menu_class' => 'menu header-menu',
                            'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-submenu-toggle="true" data-multi-open="false" data-close-on-click-inside="false">%3$s</ul>',
                            'walker' => new FoundationNavigation(),
                        ]); ?>
                        <div class="header__search">
                            <button
                                class="header__search-button show-for-large"><i
                                    class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <?php get_template_part('searchform'); ?>
                        </div>
                    </nav>
                <?php } ?>
            </div>
        </div>
    </div>
</header>
<!-- END of header -->
