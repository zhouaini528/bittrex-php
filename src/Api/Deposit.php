<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Deposit extends Request
{
    /**
     *  GET /deposits/open
     * */
    public function getOpen(array $data=[]){
        $this->type='GET';
        $this->path='/v3/deposits/open';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /deposits/open
     * */
    public function headOpen(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/deposits/open';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /deposits/closed
     * */
    public function getClosed(array $data=[]){
        $this->type='GET';
        $this->path='/v3/deposits/closed';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /deposits/ByTxId/{txId}
     * */
    public function getByTxId(array $data=[]){
        $this->type='GET';
        $this->path='/v3/deposits/ByTxId/'.$data['txId'];
        
        unset($data['txId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /deposits/{depositId}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/deposits/'.$data['depositId'];
        
        unset($data['depositId']);
        $this->data=$data;
        return $this->exec();
    }
}