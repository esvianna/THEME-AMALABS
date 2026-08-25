# PROJECT_STATUS — AmaLabs Theme

> Última atualização: 2026-08-25 (WLC v0.11.6 em prod — #22)

---

## Onde paramos

Homologação WLC em `https://amalabs.com.br`. Parceiro teste: **Blue Mind** (`blue-mind`, ID 115).

| Issue | Status | Notas |
|-------|--------|--------|
| #9–#12 | **Done** | ADR, schema, scaffold, CRUD |
| [#13](https://github.com/esvianna/THEME-AMALABS/issues/13) URL/sessão/UTM | Validar **Done** | Link + sessão + order meta |
| [#15](https://github.com/esvianna/THEME-AMALABS/issues/15) skin checkout | **In progress** | classic + Asaas; v0.11.5 thumb + frete full-width; success → #20 / #22 |
| [#19](https://github.com/esvianna/THEME-AMALABS/issues/19) webhook | **In review** | v0.11.2 customer no payload (D-014) |
| [#20](https://github.com/esvianna/THEME-AMALABS/issues/20) thank-you WP | **Backlog** | D-015: `order-received` + conteúdo página WP + shortcode |
| [#22](https://github.com/esvianna/THEME-AMALABS/issues/22) thank-you URL | **In review** | D-016: 302 HTTPS após pago; v0.11.6 em prod; URL preenchida nos 3 Blue Mind |
| #14 · #16 · #17 | Backlog | Catálogo full, e-mails, relatório |
| #18 | Fase 2 | Gateway / From / fiscal |
| [#21](https://github.com/esvianna/THEME-AMALABS/issues/21) GFI Connect | **Backlog** | Análise: plugin separado de pagamento (saldo Gfi Hub); não substitui Asaas |
| #1–#3 | Ready (tema) | Fora desta sprint |

**Plugin:** `white-label-checkout` **v0.11.6** em prod. URL de obrigado `https://bluemindsaude.com/obrigado/` nos parceiros Blue Mind 1/3/6 unidades (IDs 115, 143, 144). Vivants sem URL.

**Workspace:** `C:\Users\dudav\Documents\Projetos\AMALABS\amalabs.code-workspace`

---

## Feito nesta sessão (2026-08-25)

- [x] Issue [#22](https://github.com/esvianna/THEME-AMALABS/issues/22) URL de obrigado externa por parceiro criada e no Project (P1 / S)
- [x] Decisões fechadas (D-016): 302 só após pago; sem query string; convive com #20
- [x] WLC **v0.11.6** — campo `_wlc_thankyou_url` + redirect 302 após pago. Push GitHub + deploy `ama-prod` (sem `.git`)
- [x] URL de obrigado preenchida nos 3 parceiros Blue Mind (`blue-mind1` / `3` / `6`)

## Sessão anterior (2026-08-19)

- [x] WLC **v0.11.5** — thumb da imagem destacada acima do nome; opções de envio em largura total do resumo. Push GitHub + deploy `ama-prod`
- [x] WLC **v0.11.4** — resumo do checkout: oculta quantidade; opções de envio em coluna única (“Escolha a forma de Envio”). Push GitHub + deploy `ama-prod` (sem `.git`)
- [x] Issue [#21](https://github.com/esvianna/THEME-AMALABS/issues/21) GFI Connect (plugin separado de pagamento) criada e no Project Backlog (P2 / S)
- [x] Comentário em #18 apontando a pesquisa de gateway Gfi para #21

## Sessão anterior (2026-07-31)

- [x] Issue [#20](https://github.com/esvianna/THEME-AMALABS/issues/20) thank-you (página WP + shortcode) criada e no Project Backlog
- [x] Comentário em #15 apontando success screen para #20

---

## Pendente imediato

1. Humano: testar #22 (cartão pago → 302; Pix pendente → QR no Woo) e mover para **Done**
2. Humano: fechar aceite do webhook #19 (n8n / pedido real)
3. Secret no webhook Blue Mind (recomendado com PII)

---

## Como testar agora

1. Admin → WLC Parceiros → Blue Mind → **URL de obrigado**: `https://bluemindsaude.com/obrigado/` → salvar
2. Checkout campanha **cartão** (pago na hora) → deve 302 para a página do parceiro, sem `?order=` na URL
3. Checkout **Pix** pendente → permanece no Woo com QR; após pagar e recarregar `order-received` → 302
4. Parceiro sem URL → thank-you Woo inalterada
5. Checkout Blue Mind (hard refresh): thumb acima do nome; frete ocupando a largura do card “Resumo do pedido”
