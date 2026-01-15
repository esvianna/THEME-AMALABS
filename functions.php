<?php
/**
 * AmaLabs functions and definitions
 */

function amalabs_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary Menu', 'amalabs' ),
    ) );

    // Custom Logo support
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // WooCommerce Support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'amalabs_setup' );

/**
 * Enqueue scripts and styles.
 */
function amalabs_scripts() {
    // Google Fonts
    wp_enqueue_style( 'amalabs-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap', array(), null );

    // Main Stylesheet
    wp_enqueue_style( 'amalabs-style', get_stylesheet_uri() );

    // AJAX Search Script
    if ( class_exists( 'WooCommerce' ) ) {
        wp_enqueue_script( 'amalabs-ajax-search', get_template_directory_uri() . '/js/ajax-search.js', array( 'jquery' ), '1.0', true );
        wp_localize_script( 'amalabs-ajax-search', 'amalabs_ajax', array(
            'ajax_url' => admin_url( 'admin-ajax.php' )
        ) );
    }
}
add_action( 'wp_enqueue_scripts', 'amalabs_scripts' );

/**
 * AJAX Search Handler
 */
function amalabs_ajax_search_callback() {
    $term = sanitize_text_field( $_POST['term'] );

    $args = array(
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => 5,
        's'              => $term,
    );

    $query = new WP_Query( $args );

    $products = array();

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $product = wc_get_product( get_the_ID() );
            $image   = wp_get_attachment_image_src( get_post_thumbnail_id(), 'thumbnail' );

            $products[] = array(
                'title' => get_the_title(),
                'url'   => get_permalink(),
                'image' => $image ? $image[0] : '',
                'price' => $product->get_price_html(),
            );
        }
        wp_reset_postdata();
        wp_send_json_success( $products );
    } else {
        wp_send_json_error();
    }

    wp_die();
}
add_action( 'wp_ajax_amalabs_ajax_search', 'amalabs_ajax_search_callback' );
add_action( 'wp_ajax_nopriv_amalabs_ajax_search', 'amalabs_ajax_search_callback' );

/**
 * WooCommerce Layout Customizations
 */
function amalabs_woocommerce_wrapper_before() {
    echo '<main id="primary" class="site-main container" style="margin-top: 50px; margin-bottom: 50px;">';
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'amalabs_woocommerce_wrapper_before', 10 );

function amalabs_woocommerce_wrapper_after() {
    echo '</main>';
}
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
add_action( 'woocommerce_after_main_content', 'amalabs_woocommerce_wrapper_after', 10 );

// Remove Sidebar on Product Pages
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

/**
 * Customizer Settings
 */
function amalabs_customize_register( $wp_customize ) {
    // Hero Section
    $wp_customize->add_section( 'hero_section', array(
        'title'    => __( 'Hero (Início)', 'amalabs' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'hero_title', array(
        'default'   => 'Excelência em Diagnósticos',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_title', array(
        'label'    => __( 'Título Principal', 'amalabs' ),
        'section'  => 'hero_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_text', array(
        'default'   => 'Tecnologia de ponta e profissionais dedicados para cuidar da sua saúde com precisão e agilidade.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_text', array(
        'label'    => __( 'Texto de Apoio', 'amalabs' ),
        'section'  => 'hero_section',
        'type'     => 'textarea',
    ) );

    $wp_customize->add_setting( 'hero_btn_primary_text', array(
        'default'   => 'Ver Resultados',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_btn_primary_text', array(
        'label'    => __( 'Texto Botão 1', 'amalabs' ),
        'section'  => 'hero_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_btn_primary_url', array(
        'default'   => '#',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_btn_primary_url', array(
        'label'    => __( 'Link Botão 1', 'amalabs' ),
        'section'  => 'hero_section',
        'type'     => 'url',
    ) );

    $wp_customize->add_setting( 'hero_btn_secondary_text', array(
        'default'   => 'Nossos Serviços',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_btn_secondary_text', array(
        'label'    => __( 'Texto Botão 2', 'amalabs' ),
        'section'  => 'hero_section',
        'type'     => 'text',
    ) );

    $wp_customize->add_setting( 'hero_btn_secondary_url', array(
        'default'   => '#',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_btn_secondary_url', array(
        'label'    => __( 'Link Botão 2', 'amalabs' ),
        'section'  => 'hero_section',
        'type'     => 'url',
    ) );

    // Hero Background Image
    $wp_customize->add_setting( 'hero_bg_image' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'hero_bg_image', array(
        'label'    => __( 'Imagem de Fundo', 'amalabs' ),
        'section'  => 'hero_section',
        'settings' => 'hero_bg_image',
    ) ) );

    // Features Section (Destaques)
    $wp_customize->add_section( 'features_section', array(
        'title'    => __( 'Destaques (Features)', 'amalabs' ),
        'priority' => 31,
    ) );

    // Feature 1
    $wp_customize->add_setting( 'feature_1_title', array('default' => 'Alta Precisão') );
    $wp_customize->add_control( 'feature_1_title', array('label' => 'Destaque 1 - Título', 'section' => 'features_section', 'type' => 'text') );
    $wp_customize->add_setting( 'feature_1_text', array('default' => 'Equipamentos de última geração garantindo resultados confiáveis.') );
    $wp_customize->add_control( 'feature_1_text', array('label' => 'Destaque 1 - Texto', 'section' => 'features_section', 'type' => 'textarea') );

    // Feature 2
    $wp_customize->add_setting( 'feature_2_title', array('default' => 'Resultados Rápidos') );
    $wp_customize->add_control( 'feature_2_title', array('label' => 'Destaque 2 - Título', 'section' => 'features_section', 'type' => 'text') );
    $wp_customize->add_setting( 'feature_2_text', array('default' => 'Acesse seus exames online com agilidade e segurança.') );
    $wp_customize->add_control( 'feature_2_text', array('label' => 'Destaque 2 - Texto', 'section' => 'features_section', 'type' => 'textarea') );

    // Feature 3
    $wp_customize->add_setting( 'feature_3_title', array('default' => 'Atendimento Humanizado') );
    $wp_customize->add_control( 'feature_3_title', array('label' => 'Destaque 3 - Título', 'section' => 'features_section', 'type' => 'text') );
    $wp_customize->add_setting( 'feature_3_text', array('default' => 'Equipe treinada para acolher você e sua família com carinho.') );
    $wp_customize->add_control( 'feature_3_text', array('label' => 'Destaque 3 - Texto', 'section' => 'features_section', 'type' => 'textarea') );

    // Footer / Contact
    $wp_customize->add_section( 'footer_section', array(
        'title'    => __( 'Rodapé (Footer)', 'amalabs' ),
        'priority' => 32,
    ) );

    // About Text
    $wp_customize->add_setting( 'footer_about_text', array(
        'default'   => 'AmaLabs oferece serviços de diagnóstico laboratorial com precisão, agilidade e confiança.',
        'transport' => 'refresh',
    ) );
    $wp_customize->add_control( 'footer_about_text', array(
        'label'    => __( 'Texto "Sobre"', 'amalabs' ),
        'section'  => 'footer_section',
        'type'     => 'textarea',
    ) );

    // Contact Info
    $wp_customize->add_setting( 'contact_email', array('default' => 'contato@amalabs.com.br') );
    $wp_customize->add_control( 'contact_email', array('label' => 'Email', 'section' => 'footer_section', 'type' => 'email') );

    $wp_customize->add_setting( 'contact_phone', array('default' => '(11) 1234-5678') );
    $wp_customize->add_control( 'contact_phone', array('label' => 'Telefone', 'section' => 'footer_section', 'type' => 'text') );

    $wp_customize->add_setting( 'contact_address', array('default' => 'Rua Exemplo, 123') );
    $wp_customize->add_control( 'contact_address', array('label' => 'Endereço', 'section' => 'footer_section', 'type' => 'text') );

    $wp_customize->add_setting( 'footer_hours', array(
        'default' => "Seg - Sex: 07:00 - 18:00\nSáb: 07:00 - 13:00",
        'transport' => 'refresh'
    ) );
    $wp_customize->add_control( 'footer_hours', array(
        'label'   => 'Horário de Atendimento',
        'section' => 'footer_section',
        'type'    => 'textarea',
    ) );
    
    // Services Section
    $wp_customize->add_section( 'services_section', array(
        'title'    => __( 'Serviços', 'amalabs' ),
        'priority' => 31, // After Features
    ) );

    $wp_customize->add_setting( 'services_title', array('default' => 'Nossos Serviços') );
    $wp_customize->add_control( 'services_title', array('label' => 'Título da Seção', 'section' => 'services_section', 'type' => 'text') );

    // Service 1
    $wp_customize->add_setting( 'service_1_title', array('default' => 'Análises Clínicas') );
    $wp_customize->add_control( 'service_1_title', array('label' => 'Serviço 1 - Título', 'section' => 'services_section', 'type' => 'text') );
    $wp_customize->add_setting( 'service_1_desc', array('default' => 'Hemograma, colesterol, glicemia e check-ups completos.') );
    $wp_customize->add_control( 'service_1_desc', array('label' => 'Serviço 1 - Descrição', 'section' => 'services_section', 'type' => 'textarea') );

    // Service 2
    $wp_customize->add_setting( 'service_2_title', array('default' => 'Vacinas') );
    $wp_customize->add_control( 'service_2_title', array('label' => 'Serviço 2 - Título', 'section' => 'services_section', 'type' => 'text') );
    $wp_customize->add_setting( 'service_2_desc', array('default' => 'Proteção para todas as idades com as principais vacinas do mercado.') );
    $wp_customize->add_control( 'service_2_desc', array('label' => 'Serviço 2 - Descrição', 'section' => 'services_section', 'type' => 'textarea') );

    // Service 3
    $wp_customize->add_setting( 'service_3_title', array('default' => 'Exames Hormonais') );
    $wp_customize->add_control( 'service_3_title', array('label' => 'Serviço 3 - Título', 'section' => 'services_section', 'type' => 'text') );
    $wp_customize->add_setting( 'service_3_desc', array('default' => 'Avaliação completa da saúde endocrinológica.') );
    $wp_customize->add_control( 'service_3_desc', array('label' => 'Serviço 3 - Descrição', 'section' => 'services_section', 'type' => 'textarea') );

    // Service 4
    $wp_customize->add_setting( 'service_4_title', array('default' => 'Coleta Domiciliar') );
    $wp_customize->add_control( 'service_4_title', array('label' => 'Serviço 4 - Título', 'section' => 'services_section', 'type' => 'text') );
    $wp_customize->add_setting( 'service_4_desc', array('default' => 'Realize seus exames no conforto da sua casa ou escritório.') );
    $wp_customize->add_control( 'service_4_desc', array('label' => 'Serviço 4 - Descrição', 'section' => 'services_section', 'type' => 'textarea') );
    
    // Products Section (WooCommerce)
    $wp_customize->add_section( 'products_section', array(
        'title'    => __( 'Produtos (Home)', 'amalabs' ),
        'priority' => 32,
    ) );

    $wp_customize->add_setting( 'products_title', array('default' => 'Nossos Produtos') );
    $wp_customize->add_control( 'products_title', array('label' => 'Título da Seção', 'section' => 'products_section', 'type' => 'text') );

    $wp_customize->add_setting( 'products_count', array('default' => '4') );
    $wp_customize->add_control( 'products_count', array(
        'label'       => 'Quantidade de Produtos',
        'section'     => 'products_section',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 2, 'max' => 12, 'step' => 1 ),
    ) );
    
    // CTA Section
    $wp_customize->add_section( 'cta_section', array(
        'title'    => __( 'Chamada para Ação (CTA)', 'amalabs' ),
        'priority' => 33,
    ) );
    
    $wp_customize->add_setting( 'cta_title', array('default' => 'Cuide da sua saúde com quem entende') );
    $wp_customize->add_control( 'cta_title', array('label' => 'CTA Título', 'section' => 'cta_section', 'type' => 'text') );
    
    $wp_customize->add_setting( 'cta_text', array('default' => 'Agende seus exames agora mesmo pelo nosso WhatsApp.') );
    $wp_customize->add_control( 'cta_text', array('label' => 'CTA Texto', 'section' => 'cta_section', 'type' => 'textarea') );
    
    $wp_customize->add_setting( 'cta_btn_text', array('default' => 'Agendar Exame') );
    $wp_customize->add_control( 'cta_btn_text', array('label' => 'CTA Botão', 'section' => 'cta_section', 'type' => 'text') );
    
    $wp_customize->add_setting( 'cta_btn_url', array('default' => '#') );
    $wp_customize->add_control( 'cta_btn_url', array('label' => 'CTA Link', 'section' => 'cta_section', 'type' => 'url') );

    // Theme Colors
    $wp_customize->add_section( 'colors', array(
        'title'    => __( 'Cores do Tema', 'amalabs' ),
        'priority' => 20,
    ) );

    $wp_customize->add_setting( 'primary_color', array('default' => '#00b894', 'transport' => 'refresh') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
        'label'    => __( 'Cor Primária', 'amalabs' ),
        'section'  => 'colors',
    ) ) );

    $wp_customize->add_setting( 'secondary_color', array('default' => '#0984e3', 'transport' => 'refresh') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'secondary_color', array(
        'label'    => __( 'Cor Secundária', 'amalabs' ),
        'section'  => 'colors',
    ) ) );

    $wp_customize->add_setting( 'accent_color', array('default' => '#55efc4', 'transport' => 'refresh') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
        'label'    => __( 'Cor de Destaque', 'amalabs' ),
        'section'  => 'colors',
    ) ) );

    // Hero Overlay Opacity
    $wp_customize->add_setting( 'hero_overlay', array('default' => '0.5', 'transport' => 'refresh') );
    $wp_customize->add_control( 'hero_overlay', array(
        'label'       => __( 'Opacidade da Máscara (0 a 1)', 'amalabs' ),
        'description' => 'Aumente para escurecer a imagem de fundo e melhorar a leitura.',
        'section'     => 'hero_section',
        'type'        => 'number',
        'input_attrs' => array( 'min' => 0, 'max' => 1, 'step' => 0.1 ),
    ) );

    // Hero Text Color
    $wp_customize->add_setting( 'hero_text_color', array('default' => '#ffffff', 'transport' => 'refresh') );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_text_color', array(
        'label'    => __( 'Cor do Texto (Hero)', 'amalabs' ),
        'section'  => 'hero_section',
    ) ) );
}
add_action( 'customize_register', 'amalabs_customize_register' );

/**
 * Output Customizer CSS
 */
function amalabs_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo get_theme_mod( 'primary_color', '#00b894' ); ?>;
            --secondary-color: <?php echo get_theme_mod( 'secondary_color', '#0984e3' ); ?>;
            --accent-color: <?php echo get_theme_mod( 'accent_color', '#55efc4' ); ?>;
            --hero-overlay-opacity: <?php echo get_theme_mod( 'hero_overlay', '0.5' ); ?>;
            --hero-text-color: <?php echo get_theme_mod( 'hero_text_color', '#ffffff' ); ?>;
        }
    </style>
    <?php
}

add_action( 'wp_head', 'amalabs_customize_css' );

/**
 * WooCommerce Cart Fragment (AJAX Update)
 */
function amalabs_header_cart_fragment( $fragments ) {
    ob_start();
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
    <?php
    $fragments['a.header-cart'] = ob_get_clean();
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'amalabs_header_cart_fragment' );
