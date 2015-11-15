# dp-auction-system
Implementace webového aukčního systému.

## Jak rozchodit projekt na windows
- Krok 1. Stáhnout a nainstalovat server s db, napr. http://www.easyphp.org/easyphp-devserver.php (já osobně používám EASYPHP DEVSERVER 14.1 VC9)
- Krok 2. Po instalaci do vas_instal_adresar/EasyPHP-DevServer-14.1VC9/data/localweb/ nakopírujte projekt z GitHubu
- Krok 3. Ve vas_instal_adresar/EasyPHP-DevServer-14.1VC9/ spustit EasyPHP-DevServer-14.1VC9.exe
- Krok 4. Dole vpravo se v liště objeví ikona EasyPHP, po kliknutí na ní vyskočí okýnko, ve kterém zkontrolujte, že kontrolky Apache a MySQL svítí zeleně a jsou v režimu "Started"
- Krok 5. Spusťte libovolný internetový prohlížeč a zadejte adresu localhostu (http://127.0.0.1/), popřípadě klikněte na šedivou část okýnka s kontrolkami a vyberte možnost "Local Web"
- Krok 6. V prohlížeči se proklikejte do vašeho projektu, v něm klikněte na složku "www" a webová stránka se spustí
 
## Jak rozchodit projekt na Mac
- Krok 1. Stáhnout a nainstalovat MAMP https://www.mamp.info/en/
- Krok 2. Rozběhnout (vyřešit možné nesrovnalosti v portech)
- Krok 3. Vyklonovat git repositář do /Applications/MAMP/htdocs

Projekt by měl být umístěn zde http://localhost:8887/dp-auction-system/www/ . 8887 je port ktery si nastavujete pro webserver.

## Propojení lokálního adresáře s adresářem na GitHub
- Krok 1. Stáhnout GitHub Desktop z https://desktop.github.com/ a nainstalovat ho
- Krok 2. Spustit GitHub Desktop a vyplnit uživatelské jméno a heslo
- Krok 3. V GitHub Desktop najít adresář, který je na webu a dat klonovat

Po úpravách souborů a commitu (nutno vyplnit Summary a Description) stačí kliknout na Sync v horním pravém rohu okna