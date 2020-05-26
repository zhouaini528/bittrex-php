<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Account extends Request
{
    /**
     *  GET /account
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/account';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /account/volume
     * */
    public function getVolume(array $data=[]){
        $this->type='GET';
        $this->path='/v3/account/volume';
        $this->data=$data;
        return $this->exec();
    }
}