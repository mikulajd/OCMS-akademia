# REVIEW

## General

Tu ti spomeniem niektoré pripomienky čo mám, ale vyhľadaj si v projekte "REVIEW", tak nájdeš všetky moje komenty

## .gitignore

Z .gitignore treba odstrániť "composer.lock", čo predpokladám, že vieš na čo slúži, malo by to byť podobné ako "package-lock.json" na FE
October to default dáva do .gitignore ale nemalo by to tam byť, malo by to byť v gite aby mali všetci rovnaké verzie
Momentálne to nie je až tak dôležité ale len aby si vedel :DD

## Controller-y

Existujú 2 typy controller-ov

1. HTTP Controller
Tento "Controller" je jednoducho file / class, ktorá obsahuje funkcie, ktoré sú zodpovedné za logiku HTTP endpointov
Čiže napr. v tvojom prípade by si mal mať "LoggerController.php", ktorý by obsahoval funkcie "logs", "create", ... ktoré by vlastne mali v sebe logiku, ktorú máš teraz v routes.php endpointoch
Toto je koncept, ktorý existuje mimo OCMS / Laravel, aj iné frameworky používajú tento koncept

2. OCMS Controller
Tento "Controller" je niečo čo zahŕňa viacero súborov a funkciou je kontrolovanie formu a listu v admin page, ale o tomto sa viac dozvieš v Leveli 2

Problém je že sú to úplne iné veci ale volajú sa rovnako :D
Takže ich potrebujeme rozdeliť, aby bolo jasné čo je čo

Pre tento Level potrebuješ len HTTP Controller, do ktorého dáš logiku tvojich endpointov, čiže tvoj routes.php bude zjednodušený a budeš tam mať nejaké takéto endpointy
...
Route::any('/route', [CheckoutController::class, 'menoFunkcieVControlleri']);
...
Robíme to tak, že HTTP Controller-y umiestnime do plugins/parentPlugin/plugin/http/controllers
