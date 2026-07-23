# Fluxo GitHub Issues + Project — AmaLabs Theme

Backlog oficial deste repositório. Assistentes de IA devem seguir este fluxo **sempre** para trabalho de produto (features/bugs). Bootstrap de docs pode ocorrer sem card, mas deve ser registrado depois.

---

## Configuração do projeto

| Item | Valor |
|------|--------|
| Repositório | `esvianna/THEME-AMALABS` |
| URL do repo | https://github.com/esvianna/THEME-AMALABS |
| GitHub Project | [Amalabs (#16)](https://github.com/users/esvianna/projects/16) |
| Owner do Project | `esvianna` |
| Número do Project | `16` |
| Project ID (node) | `PVT_kwHOBfIcG84BeRF6` |
| Campo Status ID | `PVTSSF_lAHOBfIcG84BeRF6zhYsl4I` |
| Colunas Status | Backlog → Ready → In progress → In review → Done |
| Idioma | PT-BR |
| Branch principal | `main` |
| Quem valida / move para Done | Usuário (humano) — a IA move no máximo até **In review** |
| Confirmação humana do Project | Confirmado em 2026-07-23 — Project #16 é o Kanban deste tema |
| Commits / push | Só com pedido explícito do usuário |

### IDs das opções de Status

| Status | Option ID |
|--------|-----------|
| Backlog | `f75ad846` |
| Ready | `61e4505c` |
| In progress | `47fc9ee4` |
| In review | `df73e18b` |
| Done | `98236657` |

### Campos extras

| Campo | Field ID | Opções |
|-------|----------|--------|
| Priority | `PVTSSF_lAHOBfIcG84BeRF6zhYsnEI` | P0 / P1 / P2 |
| Size | `PVTSSF_lAHOBfIcG84BeRF6zhYsnEM` | XS / S / M / L / XL |

---

## Regras de fluxo

1. **Antes de codificar** uma feature/bug: garantir issue no repo + item no Project em **Ready** ou mover para **In progress**.
2. **Uma issue = uma unidade de valor** clara (evitar “melhorar o tema”).
3. Ao começar: Status → **In progress**.
4. Ao abrir revisão / pedir validação humana: → **In review** + comentário com como testar.
5. **Done** somente o usuário humano. A IA deixa em **In review** com instruções de teste.
6. Atualizar `PROJECT_STATUS.md` e `CHANGELOG.md` junto com o trabalho.
7. **Não inventar** URLs/IDs; reobter via `gh` se a tabela mudar.
8. **Não commitar / push** sem pedido explícito.

---

## Comandos úteis (PowerShell / gh)

```powershell
# Ver project
gh project view 16 --owner esvianna

# Criar issue
gh issue create --repo esvianna/THEME-AMALABS --title "..." --body "..."

# Listar issues abertas
gh issue list --repo esvianna/THEME-AMALABS

# Adicionar issue ao Project
gh project item-add 16 --owner esvianna --url https://github.com/esvianna/THEME-AMALABS/issues/N
```

Para setar Status/Priority/Size, usar `gh project item-edit` ou GraphQL com os IDs da tabela.
