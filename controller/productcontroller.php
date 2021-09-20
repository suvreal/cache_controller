<?php

Class ProductController {

    public function __construct(){
        $this->processInputId();
    }

    /** 
    * @param null
    * @return string $InputFilteredExp
    */ 
    private function processInputId(){
        if($_GET){
            if(isset($_GET['record_id']) || !empty($_GET['record_id'])){
                $InputFiltered = filter_var($_GET['record_id'], FILTER_VALIDATE_INT);
                if($InputFiltered){
                    $InputFilteredExp = filter_var($_GET['record_id'], FILTER_SANITIZE_NUMBER_INT);
                    $this->detail($InputFilteredExp);
                }else{
                    throw new Exception("Input processing problem - is not properly available");
                }
            }else{
                throw new Exception("GET input is not correct index - name");
            }
        }else{
            throw new Exception("GET variable record id is not defined");
        }
    }

    /** 
    * @param string $id 
    * @return string $data
    */ 
    private function detail($id) {

        if($id !== false){
            $handlecache = new CacheController((int)$id);
            $checkcacheexistence = $handlecache->checkCacheExistence();
            if($checkcacheexistence !== false){
                $checkcacheexistence = $handlecache->increaseCacheQuery();
                if($checkcacheexistence !== false){
                    return $checkcacheexistence; // $data
                }
            }else{
                $getdbrecord = new DatabaseController();
                $getdbrecord = $getdbrecord->getDbRecord($id); 
                $addtocache = $handlecache->cacheAdd($getdbrecord);
                if($addtocache !== false){
                    return $addtocache; //data
                }
            }
        }else{
            throw new Exception("Problem with recieving the data");
        }

    } 



} 