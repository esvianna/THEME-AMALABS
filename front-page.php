<?php
/**
 * The front page template file
 */

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container hero-content">
            <h1>Excelência em Diagnósticos</h1>
            <p>Tecnologia de ponta e profissionais dedicados para cuidar da sua saúde com precisão e agilidade.</p>
            <div class="hero-actions">
                <a href="#" class="btn btn-primary">Ver Resultados</a>
                <a href="#" class="btn btn-secondary">Nossos Serviços</a>
            </div>
        </div>
    </section>

    <!-- Features / Why Us -->
    <section class="features-section">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🔬</div>
                    <h3>Alta Precisão</h3>
                    <p>Equipamentos de última geração garantindo resultados confiáveis.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">⏱️</div>
                    <h3>Resultados Rápidos</h3>
                    <p>Acesse seus exames online com agilidade e segurança.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">❤️</div>
                    <h3>Atendimento Humanizado</h3>
                    <p>Equipe treinada para acolher você e sua família com carinho.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container">
            <h2 class="section-title">Nossos Serviços</h2>
            <div class="services-grid">
                <div class="service-item">
                    <h3>Análises Clínicas</h3>
                    <p>Hemograma, colesterol, glicemia e check-ups completos.</p>
                </div>
                <div class="service-item">
                    <h3>Vacinas</h3>
                    <p>Proteção para todas as idades com as principais vacinas do mercado.</p>
                </div>
                <div class="service-item">
                    <h3>Exames Hormonais</h3>
                    <p>Avaliação completa da saúde endocrinológica.</p>
                </div>
                <div class="service-item">
                    <h3>Coleta Domiciliar</h3>
                    <p>Realize seus exames no conforto da sua casa ou escritório.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Cuide da sua saúde com quem entende</h2>
            <p>Agende seus exames agora mesmo pelo nosso WhatsApp.</p>
            <a href="#" class="btn btn-primary">Agendar Exame</a>
        </div>
    </section>

</main><!-- #main -->

<?php
get_footer();
