<style>
.ipt
{
    height:25px;
}
#scrollZone
{
    max-height:299px;
    overflow:scroll;
}
</style>        
                <h4 class="text-center">Liste des Etudiants</h4>  
            <div class="row col">  
                <div class="col" id="scrollZone">
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
                       <!-- <th>Email</th>
                        <th>Telephone</th>->
                        <th>Date de naissance</th>-->
                        <th>Profile</th>
                    </tr>
                    <tr>
                        <th>&nbsp;</th>
                        <th><input type="text" class="form-control ipt recherche" name="search_matricule"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_nom"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_prenom"/></th>
                        <!--<th><input type="text" class="form-control ipt recherche" name="search_email"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_telephone"/></th>
                        <th><input type="text" class="form-control ipt recherche" name="search_date"/></th>-->
                        <th><input type="text" class="form-control ipt recherche" name="search_profile"/></th>
                    </tr>
                    </thead>
                    <tbody id='table'> 
                   <!-- <tr>
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
                    </tr>-->
                    </tbody>
                </table>
                </div>
                <div id="div_details" class="col-3 border border-danger rounded-sm">
                <br>
                   <div class=" float-right border border-danger text-danger h5 rounded-circle p-1" id="close_details"><b>x</b></div><br><br><br>
                   <div class="col b "> <b>Détails Etudiants</b></div>
                   <br>
                   <div id="detail_info"></div>
                </div>
            </div>
            <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
            <script src="<?=BASE_URL?>/public/js/listeEtudiant.js"></script>
