<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Currency extends Request
{
    /**
     *  GET /currencies
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/currencies';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /currencies/{symbol}
     * */
    public function getVolume(array $data=[]){
        $this->type='GET';
        $this->path='/v3/currencies/'.$data['symbol'];
        
        unset($data['symbol']);
        $this->data=$data;
        return $this->exec();
    }
}