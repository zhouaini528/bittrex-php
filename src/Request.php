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
    
    protected $subaccount_id='';
    
    protected $host='';
    
    protected $nonce='';
    
    protected $signature='';
    
    protected $content_hash='';
    
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
        $this->subaccount_id=$data['subaccount_id'] ?? '';
        
        $this->options=$data['options'] ?? [];
    }
    
    /**
     * 
     * */
    protected function auth(){
        $this->nonce();
        
        $this->contentHash();
        
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
        $signature=$this->nonce.$this->host.$this->path.$this->type.$this->content_hash.$this->subaccount_id;
        $this->signature=hash_hmac('sha512',$signature,$this->secret);
    }
    
    /**
     *
     * */
    protected function contentHash(){
        $content=empty($this->data) ? '' : json_encode($this->data);
        $this->content_hash=hash('sha512', $content);
    }
    
    /**
     * 
     * */
    protected function headers(){
        $this->headers= [
            'Content-Type' => 'application/json',
            'Api-Key'=>$this->key,
            'Api-Timestamp'=>$this->nonce,
            'Api-Content-Hash'=>$this->content_hash,
            'Api-Signature'=>$this->signature,
            'Api-Subaccount-Id '=>$this->subaccount_id,
        ];
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
        
        if(in_array($this->type,['GET','HEAD'])) $url.=empty($this->data)  ? '' : '?'.http_build_query();
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