### 建议您先阅读官方文档

Bitfinex 文档地址 [https://docs.bitfinex.com/](https://docs.bitfinex.com/)

V1.1 不支持

V3 支持

所有接口方法的初始化都与Bitfinex提供的方法相同。更多细节 [src/api](https://github.com/zhouaini528/zb-php/tree/master/src/Api)

大部分的接口已经完成，使用者可以根据我的设计方案继续扩展，欢迎与我一起迭代它。

[English Document](https://github.com/zhouaini528/bitfinex-php/blob/master/README.md)

QQ交流群：668421169

### 其他交易所API

[Exchanges](https://github.com/zhouaini528/exchanges-php) 它包含以下所有交易所，强烈推荐使用该SDK。

[Bitmex](https://github.com/zhouaini528/bitmex-php) 支持[Websocket](https://github.com/zhouaini528/bitmex-php/blob/master/README_CN.md#Websocket)

[Okex](https://github.com/zhouaini528/okex-php) 支持[Websocket](https://github.com/zhouaini528/okex-php/blob/master/README_CN.md#Websocket)

[Huobi](https://github.com/zhouaini528/huobi-php) 支持[Websocket](https://github.com/zhouaini528/huobi-php/blob/master/README_CN.md#Websocket)

[Binance](https://github.com/zhouaini528/binance-php) 支持[Websocket](https://github.com/zhouaini528/binance-php/blob/master/README_CN.md#Websocket)

[Kucoin](https://github.com/zhouaini528/kucoin-php)

[Mxc](https://github.com/zhouaini528/mxc-php)

[Coinbase](https://github.com/zhouaini528/coinbase-php)

[ZB](https://github.com/zhouaini528/zb-php)

[Bitfinex](https://github.com/zhouaini528/zb-php)

[Bittrex](https://github.com/zhouaini528/bittrex-php)

[Kraken](https://github.com/zhouaini528/kraken-php)

[Gate](https://github.com/zhouaini528/gate-php)   

[Bigone](https://github.com/zhouaini528/bigone-php)   

[Crex24](https://github.com/zhouaini528/crex24-php)   

[Bybit](https://github.com/zhouaini528/bybit-php)  

[Coinbene](https://github.com/zhouaini528/coinbene-php)   

[Bitget](https://github.com/zhouaini528/bitget-php)   

[Poloniex](https://github.com/zhouaini528/poloniex-php)

**如果没有找到你想要的交易所SDK你可以告诉我，我来加入它们。**  

#### 安装方式
```
composer require linwj/bittrex
```

支持更多的请求设置
```php
$bittrex=new Bittrex($key,$secret);

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
```

### 现货交易 API

Market related API [More](https://github.com/zhouaini528/bittrex-php/blob/master/tests/market.php)
```php
//If you have an Subaccount Id, you can fill it in
$bittrex=new Bittrex($key,$secret,$subaccount_id='');

try {
    $result=$bittrex->market()->headTrade([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->market()->getTrades([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->market()->getCandles([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->market()->getTicker([
        'marketSymbol'=>'BTC-USD'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->market()->getTickers();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->market()->headSummaries();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->market()->getSummaries();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->market()->getList();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

```

Order related API [More](https://github.com/zhouaini528/bitfinex-php/blob/master/tests/order.php)
```php
//If you have an Subaccount Id, you can fill it in
$bittrex=new Bittrex($key,$secret,$subaccount_id='');

//Place an Order
try {
    $result=$bittrex->order()->post([
        //'clientOrderId'=>'xxxxxxxx',
        'marketSymbol'=>'BTC-USD',
        'direction'=>'BUY',//BUY, SELL
        
        'type'=>'LIMIT',//LIMIT, MARKET, CEILING_LIMIT, CEILING_MARKET
        'quantity'=>'0.01',
        'limit'=>'3000',

        //GOOD_TIL_CANCELLED, IMMEDIATE_OR_CANCEL, FILL_OR_KILL, POST_ONLY_GOOD_TIL_CANCELLED, BUY_NOW
        'timeInForce'=>'FILL_OR_KILL' 
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Track the order
try {
    $result=$bittrex->order()->get([
        'orderId'=>'xxxxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

//Cancel an existing order
try {
    $result=$bittrex->order()->delete([
        'orderId'=>'xxxxxxxx'
    ]);
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}
```

Accounts related API [More](https://github.com/zhouaini528/bitfinex-php/blob/master/tests/account.php)
```php
//If you have an Subaccount Id, you can fill it in
$bittrex=new Bittrex($key,$secret,$subaccount_id='');

try {
    $result=$bittrex->account()->getl();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

try {
    $result=$bittrex->account()->getVolume();
    print_r($result);
}catch (\Exception $e){
    print_r($e->getMessage());
}

```

[More Tests](https://github.com/zhouaini528/bittrex-php/tree/master/tests)

[More API](https://github.com/zhouaini528/bittrex-php/tree/master/src/Api)
