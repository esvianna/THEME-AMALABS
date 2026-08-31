# Arquitetura — Campaign Landings

**Issue:** [#23](https://github.com/esvianna/THEME-AMALABS/issues/23)  
**ADR:** D-018  
**Repo plugin:** [`esvianna/campaign-landings`](https://github.com/esvianna/campaign-landings)

## Papéis

| Componente | Responsabilidade |
|------------|------------------|
| Tema AmaLabs | Site institucional; sem lógica de LP |
| Plugin `campaign-landings` | CPT, layouts, catálogo por tag/IDs, template `/lp/{slug}/`, handoff checkout |
| Plugin `white-label-checkout` | Checkout branded **se** LP tiver `partner_id` |
| WooCommerce | Produtos, carrinho, checkout padrão, pedidos |

## Fluxo

```text
/lp/{slug}/
  → carrega cl_landing + layout_key
  → produtos = tag ∪ IDs
  → add-to-cart só no escopo da LP
  → CTA checkout:
       partner_id + WLC ativo → /parceiro/{slug}/?token=… (ou sessão WLC)
       senão → /checkout/ (template limpo)
```

## Meta keys (prefixo `_cl_`)

Ver README do plugin após scaffold.
