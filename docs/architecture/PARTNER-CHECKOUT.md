# Arquitetura — AmaLabs Partner Checkout

**Issue:** [#9](https://github.com/esvianna/THEME-AMALABS/issues/9) · Parent [#8](https://github.com/esvianna/THEME-AMALABS/issues/8)  
**Status:** Aceite (Done)  
**Data:** 2026-07-23  
**Repo plugin:** [`esvianna/white-label-checkout`](https://github.com/esvianna/white-label-checkout)  
**Schema:** `docs/DATA-MODEL.md` no repo do plugin (issue #10)

---

## 1. Decisão de repositório

| Item | Valor |
|------|--------|
| Modelo | **Repositório GitHub separado** do tema |
| Nome proposto | `esvianna/white-label-checkout` |
| Tema | Continua em `esvianna/THEME-AMALABS` |
| Project Kanban | Continua [Amalabs #16](https://github.com/users/esvianna/projects/16) (aceita issues de vários repos) |
| Issues de execução | Novas issues de código preferencialmente **no repo do plugin**; #8–#18 no tema ficam como histórico de planeamento com links |

**Porquê separado:** deploy independente, SemVer próprio, alinhado ao padrão Amaminerais (`plugin-*` ≠ tema), menor risco de sobrescrever o tema oficial em produção (D-007).

---

## 2. Papéis

| Componente | Responsabilidade |
|------------|------------------|
| **Tema AmaLabs** | Site institucional; loja pública oculta/irrelevante ao consumer; **sem** lógica de parceiro |
| **Plugin `white-label-checkout`** | Parceiros, links/tokens, sessão, catálogo restrito, checkout branded, order meta/UTM, e-mails por parceiro, (Fase 2) gateway |
| **WooCommerce** | Carrinho, checkout core, pedidos, e-mails base, produtos |
| **Gateway** | Fase 2 — estrutura de config reservada no schema (#10); política comercial em #18 |

---

## 3. Fluxo (happy path)

```text
Campanha do parceiro
  → URL /parceiro/{slug}/?…&token=…&utm_*
  → Plugin valida slug + token + parceiro ativo
  → Sessão/cookie: partner_id (+ UTMs)
  → Catálogo/carrinho só produtos permitidos
  → Checkout “limpo” (branding do parceiro)
  → Pedido Woo + meta (partner_id, UTMs, …)
  → E-mails Woo com branding do parceiro
  → Fulfillment AmaLabs (processo interno; hooks documentados)
```

**Erros:** link inválido / token revogado / parceiro inativo → página de erro genérica (sem vazar existência de outros parceiros).

---

## 4. Boundaries (o que NÃO entra no tema)

- CPT/CRUD de parceiros  
- Validação de token / sessão  
- Templates de checkout/e-mail do parceiro  
- Credenciais ou roteamento de gateway  
- Relatórios por parceiro  

O tema pode, no máximo, manter a loja oculta como já está; qualquer override de checkout fica **no plugin**.

---

## 5. Stack e convenções

- WordPress plugin clássico + WooCommerce (sem build step obrigatório no MVP; JS/CSS enqueued).
- Prefixo: `wlc_` (funções/hooks) / text domain `white-label-checkout` (alternativa interna `amalabs_pc_` só se colidir — preferir `wlc_`).
- Capability: `manage_wlc_partners` (ou `manage_amalabs_partners` se quiser namespace operacional AmaLabs no admin — decidir no scaffold #11).
- Idioma docs/UI admin: PT-BR; código em inglês.
- Produção do **plugin**: pasta `wp-content/plugins/white-label-checkout/` — deploy separado do tema; **nunca** enviar `.git` ao document root.

---

## 6. Hooks Woo (orientação)

| Área | Hooks / abordagem |
|------|-------------------|
| Sessão / URL | `template_redirect`, rewrite rules ou query vars |
| Catálogo | `woocommerce_product_is_visible`, `woocommerce_add_to_cart_validation` |
| Checkout UI | templates em `plugins/.../templates/`; `woocommerce_locate_template` |
| Pedido | `woocommerce_checkout_create_order` / `woocommerce_checkout_order_processed` → meta |
| E-mails | `woocommerce_email_header`, filtros `woocommerce_email_*`, templates override no plugin |
| Gateway (Fase 2) | `woocommerce_available_payment_gateways` + config por `partner_id` |

Lista exacta fecha-se na implementação (#13–#16); aqui é contrato de intenção.

---

## 7. Fase 1 vs Fase 2

**Fase 1 (agora):** ADR, schema (#10), scaffold, CRUD, URL/sessão/UTM, catálogo, checkout skin, e-mails (arquitetura + eventos), order meta/relatório.  
**Fase 2 (#18):** gateway/modelo financeiro, From/domínio de e-mail, textos fiscais / seller of record.

Campos de gateway e política de From existem no schema como **reservados**, sem obrigar decisão do cliente para avançar a fundação.

---

## 8. Non-goals (MVP fundação)

- Marketplace multi-vendor (Dokan etc.)  
- PWA / app  
- Split automático de comissão (salvo decisão Fase 2)  
- Page builder para o parceiro editar o checkout livremente  
- ESP externo (Klaviyo) no MVP  

---

## 9. Próximos passos após aceitar este ADR

1. Validação humana → mover #9 para **Done**.  
2. Criar repo GitHub `white-label-checkout` (vazio + README) se ainda não existir.  
3. Executar **#10** (modelo de dados) com base neste ADR.  
4. **#11** scaffold no novo repo.
