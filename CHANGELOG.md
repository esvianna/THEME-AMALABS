# CHANGELOG — AmaLabs Theme

Formato inspirado em [Keep a Changelog](https://keepachangelog.com/pt-BR/1.1.0/).
Versão do tema em `style.css` (`Version:`).

---

## [Unreleased]

### Changed

- Issue [#19](https://github.com/esvianna/THEME-AMALABS/issues/19): plugin **white-label-checkout v0.10.0** — webhook do parceiro (`order.created` / `order.paid`), payload UTM+ids, secret no header, botão Testar no admin.
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.9.1** — frete fixo R$ 15 (Correios legacy off); proxy ViaCEP; CEP antes do endereço no Blocks; CSS do rádio de frete sem sobrepor o texto.
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.9.0** — frete Correios (PAC/SEDEX) + ViaCEP no Blocks; login reminder estilizado (guest mantido); UX Nome completo com split Store API.
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.8.1** — removidos os steps do chrome (obsoletos no one-page).
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.8.0** — steps com copy honesta (tudo numa página); campos Blocks CPF/CNPJ, bairro e número mapeados para meta Asaas/Brazilian Market.
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.7.3** — corrigido `padding-right:0` que colava campos na lateral; thumb do resumo 72×72 sem esmagar.
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.7.2** — mais padding no card/inputs (campos menos colados às bordas, alinhado ao Figma).
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.7.1** — tipografia Figma (**Nunito** + **Roboto Slab**); marca compacta com logo; timer do resumo no fim do card.
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15): plugin **white-label-checkout v0.7.0** — skin checkout alinhada à estrutura do Figma Make (barra urgência full-bleed, steps Dados/Entrega/Pagamento, trust grid, timer no resumo); prova social/depoimentos só via meta honesta do parceiro (sem escassez inventada).
- Sync prod → local (`docs/PROD-SYNC.md`): confirmado que o código do tema em `main` já coincidia com produção; `.htaccess` de proteção copiado para o clone.

### Added

- Estrutura de governança: `AGENTS.md`, `PROJECT_STATUS.md`, `ROADMAP.md`, `DECISIONS.md`, `SECURITY.md`, `TESTING.md`, `docs/GITHUB-WORKFLOW.md`, regras em `.cursor/rules/`.
- Backlog inicial no GitHub Project Amalabs (#16): issues #1–#7 (P0 segurança Ready; P1/P2 no Backlog).
- Issue [#8](https://github.com/esvianna/THEME-AMALABS/issues/8): planejamento checkout white-label (plugin; e-mails por parceiro) + issues filhas **#9–#18** (Fase 1 fundação; Fase 2 decisões do cliente).
- Decisão D-009: plugin em repo separado [`esvianna/white-label-checkout`](https://github.com/esvianna/white-label-checkout) (criado).
- Issue [#9](https://github.com/esvianna/THEME-AMALABS/issues/9) ADR aceite (Done); arquitetura em `docs/architecture/PARTNER-CHECKOUT.md`.
- Issue [#10](https://github.com/esvianna/THEME-AMALABS/issues/10) modelo de dados **Done**; D-010 Aceito (CPT `wlc_partner` + meta, sem custom tables no MVP).
- Issue [#11](https://github.com/esvianna/THEME-AMALABS/issues/11) scaffold **Done** (validado em prod; parceiro Blue Mind).
- Issue [#12](https://github.com/esvianna/THEME-AMALABS/issues/12) CRUD admin **Done**.
- Issue [#13](https://github.com/esvianna/THEME-AMALABS/issues/13) URL/token/sessão/UTM — v0.3.1 (sessão Woo + fallback catálogo).
- Issue [#15](https://github.com/esvianna/THEME-AMALABS/issues/15) skin checkout **In progress** — plugin v0.7.0 (Figma Make structure); thank-you ainda pendente.
- Homologação WLC autorizada em `amalabs.com.br`.
- Políticas confirmadas: Done só pelo humano; commit/push só sob pedido; #1–#3 fora da sprint mental do épico #8.
- Decisões D-007 (produção = versão oficial) e D-008 (sem `.git` no tema em produção).

### Security

- Removido `wp-content/themes/THEME/.git` de `amalabs.com.br` (estava acessível via HTTP). `.htaccess` no tema bloqueia `/.git` se for recriado (também no workspace local após sync).

---

## [1.0.0] — 2026 (baseline a partir do histórico git)

### Added

- Tema base AmaLabs com tokens CSS e layout responsivo.
- Customizer: hero, destaques, seções institucionais, serviços, produtos, CTA, rodapé, cores.
- Integração WooCommerce (suporte de tema, wrappers, remoção de sidebar).
- Busca AJAX de produtos no header.
- Header em duas linhas, menu mobile, carrinho condicional conforme opções do tema.
- Seção de produtos recentes na front page.

### Commits de referência

- `11dbbdb` — first commit  
- `dd0b5a2` — Customizer (front/footer) + estilo do hero  
- `f68a3a6` — AJAX search + produtos na home + suporte Woo  
- `f2c022a` — ajustes de layout  
- `eb69c74` — header responsivo, menu mobile, carrinho condicional  
