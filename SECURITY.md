# SECURITY — AmaLabs Theme

Escopo: tema WordPress + WooCommerce. Não há API própria nem banco custom; riscos concentrados em **XSS**, **CSRF em AJAX**, **sanitização de theme_mod** e **dados sensíveis em logs**.

---

## Princípios obrigatórios

1. **Validar e sanitizar entradas** (`sanitize_text_field`, `absint`, `esc_url_raw`, etc.).
2. **Escapar saídas** conforme contexto (`esc_html`, `esc_attr`, `esc_url`, `wp_kses_post`).
3. **Nonce + verificação** em toda ação AJAX/admin e formulários custom (`check_ajax_referer` / `wp_verify_nonce`).
4. **Capabilities** em ações privilegiadas (`current_user_can`); busca pública de produtos pode ser `nopriv`, mas ainda com nonce.
5. **Não** concatenar HTML no JS com dados crus do servidor — escapar ou usar `textContent`.
6. **Não** logar senhas, tokens, cookies de sessão ou dados de pagamento.
7. **Customizer:** sempre definir `sanitize_callback` em `add_setting`; cores com `sanitize_hex_color`.
8. SQL: preferir `WP_Query` / APIs WP; se SQL raw for inevitável, `$wpdb->prepare`.

---

## Riscos conhecidos neste tema (baseline)

| Área | Situação atual | Ação recomendada |
|------|----------------|------------------|
| `amalabs_ajax_search_callback` | `sanitize_text_field` no termo; **sem nonce** | Enviar nonce no `wp_localize_script` + `check_ajax_referer` |
| `amalabs_customize_css` | Cores/`opacity` impressas sem sanitize | `sanitize_hex_color` / float clamp |
| Settings do Customizer | Vários sem `sanitize_callback` | Adicionar callbacks por tipo |
| `js/ajax-search.js` | Monta HTML com `product.title` / URLs | Escapar ou construir nós DOM |
| Google Fonts CDN | Terceiro no front | Avaliar self-host / consentimento (LGPD) |
| `.git` no tema (prod) | Estava exposto via HTTP (`/.git/HEAD` = 200) | **Removido em 2026-07-23**; `.htaccess` bloqueia `/.git`; não redeployar `.git` |

---

## Checklist rápido antes de merge de código

- [ ] Toda saída dinâmica escapada?
- [ ] AJAX/form com nonce válido?
- [ ] `theme_mod` / `$_REQUEST` sanitizados?
- [ ] Sem segredos no repositório?
- [ ] Comportamento ok para visitante não logado e para admin?

---

## O que não se aplica (ainda)

- CSRF de checkout Woo → responsabilidade do WooCommerce/core (não reimplementar).
- Auth custom / JWT → inexistente neste tema.
- Uploads de arquivo custom → usar APIs de mídia do WP se forem criados.
