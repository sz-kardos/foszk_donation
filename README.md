# L-LA04 WEB-programozás I. [L-K-GINFBAL-WEBPROG1-1-LA04] beadandó

- Hallgatók: $teamName (Kardos Szabina és Tamás Bence)**
- Téma/rövid leírás: Kutyamenhely tematikájú oldal
- Tárhely: http://njeprojektem.nhely.hu/
- GitHub: https://github.com/sz-kardos/foszk_donation

## Állományok

### ./js/
Állománynév|Leírás
---|---
checks.js|A kliensoldali adatbeviteli ellenőrző funkciókat tartalmazó állomány.

### ./logicals/
Állománynév|Leírás
---|---
getPage.php|A különböző template fájlok közül a megfelelő kiválasztásáért felelős logikát tartalmazza.
loginAttempt.php|A felhasználók bejelentkezéséhez tartozó logikát tartalmazza.
logout.php|A felhasználók kijelentkeztetéséhez használt logikát tartalmazza.
messageAttempt.php|Az üzenetküldéshez használt logikát tartalmazza.
registerAttempt.php|A felhasználó regisztrációhoz tartozó logikát tartalmazza.
uploadAttempt.php|A képfájlok feltöltéséhez tartozó logikát tartalmazza.

### ./templates/
Állománynév|Leírás
---|---
gallery.tpl.php|A képfeltöltés/galéria templateje
index.tpl.php|A főoldal templateje
loginRegister.tpl.php|A regisztrációs/bejelentkezési felület templateje
msgtable.tpl.php|A felhasználóktól származó üzeneteket megjelenítő felület templateje
navbar.tpl.php|A navbar templateje
result.tpl.php|
sendMessage.tpl.php|Az üzenetküldö felület template-je

# Adatbázis-kapcsolat osztály és objektum

A biztonságos adatbázis kezelés, elsősorban a több lezáratlan élő kapcsolat elkerülése érdekében az adatbázis kapcsolatokat a classes.in.php-ban deklarált `DatabaseConnection` osztály, illetve az abból származó, a config.inc.php-ban deklarált `$database_connection` objektum kezeli. Az osztály pdo alapú. Privát adattagjai maga a pdo kapcsolat, illetve az annak létrejöttéhez szükséges hitelesítő és egyéb adatok.

Az osztály egy publikus és négy privát metódust deklarál:
- Publikus a kapcsolatot ellenőrző `is_closed` metódus, ami igazat ad vissza, ha a `$pdo` adattag értéke `null`.
- A `closedb` metódus null értékre állítja a `$pdo` adattagot, ami a PHP kézikönyv alapján elegendő a kapcsolat lezárásához.
- A `connectdb` metódus a pdo adattaghoz rendeli a beépített `PDO` osztály egy példányát, melyeket a hitelesítési egyéb adatokkal paraméterez. Emellett hibakezelés módját is beállítja.
- Az `insert_query` és `select_query` metódusokban valósulnak meg a DQL és DML (INSERT) funckionalitások. Itt történik az SQL hibakezelés is. Illetve itt van biztosítva, hogy minden statement és kapcsolat felszámolásra kerüljön egy-egy query után. Az `insert_query`-nek nincs visszatéréi értéke, A `select_query` kérés alapján előállt statement objektum fetchAll metódusából visszakapott arrayt, vagy üres array esetén `NULL` értéket ad vissza.

# Adatbázis táblák felépítése

A honlaphoz két táblából álló adatbázis tartozik, melyben a regisztrációkat (`users`) és a felhasználóktól származó üzeneteket (`messages`) tartjuk nyilván. A két tábla között a user_id oszlop létesít kapcsolatot.

## users tábla

A `users` tábla sémája:  
`CREATE TABLE users (`  
`    user_id         INTEGER         PRIMARY KEY AUTOINCREMENT,`  
`    email           VARCHAR(320)    UNIQUE NOT NULL,`  
`    username        VARCHAR(255)    UNIQUE NOT NULL,`  
`    family          VARCHAR(32)     NOT NULL,`  
`    given           VARCHAR(32)     NOT NULL,`  
`    password_hash   VARCHAR(255)    NOT NULL,`  
`)`  
- Az e-mail címre a RFC 5321 és RFC 5322 standardok alapján lett 320 karakter kiválasztva.
- A jelszó hashjéhez a PHP kézikönyv alapján lett 255 karakter meghatározva.
- A felhasználó név hosszára, illetve a vezeték- és keresztnevekre standard híján, a biztonség kedvéért lett 255, - illetve 32-32 karakter meghatározva.

## meassages tábla

A `messages` tábla sémája:  
`CREATE TABLE messages (`  
`    message_id      INTEGER         PRIMARY KEY AUTOINCREMENT,`  
`    user_id         INTEGER         DEFAULT NULL,`  
`    message_time    DATETIME        DEFAULT CURRENT_TIMESTAMP,`  
`    message_text    VARCHAR(1024)   NOT NULL,`  
`    FOREIGN KEY (user_id) REFERENCES users(user_id)`
`)`  
- A `user_id` mezőben megengedjük a `NULL` értéket, mely a vendég felhasználóktól érkező üzeneteket jelzi.

# Feladatok megvalósítása

## Frontend controller

A frontend controller az index.php és getPage.php, valamint a config.inc.php állományok segítségével valósul meg. Az index.php a honlap elsődleges belépési pontja, ide kerül includeolásra a többi fájl.

A megfelelő oldal betöltéséért felelős logika a getPage.phpban található:
1. Megnézi, hogy van-e értéke a `$_SESSION["message"]` változónak. Ez akkor történik, ha valamely műveletet (belépés, regisztráció, kilépés, üzenetküldés, képfeltöltés) követően jelenik meg az oldal, vagy a keresett oldal nem található. Ha igen, akkor az ilyen üzenetek megjelenítéséért felelős result.tpl.php oldalt jeleníti meg.
2. Ha nem, akkor ellenőrzi, hogy a GET metódusú kérésben a látogató átadott-e `page` paramétert. Ha igen, akkor ez lesz a $requested_page, ha nem, akkor a a gyökérkönyvtár.
3. Megnézi, hogy a config.inc.php-ban meghatározott $ALL array kulcsai között szerepele a $requested_page értéke. Ha igen, akkor ennek az oldalnak a templatejét tölti be. Ha nem, akkor `$_SESSION["message"]` értékét "A keresett oldal nem található"-ra állítja és a result.tpl.php-t tölti be.

## Navbar
A navbar az index.php, navbar.tpl.php, valamint a config.inc.php állományok segítségével valósul meg. Az index.php a honlap elsődleges belépési pontja, ide kerül includeolásra a másik két fájl.

A navbar a config.inc.php-ban meghatározott $ALWAYS, illetve $LOGGEDIN és $LOGGEDOUT arrayokból állítja össze a navbar elemeket. Az $ALWAYS array elemeiből kialakított elemek mindig szereplnek a navbarban. A $LOGGEDIN/$LOGGEDOUT elemei bejelentkezettségtől függően (a $_SESSION["logged_is_as"] értéke alapján).

## Galéria (Készítsen egy harmadik oldalt képek, képgaléria tárolására.)  

A megadott oldal a gallery.tpl.php templateben került megvalósításra. 
1. A template betöltésekor a `$paths` változóba gyűjti a `glob` funkció segítségével a fájlokat. 
2. Ezt követően ezeken egy `foreach` ciklus keretében végigmegy, és a funcs.inc.php-ban deklarált `checkIfImage` funkció segítségével megállapítja, hogy az adott fájl képfájl-e:  
    2a. A funkció első körben exif adatok alapján szűr, melyhez a beépített `exif_imagetype` funkciót használja.  
    2b. Amennyiben a visszakapott fájltípus (pontosabban azt jelképező int típusú konstans) szerepel a funkción belül meghatározott `$VALID_TYPES` tömb kulcsai között, úgy az eredményt a kimeneti értéket rögzítő `$is_valid_type` változóba menti és tovább vizsgálja a fájlt. Jelenleg a gif, jpeg, png, bmp és webp fájlok megengedettek.  
    2c. Második körben a `$VALID_TYPES` tömb értékei közül a megfelelő `imagecreatefrom` beépített funkcióval megpróbál képet létrehozni a fájl alapján. A művelet eredményével felülírja az `$is_valid_type` értékét.  
    2d. Az `$is_valid_type` értékét `boolean`-ként castolva visszaadja.  
3. Amennyiben igen, akkor a képből létrehoz egy `<img>` elemet.

## Képfeltöltés (Legyen lehetőség új képek feltöltésére. Képfeltöltést csak bejelentkezett felhasználó tehet meg.)  

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

## Kapcsolati űrlap (A negyedik oldalon legyen egy kapcsolat űrlap, amelynek segítségével e-mailt lehet küldeni az oldal tulajdonosa számára.)  

Az üzenetküldés a sendMessage.tpl.php templateben és messageAttempt.php logikai oldalon valósul meg.

## Üzenetellenőrzés (Ellenőrizze megfelelően az űrlap helyes kitöltését. Az ellenőrzést végezze el kliens- és szerveroldalon is (JavaScript, PHP). A HTML kódban ne ellenőrizze az úrlap adatait.)  

A kliens és szerver oldali ellenőrzést a check.js és funcs.inc.js állományokban meghatározott `checkMessage` funkció végzi. Ez lenyírják a kapott karakterláncról a white spaceket, majd ellenőrizik, hogy
    - a megnyírt karakterláncban van-e még karakter,
    - rövidebb-e, mint a maximális megengedett hossz.
Ha igen, akkor igazat adnak vissza, egyébként hamisat.

## Üzenetek mentése (Az elküldött űrlap adatokat ezen kívül mentse le adatbázisba.)  

A megfelelő üzeneteket az adatbázis message adattáblájába vezetjük be, a config.inc.php-ban deklarált `$database_connection` objektum `insert_query` metódusával:
- A `message_text` mezőbe az üzenet szövege kerül. 
- A `message_time` mező mindig az alapértelmezett értéket kapja (ami az aktuális idő).
- A tábla `user_id` mezőjébe a `$_SESSION["logged_in_as"]` értéke alapján az adatbázisból visszakapott azonosító, vagy üres eredményhalmaz esetén `NULL` érték kerül. (Ez normál esetben nem bejelentkezett, "Vendég" felhasználó üzenetküldése esetén történik.)

## Üzenőfal (Az e-mail küldése helyett jelenítse meg az adatokat egy új (ötödik) oldal tartalmaként.)  

Az üzenetek megjelenítése a msgtable.tpl.php állományban valósul meg, táblázat formájában. A `messages` és `users` táblákon `user_id` szerinti `LEFT JOIN` művelet eredményeiből `<td>` elemek készülnek. A küldő mezőbe vagy az adott rekord `username` mezőjének értéke, vagy `NULL` érték esetén a "Vendég" szöveg kerül.

## Regisztráció

A regisztráció a loginRegister.tpl.php templateben, illetve a registerAttempt.php logikai oldalakon valósul meg. A regisztráció a főoldalon jobb felül található Belépés/Regisztráció gombra kattintva érhető el, ami csak akkor látszik, ha az $_SESSION["logged_in_as"] változónak hamis értéke van.

A regisztrációs adatok ellenőrzését kliens oldalon a check.js-ben deklarált funkciók, szerver oldalon pedig a funcs.inc.php-ban deklarált funkciókkal végezik. Mindkét oldalon öt, tartalmilag azonos funkciót használ:
- `checkUsername`: Regex mintával ellenőrzi, hogy a megadott felhasználónév csak számokból, betűkből vagy _-ból áll, és 1-255 karakter hosszú-e.
- `checkEmail`: Regex mintával ellenőrzi, hogy a megadott e-mail cím megfelel-e a minta követelményeinek.
- `checkName`: UTF kódokon alakuló regex mintával ellenőrzi, hogy a megadott név csak a magyar abc betűiből áll-e és 1-32 karakter hosszú-e. Vezeték és keresztnévhez is ezt a funkciót használja.
- `checkPassword`: ASCII  Regex mintával ellenőrzi, hogy a megadott jelszó megfelel-e a minta követelményeinek és minimum 8 karakter hosszú-e.
- `matchPassword`: Ellenőrzi, hogy az űrlap mindkét vonatkozó pontján megegyező jelszavakat adtak meg.
- `submitRegistration`: Csak a kliens oldalon alkalmazott funkció, mely a fentiek eredményét fogja össze és adja vissza az && operátorral.

Ha a megadott adatok helyesek, akkor még a php oldal egy-egy adatbázis lekérdezéssel ellenőrzi, hogy az adott felhasználónév, vagy e-mail foglalt-e. Ha egyik sem, akkor a beépített `password_hash` funkcióval elhasheli a jelszót, majd a config.inc.php-ban deklarált `$database_connection` objektum `insert_query` metódusával behelyezi az adatokat az adatbázisba `users` táblájába.

## Belépés

A belépés a loginRegister.tpl.php templateben, illetve a loginAttempt.php logikai oldalakon valósul meg. A főoldalon jobb felül található Belépés/Regisztráció gombra kattintva érhető el, ami csak akkor látszik, ha az $_SESSION["logged_in_as"] változónak hamis értéke van.

A beléptetés keretében:
1. Egy a config.inc.php-ban deklarált `$database_connection` objektum `insert_query` kéréssel megvizsgálja, hogy a users táblában létezik-e a megadott felhasználónév, illetve visszanyeri az ahhoz tartozó jelszó hash értékét. 
2. A beépített `password_verify` funkcióval ellenőrzi, hogy a felhasználóhoz tartozó hash megegyezik-e a megadott jelszó hash értékével.
3. Ha igen, akkor a `$_SESSION` munkemeneti változóban a "logged_in_as", "family" és "given" kulcsok értékét a felhasználóhoz tartozó username-re, családnévre és keresztnévre állítja.

## Kilépés

A kilépés a logout.php logikai állományban valósul meg, melyet a Kijlentkezés gombra klikkelve indítunk el. A gomb csak akkor látszik, ha az $_SESSION["logged_in_as"] változónak igazszerű értéke van. 

A `$_SESSION` globális változóban "logged_in_as", "family" és "given" kulcsokhoz tartozó értékeket az `unset` funkcióval megszünteti. A "message" kulcshoz hozzárendeli a sikeres kijelentkezésről szóló értesítést, majd front endre.