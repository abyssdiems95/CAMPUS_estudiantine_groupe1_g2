        
                <h4 class="text-center">Liste des chambres</h4>
                <table class="table" id="update_cont" >

                    <tr>
                        <td><img id="delete_elmt" src="<?=BASE_URL?>/public/images/delete_sweep-24px.svg" alt="-"/></td>
                        <td><img  src="<?=BASE_URL?>/public/images/create-24px.svg" alt="-"/></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>  
                <table class="table table-hover" >

                    <thead>
                    <tr  class="bg-light">
                        <td><input type="checkbox" name="select_etudiant" class="select_all"/></td>
                        <th>Num</th>
                        <th>Num Bat</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody id='table'>
                    </tbody>
                </table>   <br>
    <br>
    <br>
    <div class="col justify-content-end pull-bottom position-absolute fixed-bottom">
        <button type="button" id="btn_precedent" name="precedent" value='nav_pre' class="btn_nav btn-sm ubtn float-left">Précédent</button>
        <button type="button" id="btn_suivant" name="suivant" value='nav_suiv' class="btn_nav btn-sm ubtn float-right">Suivant</button>
    </div>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

<script src="<?=BASE_URL?>/public/js/listeChambre.js"></script>