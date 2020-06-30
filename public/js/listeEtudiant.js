$(function(){
        const URL='http://localhost/sa/campus_estudiantine'
      //  const URL='http://smb.alwaysdata.net/campus';
        var tab_checkedid={};
        var tab_allId=[];
        var dataEtu=[];
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
            $('#detail_info').html(`<div class="mr-2 col">
            <div class="row"><small><b>Date n. : </b></small><small>${detail.date_naissance}</small> </div>
            <div class="row"><small><b>email : </b></small><small>${detail.email}</small> </div>
            <div class="row"><small><b>Phone : </b></small><small>${detail.telephone}</small> </div>
            <div class="row"><small><b>n. chamb : </b></small><small>${detail.numero_chambre}</small> </div>
            <div class="row"><small><b>pension : </b></small><small>${detail.pension}</small> </div>
            </div>`);
   }
   else if(detail.profil=="boursier")
   {
    $('#detail_info').html(`<div class="mr-2 col">
    <div class="row"><small><b>Date n. : </b></small><small>${detail.date_naissance}</small> </div>
    <div class="row"><small><b>email : </b></small><small>${detail.email}</small> </div>
    <div class="row"><small><b>Phone : </b></small><small>${detail.telephone}</small> </div>
    <div class="row"><small><b>pension : </b></small><small>${detail.pension}</small> </div>
    </div>`);

   }
   else
   {      
    $('#detail_info').html(`<div class="mr-2 col">
    <div class="row"><small><b>Date n. : </b></small><small>${detail.date_naissance}</small> </div>
    <div class="row"><small><b>email : </b></small><small>${detail.email}</small> </div>
    <div class="row"><small><b>Phone : </b></small><small>${detail.telephone}</small> </div>
    <div class="row"><small><b>Adresse : </b></small><small>${detail.adresse}</small> </div>
    </div>`);
   }

}
//-----------------------------------------------------
//Scroll
//--------------------------------------------------
const scrollZone=$('#scrollZone');
scrollZone.scroll(function(){
    const st = scrollZone[0].scrollTop;
    const sh = scrollZone[0].scrollHeight;
    const ch = scrollZone[0].clientHeight;

    if(sh-st <= ch ){

      //  console.log(ch+" "+st+" "+sh);
        getData(offset);
    }

});


//-----------------------------------------------------
//Afficher Montrer la navigation
//--------------------------------------------------
/*function showhidenav(offset,nbrpage)
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
}*/
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
            
            console.log(dataEtu);
            dataEtu=dataEtu.concat(data);
            // console.log(dataEtu);
            printData(data);
            offset+=5;
        }
    });

}
//---------------------------------------------------------
//DEBUT DELETE FUNCTION
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
//FIN DELETE FUNCTION
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
                        <td>${etu.profil}</td>
                        <td class="other_details text-danger" val="${id}">+</td>
                    </tr>
                `)
            });
        }

})

/*<td>${etu.date_naissance}</td>
<td>${etu.email}</td>
<td>${etu.telephone}</td>*/