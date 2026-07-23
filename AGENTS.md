# AGENTS.md — AmaLabs Theme

Guia principal para assistentes de IA e desenvolvedores que atuam neste repositório.

**Idioma:** PT-BR (respostas, commits sugeridos e documentação).

---

## O que é este projeto

Tema WordPress customizado **AmaLabs Theme** (v1.0) para o site do laboratório AmaLabs, com integração **WooCommerce** (catálogo, busca AJAX, carrinho no header) e conteúdo editável via **Customizer**.

| Item | Valor |
|------|--------|
| Repositório | [esvianna/THEME-AMALABS](https://github.com/esvianna/THEME-AMALABS) |
| Branch principal | `main` |
| Stack | WordPress Theme (PHP) + CSS + jQuery (busca AJAX) + WooCommerce |
| Backlog oficial | GitHub Issues + Project — ver [docs/GITHUB-WORKFLOW.md](docs/GITHUB-WORKFLOW.md) |

---

## Antes de alterar código

1. Ler **[PROJECT_STATUS.md](PROJECT_STATUS.md)** (onde paramos, pendências, riscos).
2. Consultar **[ROADMAP.md](ROADMAP.md)**, **[DECISIONS.md](DECISIONS.md)** e a issue/card no GitHub Project, se houver.
3. Avaliar impacto nos arquivos afetados (tema é pequeno; mudanças em `functions.php` ou `front-page.php` têm alcance amplo).
4. Preservar funcionalidades existentes; **não** refatorar “de passagem”.
5. Se a tarefa for feature/bug: seguir o fluxo em `docs/GITHUB-WORKFLOW.md` (issue → Ready → In progress).

## Depois de alterar código

1. Atualizar **PROJECT_STATUS.md** (onde paramos, feito, pendente, próximo passo).
2. Registrar em **CHANGELOG.md** (Unreleased) o que mudou para o usuário/dev.
3. Se houver decisão técnica relevante → **DECISIONS.md**.
4. Indicar como testar (checklist em **TESTING.md** ou passos na resposta).
5. Indicar o próximo passo lógico e atualizar a issue/card no Project.

---

## Mapa do código (estado atual)

| Arquivo | Responsabilidade |
|---------|------------------|
| `style.css` | Cabeçalho do tema WP + CSS global (tokens `:root`, layout, header, seções, Woo) |
| `functions.php` | Setup do tema, enqueue, AJAX search, wrappers Woo, Customizer, CSS dinâmico, cart fragments |
| `header.php` | Header 2 linhas, busca Woo, carrinho condicional, menu mobile (JS inline) |
| `footer.php` | Rodapé (sobre/contato/horário via theme_mod) |
| `front-page.php` | Landing: hero, features, quem somos, soluções, o que fazemos, whitelabel, serviços, produtos, CTA |
| `index.php` | Loop genérico de posts |
| `js/ajax-search.js` | Dropdown de busca de produtos (admin-ajax) |

**Ainda não existe:** `page.php`, `single.php`, `404.php`, pasta `woocommerce/`, template-parts, testes automatizados, `screenshot.png`, Text Domain carregado.

---

## Princípios de qualidade (obrigatórios)

- Simplicidade e legibilidade > abstração prematura.
- Funções pequenas; nomes claros em inglês para código (`amalabs_*`), textos de UI em PT-BR.
- Baixo acoplamento: preferir `get_template_part` / includes só quando o arquivo crescer de forma justificada.
- Reaproveitar lógica (evitar duplicar defaults do Customizer nos templates — preferir um único default).
- Tratar erros e casos vazios (sem WooCommerce, busca sem resultado, theme_mod ausente).
- Escapar saída (`esc_html`, `esc_url`, `esc_attr`, `wp_kses_post`) e sanitizar entrada/`theme_mod`.
- Não expandir escopo; não alterar funcionalidades não pedidas.

## Segurança (resumo)

Detalhes em **[SECURITY.md](SECURITY.md)**. Em AJAX e formulários: nonce + capability quando aplicável; nunca confiar em `$_POST`/`$_GET` crus; não logar dados sensíveis.

## Testes (resumo)

Checklist em **[TESTING.md](TESTING.md)**. Mínimo: home + Customizer + header/mobile + busca AJAX + fluxo Woo (se ativo).

## Restrições operacionais

- **Não commitar / push / deploy** sem pedido explícito do usuário.
- **Não** alterar funcionalidades nem refatorar em massa só para “limpar”.
- Documentação de governança e Issues/Project são a fonte de continuidade — não depender só do histórico do chat.
- **Produção (`amalabs.com.br`) é a versão oficial do tema** (D-007). Não sobrescrever o servidor com o repo “porque o Git está à frente”. Antes de qualquer deploy: diff prod ↔ local + autorização + cuidado com regressão de layout/features. Preferir sincronizar **prod → repo** quando divergirem.
- Nunca enviar pasta `.git` para o document root do tema em produção (D-008).
