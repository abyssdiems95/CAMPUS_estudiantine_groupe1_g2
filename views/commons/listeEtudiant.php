<style>
.ipt
{
    height:25px;
}
</style>        
                <h4 class="text-center">Liste des Etudiants</h4>  
            <div class="row col">  
                <div class="col">
                <table class="table" id="update_cont" >
                    <tr>
                        <td><img id="delete_elmt" src="<?=BASE_URL?>/public/images/delete_sweep-24px.svg" alt="-"/></td>
                        <td><img  src="<?=BASE_URL?>/public/images/create-24px.svg" alt="-"/></td>
                        <td>&nbsp;</td>
                    </tr>
                </table> 
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="select_etudiant" class="select_all"/></th>
                        <th>Matri.</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Date de naissance</th>
                        <th>Profile</th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><input type="text" class="form-control ipt recherche" name="search_matricule"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_nom"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_prenom"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_email"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_telephone"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_date"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_profile"/></th>
                    </tr>
                    </thead>

                    <tbody id='table'> 
                    <tr>
                        <td><input type="checkbox" name="select_etudiant" class="select_etu"/></td>
                        <td>1</td>
                        <td>BASSE</td>
                        <td>seydina</td>
                        <td>12/12/2002</td>
                        <td>seydina@gmail.com</td>
                        <td>77 777 77 77</td>
                        <td>Logé</td>
                        <td class="other_details text-danger">+</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="select_etudiant" class="select_etu"/></td>
                        <td>1</td>
                        <td>BASSE</td>
                        <td>seydina</td>
                        <td>12/12/2002</td>
                        <td>seydina@gmail.com</td>
                        <td>77 777 77 77</td>
                        <td>Logé</td>
                        <td class="other_details text-danger">+</td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="select_etudiant" class="select_etu"/></td>
                        <td>1</td>
                        <td>BASSE</td>
                        <td>seydina</td>
                        <td>12/12/2002</td>
                        <td>seydina@gmail.com</td>
                        <td>77 777 77 77</td>
                        <td>Logé</td>
                        <td class="other_details text-danger">+</td>
                    </tr>

                    <tr>
                        <td><input type="checkbox" name="select_etudiant" class="select_etu"/></td>
                        <td>1</td>
                        <td>BASSE</td>
                        <td>seydina</td>
                        <td>12/12/2002</td>
                        <td>seydina@gmail.com</td>
                        <td>77 777 77 77</td>
                        <td>Logé</td>
                        <td class="other_details text-danger">+</td>
                    </tr>
                    </tbody>
                </table>
                </div>
                <div id="div_details" class="col-2 border border-danger rounded-sm">
                <br>
                   <div class=" float-right border border-danger text-danger h5 rounded-circle p-1" id="close_details"><b>x</b></div><br><br><br>
                   <div class="col small bold"> <b>Détails Etudiants</b></div>
                   <div id="detail_info"></div>
                </div>
            </div>
            <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script>
$(function(){
        const URL='http://localhost/sa/campus_estudiantine';
        var tab_checkedid={};
        var tab_allId=[];
        var dataEtu;
        let offset=0;
        $("#div_details").hide();

        $('#close_details').on('click',function(){
             $("#div_details").hide();
        })

//tab id to remove
        var id_rm=[];
        const tbody=$("#table");
        $('#update_cont').hide();
        getData(offset);

//ouvrir les details des étudiants
    $('#table').on('click','.other_details',function(){
      //  $id=$(this).attr('id').val();
        tab = $(this).parents("tr").attr("id").split("_");
          console.log(tab);  
        printDetailsUser(tab[1]);
        $("#div_details").show();
    });
    $('#table').on("click",".select_etu",function(){

      var tab=[]
        if($(this).parents('tr').attr("id"))
        {
            tab = $(this).parents("tr").attr("id").split("_");
            //console.log(tab);
        }
        $('#update_cont').show();
        if($(this).is(':checked'))
        {
            tab_checkedid[$(this).val()]=$(this).val();
                //updateContUp();
        }else
        {
            delete  tab_checkedid[$(this).val()];
        }
    });
    $(".select_all").on("change",()=>{
        if($(".select_all").is(":checked"))
        {
           tab_checkedid={};

            for(i in tab_allId)
            {
                tab_checkedid[tab_allId[i]]=tab_allId[i]
            }
            console.log(tab_checkedid);
            $(".select_etu").prop('checked',true);
            $('#update_cont').show();
        }else
        {
            id_rm=[];
            $(".select_etu").prop('checked',false);
            $('#update_cont').hide();
        }
    });
//------------------------------
//FUNCTION DETAILS USER
//-----------------------------
function printDetailsUser(id)
{
    var detail=dataEtu[id];
   if(detail.profil=="loger")
   {
            $('#detail_info').html(`<div>
                details logé
            </div>`);
   }
   else if(detail.profil=="boursier")
   {
            $('#detail_info').html(`<div>
                details boursier
            </div>`);

   }
   else
   {      
            $('#detail_info').html(`<div>
                        details non  boursier
                    </div>`);
   }

}



//-----------------------------------------------------
//Afficher Montrer la navigation
//--------------------------------------------------
function showhidenav(offset,nbrpage)
{
	if(offset===0 || nbrpage===0)
	{
		$('#btn_precedent').hide();
	}
	else
	{
		$('#btn_precedent').show();
	}
	if((nbrpage-offset)<5)
	{

		$('#btn_suivant').hide();
	}else
	{
		$('#btn_suivant').show();
	}
}
//-----------------------------------------------------------



//-------------------------------------------------
//FUNCTION SENDDATA
//-------------------------------------------------
function getData(offs)
{
        $.ajax({
            type:"POST",
            url:`${URL}/etudiant/getListEtudiant`,
            data:{limit:5,offset:offs},
            dataType:"JSON",
            success:(data,status)=>{
                dataEtu=data;
            tbody.html('');
            console.log(data);
           printData(data);
            offset+=5;
            }
        });

}
//---------------------------------------------------------
// DELETE FUNCTION
//---------------------------------------------------------
    $("#delete_elmt").on('click',function(){
        for(x in tab_checkedid)
        {
            id_rm.push(x);
            $(`#id_${x}`).hide();

        }
        $(".select_all").prop('checked',false);
        $.ajax({
            type:"POST",
            url:`${URL}/chambre/deleteChambre`,
            data:{deleteId:id_rm},
           // dataType:"JSON",
            success:(data,status)=>{
                    if(data!=="error")
                    {
                        alert("suppression fait avec succes");
                    }
                    else
                    {
                        alert('Erreur lors de la suppression');
                    }
            } 
        });

    })

    $('#btn_suivant').on('click',function(){
        sendData(offset);
    });
    $('#btn_precedent').on('click',function(){
       offs= offset-=5;
        sendData(offs);
    });
//-------------------------------------------------------------------
// DELETE FUNCTION
//-------------------------------------------------------------------

        function printData(data)
        {
            $.each(data,function(id,etu){
                tab_allId.push(etu.id);
                tbody.append(`
                    <tr id="id_${id}">
                        <td><input type="checkbox" name="select_etudiant" class="select_etu"/></td>
                        <td>${etu.matricule}</td>
                        <td>${etu.nom}</td>
                        <td>${etu.prenom}</td>
                        <td>${etu.date_naissance}</td>
                        <td>${etu.email}</td>
                        <td>${etu.telephone}</td>
                        <td>${etu.profil}</td>
                        <td class="other_details text-danger" val="${id}">+</td>
                    </tr>
                `)
            });
        }

})

</script>