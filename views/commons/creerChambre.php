
<form class="well form-horizontal" action="Javascript:void(0) " method="post"  id="form_chambre">
<fieldset>

<!-- Form Name -->
<legend><center><h2><b>Enregistrer Chambres</b></h2></center></legend><br>

<!-- Text input-->
<!-- Success message -->
<div class="alert alert-danger" role="alert" id="alert_message">Erreur lors de l'enregistrement <i class="glyphicon glyphicon-thumbs-up"></i>!.</div>

<div class="form-group">
  <label class="col control-label">Numéro Batiment</label>  
  <div class="col inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input  name="numero_batiment" placeholder="Numero Batiment" error="error1" class="form-control requireinput"  type="number" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
    </div>
  </div>
  <small class="text-danger" id="error1"></small>
</div>


<!-- Select Basic -->

<br><div class="form-group"> 
<label class="col control-label">Type de Chambre</label>
<div class="col selectContainer">
<div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
<select name="type" class="form-control selectpicker requireinput" error="error2" style="box-shadow:1px 1px 1px #D83F3D;border-radius:7px;">
  <option value="">Type de Chambre</option>
  <option>individuel</option>
  <option>double</option>
</select>
</div>
</div>
  <small class="text-danger" id="error2"></small>
</div>


<!-- Button -->
<div class="form-group">
<label class="col control-label"></label>
<div class="col text-center"><br>
<button type="submit"  id="addChambre" name="addChambre" value="addChambre" class="btn btn-warning px-5" style="border-radius:7px;" >SUBMIT <span class="glyphicon glyphicon-send"></span></button>
</div>
</div>

</fieldset>
</form>

        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>

$(function(){
    $('#alert_message').hide();
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

    $("#form_chambre").on("submit",(event)=>{
        event.preventDefault();
       $data=$("#form_chambre").serialize();
       url="http://localhost/sa/campus_estudiantine";
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
                $.post(`${url}/chambre/ajoutChambre`,  $data ,
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
});

</script>