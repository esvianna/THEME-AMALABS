# PROJECT_STATUS — AmaLabs Theme

> Última atualização: 2026-07-27 (WLC v0.10.4 · Testar webhook UI)

---

## Onde paramos

Homologação WLC em `https://amalabs.com.br`. Parceiro teste: **Blue Mind** (`blue-mind`, ID 115).

| Issue | Status | Notas |
|-------|--------|--------|
| #9–#12 | **Done** | ADR, schema, scaffold, CRUD |
| [#13](https://github.com/esvianna/THEME-AMALABS/issues/13) URL/sessão/UTM | Validar **Done** | Link + sessão + order meta |
| [#15](https://github.com/esvianna/THEME-AMALABS/issues/15) skin checkout | **In progress** | v0.9.1 frete/CEP; thank-you pendente; OG v0.10.2 |
| [#19](https://github.com/esvianna/THEME-AMALABS/issues/19) webhook | **In review** | v0.10.3 GAS; v0.10.4 feedback UI Testar |
| #14 · #16 · #17 | Backlog | Catálogo full, e-mails, relatório |
| #18 | Fase 2 | Gateway / From / fiscal |
| #1–#3 | Ready (tema) | Fora desta sprint |

**Plugin:** `white-label-checkout` **v0.10.4** em prod (sem `.git`). Após SCP: `chmod 755` dirs / `644` files (senão Apache 403 em `assets/`).

**Workspace:** `C:\Users\dudav\Documents\Projetos\AMALABS\amalabs.code-workspace`

---

## Feito nesta sessão (2026-07-27)

- [x] Diagnóstico: botão Testar sem mensagem porque `partner-admin.js` → HTTP 403 (dirs `drwx------`)
- [x] v0.10.4: admin JS inline + scheme HTTPS; mensagem de erro mais explícita
- [x] v0.10.3: GAS POST→302→GET

---

## Pendente imediato

1. Humano: hard refresh no admin Blue Mind → **Testar webhook** → “Webhook OK (HTTP 200).”
2. Pedido real com UTMs + conferir planilha Blue Mind (schema)
3. #15 thank-you branded

---

## Como testar agora (#19 / Blue Mind)

1. Admin → WLC Parceiros → Blue Mind → Webhook → **Testar webhook**
2. Esperado ao lado do botão: **A testar…** e depois **Webhook OK (HTTP 200).** (verde)
3. Pedido via link campanha → `order.created` / `order.paid`
