<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class ConditionalOrder extends Request
{
    /**
     *  GET /conditional-orders/{conditionalOrderId}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/conditional-orders/'.$data['conditionalOrderId'];
        
        unset($data['conditionalOrderId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *DELETE /conditional-orders/{conditionalOrderId}
     * */
    public function delete(array $data=[]){
        $this->type='DELETE';
        $this->path='/v3/conditional-orders/'.$data['conditionalOrderId'];
        
        unset($data['conditionalOrderId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /conditional-orders/closed
     * */
    public function getClosed(array $data=[]){
        $this->type='GET';
        $this->path='/v3/conditional-orders/closed';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /conditional-orders/open
     * */
    public function getOpen(array $data=[]){
        $this->type='GET';
        $this->path='/v3/conditional-orders/open';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *POST /conditional-orders
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/v3/conditional-orders';
        $this->data=$data;
        return $this->exec();
    }
}