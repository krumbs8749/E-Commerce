<?php

require "./vendor/autoload.php";

\Ratchet\Client\connect('ws://localhost:8080/chat')->then(function($conn) {
    $conn->on('message', function($msg) use ($conn) {
        echo "Received: {$msg}\n";
        $conn->close();
    });
    $conn->send(json_encode(json_encode(['text'=> 'Hello World!', 'id'=> 'dev'])));
    $ids = ['dev', 'user', 'enemy'];
    // Run the function repeatedly
    for ($i = 0; $i < count($ids); $i++) {
        $conn->send(json_encode(['text'=> 'Hi everyone', 'id'=> $ids[$i]]));
        echo "$ids[$i]";
    }

}, function ($e) {
    echo "Could not connect: {$e->getMessage()}\n";
});
