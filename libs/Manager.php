<?php
    abstract class Manager implements IDao
    {
        private $pdo=null;
        protected $tableName;
        protected $className;

        private function getConnexion()
        {
            if($this->pdo==null)
            {
                try
                {
                    $this->pdo = new PDO("mysql:host=localhost;dbname=gestion_campus","root","");
                    $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                }
                catch(PDOException $ex)
                {
                    die("erreur de connexion");
                }
            }
        }

        private function closeConnexion()
        {
            if($this->pdo!=null)
            {
                $this->pdo=null;
            }
            
        }

        public function executeUpdate($sql)
        {
            $this->getConnexion();
            $nbreLigne=$this->pdo->exec($sql);
            $this->closeConnexion();
            
            return $nbreLigne;
        }

        public function executeSelect($sql)
        {
            $this->getConnexion();
            $result=$this->pdo->query($sql);
           // $data=[];

            // foreach($result as $rowBD)
            // {
            //     $data[]=new $this->className($rowBD);
            // }
            $this->closeConnexion();
            return $result->fetchAll();
        }

        public function findAll($limit=5,$offset=0)
        {   
            $sql="select * FROM $this->tableName LIMIT $limit OFFSET $offset ";
           // $sql="select * FROM $this->tableName ORDER BY `numero` DESC LIMIT $limit OFFSET $offset ";
            return $this->executeSelect($sql);

        }

        public function findById($numero)
        {
            $sql="select * from $this->tableName where `numero`=$numero";
            $data=$this->executeSelect($sql);
            return count($data)==1? $data[0]:$data;
        }

        public function delete($tab)
        {
            try
            {
                foreach($tab as $numero)
                {
                    $num=intval($numero);
                    $sql="DELETE FROM $this->tableName WHERE `numero`=$num";
                    $this->executeUpdate($sql);
                 }

                 return true;
            }
            catch(Exception $ex)
            {
                return false;
            }
        }
    } 