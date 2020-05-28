<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Balance extends Request
{
    /**
     *  GET /balances
     * */
    public function getList(array $data=[]){
        $this->type='GET';
        $this->path='/v3/balances';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /balances
     * */
    public function head(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/balances';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /balances/{currencySymbol}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/balances/'.$data['currencySymbol'];
        $this->data=$data;
        return $this->exec();
    }
}