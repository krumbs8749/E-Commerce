<?php

use App\Http\Controllers\WebSocketController;


require "./vendor/autoload.php";

// Run the server application through the WebSocket protocol on port 8080
$app = new Ratchet\App('localhost', 8080);
$app->route('/chat', new WebSocketController(), array('*'));
$app->route('/echo', new Ratchet\Server\EchoServer, array('*'));
$app->run();
