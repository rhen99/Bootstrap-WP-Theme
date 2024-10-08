<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_bloginfo('name');
            echo " | ";
            single_post_title(); ?></title>
</head>

<body>
    <?php wp_head(); ?>
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location'  => 'header-menu',
                'container'       => 'div',
                'container_id'    => 'navbarResponsive',
                'container_class' => 'collapse navbar-collapse',
                'menu_class'      => 'navbar-nav ms-auto py-4 py-lg-0',
                'fallback_cb'     => false,
            ));

            ?>
        </div>
    </nav>