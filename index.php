<?php

$auth_token = "4d61b35f2767d21b-763464c55290f8ab-828ca01daeeef9c8";
$send_name = "Бот СПФК ЦНТУ";
$is_log = true;

global $servername;
global $username;
global $password;
global $dbname;

$servername = "remotemysql.com";
$username = "qGVI1BzGNZ";
$password = "SNo79VAWUF";
$dbname = $username;

file_put_contents("viber.txt", file_get_contents("php://input"));
$viber = file_get_contents("viber.txt");
$viber = JSON_decode($viber);

function send($message)
{
	$curl = curl_init();

	curl_setopt_array($curl, array(
		CURLOPT_URL => "https://chatapi.viber.com/pa/send_message",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => JSON_encode($message),
		CURLOPT_HTTPHEADER => array(
			"Cache-Control: no-cache",
			"Content-Type: application/JSON",
			"X-Viber-Auth-Token: 4d61b35f2767d21b-763464c55290f8ab-828ca01daeeef9c8"
		),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
		echo "cURL Error #:" . $err;
	} else {
		echo $response;
	}
}

if ($viber->event == "webhook") {
	$message['receiver'] = $viber->user->id;
	$message['type'] = "text";
	$message['text'] = "Це інформаційний бот для вступників, які вступатимуть до СПФК ЦНТУ, та їх батьків.";
	$message['keyboard'] = [
		"Type" => "keyboard",
		"DefaultHeight" => true,
		"Buttons" => [
			[
				"ActionType" => "reply",
				"ActionBody" => "Кнопка1",
				"Text" => "Кнопка1",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			],
			[
				"ActionType" => "reply",
				"ActionBody" => "Кнопка 2",
				"Text" => "Кнопка 2",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			]
		]
	];
	send($message);
	exit;
}

if ($viber->event == "subscribed") {
	$message['receiver'] = $viber->sender->id;
	$message['type'] = "text";
	$message['text'] = "Вітаю.\n
	Це інформаційний бот для вступників, які вступатимуть до СПФК ЦНТУ, та їх батьків.";
	$message['keyboard'] = [
		"Type" => "keyboard",
		"DefaultHeight" => false,
		"BgColor" => "#0a9396",
		"Buttons" => [
			[
				"ActionType" => "reply",
				"ActionBody" => "🏫 Приймальна комісія",
				"Text" => "🏫 Приймальна комісія",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			],
			[
				"ActionType" => "reply",
				"ActionBody" => "🗄 Спеціальності",
				"Text" => "🗄 Спеціальності",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			],
			[
				"ActionType" => "reply",
				"ActionBody" => "📕 Правила вступної кампанії",
				"Text" => "📕 Правила вступної кампанії",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			],
			[
				"ActionType" => "reply",
				"ActionBody" => "🗓 Етапи вступної кампанії",
				"Text" => "🗓 Етапи вступної кампанії",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			],
			[
				"ActionType" => "reply",
				"ActionBody" => "🚪 День відкритих дверей",
				"Text" => "🚪 День відкритих дверей",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			],
			[
				"ActionType" => "reply",
				"ActionBody" => "📝 Підготовчі курси",
				"Text" => "📝 Підготовчі курси",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 3
			],
			[
				"ActionType" => "reply",
				"ActionBody" => "❓ Часті запитання",
				"Text" => "❓ Часті запитання",
				"TextSize" => "large",
				"BgColor" => "#bee1e6",
				"Columns" => 6
			]
		]
	];
	send($message);
	exit;
}

if ($viber->event == "message") {
	if ($viber->message->text == "🔙 Меню") {
		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['text'] = "Головне меню";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🏫 Приймальна комісія",
					"Text" => "🏫 Приймальна комісія",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗄 Спеціальності",
					"Text" => "🗄 Спеціальності",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📕 Правила вступної кампанії",
					"Text" => "📕 Правила вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗓 Етапи вступної кампанії",
					"Text" => "🗓 Етапи вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🚪 День відкритих дверей",
					"Text" => "🚪 День відкритих дверей",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📝 Підготовчі курси",
					"Text" => "📝 Підготовчі курси",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "❓ Часті запитання",
					"Text" => "❓ Часті запитання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🏫 Приймальна комісія") {
		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['text'] = "Оберіть дію з меню:";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🕣 Графік роботи",
					"Text" => "🕣 Графік роботи",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "☎️ Контакти",
					"Text" => "☎️ Контакти",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🕣 Графік роботи") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {

			$sql = "SELECT text FROM openinghours";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🕣 Графік роботи",
					"Text" => "🕣 Графік роботи",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "☎️ Контакти",
					"Text" => "☎️ Контакти",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "☎️ Контакти") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {

			$sql = "SELECT text FROM contacts";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🕣 Графік роботи",
					"Text" => "🕣 Графік роботи",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "☎️ Контакти",
					"Text" => "☎️ Контакти",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🗄 Спеціальності") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {

			$sql = "SELECT text FROM specialty";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']', "Детальніше..."], '', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🏫 Приймальна комісія",
					"Text" => "🏫 Приймальна комісія",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗄 Спеціальності",
					"Text" => "🗄 Спеціальності",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📕 Правила вступної кампанії",
					"Text" => "📕 Правила вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗓 Етапи вступної кампанії",
					"Text" => "🗓 Етапи вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🚪 День відкритих дверей",
					"Text" => "🚪 День відкритих дверей",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📝 Підготовчі курси",
					"Text" => "📝 Підготовчі курси",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "❓ Часті запитання",
					"Text" => "❓ Часті запитання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "❓ Часті запитання") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {

			$sql = "SELECT text FROM faq";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
		}
		$conn->close();
		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "📕 Правила вступної кампанії") {
		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['text'] = "Оберіть дію з меню:";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "📖 Правила прийому",
					"Text" => "📖 Правила прийому",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗞 Перелік конкурсних предметів",
					"Text" => "🗞 Перелік конкурсних предметів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗃 Перелік документів",
					"Text" => "🗃 Перелік документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🧾 Державне замовлення",
					"Text" => "🧾 Державне замовлення",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "💶 Вартість навчання",
					"Text" => "💶 Вартість навчання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📚 Програма підготовки",
					"Text" => "📚 Програма підготовки",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "📖 Правила прийому") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Правила прийому\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']'], '', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "📖 Правила прийому",
					"Text" => "📖 Правила прийому",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗞 Перелік конкурсних предметів",
					"Text" => "🗞 Перелік конкурсних предметів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗃 Перелік документів",
					"Text" => "🗃 Перелік документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🧾 Державне замовлення",
					"Text" => "🧾 Державне замовлення",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "💶 Вартість навчання",
					"Text" => "💶 Вартість навчання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📚 Програма підготовки",
					"Text" => "📚 Програма підготовки",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🗞 Перелік конкурсних предметів") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Перелік конкурсних предметів\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']'], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "📖 Правила прийому",
					"Text" => "📖 Правила прийому",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗞 Перелік конкурсних предметів",
					"Text" => "🗞 Перелік конкурсних предметів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗃 Перелік документів",
					"Text" => "🗃 Перелік документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🧾 Державне замовлення",
					"Text" => "🧾 Державне замовлення",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "💶 Вартість навчання",
					"Text" => "💶 Вартість навчання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📚 Програма підготовки",
					"Text" => "📚 Програма підготовки",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🗃 Перелік документів") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Перелік документів\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "📖 Правила прийому",
					"Text" => "📖 Правила прийому",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗞 Перелік конкурсних предметів",
					"Text" => "🗞 Перелік конкурсних предметів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗃 Перелік документів",
					"Text" => "🗃 Перелік документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🧾 Державне замовлення",
					"Text" => "🧾 Державне замовлення",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "💶 Вартість навчання",
					"Text" => "💶 Вартість навчання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📚 Програма підготовки",
					"Text" => "📚 Програма підготовки",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🧾 Державне замовлення") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Державне замовлення\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']'], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "📖 Правила прийому",
					"Text" => "📖 Правила прийому",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗞 Перелік конкурсних предметів",
					"Text" => "🗞 Перелік конкурсних предметів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗃 Перелік документів",
					"Text" => "🗃 Перелік документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🧾 Державне замовлення",
					"Text" => "🧾 Державне замовлення",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "💶 Вартість навчання",
					"Text" => "💶 Вартість навчання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📚 Програма підготовки",
					"Text" => "📚 Програма підготовки",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "💶 Вартість навчання") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Вартість навчання\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']'], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "📖 Правила прийому",
					"Text" => "📖 Правила прийому",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗞 Перелік конкурсних предметів",
					"Text" => "🗞 Перелік конкурсних предметів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗃 Перелік документів",
					"Text" => "🗃 Перелік документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🧾 Державне замовлення",
					"Text" => "🧾 Державне замовлення",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "💶 Вартість навчання",
					"Text" => "💶 Вартість навчання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📚 Програма підготовки",
					"Text" => "📚 Програма підготовки",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "📚 Програма підготовки") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Програма підготовки\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']'], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "📖 Правила прийому",
					"Text" => "📖 Правила прийому",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗞 Перелік конкурсних предметів",
					"Text" => "🗞 Перелік конкурсних предметів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗃 Перелік документів",
					"Text" => "🗃 Перелік документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🧾 Державне замовлення",
					"Text" => "🧾 Державне замовлення",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "💶 Вартість навчання",
					"Text" => "💶 Вартість навчання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📚 Програма підготовки",
					"Text" => "📚 Програма підготовки",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🗓 Етапи вступної кампанії") {
		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['text'] = "Оберіть дію з меню:";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "⏳ Терміни подачі документів",
					"Text" => "⏳ Терміни подачі документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📆 Розклад вступних випробувань",
					"Text" => "📆 Розклад вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗳 Результати вступних випробувань",
					"Text" => "🗳 Результати вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📉 Рейтинговий список",
					"Text" => "📉 Рейтинговий список",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "⏳ Терміни подачі документів") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Подача документів\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']', "Детальніше..."], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "⏳ Терміни подачі документів",
					"Text" => "⏳ Терміни подачі документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📆 Розклад вступних випробувань",
					"Text" => "📆 Розклад вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗳 Результати вступних випробувань",
					"Text" => "🗳 Результати вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📉 Рейтинговий список",
					"Text" => "📉 Рейтинговий список",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "📆 Розклад вступних випробувань") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Розклад вступних випробувань\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']', "Детальніше..."], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "⏳ Терміни подачі документів",
					"Text" => "⏳ Терміни подачі документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📆 Розклад вступних випробувань",
					"Text" => "📆 Розклад вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗳 Результати вступних випробувань",
					"Text" => "🗳 Результати вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📉 Рейтинговий список",
					"Text" => "📉 Рейтинговий список",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🗳 Результати вступних випробувань") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Результати вступних випробувань\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']', "Детальніше..."], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "⏳ Терміни подачі документів",
					"Text" => "⏳ Терміни подачі документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📆 Розклад вступних випробувань",
					"Text" => "📆 Розклад вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗳 Результати вступних випробувань",
					"Text" => "🗳 Результати вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📉 Рейтинговий список",
					"Text" => "📉 Рейтинговий список",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "📉 Рейтинговий список") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Рейтинговий список\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']', "Детальніше..."], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "⏳ Терміни подачі документів",
					"Text" => "⏳ Терміни подачі документів",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📆 Розклад вступних випробувань",
					"Text" => "📆 Розклад вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗳 Результати вступних випробувань",
					"Text" => "🗳 Результати вступних випробувань",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📉 Рейтинговий список",
					"Text" => "📉 Рейтинговий список",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🔙 Меню",
					"Text" => "🔙 Меню",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "🚪 День відкритих дверей") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"День відкритих дверей\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']', "Детальніше..."], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🏫 Приймальна комісія",
					"Text" => "🏫 Приймальна комісія",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗄 Спеціальності",
					"Text" => "🗄 Спеціальності",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📕 Правила вступної кампанії",
					"Text" => "📕 Правила вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗓 Етапи вступної кампанії",
					"Text" => "🗓 Етапи вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🚪 День відкритих дверей",
					"Text" => "🚪 День відкритих дверей",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📝 Підготовчі курси",
					"Text" => "📝 Підготовчі курси",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "❓ Часті запитання",
					"Text" => "❓ Часті запитання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else if ($viber->message->text == "📝 Підготовчі курси") {
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			$message['text'] = "😕Не можемо отримати дані. Вибачте за тимчасові незручності.";
		} else {
			$sql = "SELECT text FROM documents WHERE id=\"Підготовчі курси\"";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
			$message['text'] = $row["text"];
			$message['text'] = str_replace(['(', ')', '[', ']', "Детальніше..."], ' ', $message['text']);
		}
		$conn->close();

		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🏫 Приймальна комісія",
					"Text" => "🏫 Приймальна комісія",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗄 Спеціальності",
					"Text" => "🗄 Спеціальності",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📕 Правила вступної кампанії",
					"Text" => "📕 Правила вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗓 Етапи вступної кампанії",
					"Text" => "🗓 Етапи вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🚪 День відкритих дверей",
					"Text" => "🚪 День відкритих дверей",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📝 Підготовчі курси",
					"Text" => "📝 Підготовчі курси",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "❓ Часті запитання",
					"Text" => "❓ Часті запитання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	} else {
		$message['receiver'] = $viber->sender->id;
		$message['type'] = "text";
		$message['text'] = "Оберіть дію з меню:";
		$message['keyboard'] = [
			"Type" => "keyboard",
			"DefaultHeight" => false,
			"BgColor" => "#0a9396",
			"Buttons" => [
				[
					"ActionType" => "reply",
					"ActionBody" => "🏫 Приймальна комісія",
					"Text" => "🏫 Приймальна комісія",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗄 Спеціальності",
					"Text" => "🗄 Спеціальності",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📕 Правила вступної кампанії",
					"Text" => "📕 Правила вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🗓 Етапи вступної кампанії",
					"Text" => "🗓 Етапи вступної кампанії",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "🚪 День відкритих дверей",
					"Text" => "🚪 День відкритих дверей",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "📝 Підготовчі курси",
					"Text" => "📝 Підготовчі курси",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 3
				],
				[
					"ActionType" => "reply",
					"ActionBody" => "❓ Часті запитання",
					"Text" => "❓ Часті запитання",
					"TextSize" => "large",
					"BgColor" => "#bee1e6",
					"Columns" => 6
				]
			]
		];
		send($message);
		exit;
	}
}
