<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5364007793983397"
     crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo('name'); ?>" class="custom-logo">
                    <?php bloginfo('name'); ?>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'navbar-nav ms-auto',
                        'container'      => false,
                        'depth'          => 2,
                        'walker'         => new Bootstrap_Nav_Menu_Walker(),
                    ));
                    ?>
                    <div class="nav-item dropdown">
                        <button class="btn btn-link ms-3 nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" data-bs-display="static" aria-label="Toggle theme (dark)">
                            <span id="dark-mode-icon">🌙</span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="darkModeDropdown">
                            <li><a class="dropdown-item" href="#" data-theme="light">Light</a></li>
                            <li><a class="dropdown-item" href="#" data-theme="dark">Dark</a></li>
                            <li><a class="dropdown-item" href="#" data-theme="auto">System</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <div class="row">
            <?php  get_template_part('sidebar-top', 'none');?>
        </div>
    </div>