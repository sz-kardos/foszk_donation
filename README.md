## Állományok

### ./js/
Állománynév|Leírás
---|---
aos.js
checks.js
Jquery3.7.1.min.js
main.js
owl.carousel.min.js

### ./logicals/
Állománynév|Leírás
---|---
getPage.php|A különböző template fájlok közül a megfelelő kiválasztásáért felelős logikát tartalmazza,
loginAttempt.php|A felhasználók bejelentkezéséhez tartozó logikát tartalmazza.
logout.php|A felhasználók kijelentkeztetéséhez használt logikát tartalmazza.
messageAttempt.php|Az üzenetküldéshez használt logikát tartalmazza.
registerAttempt.php|A felhasználó regisztrációhoz tartozó logikát tartalmazza.
uploadAttempt.php|A képfájlok feltöltéséhez tartozó logikát tartalmazza.

### ./templates/
Állománynév|Leírás
---|---
gallery.tpl.php
index.tpl.php
loginRegister.tpl.php
msgtable.tpl.php
navbar.tpl.php
result.tpl.php
sendMessage.tpl.php

# Adatbázis-kapcsolat osztály és objektum

# Feladatok megvalósítása

**Készítsen egy harmadik oldalt képek, képgaléria tárolására.**  
A megadott oldal a gallery.tpl.php templateben került megvalósításra. 
1. A template betöltésekor a `$paths` változóba gyűjti a `glob` funkció segítségével a fájlokat. 
2. Ezt követően ezeken egy `foreach` ciklus keretében végigmegy, és a funcs.inc.php-ban deklarált `checkIfImage` funkció segítségével megállapítja, hogy az adott fájl képfájl-e:  
    2a. A funkció első körben exif adatok alapján szűr, melyhez a beépített `exif_imagetype` funkciót használja.  
    2b. Amennyiben a visszakapott fájltípus (pontosabban azt jelképező int típusú konstans) szerepel a funkción belül meghatározott `$VALID_TYPES` tömb kulcsai között, úgy az eredményt a kimeneti értéket rögzítő `$is_valid_type` változóba menti és tovább vizsgálja a fájlt. Jelenleg a gif, jpeg, png, bmp és webp fájlok megengedettek.  
    2c. Második körben a `$VALID_TYPES` tömb értékei közül a megfelelő `imagecreatefrom` beépített funkcióval megpróbál képet létrehozni a fájl alapján. A művelet eredményével felülírja az `$is_valid_type` értékét.  
    2d. Az `$is_valid_type` értékét `boolean`-ként castolva visszaadja.  
3. Amennyiben igen, akkor a képből létrehoz egy `<img>` elemet.

**Legyen lehetőség új képek feltöltésére. Képfeltöltést csak bejelentkezett felhasználó tehet meg.**  
A képfeltöltés szintén a gallery.tpl.php templateben, illetve az uploadAttempt.php logikai oldalban kerül megvalósításra. A feltöltést lehetővé tevő űrlap csak abban az esetben jelenik meg, ha a `$_SESSION["logged_in_as"]` változó inicializálva van és nem hamis érték van hozzárendelve.
A feltöltést követeően a következő módon kerül érvényesítésre a feltölteni kívánt fájl:
1. Első körben a logika megnézi, hogy történt-e valamilyen hiba a feltöltés során, ehhez a feltöltött fájlt ábrázoló objektum error adattagját nézi meg.
2. Ellenőrzi, hogy megfelelő méretű képfájlról van-e szó fájl. Ezt a funcs.inc.php-ben meghatározott `isValidSizeImage` funkcióval teszi. A funkció maga is két funkciót hív meg ehhez:  
    2a. Az első a `checkFileSize`, mely a fájl méretét összeveti a funkción belül meghatározott 300 kB-os értékkel.  
    2b. Amennyiben az állomány ennek a feltételnek megfelel, úgy a fentebb már ismertetett `checkIfImage` funkciót hívja segítségül a fájl vizsgálatához.  
    2c. Az egy, vagy két vizsgálat alapján igazat vagy hamisat ad vissza.  
3. A megfelelő méretű és formátumú fájl esetén ellenőrzi, hogy létezik-e a galéria képfájljainak helyt adó images mappa. Ha nem, akkor megkísérli létrehozni.
4. Ellenőrzi, hogy létezik-e az images mappában a feltöltöttel azonos nevű fájl.
5. Ha nem, akkor bemásolja a fájlt az images mappába.

**A negyedik oldalon legyen egy kapcsolat űrlap, amelynek segítségével e-mailt lehet küldeni az oldal tulajdonosa számára.**  

Az üzenetküldés a sendMessage.tpl.php templateben és messageAttempt.php logikai oldalon valósul meg.

**Ellenőrizze megfelelően az űrlap helyes kitöltését. Az ellenőrzést végezze el kliens- és szerveroldalon is (JavaScript, PHP). A HTML kódban ne ellenőrizze az úrlap adatait.**  

A kliens és szerver oldali ellenőrzést a check.js és funcs.inc.js állományokban meghatározott checkMessage funkciók végzi. Ezek lenyírják a kapott karakterláncról a white spaceket, majd ellenőrizik, hogy
    - a megnyírt karakterláncban van-e még karakter,
    - rövidebb-e, mint a maximális megengedett hossz.
Ha igen, akkor igazat adnak vissza, egyébként hamisat.

**Az elküldött űrlap adatokat ezen kívül mentse le adatbázisba.**  

A megfelelő üzeneteket az adatbázis message adattáblájába vezetjük be, a config.inc.php-ban deklarált `$database_connection` objektum `insert_query` metódusával:
- A `message_text` mezőbe az üzenet szövege kerül. 
- A `message_time` mező mindig az alapértelmezett értéket kapja (ami az aktuális idő).
- A tábla `user_id` mezőjébe a `$_SESSION["logged_in_as"]` értéke alapján az adatbázisból visszakapott azonosító, vagy üres eredményhalmaz esetén `NULL` érték kerül. (Ez normál esetben nem bejelentkezett, "Vendég" felhasználó üzenetküldése esetén történik.)

**Az e-mail küldése helyett jelenítse meg az adatokat egy új (ötödik) oldal tartalmaként.**  

Az üzenetek megjelenítése a msgtable.tpl.php állományban valósul meg, táblázat formájában. A `messages` és `users` táblákon `user_id` szerinti `LEFT JOIN` művelet eredményeiből `<td>` elemek készülnek. A küldő mezőbe vagy az adott rekord `username` mezőjének értéke, vagy `NULL` érték esetén a "Vendég" szöveg kerül.

**Regisztráció**

A regisztráció a loginRegister.tpl.php templateben, illetve a registerAttempt.php logikai oldalakon valósul meg. A regisztráció a főoldalon jobb felül található Belépés/Regisztráció gombra kattintva érhető el, ami csak akkor látszik, ha az $_SESSION["logged_in_as"] változónak hamis értéke van.

A regisztrációs adatok ellenőrzését kliens oldalon a check.js-ben deklarált funkciók, szerver oldalon pedig a funcs.inc.php-ban deklarált funkciókkal végezzük. Ezek tartalmilag azonosan működnek.

**Belépés**

A belépés a loginRegister.tpl.php templateben, illetve a loginAttempt.php logikai oldalakon valósul meg. A főoldalon jobb felül található Belépés/Regisztráció gombra kattintva érhető el, ami csak akkor látszik, ha az $_SESSION["logged_in_as"] változónak hamis értéke van.

**Kilépés**
A kilépés a logout.php logikai állományban valósul meg, melyet a Kijlentkezés gombra klikkelve indítunk el. A regisztráció a főoldalon jobb felül található, csak akkor látszik, ha az $_SESSION["logged_in_as"] változónak igazszerű értéke van. A `$_SESSION` globális változóban "logged_in_as" "family" és "given" kulcsokhoz tartozó értékeket az `unset` funkcióval megszünteti. A "message" kulcshoz hozzárendeli a sikeres kijelentkezésről szóló értesítést, majd front endre.

Bővítsük a honlapot „Belépés” és „Kilépés” menüponttal a következők szerint: 

a) A „Belépés” menüpont akkor látható, ha nincs bejelentkezve a felhasználó. 

b) A „Kilépés” menüpont akkor látható, ha be van jelentkezve a felhasználó. 

c) A „Belépés” menüpontra kattintva feljön egy oldal, ahol lehet bejelentkezni vagy regisztrálni.  

e) A rendszer fejlécen jelenítse meg a bejelentkezett felhasználót, ha be van lépve, a következő formában: Bejelentkezett: Családi_név Utónév (Login_név)	