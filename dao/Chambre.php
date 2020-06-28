<?php
 class ChambreDao extends Manager
 {

    public function __construct()
    {
        $this->tableName="chambre";
        $this->classname="Chambre";
    }

    public function add($obj)
    {
        $num_bat=$obj['numero_batiment'];
        $type=$obj['type'];
        $sql="INSERT INTO $this->tableName VALUES(DEFAULT,$num_bat,$type)";
        return $this->executeUpdate($sql)!=0;
    }

    public function update($obj)
    {
       // $sql="";
    }

    public function findAll($limit=5,$offset=0)
    {

    }



 }