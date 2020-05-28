<?php

/**
 * @author lin <465382251@qq.com>
 * */

use Lin\Bittrex\Bittrex;

require __DIR__ .'../../vendor/autoload.php';

include 'key_secret.php';

//If you have an Subaccount Id, you can fill it in
$bittrex=new Bittrex($key,$secret,$subaccount_id='');

//You can set special needs
$bittrex->setOptions([
    //Set the request timeout to 60 seconds by default
    'timeout'=>10,
    
    //If you are developing locally and need an agent, you can set this
    //'proxy'=>true,
    //More flexible Settings
    /* 'proxy'=>[
     'http'  => 'http://127.0.0.1:12333',
     'https' => 'http://127.0.0.1:12333',
     'no'    =>  ['.cn']
     ], */
    //Close the certificate
    //'verify'=>false,
]);

//Place an Order
try {
    $result=$bittrex->order()->post([
        //'clientOrderId'=>'xxxxxxxx',
        'marketSymbol'=>'BTC-USD',
        'direction'=>'BUY',//BUY, SELL
        
        'type'=>'LIMIT',//LIMIT, MARKET, CEILING_LIMIT, CEILING_MARKET
        'quantity'=>'0.01',
        'limit'=>'3000',
        
        'timeInForce'=>'FILL_OR_KILL' //GOOD_TIL_CANCELLED, IMMEDIATE_OR_CANCEL, FILL_OR_KILL, POST_ONLY_GOOD_TIL_CANCELLED, BUY_NOW
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Track the order
try {
    $result=$bittrex->order()->get([
        'orderId'=>'xxxxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

//Cancel an existing order
try {
    $result=$bittrex->order()->delete([
        'orderId'=>'xxxxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}



?>