<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Order extends Request
{
    /**
     *  GET /orders/closed
     * */
    public function getClosed(array $data=[]){
        $this->type='GET';
        $this->path='/v3/orders/closed';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /orders/open
     * */
    public function getOpen(array $data=[]){
        $this->type='GET';
        $this->path='/v3/orders/open';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /orders/open
     * */
    public function headOpen(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/orders/open';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /orders/{orderId}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/orders/'.$data['orderId'];
        unset($data['orderId']);
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *DELETE /orders/{orderId}
     * */
    public function delete(array $data=[]){
        $this->type='DELETE';
        $this->path='/v3/orders/'.$data['orderId'];
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *POST /orders
     * */
    public function post(array $data=[]){
        $this->type='POST';
        $this->path='/v3/orders';
        $this->data=$data;
        return $this->exec();
    }
}