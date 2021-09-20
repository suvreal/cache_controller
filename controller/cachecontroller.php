<?php


class CacheController{

    public $postid;
    private $cachefilepath;
    private $cachefile;

    public function __construct($postid){
        $this->postid = $postid;
        $this->cachefilepath = 'cache.json';
        if(file_exists($this->cachefilepath)){
            $this->cachefile = file_get_contents($this->cachefilepath);
        }else{
            $this->cachefile = null;
        }
        
        
    }

    /** 
    * @param void
    * @return array $getarray_cachefile[$i]
    * Increase cache load count according to ID
    */ 
    public function checkCacheExistence(){
        $cachefile = $this->cachefile;
        $getarray_cachefile = json_decode($cachefile, true);

        if(!empty($getarray_cachefile)){
            for($i = 0; $i<count($getarray_cachefile); $i++){
                foreach ($getarray_cachefile[$i] as $field => $field_elms) {
                    if($field === "id"){
                        if($field_elms === $this->postid){
                            return $getarray_cachefile[$i];
                        }
                    }
                }
            }
        }

        return false;
    }
    
    /** 
    * @param void
    * @return string $getarray_cachefile
    * Increase cache load count according to ID
    */ 
    public function increaseCacheQuery(){
        $cachefile = $this->cachefile;
        $getarray_cachefile = json_decode($cachefile, true);

        for($i = 0; $i<count($getarray_cachefile);$i++){
            if($getarray_cachefile[$i]["id"] === $this->postid){
                if($getarray_cachefile[$i]['cachecount'] === 0){
                    $getarray_cachefile[$i]['cachecount'] = 1;
                }else{
                    $getarray_cachefile[$i]['cachecount'] = $getarray_cachefile[$i]['cachecount']+1;
                }
                $getarray_cachefile_newdata = json_encode($getarray_cachefile);
                $putMyContents = file_put_contents($this->cachefilepath, $getarray_cachefile_newdata);
                if($putMyContents === FALSE ){
                    throw new Exception("Unable to put contents in cache.json");
                }else{
                    return $getarray_cachefile_newdata;
                }
            }
        }
    }


    /** 
    * @param array $data 
    * @return string $getarray_cachefile
    * Add new data to cache json file
    */ 
    public function cacheAdd($data){
        $getarray_cachefile = json_decode($this->cachefile, true);
        if(empty($getarray_cachefile)){
            $getarray_cachefile = array();
        }
        array_push($getarray_cachefile, array('id'=> (int)$data[0]["id"], 'name'=> $data[0]["name"], 'description'=> $data[0]["description"], 'keyword'=> $data[0]["keyword"], 'notes'=> $data[0]["notes"], 'cachecount' => 1));
        $putTheContents = file_put_contents($this->cachefilepath, json_encode($getarray_cachefile));
        if($putTheContents === FALSE){
            throw new Exception("Unable to put contents in cache.json");
        }else{
            return json_encode($getarray_cachefile);
        }

    }

    /** 
    * @param void
    * @return boolean
    * Truncate cache json file
    */ 
    public function cacheDelete(){
        $putTheContents = file_put_contents($this->cachefilepath, null);
        if($putTheContents === FALSE){
            throw new Exception("Unable to put contents in cache.json");
        }else{
            return true;
        }
    } 

    /** 
    * @param void
    * @return boolean
    * Prepare/create cache json file
    */ 
    public function cachePrepare(){
        if(!file_exists($this->cachefilepath)){
            return file_put_contents($this->cachefilepath, null) ? true : false;
        }
    }

    /** 
    * @param void
    * @return array $this->cachefile; 
    * Get cache json data
    */ 
    public static function cacheReturn(){
        if(file_exists("cache.json")){
            return $getarray_cachefile = json_decode(file_get_contents("cache.json"), true);
        }
       
    }

}
