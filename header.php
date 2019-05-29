<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Eden Megazine</title>
    <?php wp_head(); ?>
</head>

<body>
    <!--================ Start header Top Area =================-->
    <section class="header-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-6 col-lg-4">
                    <div class="float-left">
                    <?php echo do_shortcode("[socialicons location='header' href='1,2,3,4,5' class='ti-facebook, ti-twitter, ti-instagram, ti-skype, ti-vimeo']"); ?>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6 col-sm-6 logo-wrapper">
                    <?php the_custom_logo(); ?>

                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 search-trigger">
                    <div class="right-button">
                        <a id="search" href="javascript:void(0)"><i class="fas fa-search"></i></a>

                        <?php $args = [
                            'theme_location' => 'top-right-menu',
                        ];
                        wp_nav_menu($args);
                        ?>
                    </div>

                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner" role="search" action="<?php echo home_url('/'); ?>" method="get">
                    <input type="text" name="s" class="form-control" id="search_input" placeholder="Search Here" value="<?php the_search_query(); ?>">
                    <input type="hidden" name="post_type" value="blogs" />
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>

    </section>
    <!--================ End header top Area =================-->

    <!-- Start header Menu Area -->
    <header id="header" class="header_area">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <?php
                    $args = [
                        'theme_location'    => 'main-menu',
                        'menu_class'        => 'nav navbar-nav menu_nav ml-auto mr-auto',
                        'menu_id'           => 'main-navigation',
                        'add_li_class'      => 'nav-item',
                        'add_a_class'       => 'nav-link',
                        'container_class'   => 'collapse navbar-collapse offset',
                        'container_id'      => 'navbarSupportedContent'
                    ];
                    wp_nav_menu($args);
                    ?>
                </div>
            </nav>
        </div>
    </header>
    <!-- End header MEnu Area -->