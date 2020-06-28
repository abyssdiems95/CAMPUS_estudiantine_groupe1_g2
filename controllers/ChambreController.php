<?php 
    define('ERROR',"error");
class ChambreController extends Controller
{
    public function __construct()
    {
        $this->folder="commons";
        $this->layout="default";
        //$this->validator = new Validator();

    }

    public function listeChambre()
    {
        $this->view="listeChambre";
        $this->render();

    }

    public function ajoutChambre()
    {
       if($_POST)
       {
            if(empty($_POST['numero_batiment']) || empty($_POST['type']))
            {
                echo json_encode(array('error'=>" veuillez remplir les champs"));
            }
            else
            {
               // extract($_POST);
                $this->dao=new ChambreDao();
                $result=$this->dao->add($_POST);
               if($result)
               {
                   echo "success";
               }
               else
               {
                   echo "error";
               }
            }
       }
       else 
       {
            $this->view="creerChambre";
            $this->render();
       }
    }

    function liste()
    {
        $this->dao=new ChambreDao();
        $limit=2;
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

    function deleteChambre()
    {
       if(!empty($_POST))
       {
            $this->dao=new ChambreDao();
            $result=$this->dao->delete($_POST['deleteId']);
            var_dump($result);
            if($result)
            {
                echo "success";
            }
            else
            {
                echo "error";
            }
       }else
       {
           echo "error";
       }
    }
}