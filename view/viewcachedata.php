<?php

class ViewCacheData{

    /** 
    * @param string $message 
    * @param array $data 
    * @return void
    */ 
    function cacheDataWriteout($message, $data){
        echo("<hr>");
        echo($message."\n\r");
        echo("<pre>");
        print_r($data);
        echo("</pre>");
    }

}