<?php
/**
 * @author lin <465382251@qq.com>
 * */

namespace Lin\Bittrex\Api;

use Lin\Bittrex\Request;

class Market extends Request
{
    /**
     *  GET /markets
     * */
    public function gets(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/summaries
     * */
    public function getSummaries(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/summaries';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /markets/summaries
     * */
    public function headSummaries(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/markets/summaries';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/tickers
     * */
    public function getTickers(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/tickers';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /markets/tickers
     * */
    public function headTickers(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/markets/tickers';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}/ticker
     * */
    public function getTicker(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/ticker';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}
     * */
    public function get(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'];
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}/summary
     * */
    public function getSummary(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/summary';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}/orderbook
     * */
    public function getOrderbook(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/orderbook';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /markets/{marketSymbol}/orderbook
     * */
    public function headOrderbook(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/orderbook';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}/trades
     * */
    public function getTrades(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/trades';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /markets/{marketSymbol}/trade
     * */
    public function headTrade(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/trade';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}/candles
     * */
    public function getCandles(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/candles';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}/candles/{candleInterval}/recent
     * */
    public function getCandlesRecent(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/candles/'.$data['candleInterval'].'/recent';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *HEAD /markets/{marketSymbol}/candles/{candleInterval}/recent
     * */
    public function headCandlesRecent(array $data=[]){
        $this->type='HEAD';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/candles/'.$data['candleInterval'].'/recent';
        $this->data=$data;
        return $this->exec();
    }
    
    /**
     *GET /markets/{marketSymbol}/candles/{candleInterval}/historical/{year}/{month}/{day}
     * */
    public function getCandlesHistorical(array $data=[]){
        $this->type='GET';
        $this->path='/v3/markets/'.$data['marketSymbol'].'/candles/'.$data['candleInterval'].'/historical/'.$data['year'].'/'.$data['month'].'/'.$data['day'];
        $this->data=$data;
        return $this->exec();
    }
}