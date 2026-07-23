# DECISIONS — Registro de decisões técnicas

Formato leve (ADR). Registrar decisões que afetam arquitetura, segurança ou fluxo de trabalho.

---

## D-001 — Tema WordPress clássico (sem build step)

- **Data:** 2026 (baseline)
- **Status:** Aceito
- **Contexto:** Site institucional + WooCommerce.
- **Decisão:** PHP templates + CSS + JS enqueued; sem bundler (Vite/Webpack) por padrão.
- **Consequências:** Simplicidade de deploy (copiar pasta do tema). Evoluções de JS/CSS modernas exigem decisão explícita nova.

## D-002 — Conteúdo da home via Customizer (`theme_mod`)

- **Data:** 2026 (baseline)
- **Status:** Aceito
- **Contexto:** Cliente edita textos/imagens sem page builder.
- **Decisão:** Seções da `front-page.php` controladas por Customizer (visibilidade, textos, cores, imagens).
- **Consequências:** `functions.php` cresce; defaults duplicados entre Customizer e templates. Preferir um único default ao evoluir. Alternativa futura: bloco/padrão ou CPT — só com brief.

## D-003 — WooCommerce como loja, não inventar e-commerce

- **Data:** 2026 (baseline)
- **Status:** Aceito
- **Decisão:** Usar WooCommerce (shortcodes, cart fragments, product search). Carrinho no header pode ser ocultado se a seção de produtos estiver oculta.
- **Consequências:** Tema deve degradar bem se Woo estiver inativo (`class_exists( 'WooCommerce' )`).

## D-004 — Backlog oficial = GitHub Issues + Project

- **Data:** 2026-07-23
- **Status:** Aceito (confirmado pelo usuário)
- **Decisão:** Continuidade e priorização via Issues + Project «Amalabs» (#16). Done só pelo humano. Commits só com pedido explícito.
- **Consequências:** IA não inventa tarefas “soltas”; cria/atualiza issues e move cards conforme `docs/GITHUB-WORKFLOW.md`; máximo Status = In review.

## D-005 — Não fatiar `functions.php` sem necessidade

- **Data:** 2026-07-23
- **Status:** Aceito
- **Contexto:** Arquivo monolítico, Customizer grande.
- **Decisão:** Manter em um arquivo enquanto o tema for pequeno; extrair `inc/*.php` apenas quando uma mudança real tocar aquela área ou o arquivo atrapalhar revisão.
- **Consequências:** Evita refatoração cosmética; diffs menores e mais seguros.

## D-006 — Documentação e respostas em PT-BR

- **Data:** 2026-07-23
- **Status:** Aceito
- **Decisão:** Docs de governança e comunicação com o usuário em português; identificadores de código em inglês (`amalabs_*`).

## D-007 — Produção (`amalabs.com.br`) é a versão oficial do tema

- **Data:** 2026-07-23
- **Status:** Aceito
- **Contexto:** O tema em `/home3/amaminerais/amalabs.com.br/wp-content/themes/THEME` foi evoluído no servidor; o GitHub pode estar “à frente” em commits sem ser a verdade operacional.
- **Decisão:** **Produção é a fonte da verdade** para layout e funcionalidades. Não fazer deploy/overwrite a partir do repo sem: (1) diff explícito prod ↔ local; (2) autorização; (3) plano para não regressar UI/features. Preferir **trazer produção → repo** (snapshot) antes de desenvolver novas mudanças.
- **Consequências:** Commits locais “à frente” não autorizam publicar; riscos de quebrar o site ao fazer `checkout`/`rsync` cego do GitHub para o servidor.

## D-008 — Sem `.git` no document root do tema em produção

- **Data:** 2026-07-23
- **Status:** Aceito
- **Decisão:** Removido `wp-content/themes/THEME/.git` do servidor web. Histórico Git fica só no clone local / GitHub. `.htaccess` no tema bloqueia recriação de `/.git` via web.
- **Consequências:** Deploy não deve reenviar pasta `.git`. Editar produção “com git no servidor” deixa de ser o fluxo.

## D-009 — Plugin white-label-checkout em repositório separado

- **Data:** 2026-07-23
- **Status:** Aceito (nome do repo confirmado pelo utilizador)
- **Contexto:** Checkout white-label por parceiro (#8); tema institucional já existe e é oficial em produção (D-007).
- **Decisão:** Implementar como **plugin WooCommerce** em repo GitHub **separado**: [`esvianna/white-label-checkout`](https://github.com/esvianna/white-label-checkout). Tema `THEME-AMALABS` não absorve a lógica. Kanban continua no Project Amalabs #16. Detalhe: `docs/architecture/PARTNER-CHECKOUT.md`.
- **Consequências:** Dois deploys (tema ≠ plugin); SemVer independente; issues de código preferencialmente no repo do plugin após criação; pasta em prod: `wp-content/plugins/white-label-checkout/`.

## D-010 — Storage de parceiros: CPT + post meta (sem custom tables no MVP)

- **Data:** 2026-07-23
- **Status:** Proposto (issue [#10](https://github.com/esvianna/THEME-AMALABS/issues/10) em *In review*)
- **Contexto:** Modelo de dados do white-label-checkout.
- **Decisão:** Entidade Partner como CPT `wlc_partner` + meta `_wlc_*`; pedido via order meta HPOS-safe; sessão cookie/transient; gateway/From só como estrutura reservada (Fase 2). Sem tabelas custom no MVP. Schema canónico: [`docs/DATA-MODEL.md`](https://github.com/esvianna/white-label-checkout/blob/main/docs/DATA-MODEL.md) no repo do plugin.
- **Consequências:** Admin WP nativo; migrations via `wlc_db_version`; revisitar custom tables se escala/auditoria exigirem.
