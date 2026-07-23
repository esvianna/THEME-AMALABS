# TESTING — AmaLabs Theme

Não há suíte automatizada ainda. Prioridade: **testes manuais mínimos + regressão** após cada mudança. Automatizar só quando o custo de regressão justificar (D-001).

---

## Ambiente

- WordPress recente + tema AmaLabs ativo
- WooCommerce instalado (e um teste **sem** Woo, para degradar com elegância)
- Alguns produtos publicados (com e sem imagem)
- Menu atribuído à localização `primary`
- Customizer com pelo menos uma imagem de hero

---

## Checklist mínimo (a cada mudança relevante)

### Home / Customizer

- [ ] Hero: título, texto, 2 botões, imagem de fundo, overlay e cor do texto
- [ ] Toggle “Exibir seção” em features / amalabs / soluções / o que fazemos / whitelabel / serviços / produtos / CTA
- [ ] Fundo zebrado (cinza/branco) nas seções
- [ ] CTA com e sem imagem (layout 1 vs 2 colunas)
- [ ] Cores primária/secundária/destaque refletem no CSS

### Header / navegação

- [ ] Logo custom ou nome do site
- [ ] Menu desktop
- [ ] Menu mobile (toggle `aria-expanded` + classe `toggled`)
- [ ] Busca Woo: digitar ≥3 caracteres → dropdown; vazio → mensagem; clique fora fecha
- [ ] Carrinho visível/oculto conforme `products_section_visible` + `hide_cart_if_products_hidden`
- [ ] Contador do carrinho atualiza ao adicionar produto (fragment AJAX)

### WooCommerce

- [ ] Seção `#produtos` na home com quantidade configurada
- [ ] Página de loja / produto sem sidebar quebrada; layout `container`
- [ ] Carrinho e checkout carregam (smoke)

### Conteúdo genérico

- [ ] `index.php`: lista de posts e post singular via loop
- [ ] Página 404 / página estática: comportamento aceitável até existirem templates dedicados

### Casos de erro

- [ ] Busca com termo sem resultado
- [ ] Woo desativado: header sem busca/carrinho; home sem seção produtos; sem JS fatal
- [ ] Seção produtos oculta + opção ocultar carrinho

---

## Regressão sugerida por área tocada

| Arquivos alterados | Focar em |
|--------------------|----------|
| `functions.php` (AJAX) | Busca + console sem 403/500 |
| `functions.php` (Customizer/CSS) | Cores e seções na home |
| `header.php` / CSS header | Desktop + mobile + carrinho |
| `front-page.php` | Ordem e toggles das seções |
| `js/ajax-search.js` | Debounce/abort, XSS visual (título com `<`) |
| `style.css` | Breakpoints ~768px e container |

---

## Como reportar na resposta da IA

Após mudanças, informar:

1. O que testar (3–8 bullets concretos)
2. O que já foi verificado (se houver)
3. Riscos residuais / o que o humano deve validar no WP admin
