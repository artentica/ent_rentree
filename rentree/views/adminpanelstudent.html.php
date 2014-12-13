<?php
if( empty($_SESSION['identifiant']) || empty($_SESSION['admin'] )) {
	    // redirection
	   header('Location:' . url_for('/'));
	  }

?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/adminprincipal.css" type="text/css" />

<?php end_content_for();?>

<?php content_for('header'); ?>
	<div class="titre row">
		<div class="col-sm-4" >
			<img rel="logo de l'isen" class="logo" src="images/logo_ISEN.png">
		</div>

		<h1 class="col-sm-4 center" >Panel d'administration</h1>

		<h3	class="col-sm-4 school">BREST-RENNES</h3>

	</div>
	<hr>

<?php end_content_for(); ?>


<?php content_for('body'); ?>

<?php require('adminnavbar.html.php');?>

<div class="col-md-12">
            <div class="unique_div"></div>
            <table id="tablaDatos" class="table table-striped table-hover">
            <thead>
                <tr>
                    <!--<th class="col-md-1">Action</th>-->
                    <th class="col-md-2">Identifiant</th>
                    <th class="col-md-1">Nom</th>
                    <th class="col-md-1">Prenom</th>
                    <th class="col-md-1">Date d'anniversaire</th>
                    <th class="col-md-1">Téléphone</th>
                    <th class="col-md-2">Couriel</th>
                    <th class="col-md-1">Date d'enregistrement</th>
                    <th class="col-md-1">Adresse IP</th>
                    <th hidden>ID</th>

                </tr>
            </thead>
            <tbody>

<?php
    $data = DbOperation('SELECT * FROM data');
    if (empty($data)) $downdata =false;
    else $downdata =true;
    foreach($data as $key => $value){
       /* $token = explode("/", $value["ddn_fils"]);
        $date_anniv = $token[2] . "-" . $token[1] ."-" .$token[0];*/
         echo'<tr>
            <td data-type="email">'.$value["identifiant"].'</td>
            <td>'.$value["nom_fils"].'</td>
            <td>'.$value["prenom_fils"].'</td>
            <td>'.$value["ddn_fils"].'</td>
            <td data-type="number">'.$value["tel_mobile"].'</td>
            <td data-type="email">'.$value["courriel"].'</td>
            <td>'.$value["date"].'</td>
            <td>'.$value["ip"].'</td>
            <td class="Id" hidden>'.$value["id"].'</td>
        </tr>';
    }
?>

            </tbody>
        </table>
    </div>



        <!-- Modal zip rar-->
			<div class="modal fade" id="downloadstudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h4 class="modal-title" id="myModalLabel">Erreur de chargements</h4>
			      </div>
			      <div class="modal-body">
                      <p>Le chargement des informations ne s'est pas correctement effectué<br>Avez vous bien changé les information dans le fichier conf.php?</p>

			      </div>
			      <div class="modal-footer">
			      <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button>

			      </div>
			    </div>
			  </div>
			</div>


<?php end_content_for();?>


<?php content_for('footer')?>

<?php end_content_for();?>




<?php content_for('script')?>
<script src="js/pbTable.min.js"></script>
<script src="js/li_url.js"></script>
<script src="js/tdInput.js"></script>

<script>

    <?php if(!$downdata) echo '$("#myModal").modal({backdrop: true});'; ?>

//regex de pbtable à corriger avec cette ligne:   sorttable.DATE_RE = /^(\/d\/d?)[\/\.-](\/d\/d?)[\/\.-]((\/d\/d)?\/d\/d)$/;
//Remplacer le message d'erreur: No se encontraron...   par : "Pas de résultats pour cette requête"
//Remplacer Todos par Tous et Buscar par "rechercher"
    $(document).ready(function(e) {

	$('#tablaDatos').pbTable({
		selectable: true,
		sortable:true,
		toolbar:{
			enabled:true,
			filterBox:true,
			buttons:['view', 'delete']
		},
		onView:function(){
			alert('View button was pressed');
		},
		onEdit:function(){
			alert('Edit button was pressed');
		},
		onDelete:function(){
			alert('Delete button was pressed');
		}
	});

        $('#tablaDatos').ModifiedTd({
            nametd  : "unique_div",
            controleUniqueButton : true,
            modifiedtext : " Modifier",
            savetext : " Sauvegarder",
            canceltext : " Annuler",
            modifiedtitle : "Modifiez tout les champs autorisés",
            savetitle : "Sauvegardez vos modifications",
            canceltitle : "Annuler toutes vos récentes modifications",
            ToSavetext : " Valider les changements",
            ToSavetitle : "Produit une variable renvoyant tous les changements",
        });



});

active_li();
</script>

<?php end_content_for();?>
