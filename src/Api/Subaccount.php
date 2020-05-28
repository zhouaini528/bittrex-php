<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Subaccount extends Request
{
    /**
     *  GET /subaccounts
     * */
    public function getList(array $data=[]){
        $this->type='GET';
        $this->path='/v3/subaccounts';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *POST /subaccounts
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/v3/subaccounts';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /subaccounts/{subaccountId}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/subaccounts/'.$data['subaccountId'];
        
        unset($data['subaccountId']);
        $this->data=$data;
        return $this->exec();
    }
}