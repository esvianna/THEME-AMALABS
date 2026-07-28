# PROJECT_STATUS — AmaLabs Theme

> Última atualização: 2026-07-28 (WLC v0.11.0 · checkout clássico + Asaas)

---

## Onde paramos

Homologação WLC em `https://amalabs.com.br`. Parceiro teste: **Blue Mind** (`blue-mind`, ID 115).

| Issue | Status | Notas |
|-------|--------|--------|
| #9–#12 | **Done** | ADR, schema, scaffold, CRUD |
| [#13](https://github.com/esvianna/THEME-AMALABS/issues/13) URL/sessão/UTM | Validar **Done** | Link + sessão + order meta |
| [#15](https://github.com/esvianna/THEME-AMALABS/issues/15) skin checkout | **In progress** | v0.11.0 classic + Asaas; thank-you pendente |
| [#19](https://github.com/esvianna/THEME-AMALABS/issues/19) webhook | **In review** | v0.10.4; validar com pedido Asaas |
| #14 · #16 · #17 | Backlog | Catálogo full, e-mails, relatório |
| #18 | Fase 2 | Gateway / From / fiscal |
| #1–#3 | Ready (tema) | Fora desta sprint |

**Plugin:** `white-label-checkout` **v0.11.1** em prod. Checkout = `[woocommerce_checkout]` (página 24). Backup Blocks: meta `_wlc_backup_checkout_content`.

**Workspace:** `C:\Users\dudav\Documents\Projetos\AMALABS\amalabs.code-workspace`

---

## Feito nesta sessão (2026-07-28)

- [x] Página checkout 24 → classic shortcode (Asaas incompatível com Blocks)
- [x] Skin CSS/JS classic (`wlc-classic-checkout`): grid, frete, payment, ViaCEP, nome, timer
- [x] Campos BR: Extra Checkout Fields + hide país/sobrenome; split nome classic

---

## Pendente imediato

1. Humano: QA visual Blue Mind + pedido Pix/Boleto/Cartão Asaas + webhook
2. #15 thank-you branded
3. Ajustes finos de CSS Asaas se o markup interno destoar

---

## Como testar agora

1. Link campanha Blue Mind → checkout com chrome WLC
2. Confirmar métodos: **Pix, Boleto, Cartão** (+ transferência se ativa)
3. CEP autofill; frete R$ 15; finalizar com Asaas sandbox/prod
4. Webhook `order.created` / `order.paid` no Apps Script
