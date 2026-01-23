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
    <?php if ( get_theme_mod( 'features_section_visible', true ) ) : ?>
    <section class="features-section" style="background-color: <?php echo get_theme_mod( 'features_bg_gray', false ) ? '#f8f9fa' : '#ffffff'; ?>;">
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
    <?php endif; ?>

    <!-- AMALABS Section -->
    <?php if ( get_theme_mod( 'amalabs_section_visible', true ) ) : ?>
    <section id="amalabs" class="amalabs-section" style="padding: 80px 0; background-color: <?php echo get_theme_mod( 'amalabs_bg_gray', false ) ? '#f8f9fa' : '#ffffff'; ?>;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 40px;"><?php echo esc_html( get_theme_mod( 'amalabs_section_title', 'Quem somos?' ) ); ?></h2>
            <div class="section-content" style="max-width: 800px; margin: 0 auto; text-align: center; font-size: 1.1em; line-height: 1.8;">
                <?php 
                $default_amalabs_text = "A AmaLabs é um laboratório especializado em pesquisa, desenvolvimento e validação de soluções infocêuticas, com atuação fundamentada em princípios de informação biológica, comunicação sistêmica e autorregulação fisiológica.\n\nPartimos do entendimento de que os sistemas biológicos respondem não apenas a estímulos químicos, mas também a informações organizacionais capazes de modular funções, ritmos e interações celulares. Dessa forma, a AmaLabs desenvolve soluções que atuam como vetores informacionais, favorecendo processos adaptativos e restaurando coerência funcional ao organismo.\n\nNossa abordagem integra ciência aplicada, modelagem sistêmica e metodologia técnica, com foco em segurança, reprodutibilidade e aplicabilidade clínica.";
                echo wpautop( esc_html( get_theme_mod( 'amalabs_section_text', $default_amalabs_text ) ) ); 
                ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Soluções Section -->
    <?php if ( get_theme_mod( 'solucoes_section_visible', true ) ) : ?>
    <section id="solucoes" class="solucoes-section" style="padding: 80px 0; background-color: <?php echo get_theme_mod( 'solucoes_bg_gray', true ) ? '#f8f9fa' : '#ffffff'; ?>;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 40px;"><?php echo esc_html( get_theme_mod( 'solucoes_section_title', 'Soluções Infocêuticas' ) ); ?></h2>
            <div class="section-content" style="max-width: 800px; margin: 0 auto; text-align: center; font-size: 1.1em; line-height: 1.8;">
                <?php echo wpautop( esc_html( get_theme_mod( 'solucoes_section_text', 'Texto sobre Soluções Infocêuticas...' ) ) ); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- O Que Fazemos Section -->
    <?php if ( get_theme_mod( 'what_we_do_visible', true ) ) : ?>
    <section id="oquefazemos" class="what-we-do-section" style="padding: 80px 0; background-color: <?php echo get_theme_mod( 'what_we_do_bg_gray', false ) ? '#f8f9fa' : '#ffffff'; ?>;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 20px; text-transform: uppercase;">
                <?php echo esc_html( get_theme_mod( 'what_we_do_title', 'O Que Fazemos' ) ); ?>
            </h2>
            <div class="section-intro" style="text-align: center; max-width: 800px; margin: 0 auto 50px; font-size: 1.1em;">
                <?php echo wpautop( esc_html( get_theme_mod( 'what_we_do_intro', 'A AmaLabs atua de forma integrada em todas as etapas do ciclo técnico das soluções infocêuticas.' ) ) ); ?>
            </div>

            <div class="features-grid services-grid"> <!-- Reusing existing grid classes -->
                <!-- Col 1 -->
                <div class="feature-card service-item" style="text-align: left;">
                    <h3 style="margin-bottom: 15px;"><?php echo esc_html( get_theme_mod( 'what_we_do_col1_title', 'Pesquisa e Desenvolvimento (P&D)' ) ); ?></h3>
                    <div class="content">
                        <?php 
                        $default_col1 = "Desenvolvemos soluções a partir de:\n- Modelos de informação biológica e biofrequencial\n- Estudos de sinergias funcionais e organização sistêmica\n- Avaliação de compatibilidade fisiológica e segurança\n\nCada projeto é estruturado com base em lógica funcional, rastreabilidade técnica e coerência biológica.";
                        echo wpautop( esc_html( get_theme_mod( 'what_we_do_col1_text', $default_col1 ) ) ); 
                        ?>
                    </div>
                </div>

                <!-- Col 2 -->
                <div class="feature-card service-item" style="text-align: left;">
                    <h3 style="margin-bottom: 15px;"><?php echo esc_html( get_theme_mod( 'what_we_do_col2_title', 'Validação Técnica e Protocolos' ) ); ?></h3>
                    <div class="content">
                        <?php 
                        $default_col2 = "A AmaLabs estrutura e valida:\n- Protocolos de aplicação terapêutica e preventiva\n- Modelos de uso progressivo e personalizado\n- Diretrizes técnicas para aplicação segura e consistente\n\nO objetivo é garantir reprodutibilidade funcional, sem comprometer a individualidade biológica.";
                        echo wpautop( esc_html( get_theme_mod( 'what_we_do_col2_text', $default_col2 ) ) ); 
                        ?>
                    </div>
                </div>

                <!-- Col 3 -->
                <div class="feature-card service-item" style="text-align: left;">
                    <h3 style="margin-bottom: 15px;"><?php echo esc_html( get_theme_mod( 'what_we_do_col3_title', 'Metodologia e Inovação' ) ); ?></h3>
                    <div class="content">
                        <?php 
                        $default_col3 = "Desenvolvemos metodologias próprias para:\n- Aplicação de informação funcional ao organismo\n- Integração entre fisiologia, comportamento e ambiente\n- Evolução contínua de modelos infocêuticos\n\nA inovação é orientada por evidência funcional, coerência sistêmica e aplicabilidade real.";
                        echo wpautop( esc_html( get_theme_mod( 'what_we_do_col3_text', $default_col3 ) ) ); 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Whitelabel Section -->
    <?php if ( get_theme_mod( 'whitelabel_section_visible', true ) ) : ?>
    <section id="terceirize" class="whitelabel-section" style="padding: 80px 0; background-color: <?php echo get_theme_mod( 'whitelabel_bg_gray', false ) ? '#f8f9fa' : '#ffffff'; ?>;">
        <div class="container">
            <h2 class="section-title" style="text-align: center; margin-bottom: 40px;"><?php echo esc_html( get_theme_mod( 'whitelabel_section_title', 'Terceirize sua Marca' ) ); ?></h2>
            <div class="section-content" style="max-width: 800px; margin: 0 auto; text-align: center; font-size: 1.1em; line-height: 1.8;">
                <?php echo wpautop( esc_html( get_theme_mod( 'whitelabel_section_text', 'Texto sobre Terceirize sua Marca...' ) ) ); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Services Section -->
    <?php if ( get_theme_mod( 'services_section_visible', true ) ) : ?>
    <section class="services-section" style="background-color: <?php echo get_theme_mod( 'services_bg_gray', false ) ? '#f8f9fa' : '#ffffff'; ?>;">
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
    <?php endif; ?>

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
    <!-- CTA Section -->
    <?php if ( get_theme_mod( 'cta_visible', true ) ) : ?>
    <section id="faleconosco" class="cta-section">
        <div class="container">
            <?php 
            $cta_image = get_theme_mod( 'cta_image' ); 
            if ( $cta_image ) : 
                // Grid Layout
            ?>
            <div class="cta-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; text-align: left;">
                <div class="cta-image">
                    <img src="<?php echo esc_url( $cta_image ); ?>" alt="Fale Conosco" style="width: 100%; height: auto; border-radius: 8px;">
                </div>
                <div class="cta-content-col">
                    <h2 style="margin-bottom: 20px;"><?php echo esc_html( get_theme_mod( 'cta_title', 'Cuide da sua saúde com quem entende' ) ); ?></h2>
                    <div class="cta-text" style="margin-bottom: 30px; font-size: 1.1em; line-height: 1.6;">
                        <?php echo wpautop( esc_html( get_theme_mod( 'cta_text', 'Agende seus exames agora mesmo pelo nosso WhatsApp.' ) ) ); ?>
                    </div>
                    <a href="<?php echo esc_url( get_theme_mod( 'cta_btn_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'cta_btn_text', 'Agendar Exame' ) ); ?></a>
                </div>
            </div>
            
            <style>
            @media (max-width: 768px) {
                .cta-grid { grid-template-columns: 1fr !important; text-align: center !important; }
            }
            </style>
            
            <?php else : 
                // Default Centered Layout
            ?>
            <h2><?php echo esc_html( get_theme_mod( 'cta_title', 'Cuide da sua saúde com quem entende' ) ); ?></h2>
            <div class="cta-content" style="max-width: 800px; margin: 0 auto 30px;">
                <?php echo wpautop( esc_html( get_theme_mod( 'cta_text', 'Agende seus exames agora mesmo pelo nosso WhatsApp.' ) ) ); ?>
            </div>
            <a href="<?php echo esc_url( get_theme_mod( 'cta_btn_url', '#' ) ); ?>" class="btn btn-primary"><?php echo esc_html( get_theme_mod( 'cta_btn_text', 'Agendar Exame' ) ); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

</main><!-- #main -->

<?php
get_footer();
