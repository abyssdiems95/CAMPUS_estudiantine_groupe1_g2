<html>
    <head>
        <title>
            Enregistrer Etudiant
        </title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="creerEtudiant.css">
</head>
<body>

<div class="container">

<form class="well form-horizontal" action=" " method="post"  id="form_etudiant">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Enregistrer Etudiants</b></h2></center></legend><br>
<!-- Success message -->
<div class="alert alert-danger"id="messaage_erreur" role="alert" id="success_message"> <i class="glyphicon glyphicon-thumbs-up"></i>Erreur lors de l'enregistrement</div>

<!-- Text input-->

<div class="form-group">
<label class="col control-label">Nom</label>  
<div class="col inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input  name="nom" placeholder="Nom" class="form-control requireinput"  type="text" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col control-label" >Prenom</label> 
<div class="col inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="prenom" placeholder="Prenom" class="form-control requireinput"  type="text" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
</div>
</div>
</div>

<!-- Text input-->

<div class="form-group">
<label class="col control-label" >Date de naissance</label> 
<div class="col inputGroupContainer">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input name="date_naissance" placeholder="Date de naissance" class="form-control requireinput" type="text" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
</div>
</div>
</div>

<!-- Text input-->
   <div class="form-group">
<label class="col control-label">E-mail</label>  
<div class="col inputGroupContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input name="email" placeholder="E-mail Address" class="form-control requireinput" type="text" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
</div>
</div>
</div>

<!-- Text input-->
   
<div class="form-group">
<label class="col control-label">Numero.</label>  
<div class="col inputGroupContainer">
<div class="input-group">
<input name="numero" placeholder="( 77)" class="form-control requireinput" type="text" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
</div>
</div>
</div>

<!-- Select Basic -->

<div class="form-group"> 
<label class="col control-label">Profil</label>
<div class="col selectContainer">
<div class="input-group">
<select name="profil" id="profil" class="form-control selectpicker" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
  <option value="">Type D'étudiant</option>
  <option value="boursier">Etudiant Boursier</option>
  <option value="nonBoursier">Etudiant Non-Boursier</option>
  <option value="loger">Etudiant Loger</option>
</select>
</div>
</div>
</div>
<div id="content_profil">

</div>

<!-- Button -->
<div class="form-group">
<label class="col-md-4 control-label"></label>
<div class="col text-center"><br>
<button type="submit" class="btn btn-warning" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspSUBMIT <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
</div>
</div>

</fieldset>
</form>
</div>
</div><!-- /.container -->
</body>

</html>
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>

$(function(){
        $('#messaage_erreur').hide();
      $valInput=$(".requireinput");

      //effacer les erreurs
        for (let input of $valInput) {
        input.addEventListener("change", function (e) {
            if (e.target.hasAttribute("error")) {
                var idDivError = e.target.getAttribute("error");
                document.getElementById(idDivError).innerText = "";
            }
        })
    }

    $("#form_etudiant").on("submit",(event)=>{
        event.preventDefault();
       $data=$("#form_etudiant").serialize();
       url="http://localhost/campus_estudiantine";
       var error=false;

        for (let input of $valInput) {
                    var idDivError = input.getAttribute("error");
                    if (!input.value) {
                        //alert(input)
                        document.getElementById(idDivError).innerHTML= 'veuillez mettre une valeur';
                         
                        error = true;
                    }
            }

          if(!error){
                $.post(`${url}/etudiante/ajoutEtudiant`,  $data ,
                   function(data, status){
                         if(data.trim()!="error"){
                             console.log(data);
                            
                             window.location.replace(`${url}/chambre/listeChambre`)
                         }else{
                          //alert('erreur d');
                            $("#alert_message").show();
                         }
                   // 
                  });   
          } 

    });

    $("#profil").on("change",()=>{
        
            $("#content_profil").html("");

        $profil=$("#profil").val();
        $selectPension= `<div class="form-group"> 
                            <label class="col control-label">Pension</label>
                            <div class="col selectContainer">
                                <div class="input-group">
                                <select name="pension" id="pension" class="form-control selectpicker" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
                                    <option value="20000">Demi bourse</option>
                                    <option value="400000">Bourse entiere</option>
                                </select>
                                </div>
                            </div>
                        </div>`;
        if($profil=="boursier")
        {
            $("#content_profil").html($selectPension);
        }else if($profil=="nonBoursier")
        {
            $("#content_profil").html(getInput());
        }else if($profil=="loger")
        {
            $("#content_profil").html($selectPension);
            nameInput="numeroChambre"
            $("#content_profil").append(getInput(nameInput,"number"));
        }
    });
});
function getInput(name="adresse",type="text")
{

        var input=`<div class="form-group">
                <label class="col control-label">${name}</label>  
                    <div class="col inputGroupContainer">
                        <div class="input-group">
                             <input name="${name}" placeholder="${name}" class="form-control requireinput" type="${type}" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
                        </div>
                    </div>
                </div>`;
                return input;
}
</script>

