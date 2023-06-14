<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use App\Http\Controllers\WebSocketController;



class WebSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initializing Websocket server to receive and manage connections';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // the “$server” variable we’ve defined is an instance of “IoServer” class
        // which handles input and ouput of the peers connected to the socket,
        // it wraps an instance of “HttpServer” which receives connection requests
        // from peers and responds to them, finally the latter wraps the “WsServer”
        // which is the websocket server manages the websocket connection parameters
        // between peers such as the protocol version
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketController()
                )
            ),
            8090,
            '127.0.0.1:8090/chat'
        );
        $server->run();
    }
}
