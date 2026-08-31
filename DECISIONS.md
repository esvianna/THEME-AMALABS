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
- **Status:** Aceito (issue [#10](https://github.com/esvianna/THEME-AMALABS/issues/10) Done)
- **Contexto:** Modelo de dados do white-label-checkout.
- **Decisão:** Entidade Partner como CPT `wlc_partner` + meta `_wlc_*`; pedido via order meta HPOS-safe; sessão cookie/transient; gateway/From só como estrutura reservada (Fase 2). Sem tabelas custom no MVP. Schema canónico: [`docs/DATA-MODEL.md`](https://github.com/esvianna/white-label-checkout/blob/main/docs/DATA-MODEL.md) no repo do plugin.
- **Consequências:** Admin WP nativo; migrations via `wlc_db_version`; revisitar custom tables se escala/auditoria exigirem.

## D-011 — Capability `manage_wlc_partners`

- **Data:** 2026-07-23
- **Status:** Aceito (issue [#11](https://github.com/esvianna/THEME-AMALABS/issues/11))
- **Decisão:** Capability única `manage_wlc_partners` para CPT/admin do plugin (não `manage_amalabs_partners`). Prefixo alinhado a `wlc_`.
- **Consequências:** CPT `wlc_partner` mapeia caps para essa capability; concedida a `administrator` na ativação.

## D-012 — Frete Correios + ViaCEP + nome único no WLC

- **Data:** 2026-07-24
- **Status:** Aceito (atualizado 2026-07-27)
- **Contexto:** Checkout Blocks parceiro precisa de cotação BR, menos fricção no endereço e UX de nome único; Melhor Envio fica para fase 2.
- **Decisão:** (1) Homologação com **taxa fixa** (R$ 15) — API legacy Correios não responde; PAC/SEDEX desligados. (2) Autofill CEP via **proxy** `wlc/v1/cep/{cep}` → ViaCEP. (3) Guest on + login reminder on. (4) UX “Nome completo” + split Store API. (5) Ordem BR: CEP antes do endereço.
- **Consequências:** Frete real (Melhor Envio / CWS) quando a homologação de UX estiver ok.

## D-013 — Webhook do parceiro (MVP enxuto)

- **Data:** 2026-07-27
- **Status:** Aceito (issue [#19](https://github.com/esvianna/THEME-AMALABS/issues/19))
- **Contexto:** Campanhas patrocinadas com UTM; parceiro quer receber eventos no webhook próprio.
- **Decisão:** (1) Eventos MVP: `order.created` + `order.paid` apenas. (2) Abandono fora do MVP. (3) Payload **enxuto** (attribution/UTM + ids/status/totais mínimos) — sem PII completo. (4) Auth por **secret no header** (Bearer / `X-WLC-Secret`).
- **Consequências:** Menos risco LGPD; CRM do parceiro usa ids/UTM; abandono e payload completo só se o cliente pedir.
- **Atualização 2026-07-30 (D-014):** PII de contato/endereço passou a ser enviado — ver D-014.

## D-014 — Webhook: incluir customer (nome, e-mail, telefone, endereço)

- **Data:** 2026-07-30
- **Status:** Aceito (pedido do parceiro Blue Mind / #19)
- **Contexto:** Parceiro precisa dos dados cadastrais no Apps Script / CRM para campanhas.
- **Decisão:** Payload de `order.created` / `order.paid` / `webhook.test` inclui bloco `customer` com `name`, `email`, `phone` e `address` (billing: street, number, neighborhood, city, state, postcode, country). CPF continua fora deste escopo.
- **Consequências:** Maior superfície LGPD — secret + HTTPS obrigatórios na prática; parceiro responsável pelo destino.

## D-015 — Thank-you WLC: página WP + shortcode na URL `order-received`

- **Data:** 2026-07-31
- **Status:** Aceito (issue [#20](https://github.com/esvianna/THEME-AMALABS/issues/20))
- **Contexto:** Success screen editável (obrigado, conta, rastreio, atendimento) sem quebrar retorno Asaas.
- **Decisão:** (1) Conteúdo editorial em **página WordPress**; (2) shortcode WLC para dados do pedido com `key` válida; (3) no parceiro, **seletor de page ID** (não URL solta); (4) manter URL nativa Woo **`order-received`** e injetar o conteúdo da página (opção B). Redirect para slug da página (opção A) só com motivo forte + testes de gateway.
- **Consequências:** Compatível com Asaas; ops edita a página no Gutenberg; fallback = thank-you Woo se page ID vazio.
- **Atualização 2026-08-25 (D-016):** URL HTTPS externa opcional por parceiro passou a ser permitida — ver D-016. A opção B desta decisão continua válida quando não houver URL externa.

## D-016 — Thank-you WLC: URL HTTPS externa opcional (redirect após pago)

- **Data:** 2026-08-25
- **Status:** Aceito (issue [#22](https://github.com/esvianna/THEME-AMALABS/issues/22))
- **Contexto:** Parceiro Blue Mind publicou página própria (`bluemindsaude.com/obrigado/`). A D-015 cobre thank-you editorial no WP da AmaLabs; não havia campo de URL de redirecionamento.
- **Decisão:** (1) Meta `_wlc_thankyou_url` (HTTPS, opcional) no cadastro do parceiro. (2) Redirect **302** na `order-received` **somente se o pedido já estiver pago** — Pix/Boleto pendentes permanecem no Woo (QR/código). (3) Sem query string (`order`/`key`) no MVP. (4) Convive com #20: URL externa **ou** página WP; URL externa tem prioridade. (5) URL vazia/inválida → thank-you Woo atual. Não alterar `woocommerce_get_return_url` do gateway (Asaas continua retornando em `order-received`).
- **Consequências:** Cartão (pago na hora) vai direto à página do parceiro; Pix/Boleto só redirecionam depois do pagamento, se o cliente voltar/atualizar a thank-you Woo. Host da URL entra em `allowed_redirect_hosts` só na hora do redirect.

## D-017 — GFI Connect: plugin gateway Woo separado (saldo Gfi Hub)

- **Data:** 2026-08-31
- **Status:** Aceito (2026-08-31, issue [#21](https://github.com/esvianna/THEME-AMALABS/issues/21)); scaffold permitido; go-live após sandbox Gfi
- **Contexto:** Aceitar saldo Gfi Hub como forma de pagamento **adicional** na loja AmaLabs e/ou checkouts WLC. Asaas (Pix/Boleto/Cartão) permanece o gateway principal. Tema não deve conter lógica de gateway (D-009). Wiki [Webhook](https://api.gfihub.com.br/wiki/38d5bd05-b0a5-4e0a-b5e2-cf2539c3310a) (28/08/2026) confirma notificação `POST` com `status: PAID`.
- **Decisão:**
  1. **Plugin WordPress/WooCommerce separado** (`gfi-connect-gateway`), repo [`esvianna/gfi-connect-gateway`](https://github.com/esvianna/gfi-connect-gateway), SemVer/deploy independentes — **não** embutir no `white-label-checkout` nem no tema.
  2. **Reutilizável (multi-site / multi-projeto):** zero hardcode de AmaLabs (nome, URL, merchant, copy). Cada instalação configura o próprio merchant via Woo → Pagamentos. Um site WP = um tenant de config; não é SaaS multi-loja num único processo.
  3. Implementar como `WC_Payment_Gateway` ativável junto de qualquer outro gateway (Asaas na AmaLabs).
  4. Fluxo: `POST /auth` → `POST /orders` (`orderNo` = ID Woo) → QR na thank-you → webhook `PAID` + polling/cron de fallback → marca pedido pago.
  5. Credenciais e IDs **só** em settings do gateway (options WP); nunca no browser.
  6. Respeitar D-015/D-016 quando instalado junto do WLC: retorno em `order-received` (QR/pendente); redirect externo só após pago.
  7. **Scaffold / skeleton** avança com defaults documentados e settings vazios; **pagamento real / go-live** só após: resposta suporte Gfi + sandbox + aceite comercial humano.
- **Settings do gateway (Woo → Pagamentos → Gfi Connect)** — o que vira parâmetro (não hardcode):

  | Campo | Por quê |
  |-------|---------|
  | Enabled / title / description | UX checkout (textos editáveis por loja) |
  | Environment (sandbox \| production) | Alterna base URL da API |
  | API base URL (opcional override) | Default das docs; override se Gfi mudar host |
  | API username + password | Usuário dedicado de integração |
  | Merchant ID (opcional) | Se vazio, usa `defaultMerchantId` do JWT |
  | Currency ID | UUID ou código BRL — preenchido após confirmar com Gfi |
  | Webhook secret (token na URL) | Path/query do REST endpoint; 1 URL por merchant no painel Gfi |
  | Polling interval / enable cron | Fallback se webhook falhar |
  | Debug log | Ligar/desligar logs sem PII sensível demais |

  **Não** são settings (são regras de código / resposta Gfi): enum de status tratado no código (`PAID` + tolerância); schema do payload; política comercial de taxas/liquidação (fora do plugin).
- **Alternativas rejeitadas / adiantadas:** (B) Dentro do WLC — infla o plugin e acopla Gfi a campanhas white-label. (C) No tema — rejeitado (D-009).
- **Consequências:** Terceiro deploy; convive com Asaas e skin WLC; instalável em outros Woo sem fork; gaps da API (TTL JWT/QR, retries webhook, `currencyId` exato) entram como defaults configuráveis ou constantes documentadas quando o suporte responder.
