<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('/start', function ($bot) {
	$nombres = $bot->getUser()->getFirstName() ?: "desconocido";
	$bot->reply('Hola ' . $nombres . ', bienvenido al bot SimpleQuizzes!');
});

$botman->fallback(function ($bot) {
	$bot->reply("No entiendo que quieres decir, vuelve a intentarlo.");
});
