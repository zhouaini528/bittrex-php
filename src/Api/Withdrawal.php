<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Withdrawal extends Request
{
    /**
     *  GET /withdrawals/open
     * */
    public function getOpen(array $data=[]){
        $this->type='GET';
        $this->path='/v3/withdrawals/open';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /withdrawals/closed
     * */
    public function getClosed(array $data=[]){
        $this->type='GET';
        $this->path='/v3/withdrawals/closed';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /withdrawals/ByTxId/{txId}
     * */
    public function getByTxId(array $data=[]){
        $this->type='GET';
        $this->path='/v3/withdrawals/ByTxId/'.$data['txId'];
        
        unset($data['txId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /withdrawals/{withdrawalId}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/withdrawals/'.$data['withdrawalId'];
        
        unset($data['withdrawalId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *DELETE /withdrawals/{withdrawalId}
     * */
    public function delete(array $data=[]){
        $this->type='DELETE';
        $this->path='/v3/withdrawals/'.$data['withdrawalId'];
        
        unset($data['withdrawalId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *POST /withdrawals
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/v3/withdrawals';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /withdrawals/whitelistAddresses
     * */
    public function getWhitelistAddresses(array $data=[]){
        $this->type='GET';
        $this->path='/v3/withdrawals/whitelistAddresses';
        $this->data=$data;
        return $this->exec();
    }
}