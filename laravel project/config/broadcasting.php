<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Broadcaster
    |--------------------------------------------------------------------------
    |
    | This option controls the default broadcaster that will be used by the
    | framework when an event needs to be broadcast. You may set this to
    | any of the connections defined in the "connections" array below.
    |
    | Supported: "pusher", "redis", "log", "null"
    |
    */

    'default' => env('BROADCAST_DRIVER', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Broadcast Connections
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the broadcast connections that will be used
    | to broadcast events to other systems or over websockets. Samples of
    | each available type of connection are provided inside this array.
    |
    */

    'connections' => [

        'pusher' => [
            'driver' => 'pusher',//we just use pusher api not pusher
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => false,//new  //we not using https so we will make comment
//                'encryption'=>false,//this is before
                'host' =>'192.168.1.22',
                'port' => 6001,//port that we will use
                'scheme'=>'http',//https if we use ssl
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],

    ],

];
//'pusher' => [
//    'driver' => 'pusher',//we just use pusher api not pusher
//    'key' => env('PUSHER_APP_KEY'),
//    'secret' => env('PUSHER_APP_SECRET'),
//    'app_id' => env('PUSHER_APP_ID'),
//    'options' => [
//        'cluster' => env('PUSHER_APP_CLUSTER'),
//        'useTLS' => false,//new  //we not using https so we will make comment
////                'encryption'=>false,//this is before
//        'host' =>'http://5b374fa84a3e.ngrok.io',
//        'port' => 6001,//port that we will use
//        'scheme'=>'https',//https if we use ssl
//    ],
//],
