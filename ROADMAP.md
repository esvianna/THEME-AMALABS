# ROADMAP — AmaLabs Theme

Prioridades sugeridas. O **backlog oficial** vive no GitHub Project; este arquivo é a visão consolidada.

Legenda: `P0` crítico · `P1` importante · `P2` desejável

---

## Agora (fundação)

| Prioridade | Item | Notas |
|------------|------|--------|
| P0 | Confirmar e usar GitHub Project + Issues | Ver `docs/GITHUB-WORKFLOW.md` |
| P0 | Hardening da busca AJAX (nonce + validação) | SECURITY.md |
| P0 | `sanitize_callback` / escape de cores no Customizer | SECURITY.md |
| P1 | Checklist de regressão manual executado na staging | TESTING.md |
| P1 | `screenshot.png` + metadados do tema coerentes | WP admin |

## Em seguida (produto / UX)

| Prioridade | Item | Notas |
|------------|------|--------|
| P1 | **Checkout white-label por parceiro** | Épico [#8](https://github.com/esvianna/THEME-AMALABS/issues/8); Fase 1 [#9](https://github.com/esvianna/THEME-AMALABS/issues/9)–[#17](https://github.com/esvianna/THEME-AMALABS/issues/17); Fase 2 decisões [#18](https://github.com/esvianna/THEME-AMALABS/issues/18) |
| P1 | Alinhar copy e seções à marca real (infocêuticos vs lab clínico) | Conteúdo + Customizer defaults |
| P1 | Templates `page` / `single` / `404` | Evitar layout genérico frágil |
| P1 | Revisar loja Woo (shop, single product, cart, checkout) | Overrides só se necessário; loja pública continua oculta no modelo parceiro |
| P2 | Extrair seções da home para `template-parts/` | Só se `front-page.php` continuar crescendo |
| P2 | Mover Customizer para `inc/customizer.php` | Organização, sem mudar comportamento |
| P2 | Menu mobile / JS do header via arquivo enqueued | Em vez de script inline |

## Depois (qualidade contínua)

| Prioridade | Item | Notas |
|------------|------|--------|
| P2 | Versionar assets (`filemtime` ou versão do tema) | Cache bust |
| P2 | Self-host fonts ou `wp_enqueue` com estratégia LGPD | Decisão em DECISIONS |
| P2 | Testes automatizados pontuais (PHPUnit/Playwright) | Só se o projeto crescer; manual primeiro |
| P2 | Acessibilidade (contraste, foco, `aria` do menu) | Auditoria leve |

---

## Fora de escopo (por enquanto)

- Headless / React / build bundler — o tema é PHP clássico; não introduzir toolchain sem decisão explícita.
- Plugin custom pesado — preferir tema + Woo + plugins oficiais.
- Refatoração estética total da home sem brief de design.
