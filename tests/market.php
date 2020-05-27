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

try {
    $result=$bittrex->market()->headTrade([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
die;

try {
    $result=$bittrex->market()->getTrades([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
die;

try {
    $result=$bittrex->market()->getCandles([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
die;

try {
    $result=$bittrex->market()->getTicker([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
die;

try {
    $result=$bittrex->market()->getTickers();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
die;

try {
    $result=$bittrex->market()->headSummaries();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}
die;

try {
    $result=$bittrex->market()->getSummaries();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}

try {
    $result=$bittrex->market()->gets();
    print_r($result);
}catch (\Exception $e){
    print_r(json_decode($e->getMessage(),true));
}


?>