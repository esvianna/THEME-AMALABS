    <footer id="colophon" class="site-footer">
        <div class="container">
            <div class="footer-widgets">
                <div class="footer-widget">
                    <h3>Sobre</h3>
                    <p><?php echo esc_html( get_theme_mod( 'footer_about_text', 'AmaLabs oferece serviços de diagnóstico laboratorial com precisão, agilidade e confiança.' ) ); ?></p>
                </div>
                <div class="footer-widget">
                    <h3>Contato</h3>
                    <p>
                        Email: <?php echo esc_html( get_theme_mod( 'contact_email', 'contato@amalabs.com.br' ) ); ?><br>
                        Tel: <?php echo esc_html( get_theme_mod( 'contact_phone', '(11) 1234-5678' ) ); ?><br>
                        Endereço: <?php echo esc_html( get_theme_mod( 'contact_address', 'Rua Exemplo, 123' ) ); ?>
                    </p>
                </div>
                <div class="footer-widget">
                    <h3>Horário</h3>
                    <p><?php echo nl2br( esc_html( get_theme_mod( 'footer_hours', "Seg - Sex: 07:00 - 18:00\nSáb: 07:00 - 13:00" ) ) ); ?></p>
                </div>
            </div><!-- .footer-widgets -->

            <div class="footer-copyright">
                <div class="site-info">
                    &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. Todos os direitos reservados.
                </div>
            </div>
        </div>
    </footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
