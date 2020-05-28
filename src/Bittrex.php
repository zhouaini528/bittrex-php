<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex;


use Lin\Bittrex\Api\Account;
use Lin\Bittrex\Api\Market;
use Lin\Bittrex\Api\Order;

class Bittrex
{
    protected $key;
    protected $secret;
    protected $subaccount_id='';
    protected $host;
    
    protected $options=[];
    
    function __construct(string $key='',string $secret='',string $subaccount_id='',string $host='https://api.bittrex.com'){
        $this->key=$key;
        $this->secret=$secret;
        $this->subaccount_id=$subaccount_id;
        $this->host=$host;
        
        if(stripos($subaccount_id,'http')===0) {
            $this->host=$subaccount_id;
            $this->subaccount_id='';
        }
    }
    
    /**
     * 
     * */
    private function init(){
        return [
            'key'=>$this->key,
            'secret'=>$this->secret,
            'subaccount_id'=>$this->subaccount_id,
            'host'=>$this->host,
            'options'=>$this->options,
        ];
    }
    
    /**
     * 
     * */
    function setOptions(array $options=[]){
        $this->options=$options;
    }
    
    /**
     * 
     * */
    function account(){
        return new Account($this->init());
    }
    
    /**
     *
     * */
    function market(){
        return new Market($this->init());
    }
    
    /**
     *
     * */
    function order(){
        return new Order($this->init());
    }
}