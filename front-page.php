<?php
/**
 * The front page template file
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <?php
    $hero_bg = get_theme_mod( 'hero_bg_image' );
    $hero_style = '';
    if ( $hero_bg ) {
        $hero_style = 'style="background-image: url(\'' . esc_url( $hero_bg ) . '\'); background-size: cover; background-position: center;"';
    }
    ?>
    <section class="hero-section" <?php echo $hero_style; ?>>
        <div class="container hero-content">
            <h1><?php echo esc_html( get_theme_mod( 'hero_title', 'Excelência em Diagnósticos' ) ); ?></h1>
            <p><?php echo esc_html( get_theme_mod( 'hero_text', 'Tecnologia de ponta e profissionais dedicados para cuidar da sua saúde com precisão e agilidade.' ) ); ?></p>
            <div class="hero-actions">
                <a href="<?php echo esc_url( get_theme_mod( 'hero_btn_primary_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'hero_btn_primary_text', 'Ver Resultados' ) ); ?></a>
                <a href="<?php echo esc_url( get_theme_mod( 'hero_btn_secondary_url', '#' ) ); ?>" class="btn btn-secondary"><?php echo esc_html( get_theme_mod( 'hero_btn_secondary_text', 'Nossos Serviços' ) ); ?></a>
            </div>
        </div>
    </section>

    <!-- Features / Why Us -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔬</div>
                    <h3><?php echo esc_html( get_theme_mod( 'feature_1_title', 'Alta Precisão' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'feature_1_text', 'Equipamentos de última geração garantindo resultados confiáveis.' ) ); ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⏱️</div>
                    <h3><?php echo esc_html( get_theme_mod( 'feature_2_title', 'Resultados Rápidos' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'feature_2_text', 'Acesse seus exames online com agilidade e segurança.' ) ); ?></p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">❤️</div>
                    <h3><?php echo esc_html( get_theme_mod( 'feature_3_title', 'Atendimento Humanizado' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'feature_3_text', 'Equipe treinada para acolher você e sua família com carinho.' ) ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'services_title', 'Nossos Serviços' ) ); ?></h2>
            <div class="services-grid">
                <div class="service-item">
                    <h3><?php echo esc_html( get_theme_mod( 'service_1_title', 'Análises Clínicas' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'service_1_desc', 'Hemograma, colesterol, glicemia e check-ups completos.' ) ); ?></p>
                </div>
                <div class="service-item">
                    <h3><?php echo esc_html( get_theme_mod( 'service_2_title', 'Vacinas' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'service_2_desc', 'Proteção para todas as idades com as principais vacinas do mercado.' ) ); ?></p>
                </div>
                <div class="service-item">
                    <h3><?php echo esc_html( get_theme_mod( 'service_3_title', 'Exames Hormonais' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'service_3_desc', 'Avaliação completa da saúde endocrinológica.' ) ); ?></p>
                </div>
                <div class="service-item">
                    <h3><?php echo esc_html( get_theme_mod( 'service_4_title', 'Coleta Domiciliar' ) ); ?></h3>
                    <p><?php echo esc_html( get_theme_mod( 'service_4_desc', 'Realize seus exames no conforto da sua casa ou escritório.' ) ); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section (WooCommerce) -->
    <?php if ( class_exists( 'WooCommerce' ) ) : ?>
    <section class="products-section">
        <div class="container">
            <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'products_title', 'Nossos Produtos' ) ); ?></h2>
            <?php 
            $products_count = get_theme_mod( 'products_count', '4' );
            echo do_shortcode( '[recent_products limit="' . esc_attr( $products_count ) . '" columns="4"]' ); 
            ?>
        </div>
    </section>
    <?php endif; ?>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2><?php echo esc_html( get_theme_mod( 'cta_title', 'Cuide da sua saúde com quem entende' ) ); ?></h2>
            <p><?php echo esc_html( get_theme_mod( 'cta_text', 'Agende seus exames agora mesmo pelo nosso WhatsApp.' ) ); ?></p>
            <a href="<?php echo esc_url( get_theme_mod( 'cta_btn_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'cta_btn_text', 'Agendar Exame' ) ); ?></a>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
