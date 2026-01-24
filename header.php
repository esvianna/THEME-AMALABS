<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="masthead" class="site-header">
    <div class="container header-inner">
        <div class="header-top-row">
            <div class="site-branding">
                <?php
                if ( has_custom_logo() ) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php
                }
                ?>
            </div><!-- .site-branding -->

            <?php if ( class_exists( 'WooCommerce' ) ) : ?>
            <div class="header-search">
                <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Buscar produtos, marcas e muito mais...', 'amalabs' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                    <button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                    <input type="hidden" name="post_type" value="product" />
                </form>
            </div>
            <?php endif; ?>

            <div class="header-actions">
                <?php 
                // Check Visibility Logic
                $products_visible = get_theme_mod( 'products_section_visible', true );
                $hide_cart = get_theme_mod( 'hide_cart_if_products_hidden', false );
                
                // Show cart if: Products are visible OR (Products hidden but Hide Cart is false)
                // In other words, Hide cart if: Products Hidden AND Hide Cart True
                $show_cart = $products_visible || !$hide_cart;
                
                if ( class_exists( 'WooCommerce' ) && $show_cart ) : 
                ?>
                    <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="header-cart" title="<?php esc_attr_e( 'Ver carrinho', 'amalabs' ); ?>">
                        <span class="cart-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 2h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                        </span>
                        <?php 
                        $count = WC()->cart->get_cart_contents_count();
                        if ( $count > 0 ) {
                            ?>
                            <span class="cart-count"><?php echo esc_html( $count ); ?></span>
                            <?php
                        }
                        ?>
                    </a>
                <?php endif; ?>
                
                <button id="mobile-menu-toggle" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
                </button>
            </div>
        </div>

        <div class="header-bottom-row">
            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'fallback_cb'    => false, // Do not fallback to pages if no menu fits
                ) );
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const siteNavigation = document.getElementById('site-navigation');
        
        if (menuToggle && siteNavigation) {
            menuToggle.addEventListener('click', function() {
                siteNavigation.classList.toggle('toggled');
                const expanded = menuToggle.getAttribute('aria-expanded') === 'true' || false;
                menuToggle.setAttribute('aria-expanded', !expanded);
            });
        }
    });
</script>
