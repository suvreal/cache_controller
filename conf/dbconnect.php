<?php

class DbConnect{

    /** 
    * @param void 
    * @return object $pdo
    * Prepare connection for DB handling
    */
    public static function PrepareConnection(){

        $host = 'localhost';
        $db_name = 'product_cache'; 
        $db_username = 'root';
        $db_password = ''; 

        try
        {
            return $pdo = new PDO('mysql:host='. $host .';dbname='.$db_name, $db_username, $db_password);
        }
        catch (PDOException $e)
        {
            exit('Error Connecting To DataBase');
        }        

    }
}