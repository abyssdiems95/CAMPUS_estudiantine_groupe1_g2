<?php 
class EtudiantController extends Controller
{
    public function __construct()
    {
        $this->folder="commons";
        $this->layout="default";
       // $this->validator = new Validator();

    }

    public function listeEtudiant()
    {
        $this->view="listeEtudiant";
        $this->render();

    }

    public function ajoutEtudiant()
    {
       // $this->folder=""
       $this->view="creerEtudiant";
       $this->render();
    }

    public function getListEtudiant()
    {
        $this->dao=new EtudiantDao();
        $limit=5;
        $offset=0;
        if(isset($_POST['limit']))
        {
            $limit=intval($_POST['limit']);
        }
        if(isset($_POST['offset']))
        {
            $offset=intval($_POST['offset']);
        }
        $result=$this->dao->findAll($limit,$offset);

        echo json_encode($result);
    }
}