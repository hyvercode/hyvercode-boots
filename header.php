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
                                <?php
                // 1. Ambil URL Dynamic Logo dari Customizer
                $custom_logo_id    = get_theme_mod( 'custom_logo' );
                $dynamic_logo_url  = $custom_logo_id ? wp_get_attachment_image_url( $custom_logo_id, 'full' ) : '';
                $fallback_logo_url = esc_url( get_stylesheet_directory_uri() ) . '/img/logo/brand.png';

                // Jika ada logo di customizer pakai itu, jika tidak pakai fallback
                $final_logo_url = ! empty( $dynamic_logo_url ) ? esc_url( $dynamic_logo_url ) : $fallback_logo_url;

                // 2. Ambil Informasi Situs
                $site_name        = get_bloginfo( 'name' );
                $site_description = get_bloginfo( 'description', 'display' );
                ?>

                <div class="navbar-brand-wrapper d-flex align-items-center">
                    <!-- LINK LOGO (Responsive Utilities) -->
                    <a class="navbar-brand me-3" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <!-- Logo Versi Mobile (xs sampai sm) -->
                        <img src="<?php echo esc_url( $final_logo_url ); ?>"
                            alt="<?php echo esc_attr( $site_name ); ?>"
                            class="d-md-none"
                            style="max-width: 40px; height: auto;"> <!-- Ukuran mobile biasanya lebih kecil -->

                        <!-- Logo Versi Desktop (md ke atas) -->
                        <img src="<?php echo esc_url( $final_logo_url ); ?>"
                            alt="<?php echo esc_attr( $site_name ); ?>"
                            class="d-none d-md-block"
                            style="max-width: 40px; height: auto;"> <!-- Ukuran desktop sesuai kebutuhan -->
                    </a>

                    <!-- TEXT BRANDING (Judul & Tagline) -->
                    <div class="site-branding d-flex flex-column justify-content-center">
                        <!-- Judul Situs -->
                        <h3 class="site-title mb-0">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="text-decoration-none text-dark fw-bold">
                                <?php echo esc_html( $site_name ); ?>
                            </a>
                        </h3>

                        <!-- Tagline (Hanya muncul jika diisi di Settings > General) -->
                        <?php if ( $site_description || is_customize_preview() ) : ?>
                            <small class="site-description text-muted d-none d-sm-block">
                                <?php echo esc_html( $site_description ); ?>
                            </small>
                        <?php endif; ?>
                    </div>

                </div>

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
            <?php get_template_part('sidebar-top', 'none'); ?>
        </div>
    </div>