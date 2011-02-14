<?php

$messages = array();

$messages['en'] = array(
	'cloakcheck' => 'IRC cloak eligibility check',
	'cloakcheck-desc' => 'Provides an all-in-one interface to verify requirements for an IRC cloak',

	#form
	##only seen by staff
	'cloakcheck-form-username' => 'Username:',
	'cloakcheck-form-check' => 'Check username',
	##only seen by non-staff
	'cloakcheck-form-check-self' => 'Check IRC cloak eligibility',

	#process
	'cloakcheck-process-empty' => 'Username must not be empty.',
	'cloakcheck-process-notexist' => 'Username does not exist.',

	'cloakcheck-process-username' => 'Username: $1',

	'cloakcheck-process-accountage-yes' => 'Account is old enough.',
	'cloakcheck-process-accountage-no' => 'Account is too new.',

	'cloakcheck-process-emailconf-yes' => 'E-mail address confirmed.',
	'cloakcheck-process-emailconf-no' => 'E-mail address not confirmed.',

	'cloakcheck-process-edits-yes' => 'User has enough edits.',
	'cloakcheck-process-edits-no' => 'User does not have enough edits.',
);

/** Breton (Brezhoneg)
 * @author Y-M D
 */
$messages['br'] = array(
	'cloakcheck-form-username' => 'Anv implijer :',
	'cloakcheck-form-check' => 'Gwiriekaat an anv-implijer',
	'cloakcheck-process-empty' => "Goullo ne c'hall ket bezañ an anv implijer.",
	'cloakcheck-process-notexist' => "N'eus ket eus an anv-implijer.",
	'cloakcheck-process-username' => 'Anv implijer : $1',
	'cloakcheck-process-accountage-yes' => "Kozh a-walc'h eo ar gont-mañ.",
	'cloakcheck-process-accountage-no' => 'Re nevez eo ar gont.',
	'cloakcheck-process-emailconf-yes' => "Kadarnaet eo ar chomlec'h postel.",
	'cloakcheck-process-emailconf-no' => "N'eo ket kadarnaet ar chomlec'h postel.",
	'cloakcheck-process-edits-yes' => "Trawalc'h a zegasadennoù a zo gant an implijer.",
	'cloakcheck-process-edits-no' => "N'eus ket trawalc'h a zegasadennoù gant an implijer-mañ.",
);

/** German (Deutsch)
 * @author Diebuche
 * @author George Animal
 */
$messages['de'] = array(
	'cloakcheck' => 'Prüfung der Anspruchsberechtigung auf einen IRC Cloak',
	'cloakcheck-desc' => 'Stellt eine ganzheitliche Schnittstelle zur Verfügung, die der Prüfung der Voraussetzungen für einen IRC Cloak dient',
	'cloakcheck-form-username' => 'Benutzername:',
	'cloakcheck-form-check' => 'Benutzernamen überprüfen',
	'cloakcheck-process-empty' => 'Bitte einen Benutzernamen angeben.',
	'cloakcheck-process-notexist' => 'Benutzername existiert nicht.',
	'cloakcheck-process-username' => 'Benutzername:$1',
	'cloakcheck-process-accountage-yes' => 'Konto ist alt genug.',
	'cloakcheck-process-accountage-no' => 'Konto ist zu neu.',
	'cloakcheck-process-emailconf-yes' => 'E-Mail-Adresse bestätigt.',
	'cloakcheck-process-emailconf-no' => 'E-Mail-Adresse nicht bestätigt.',
	'cloakcheck-process-edits-yes' => 'Benutzer hat genug Bearbeitungen.',
);

/** Spanish (Español)
 * @author Absay
 * @author Locos epraix
 */
$messages['es'] = array(
	'cloakcheck' => 'Verificador de elegibilidad de cloak de IRC',
	'cloakcheck-desc' => 'Proporciona una interfaz todo-en-uno y verifica los requisitos para una cloak de IRC',
	'cloakcheck-form-username' => 'Nombre de usuario:',
	'cloakcheck-form-check' => 'Verificar el nombre de usuario',
	'cloakcheck-form-check-self' => 'Verificar elegibilidad de cloak de IRC',
	'cloakcheck-process-empty' => 'El nombre de usuario no debe estar vacío.',
	'cloakcheck-process-notexist' => 'El nombre de usuario no existe.',
	'cloakcheck-process-username' => 'Nombre de usuario: $1',
	'cloakcheck-process-accountage-yes' => 'La cuenta tiene la edad suficiente.',
	'cloakcheck-process-accountage-no' => 'La cuenta es demasiado nueva.',
	'cloakcheck-process-emailconf-yes' => 'Dirección de correo electrónico confirmada.',
	'cloakcheck-process-emailconf-no' => 'Dirección de correo electrónico no confirmada.',
	'cloakcheck-process-edits-yes' => 'El usuario tiene suficiente ediciones.',
	'cloakcheck-process-edits-no' => 'El usuario no tiene suficiente ediciones.',
);

/** Finnish (Suomi)
 * @author Tofu II
 */
$messages['fi'] = array(
	'cloakcheck-process-username' => 'Käyttäjätunnus: $1',
);

/** French (Français)
 * @author Peter17
 */
$messages['fr'] = array(
	'cloakcheck' => 'Vérification de l’éligibilité au masquage IRC',
	'cloakcheck-desc' => 'Fournit une interface intégrée pour vérifier les exigences pour un masquage IRC',
	'cloakcheck-form-username' => 'Nom d’utilisateur :',
	'cloakcheck-form-check' => 'Vérifier le nom d’utilisateur',
	'cloakcheck-form-check-self' => 'Vérifier l’éligibilité au masquage IRC',
	'cloakcheck-process-empty' => "Le nom d'utilisateur ne doit pas être vide.",
	'cloakcheck-process-notexist' => 'Le nom d’utilisateur n’existe pas.',
	'cloakcheck-process-username' => 'Nom d’utilisateur : $1',
	'cloakcheck-process-accountage-yes' => 'Le compte est suffisamment vieux.',
	'cloakcheck-process-accountage-no' => 'Le compte est trop récent.',
	'cloakcheck-process-emailconf-yes' => 'L’adresse électronique a été confirmée.',
	'cloakcheck-process-emailconf-no' => 'L’adresse électronique n’a pas été confirmée.',
	'cloakcheck-process-edits-yes' => 'L’utilisateur a suffisamment de modifications.',
	'cloakcheck-process-edits-no' => 'L’utilisateur n’a pas suffisamment de modifications.',
);

/** Galician (Galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'cloakcheck' => 'Comprobación da elixibilidade do enmascaramento do IRC',
	'cloakcheck-desc' => 'Proporciona unha interface integrada para comprobar os requirimentos do enmascaramento do IRC',
	'cloakcheck-form-username' => 'Nome de usuario:',
	'cloakcheck-form-check' => 'Comprobar o nome de usuario',
	'cloakcheck-form-check-self' => 'Comprobar a elixibilidade do enmascaramento do IRC',
	'cloakcheck-process-empty' => 'O nome de usuario non pode estar baleiro.',
	'cloakcheck-process-notexist' => 'O usuario non existe.',
	'cloakcheck-process-username' => 'Nome de usuario: $1',
	'cloakcheck-process-accountage-yes' => 'A conta é o suficientemente vella.',
	'cloakcheck-process-accountage-no' => 'A conta é nova de máis.',
	'cloakcheck-process-emailconf-yes' => 'O enderezo de correo electrónico está confirmado.',
	'cloakcheck-process-emailconf-no' => 'O enderezo de correo electrónico non está confirmado.',
	'cloakcheck-process-edits-yes' => 'O usuario ten suficientes edicións.',
	'cloakcheck-process-edits-no' => 'O usuario non ten suficientes edicións.',
);

/** Interlingua (Interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'cloakcheck' => 'Verification de eligibilitate pro camouflage IRC',
	'cloakcheck-desc' => 'Forni un interfacie unificate pro verificar le requisitos pro un camouflage in IRC',
	'cloakcheck-form-username' => 'Nomine de usator:',
	'cloakcheck-form-check' => 'Verificar nomine de usator',
	'cloakcheck-form-check-self' => 'Verificar eligibilitate pro camouflage IRC',
	'cloakcheck-process-empty' => 'Le nomine de usator non pote esser vacue.',
	'cloakcheck-process-notexist' => 'Le nomine de usator non existe.',
	'cloakcheck-process-username' => 'Nomine de usator: $1',
	'cloakcheck-process-accountage-yes' => 'Le conto es satis vetere.',
	'cloakcheck-process-accountage-no' => 'Le conto es troppo nove.',
	'cloakcheck-process-emailconf-yes' => 'Adresse de e-mail confirmate.',
	'cloakcheck-process-emailconf-no' => 'Adresse de e-mail non confirmate.',
	'cloakcheck-process-edits-yes' => 'Le usator ha facite satis de modificationes.',
	'cloakcheck-process-edits-no' => 'Le usator non ha facite satis de modificationes.',
);

/** Italian (Italiano)
 * @author Minerva Titani
 */
$messages['it'] = array(
	'cloakcheck-process-emailconf-yes' => 'Indirizzo e-mail confermato.',
);

/** Japanese (日本語) */
$messages['ja'] = array(
	'cloakcheck' => 'IRCクローク付与適格性検査',
	'cloakcheck-desc' => 'IRCクロークの付与に必要な要件を満たしているかどうかの検査を一括して行うインタフェースを提供する',
	'cloakcheck-form-username' => '利用者名：',
	'cloakcheck-form-check' => '利用者名をチェック',
	'cloakcheck-form-check-self' => 'IRCクロークの付与適格性をチェックする',
	'cloakcheck-process-empty' => '利用者名は空欄にできません。',
	'cloakcheck-process-notexist' => '利用者名が存在しません。',
	'cloakcheck-process-username' => '利用者名: $1',
	'cloakcheck-process-accountage-yes' => '十分な時間が経過したアカウントです。',
	'cloakcheck-process-accountage-no' => 'アカウントが新しすぎます。',
	'cloakcheck-process-emailconf-yes' => 'Eメールアドレスが認証されています。',
	'cloakcheck-process-emailconf-no' => 'Eメールアドレスが認証されていません。',
	'cloakcheck-process-edits-yes' => '十分な回数編集しています。',
	'cloakcheck-process-edits-no' => '編集回数が不足しています。',
);

/** Kurdish (Latin) (Kurdî (Latin))
 * @author George Animal
 */
$messages['ku-latn'] = array(
	'cloakcheck-form-username' => 'Navê bikarhêner:',
	'cloakcheck-process-username' => 'Navê bikarhêner: $1',
);

/** Luxembourgish (Lëtzebuergesch) */
$messages['lb'] = array(
	'cloakcheck-form-username' => 'Benotzernumm:',
	'cloakcheck-process-username' => 'Benotzernumm: $1',
);

/** Macedonian (Македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'cloakcheck' => 'Проверка на подобност за IRC-маска',
	'cloakcheck-desc' => 'Дава сеопфатен посредник за проверка на задоволување на условите за IRC-маска',
	'cloakcheck-form-username' => 'Корисничко име:',
	'cloakcheck-form-check' => 'Проверка на корисничко име',
	'cloakcheck-form-check-self' => 'Проверка на подобност за IRC-маска',
	'cloakcheck-process-empty' => 'Корисничкото име не смее да стои празно.',
	'cloakcheck-process-notexist' => 'Тоа корисничко име не постои.',
	'cloakcheck-process-username' => 'Корисничко име: $1',
	'cloakcheck-process-accountage-yes' => 'Сметката е доволно стара.',
	'cloakcheck-process-accountage-no' => 'Сметката е премногу нова.',
	'cloakcheck-process-emailconf-yes' => 'Е-поштенската адреса е потврдена.',
	'cloakcheck-process-emailconf-no' => 'Е-поштенската адреса не е потврдена.',
	'cloakcheck-process-edits-yes' => 'Корисникот има доволен број уредувања.',
	'cloakcheck-process-edits-no' => 'Корисникот нема доволен број уредувања.',
);

/** Dutch (Nederlands)
 * @author Siebrand
 */
$messages['nl'] = array(
	'cloakcheck' => 'Controle in aanmerking komen voor IRC cloak',
	'cloakcheck-desc' => 'Biedt een interface voor het controleren op de voorwaarden voor een IRC-cloak',
	'cloakcheck-form-username' => 'Gebruikersnaam:',
	'cloakcheck-form-check' => 'Gebruikersnaam controleren',
	'cloakcheck-form-check-self' => 'Controleren of ik in aanmerking kom voor een IRC-cloak',
	'cloakcheck-process-empty' => 'Gebruikersnaam kan niet leeg zijn.',
	'cloakcheck-process-notexist' => 'De gebruikersnaam bestaat niet.',
	'cloakcheck-process-username' => 'Gebruikersnaam: $1',
	'cloakcheck-process-accountage-yes' => 'De gebruiker bestaat al lang genoeg.',
	'cloakcheck-process-accountage-no' => 'De gebruiker bestaat nog niet lang genoeg.',
	'cloakcheck-process-emailconf-yes' => 'Het e-mailadres is bevestigd.',
	'cloakcheck-process-emailconf-no' => 'Het e-mailadres is niet bevestigd.',
	'cloakcheck-process-edits-yes' => 'De gebruiker heeft voldoende bewerkingen gemaakt.',
	'cloakcheck-process-edits-no' => 'De gebruiker heeft onvoldoende bewerkingen gemaakt.',
);

/** Norwegian (bokmål)‬ (‪Norsk (bokmål)‬)
 * @author Audun
 */
$messages['no'] = array(
	'cloakcheck' => 'Valgbarhetssjekk for IRC-kappe',
	'cloakcheck-desc' => 'Gir et alt-i-ett grensesnitt for å verifisere krav til en IRC-kappe',
	'cloakcheck-form-username' => 'Brukernavn:',
	'cloakcheck-form-check' => 'Sjekk brukernavn',
	'cloakcheck-form-check-self' => 'Sjekk valgbarhet for IRC-kappe',
	'cloakcheck-process-empty' => 'Brukernavn kan ikke være tomt.',
	'cloakcheck-process-notexist' => 'Brukernavn eksisterer ikke.',
	'cloakcheck-process-username' => 'Brukernavn: $1',
	'cloakcheck-process-accountage-yes' => 'Konto er gammel nok.',
	'cloakcheck-process-accountage-no' => 'Konto er for ny.',
	'cloakcheck-process-emailconf-yes' => 'E-postadresse bekreftet.',
	'cloakcheck-process-emailconf-no' => 'E-postadresse ikke bekreftet.',
	'cloakcheck-process-edits-yes' => 'Bruker har nok redigeringer.',
	'cloakcheck-process-edits-no' => 'Bruker har ikke redigeringer nok.',
);

/** Polish (Polski) */
$messages['pl'] = array(
	'cloakcheck-form-username' => 'Nazwa użytkownika',
	'cloakcheck-form-check' => 'Sprawdź nazwę użytkownika',
	'cloakcheck-process-empty' => 'Nazwa użytkownika nie może być pusta.',
	'cloakcheck-process-notexist' => 'Użytkownik o tej nazwie nie istnieje.',
	'cloakcheck-process-username' => 'Nazwa użytkownika: $1',
	'cloakcheck-process-edits-yes' => 'Użytkownik wykonał wystarczającą liczbę zmian.',
	'cloakcheck-process-edits-no' => 'Użytkownik nie wykonał wystarczającej liczby zmian.',
);

/** Piedmontese (Piemontèis)
 * @author Borichèt
 * @author Dragonòt
 */
$messages['pms'] = array(
	'cloakcheck' => "Contròl d'amissibilità për la covertura IRC",
	'cloakcheck-desc' => "A dà n'antërfacia antëgrà për verifiché j'arceste për na covertura IRC",
	'cloakcheck-form-username' => 'Nòm utent:',
	'cloakcheck-form-check' => "Controlé lë stranòm d'utent",
	'cloakcheck-form-check-self' => "Contròla l'amissibilità ëd covertura IRC",
	'cloakcheck-process-empty' => "Lë stranòm d'utent a peul pa esse veuid.",
	'cloakcheck-process-notexist' => "Lë stranòm d'utent a esist pa.",
	'cloakcheck-process-username' => "Stranòm d'utent: $1",
	'cloakcheck-process-accountage-yes' => "Ël cont a l'é vej a basta.",
	'cloakcheck-process-accountage-no' => "Ël cont a l'é tròp neuv.",
	'cloakcheck-process-emailconf-yes' => 'Adrëssa eletrònica confirmà.',
	'cloakcheck-process-emailconf-no' => 'Adrëssa eletrònica nen confirmà.',
	'cloakcheck-process-edits-yes' => "L'utent a l'ha a basta ëd modìfiche.",
	'cloakcheck-process-edits-no' => "L'utent a l'ha pa a basta ëd modìfiche.",
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'cloakcheck-form-username' => 'کارن-نوم:',
	'cloakcheck-process-username' => 'کارن-نوم: $1',
);

/** Portuguese (Português)
 * @author Hamilton Abreu
 * @author Waldir
 */
$messages['pt'] = array(
	'cloakcheck' => 'Verificação de eligibilidade para um cloak IRC',
	'cloakcheck-desc' => 'Fornece uma interface única para verificação dos requisitos de um cloak IRC',
	'cloakcheck-form-username' => 'Nome de utilizador:',
	'cloakcheck-form-check' => 'Verificar nome de utilizador',
	'cloakcheck-form-check-self' => 'Verificar a eligibilidade para um cloak IRC',
	'cloakcheck-process-empty' => 'O nome do utilizador não pode estar vazio.',
	'cloakcheck-process-notexist' => 'O nome de utilizador não existe.',
	'cloakcheck-process-username' => 'Nome de utilizador: $1',
	'cloakcheck-process-accountage-yes' => 'A conta é suficientemente antiga.',
	'cloakcheck-process-accountage-no' => 'A conta é demasiado recente.',
	'cloakcheck-process-emailconf-yes' => 'Endereço e-mail confirmado.',
	'cloakcheck-process-emailconf-no' => 'Endereço e-mail não confirmado.',
	'cloakcheck-process-edits-yes' => 'O utilizador tem edições suficientes.',
	'cloakcheck-process-edits-no' => 'O utilizador não tem edições suficientes.',
);

/** Russian (Русский)
 * @author Eleferen
 */
$messages['ru'] = array(
	'cloakcheck-form-username' => 'Имя участника:',
	'cloakcheck-form-check' => 'Проверить имя пользователя',
	'cloakcheck-process-notexist' => 'Участника с таким именем не существует.',
	'cloakcheck-process-username' => 'Имя участника: $1',
	'cloakcheck-process-accountage-yes' => 'Учетная запись достаточно старая.',
	'cloakcheck-process-accountage-no' => 'Учетная запись слишком новая.',
	'cloakcheck-process-emailconf-yes' => 'Адрес электронной почты подтверждён.',
	'cloakcheck-process-emailconf-no' => 'Адрес электронной почты не подтверждён.',
	'cloakcheck-process-edits-yes' => 'Участником сделано необходимое число правок.',
	'cloakcheck-process-edits-no' => 'Участником не сделано необходимого числа правок.',
);

/** Swedish (Svenska)
 * @author Tobulos1
 */
$messages['sv'] = array(
	'cloakcheck-form-username' => 'Användarnamn:',
	'cloakcheck-form-check' => 'Kontrollera användarnamn',
	'cloakcheck-process-empty' => 'Användarnamnet får inte vara tomt.',
	'cloakcheck-process-notexist' => 'Användarnamnet finns inte.',
	'cloakcheck-process-username' => 'Användarnamn: $1',
	'cloakcheck-process-accountage-yes' => 'Kontot är gammal nog.',
	'cloakcheck-process-accountage-no' => 'Kontot är för nytt.',
	'cloakcheck-process-emailconf-yes' => 'E-postadressen bekräftades.',
	'cloakcheck-process-emailconf-no' => 'E-postadressen bekräftades inte.',
	'cloakcheck-process-edits-yes' => 'Användaren har gjort nog med redigeringar.',
	'cloakcheck-process-edits-no' => 'Användaren har inte gjort nog med redigeringar.',
);

/** Tamil (தமிழ்)
 * @author TRYPPN
 */
$messages['ta'] = array(
	'cloakcheck-form-username' => 'பயனர் பெயர்:',
	'cloakcheck-form-check' => 'பயனர் பெயரை சரிபார்க்கவும்',
	'cloakcheck-process-username' => 'பயனர் பெயர்: $1',
	'cloakcheck-process-accountage-no' => 'கணக்கு மிகவும் புதியது.',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'cloakcheck' => 'Pagsusuri ng pagkamaaari ng balabal na IRC',
	'cloakcheck-desc' => 'Nagbibigay ng lahat-nasa-isang ugnayang-mukha upang matiyak ang mga kailangan para sa isang balabal na IRC',
	'cloakcheck-form-username' => 'Pangalan ng tagagamit:',
	'cloakcheck-form-check' => 'Suriin ang pangalan ng tagagamit',
	'cloakcheck-form-check-self' => 'Suriin ang pagkamaaari ng balabal na IRC',
	'cloakcheck-process-empty' => 'Hindi dapat walang laman ang pangalan ng tagagamit.',
	'cloakcheck-process-notexist' => 'Hindi umiiral ang pangalan ng tagagamit.',
	'cloakcheck-process-username' => 'Pangalan ng tagagamit: $1',
	'cloakcheck-process-accountage-yes' => 'Nasa sapat na gulang na ang akawnt.',
	'cloakcheck-process-accountage-no' => 'Napakabago pa ng akawnt.',
	'cloakcheck-process-emailconf-yes' => 'Natiyak ang tirahan ng e-liham.',
	'cloakcheck-process-emailconf-no' => 'Hindi natiyak ang tirahan ng e-liham.',
	'cloakcheck-process-edits-yes' => 'May sapat na pamamatnugot ang tagagamit.',
	'cloakcheck-process-edits-no' => 'Walang sapat na mga pamamatnugot ang tagagamit.',
);

/** Simplified Chinese (‪中文(简体)‬)
 * @author Hydra
 */
$messages['zh-hans'] = array(
	'cloakcheck-form-username' => '用户名：',
	'cloakcheck-form-check' => '检查用户名',
	'cloakcheck-process-username' => '用户名：$1',
);

