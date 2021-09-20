<?php


Class DatabaseController{

    private $pdo;

    function __construct(){
        $this->pdo = DbConnect::prepareConnection();
    }

    /** 
    * @param int $rec_id 
    * @return array $getarray_cachefile
    * Get record id according to ID
    */
    public function getDbRecord($rec_id){
        if($rec_id !== false){
            $query = $this->pdo->prepare('SELECT * FROM basic_data WHERE id = :basic_data_id');
            $query->bindParam(':basic_data_id', $rec_id, PDO::PARAM_INT);
            $query->execute(); 
            $data = $query->fetchAll(PDO::FETCH_ASSOC); 
            if ($data) {
                return $data;
            }else{
                throw new Exception("Chyba při výpisu dat z databáze");
            }
        }
    }
    
}