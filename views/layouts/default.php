<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .nav-link
        {
            font-weight:bold;
            color: #D83F3D;
            /* color:  rgba(68, 99, 159, 0.5); */
        }

        .recherche
        {
            background-image:url("<?=BASE_URL?>/public/images/search-24px.svg") ;
            background-repeat:no-repeat;
            background-position:95%;
        }
        .logo
        {
            color:#D83F3D;
            /* color: rgba(68, 99, 159, 0.9); */
        }
        
        .container_page
        {
            background-color:rgba(68, 99, 159, 0.08);
        }
    </style>
  </head>
  <body class="">

    <div class="container small font-weight-bold">
        <div class="row col justify-content-between my-3">
            <div class="logo float-left"> 
                        <img style="width:50px;height:50px;" src="<?=BASE_URL?>/public/images/apartment-24px.svg" alt="ghj"/>
                CAMPUS SOCIAL
            </div>
            <div class="col-4"> <input type="text" name="recherche" class="form-control recherche rounded-pill" value="" placeholder="etudiant"/></div>
            <div>&nbsp;</div>
        </div>
        <div class="row"  >
            <div class="col-2">
                <!-- Links -->
                <ul class="navbar-nav small mt-5" >
                    <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>/etudiant/ajoutEtudiant">
                        <img src="<?=BASE_URL?>/public/images/add_box-24px.svg" alt="-"/>
                        <!-- <img style="width:50px;height:50px;" src="public/images/apartment-24px.svg" alt="ghj"/> -->
                        AJOUT ETUDIANT
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>/etudiant/listeEtudiant">

                        <img src="<?=BASE_URL?>//public/images/ballot-24px.svg" alt="-"/>
                        LISTE ETUDIANTS
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?=BASE_URL?>//chambre/ajoutChambre">

                        <img src="<?=BASE_URL?>//public/images/add_box-24px.svg" alt="-"/>
                            AJOUT CHAMBRE
                    </a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link" href="<?=BASE_URL?>/chambre/listeChambre">               
                        <img  src="<?=BASE_URL?>/public/images/ballot-24px.svg" alt="-"/>
                        LISTE CHAMBRE
                    </a>
                    </li>
                </ul>
            </div>

            <div class="col-10 container_page" id="container_page" style="min-height:400px;"> 
                    <?php echo $content_for_layout;?>
            </div>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
   
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
  </body>
  <script src="./public/js/jquery.js" ></script>
</html>