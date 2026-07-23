# PROJECT_STATUS — AmaLabs Theme

> Atualizar este arquivo ao final de cada sessão de trabalho com código ou decisões relevantes.
> Última atualização: 2026-07-23 (#9 Done; #10 In review)

---

## Onde paramos

Tema oficial alinhado em prod/repo. Foco atual: **checkout white-label por parceiro**.

**Parent [#8](https://github.com/esvianna/THEME-AMALABS/issues/8)** em *In progress*.

| Issue | Status | Notas |
|-------|--------|--------|
| [#9](https://github.com/esvianna/THEME-AMALABS/issues/9) ADR | **Done** | `docs/architecture/PARTNER-CHECKOUT.md` · D-009 |
| [#10](https://github.com/esvianna/THEME-AMALABS/issues/10) modelo de dados | **In review** | Schema em [`white-label-checkout/docs/DATA-MODEL.md`](https://github.com/esvianna/white-label-checkout/blob/main/docs/DATA-MODEL.md) · D-010 proposto |
| #11–#17 | Backlog | Scaffold em seguida após Done do #10 |
| #18 | Backlog Fase 2 | Gateway / From / fiscal |

**Bloqueio atual:** validação humana do #10 → **Done**. Depois: **#11 scaffold** no repo do plugin.

**Workspace Cursor:** `C:\Users\dudav\Documents\Projetos\AMALABS\amalabs.code-workspace` (tema + plugin).

---

## Board (white-label)

| Status | Issues |
|--------|--------|
| Done | #9 |
| In review | #10 |
| In progress | #8 (épico) |
| Backlog Fase 1 | #11–#17 |
| Backlog Fase 2 | #18 |

Também Ready (segurança legado): #1–#3 · Backlog tema: #4–#7

Quadro: https://github.com/users/esvianna/projects/16

---

## O que já foi feito (sessões recentes)

- [x] Governança + Project #16
- [x] Sync prod ↔ repo (código idêntico) + `.git` removido de prod
- [x] #8 planeamento + pesquisa de mercado
- [x] Issues filhas #9–#18
- [x] #9 ADR + repo `white-label-checkout`
- [x] #10 draft de schema publicado no GitHub (commit `7dce55c`)

---

## Pendente imediato

1. Humano: validar DATA-MODEL → mover #10 para **Done** (e D-010 → Aceito)
2. #11 scaffold do plugin (bootstrap, CPT, pastas)
3. Cascata #12–#17; não pedir decisões de gateway/e-mail ao cliente até a base estar clara

---

## Como retomar

1. Se #10 ainda In review → ler e aprovar o schema  
2. Se #10 Done → começar **#11** no repo `white-label-checkout`  
3. `docs/RESEARCH-PARTNER-CHECKOUT.md` se precisar de referências de mercado
