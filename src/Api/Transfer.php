<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Transfer extends Request
{
    /**
     *  GET /transfers/sent
     * */
    public function getSent(array $data=[]){
        $this->type='GET';
        $this->path='/v3/transfers/sent';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /transfers/received
     * */
    public function getReceived(array $data=[]){
        $this->type='GET';
        $this->path='/v3/transfers/received';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /transfers/{transferId}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/transfers/'.$data['transferId'];
        
        unset($data['transferId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *POST /transfers
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/v3/transfers';
        $this->data=$data;
        return $this->exec();
    }
}