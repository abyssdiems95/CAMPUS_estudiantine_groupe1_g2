<?php
    class Etudiant implements ICampus
    {
        protected $id;
        protected $matricule;
        protected $prenom;
        protected $nom;
        protected $email;
        protected $telephone;
        protected $date_naissance;
        protected $pension;
        protected $numero_chambre;
        protected $adresse;
        protected $profil;

        public function __construct($row=null)
        {
            if($row!=null)
            {
                $this->hydrate($row);
            }
        }

        public function hydrate($row)
        {
            //$this->i
        }

        

        


    }