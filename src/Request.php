<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex;

use GuzzleHttp\Exception\RequestException;
use Lin\Bittrex\Exceptions\Exception;

class Request
{
    protected $key='';
    
    protected $secret='';
    
    protected $host='';
    
    protected $nonce='';
    
    protected $signature='';
    
    protected $headers=[];
    
    protected $type='';
    
    protected $path='';
    
    protected $data=[];
    
    protected $options=[];
    
    public function __construct(array $data)
    {
        $this->key=$data['key'] ?? '';
        $this->secret=$data['secret'] ?? '';
        $this->host=$data['host'] ?? '';
        
        $this->options=$data['options'] ?? [];
    }
    
    /**
     * 
     * */
    protected function auth(){
        $this->nonce();
        
        $this->signature();
        
        $this->headers();
        
        $this->options();
    }
    
    /**
     * 
     * */
    protected function nonce(){
        $this->nonce=time()*1000;
    }
    
    /**
     * 
     * */
    protected function signature(){
        if ($this->type=='POST') {
            $signature='/api'.$this->path.$this->nonce.json_encode($this->data);
            $this->signature = hash_hmac('sha384',$signature,$this->secret);
        }
    }
    
    /**
     * 
     * */
    protected function headers(){
        $this->headers= [
            'Content-Type' => 'application/json',
        ];
        
        if(!empty($this->key) || !empty($this->secret)) $this->headers=array_merge($this->headers,[
            'bfx-nonce'=>$this->nonce,
            'bfx-apikey'=>$this->key,
            'bfx-signature'=>$this->signature,
        ]);
    }
    
    /**
     * 
     * */
    protected function options(){
        $this->options=array_merge([
            'headers'=>$this->headers,
            //'verify'=>false
        ],$this->options);
        
        $this->options['timeout'] = $this->options['timeout'] ?? 60;
        
        if(isset($this->options['proxy']) && $this->options['proxy']===true) {
            $this->options['proxy']=[
                'http'  => 'http://127.0.0.1:12333',
                'https' => 'http://127.0.0.1:12333',
                'no'    =>  ['.cn']
            ];
        }
    }
    
    /**
     * 
     * */
    protected function send(){
        $client = new \GuzzleHttp\Client();
        
        $url=$this->host.$this->path;
        
        if($this->type=='GET') $url.='?'.http_build_query($this->data);
        else $this->options['body']=json_encode($this->data);
        
        $response = $client->request($this->type, $url, $this->options);
        
        return $response->getBody()->getContents();
    }
    
    /*
     * 
     * */
    protected function exec(){
        $this->auth();
        
        try {
            return json_decode($this->send(),true);
        }catch (RequestException $e){
            if(method_exists($e->getResponse(),'getBody')){
                $contents=$e->getResponse()->getBody()->getContents();
                
                $temp=json_decode($contents,true);
                if(!empty($temp)) {
                    $temp['_method']=$this->type;
                    $temp['_url']=$this->host.$this->path;
                }else{
                    $temp['_message']=$e->getMessage();
                }
            }else{
                $temp['_message']=$e->getMessage();
            }
            
            $temp['_httpcode']=$e->getCode();
            
            throw new Exception(json_encode($temp));
        }
    }
}