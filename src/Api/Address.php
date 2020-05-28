<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Address extends Request
{
    /**
     *  GET /addresses
     * */
    public function getList(array $data=[]){
        $this->type='GET';
        $this->path='/v3/addresses';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *POST /addresses
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/v3/addresses';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /addresses/{currencySymbol}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/addresses/'.$data['currencySymbol'];
        
        unset($data['currencySymbol']);
        $this->data=$data;
        return $this->exec();
    }
}