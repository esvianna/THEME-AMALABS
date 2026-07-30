# PROJECT_STATUS — AmaLabs Theme

> Última atualização: 2026-07-30 (WLC v0.11.2 · webhook customer)

---

## Onde paramos

Homologação WLC em `https://amalabs.com.br`. Parceiro teste: **Blue Mind** (`blue-mind`, ID 115).

| Issue | Status | Notas |
|-------|--------|--------|
| #9–#12 | **Done** | ADR, schema, scaffold, CRUD |
| [#13](https://github.com/esvianna/THEME-AMALABS/issues/13) URL/sessão/UTM | Validar **Done** | Link + sessão + order meta |
| [#15](https://github.com/esvianna/THEME-AMALABS/issues/15) skin checkout | **In progress** | v0.11.1 classic + Asaas + notices; thank-you pendente |
| [#19](https://github.com/esvianna/THEME-AMALABS/issues/19) webhook | **In review** | v0.11.2 customer no payload (D-014) |
| #14 · #16 · #17 | Backlog | Catálogo full, e-mails, relatório |
| #18 | Fase 2 | Gateway / From / fiscal |
| #1–#3 | Ready (tema) | Fora desta sprint |

**Plugin:** `white-label-checkout` **v0.11.2** em prod. Checkout clássico; webhook com `customer`.

**Workspace:** `C:\Users\dudav\Documents\Projetos\AMALABS\amalabs.code-workspace`

---

## Feito nesta sessão (2026-07-30)

- [x] Webhook: bloco `customer` (name, email, phone, address) — D-014
- [x] Docs WEBHOOK + admin copy + deploy 0.11.2

---

## Pendente imediato

1. Humano: **Testar webhook** Blue Mind + pedido real → conferir JSON no Apps Script
2. #15 thank-you branded
3. Secret no webhook Blue Mind (recomendado com PII)

---

## Como testar agora

1. Admin → Blue Mind → Webhook → **Testar webhook** (payload de teste já traz `customer` exemplo)
2. Pedido campanha → `order.created` / `order.paid` com dados reais do checkout
3. Confirmar no destino do parceiro os campos name/email/phone/address
