<?php
 class EtudiantDao extends Manager
 {

    public function __construct()
    {
        $this->tableName="etudiants";
        $this->classname="Etudiant";
    }

    public function add($obj)
    {
        /*$num_bat=intval($obj['numero_batiment']);
        $type=$obj['type'];
        $sql="INSERT INTO $this->tableName VALUES(DEFAULT,$num_bat,'$type')";
        return $this->executeUpdate($sql)!=0;*/
       return "add methode";
    }

    public function update($obj)
    {
       // $sql="";
    }

    // public function findAll()
    // {
    //     $sql="select * from $this->tableName";
    //     $data=$this->executeSelect($sql);
    //     if(count($data)==0){
    //           return null;
    //     }
    //     return count($data)==1?$data[0]:$data;
    // }



 }