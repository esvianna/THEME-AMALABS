# Sync produção → local

**Data:** 2026-07-23  
**Fonte:** `ama-prod:~/amalabs.com.br/wp-content/themes/THEME`  
**Destino:** workspace `THEME` (repo `esvianna/THEME-AMALABS`)

## Método

1. SCP recursivo do tema de produção para pasta temporária (sem alterar o servidor).
2. Comparação por `git hash-object` (ignora ruído de CRLF no Explorer) vs working tree e vs `HEAD` (`eb69c74` / `main`).

## Resultado

| Ficheiro | Prod vs local HEAD |
|----------|--------------------|
| `footer.php` | Idêntico |
| `front-page.php` | Idêntico |
| `functions.php` | Idêntico |
| `header.php` | Idêntico |
| `index.php` | Idêntico |
| `style.css` | Idêntico |
| `js/ajax-search.js` | Idêntico |
| `.htaccess` | **Novo** — copiado de prod para o workspace (bloqueio `/.git`) |

**Conclusão:** o código do tema no GitHub/`main` local **já era a mesma versão oficial de produção**. Não foi necessário sobrescrever PHP/CSS/JS. Apenas o `.htaccess` de proteção passou a existir no clone local.

## Política

Continua valendo **D-007**: produção é oficial. Em syncs futuros, repetir diff antes de qualquer deploy repo → servidor.
