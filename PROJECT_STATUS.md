# PROJECT_STATUS — AmaLabs Theme

> Última atualização: 2026-07-27 (WLC v0.10.0 · webhook parceiro #19)

---

## Onde paramos

Homologação WLC em `https://amalabs.com.br`. Parceiro teste: **Blue Mind** (`blue-mind`).

| Issue | Status | Notas |
|-------|--------|--------|
| #9–#12 | **Done** | ADR, schema, scaffold, CRUD |
| [#13](https://github.com/esvianna/THEME-AMALABS/issues/13) URL/sessão/UTM | Validar **Done** | Link + sessão + order meta |
| [#15](https://github.com/esvianna/THEME-AMALABS/issues/15) skin checkout | **In progress** | v0.9.1 frete/CEP; thank-you pendente |
| [#19](https://github.com/esvianna/THEME-AMALABS/issues/19) webhook | **In review** | v0.10.0 created/paid + UTM enxuto + secret |
| #14 · #16 · #17 | Backlog | Catálogo full, e-mails, relatório |
| #18 | Fase 2 | Gateway / From / fiscal |
| #1–#3 | Ready (tema) | Fora desta sprint |

**Plugin:** `white-label-checkout` **v0.10.1** em prod (sem `.git`). Loja: vende/envia só para **Brasil**; país oculto no checkout WLC.

**Workspace:** `C:\Users\dudav\Documents\Projetos\AMALABS\amalabs.code-workspace`

---

## Feito nesta sessão (2026-07-27)

- [x] #19 webhook: meta/UI, dispatcher created/paid, payload enxuto, Bearer/X-WLC-Secret, retry, botão Testar
- [x] Docs `WEBHOOK.md` + D-013 + deploy 0.10.0

---

## Pendente imediato

1. Humano: validar #19 (configurar URL de teste + Testar webhook + pedido Blue Mind) → Done
2. #15 thank-you branded
3. Abandono webhook — só se o cliente pedir

---

## Como testar agora (#19)

1. Admin → WLC Parceiros → Blue Mind → Webhook: ativar, URL HTTPS (ex. webhook.site), secret
2. Clicar **Testar webhook** → HTTP 2xx no receptor
3. Link campanha com UTMs → finalizar pedido → POST `order.created` (e `order.paid` se status pago)
4. Confirmar meta `_wlc_webhook_sent_order_*` no pedido; segundo save não reenvia
