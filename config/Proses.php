<?php 
class Proses{

    protected $db;
    function __construct($db){
        $this->db = $db;
    }
    function listData($sql){
        $row = $this->db->prepare($sql);
        $row->execute();
        return $row->fetchAll();
    }
        
    function showData($sql){
        $row = $this->db->prepare($sql);
        $row->execute();
        return $hasil = $row->fetch();
    }
    function sqlAction($sql){
        $row = $this->db->prepare($sql);
        return $row->execute();
    }

    

}
