# PROJECT_STATUS — AmaLabs Theme

> Última atualização: 2026-07-23 (sessão WLC: #11–#15 parcial · plugin v0.6.2 em prod)

---

## Onde paramos

Homologação WLC em `https://amalabs.com.br`. Parceiro teste: **Blue Mind** (`blue-mind`).

| Issue | Status | Notas |
|-------|--------|--------|
| #9–#12 | **Done** | ADR, schema, scaffold, CRUD |
| [#13](https://github.com/esvianna/THEME-AMALABS/issues/13) URL/sessão/UTM | Validar **Done** | Link + sessão + order meta |
| [#15](https://github.com/esvianna/THEME-AMALABS/issues/15) skin checkout | **In progress** | v0.6.2 layout conversão (sem header/footer tema) |
| #14 · #16 · #17 | Backlog | Catálogo full, e-mails, relatório |
| #18 | Fase 2 | Gateway / From / fiscal |
| #1–#3 | Ready (tema) | Fora desta sprint |

**Plugin:** `white-label-checkout` **v0.6.2** em `wp-content/plugins/white-label-checkout/` (sem `.git`). Capability `manage_wlc_partners`.

**Workspace:** `C:\Users\dudav\Documents\Projetos\AMALABS\amalabs.code-workspace`

---

## Feito nesta sessão (2026-07-23)

- [x] #10 Done · D-010 Aceito · #11 scaffold + CPT · deploy/activate prod
- [x] #12 CRUD admin (Blue Mind validado)
- [x] #13 URL `/parceiro/{slug}/`, token, sessão `wlc_ctx`, UTM → order meta
- [x] #15 parcial: blank checkout, timer honesto, trust, sticky resumo, polish layout (gap colunas, labels)
- [x] Docs: MVP-INTERNAL, URL-CONTRACT, CHECKOUT-CONVERSION

---

## Pendente imediato

1. Humano: fechar #13 Done se happy path ok; continuar review visual #15
2. #14 catálogo restrito completo
3. #15 thank-you branded + 2.º parceiro
4. #16 / #17 e-mails e relatório

---

## Como testar agora

1. Janela anónima → link campanha Blue Mind (admin WLC)
2. Checkout branded: sem chrome AmaLabs; timer; gap Informações/Resumo; imagem no resumo
3. Finalizar pedido (transferência) → meta `_wlc_*` no pedido Woo
