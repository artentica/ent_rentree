<?php
if( empty($_SESSION['identifiant']) || empty($_SESSION['admin'] )) {
	    // redirection
	   header('Location:' . url_for('/'));
	  }

?>

<?php content_for('link')?>

<link rel="stylesheet" href="css/adminprincipal.css" type="text/css" />
<link rel="stylesheet" href="css/adminPanel.css" type="text/css" />
<link rel="stylesheet" href="css/dropzone.css" type="text/css" />
<!-- <link rel="stylesheet" href="css/animate.css" type="text/css" /> -->

<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" />


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

<div class="row">

	<div class="col-md-4">

        <ul class="nav nav-tabs nav-justified">
        	<li id="promotionsList" class="active"><a class="btn" data-toggle="tab">Liste des promotions</a></li>
        </ul>

    <div class="newPromo">
        <div class="col-md-6">
        	<input id="promotionName" class="form-control" placeholder="Nouvelle promotion">
    	</div>
    	<div class="col-md-3">
        	<select id="ANumber" class="form-control">
        		<option>_A1 </option>
        		<option>_A2 </option>
        		<option>_A3 </option>
        		<option>_A4 </option>
        		<option>_A5 </option>
        	</select>
    	</div>
    	<div class="col-md-3">
        	<button id="bouton_AjouterPromo" title="Ajouter une promotion" class="btn generation_element_to_change btn-success" style="display: inline-block;">
        		<span class="glyphicon glyphicon-saved" aria-hidden="true"> Valider</span>
        	</button>
    	</div>
    	</div>


    	<?php echo generatePromosHTMLTable(); ?>
    </div>

    <div class="col-md-8">

        <ul class="nav nav-tabs nav-justified">
        	<li id="documentsList" class="active"><a class="btn" data-toggle="tab">Tous les documents</a></li>
        	<li id="promotionSelected"><a class="btn" data-toggle="tab">Documents de la promo sélectionnée</a></li>
        	<li id="dropzone"><a class="btn" data-toggle="tab">Ajouter des documents</a></li>
        	<li id="suppr_modif_file"><a class="btn" data-toggle="tab">Modifier le rang des fichiers</a></li>
        	<li id="rename_file"><a class="btn" data-toggle="tab">Renommer/Attribuer/Supprimer fichiers</a></li>
        </ul>
        <div  id="documentsList_content">



        <div class="tree well">
        <?php
             $listdoc = liste_doc();
            echo '<li><span class="glyphicon glyphicon-folder-open" aria-hidden="true">  PDF</span><ul>';
            foreach ($listdoc as $key => $value) {
                $genericClass = "";
                if($value["promo"] == "") {
                    $genericClass = "generic";
                }

                if($value["promo"] == "" || (!strstr($value["fichier"], "A12") && !strstr($value["fichier"], "A345"))) {
                    echo '<li promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file '.$genericClass.'" ><span class="glyphicon glyphicon-file" aria-hidden="true">  '. $value["fichier"] .'</span></li>';
                }
            }
            echo '<li class="A12" ><span class="glyphicon glyphicon-folder-open" aria-hidden="true">  A12</span><ul>';
             foreach ($listdoc as $key => $value) {
                if(strstr($value["fichier"], "A12")) {
                    echo '<li promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file" ><span class="glyphicon glyphicon-file" aria-hidden="true">  '. substr($value["fichier"], 4).'</span></li>';

                }
            }
            echo '</ul></li>';


             echo '<li class="A345"><span class="glyphicon glyphicon-folder-open" aria-hidden="true">  A345</span><ul>';
             foreach ($listdoc as $key => $value) {
                if(strstr($value["fichier"], "A345")) {
                    echo '<li promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file" ><span class="glyphicon glyphicon-file" aria-hidden="true">  '. substr($value["fichier"], 5).'</span></li>';

                }
            }
            echo '</ul></li>';

            echo '</ul></li>';

        ?>

</div>

    </div>
    <div id="dropzonediv">
       <p>Pour placer un fichier dans un dossier renommer le fichier: nomDuDossier-_-nomDuFichier , les "-_-" servent de séparateurs.</p>
        <form action="<?=url_for('/admin/upload'); ?>" class="dropzone dz-clickable" id="demo-upload">
<div class="dz-default dz-message"><span>Drop files here to upload</span></div></form>
    </div>
    <div id="suppr_modif_file_div">

                <div id="register" style="text-align:center;" class="alert alert-success alert-dismissible fade in" role="alert">
				<button type="button" class="close">
				<span onclick="$('#register').hide();" >x</span>
				<span class="sr-only">Close</span></button>
				<span class="glyphicon glyphicon-ok" aria-hidden="true">&nbsp;</span>
				<span class="sr-only">Success:</span>
				Les informations ont été correctement enregistrées
				</div>

    <div class="col-md-1 col-md-offset-1">
        <button  onclick="saveRank()" id="saveRank" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Sauvegarder</button>
         <button id="redoRank" class="btn btn-info" onclick="redoRank()" data-dismiss="modal" aria-hidden="true">Renuméroter les rangs</button>
    </div>
    <div class="col-md-6 col-md-offset-1">
        <ul id="sortable">
        <?php
        foreach ($listdoc as $key => $value) {
                $genericClass = "";
                if($value["promo"] == "") {
                    $genericClass = "generic";
                }

                if($value["promo"] == "" || (!strstr($value["fichier"], "A12") && !strstr($value["fichier"], "A345"))) {
                    echo '<li promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file '.$genericClass.' ui-state-default" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"><span class="rank">  '. $value["rang"] .'</span>  <span class="name_file">'. $value["fichier"] .'</span></span></li>';
                }

                if(strstr($value["fichier"], "A12")) {
                    echo '<li promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file ui-state-default" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"><span class="rank">  '. $value["rang"] .'</span>  <span class="name_file">'. substr($value["fichier"], 4).'</span></span></li>';

                }

                if(strstr($value["fichier"], "A345")) {
                    echo '<li promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file ui-state-default" ><span class="glyphicon glyphicon-resize-vertical" aria-hidden="true"><span class="rank">  '. $value["rang"] .'</span>  <span class="name_file">'. substr($value["fichier"], 5).'</span></span></li>';

                }
            }
        ?>

</ul>
    </div>
</div>
   <div id="rename_file_div">

    <table id="tablefile" class="table table-striped table-hover">
            <thead>
                <tr>
                    <!--<th class="col-md-1">Action</th>-->
                    <th hidden>ID</th>
                    <th class="col-md-5 col-md-offset-2">Fichier</th>
                    <th class="col-md-3">Promotion</th>
                    <th class="col-md-3">Bouton de contrôle</th>
                </tr>
            </thead>
            <tbody>
               <?php


                function createinput($promotion){
                    $input= "<select disabled class='selestProm form-control'><option>";
                    $promo = liste_promo();
                    foreach($promo as $key => $prom) {
                        $input .= "<option";
                        if ($prom==$promotion) $input.=" selected ";
                        $input.=">";
                        $input.= $prom;
                        $input .= "</option>";
                    }
                        $input .= "</select>";
                        return $input;
                }


                foreach ($listdoc as $key => $value) {
                $genericClass = "";
                if($value["promo"] == "") {
                    $genericClass = "generic";
                }
                echo '<tr>';
               if($value["promo"] == "" || (!strstr($value["fichier"], "A12") && !strstr($value["fichier"], "A345"))) {
                    echo '<td class="IdFile" hidden>'. $value['id'] .'</td><td promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file '.$genericClass.' ui-state-default" >  <span class="name_file">'. $value["fichier"] .'</span></span></td><td>'. createinput($value["promo"]) .'</td><td><button title="Modifier le nom et la promotion du fichier" onclick="modifiedpromoname(this)" class="modified_button_promo btn-primary btn"><span class="glyphicon glyphicon-pencil"></span></button><button title="Sauvegarder les changements" onclick="savemodifpromo(this)" class="save_button_promo btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span></button><button title="Annuler les changements" onclick="cancelmodifpromo(this)" class="cancelmodifpromoinput btn btn-danger"><span class="glyphicon glyphicon-ban-circle"></span></button><button title="Supprimer le fichier" onclick="deletefilepromo(this)" class="deletefileprom btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></button></td>';
                }

                if(strstr($value["fichier"], "A12")) {
                    echo '<td class="IdFile" hidden>'. $value['id'] .'</td><td promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file ui-state-default" >  <span class="file_path" disabled>'. substr($value["fichier"],0, 4).'</span>  <span class="name_file">'. substr($value["fichier"], 4).'</span></span></td><td>'. createinput($value["promo"]) .'</td><td><button title="Modifier le nom et la promotion du fichier" onclick="modifiedpromoname(this)" class="modified_button_promo btn-primary btn"><span class="glyphicon glyphicon-pencil"></span></button><button title="Sauvegarder les changements" onclick="savemodifpromo(this)" class="save_button_promo btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span></button><button title="Annuler les changements" onclick="cancelmodifpromo(this)" class="cancelmodifpromoinput btn btn-danger"><span class="glyphicon glyphicon-ban-circle"></span></button><button title="Supprimer le fichier" onclick="deletefilepromo(this)" class="deletefileprom btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></button></td>';

                }

                if(strstr($value["fichier"], "A345")) {
                    echo '<td class="IdFile" hidden>'. $value['id'] .'</td><td promos="'.$value["promo"].'" id="file_'.$value["id"].'" class="file ui-state-default" >  <span class="file_path" disabled>'. substr($value["fichier"],0, 5).'</span><span class="name_file">'. substr($value["fichier"], 5).'</span></span></td><td>'. createinput($value["promo"]) .'</td><td><button title="Modifier le nom et la promotion du fichier" onclick="modifiedpromoname(this)" class="modified_button_promo btn-primary btn"><span class="glyphicon glyphicon-pencil"></span></button><button title="Sauvegarder les changements" onclick="savemodifpromo(this)" class="save_button_promo btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span></button><button title="Annuler les changements" onclick="cancelmodifpromo(this)" class="cancelmodifpromoinput btn btn-danger"><span class="glyphicon glyphicon-ban-circle"></span></button><button title="Supprimer le fichier" onclick="deletefilepromo(this)" class="deletefileprom btn btn-danger"><span class="glyphicon glyphicon-remove-sign"></span></button></td>';

                }
                echo '</tr>';
            }?>
            </tbody>
       </table>
   </div>
    </div>

</div>

        <!-- Modal Suppr promo-->
                    <div class="modal fade" id="supprPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Suppression de promotion</h4>
                          </div>
                          <div class="modal-body">
                              <p><span class="glyphicon glyphicon-exclamation-sign"></span>  Attention aucune récupération n'est possible après la suppression</p>

                          </div>
                          <div class="modal-footer">
                          <button id="deletePromoOnly" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Supprimer promotion</button>
                          <button id="deletePromoAndFiles" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Supprimer promotion et fichiers associés</button>
                          <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Annuler</button>

                          </div>
                        </div>
                      </div>
                    </div>


                    <!-- Modal Suppr file-->
                    <div class="modal fade" id="supprFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Suppression de fichier</h4>
                          </div>
                          <div class="modal-body">
                              <p><span class="glyphicon glyphicon-exclamation-sign"></span>  Attention aucune récupération n'est possible après la suppression</p>

                          </div>
                          <div class="modal-footer">
                          <button onclick="supprConfirm()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Supprimer le fichier</button>
                          <button onclick="$('.toSuppr').removeClass('toSuppr')" class="btn btn-info" data-dismiss="modal" aria-hidden="true">Annuler</button>

                          </div>
                        </div>
                      </div>
                    </div>

        <!-- Modal Modif promo-->
                    <div class="modal fade" id="modifPromo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modification de promotion</h4>
                          </div>
                          <div class="modal-body">
                              <p>Vous pouvez modifier le nom de la promotion</p>
                              <div class="row">
                              <div class=" col-md-6 col-md-offset-1"><input  id="promotionNameinput" class="form-control"></div>
                              <div class=" col-md-4"><select  id="ANumberinput" class="form-control">
                                <option value="_A1">_A1</option>
                                <option value="_A2">_A2</option>
                                <option value="_A3">_A3</option>
                                <option value="_A4">_A4</option>
                                <option value="_A5">_A5</option>
                            </select></div>
                              </div>
                          </div>
                          <div class="modal-footer">
                          <button id="editPromo" class="btn btn-success" data-dismiss="modal" aria-hidden="true">Sauvegarder</button>
                          <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Annuler</button>

                          </div>
                        </div>
                      </div>
                    </div>


<?php end_content_for();?>


<?php content_for('footer')?>

<?php end_content_for();?>




<?php content_for('script')?>

<script src="js/li_url.js"></script>
<script src="js/dropzone.js"></script>
<script src="js/jquery-ui.js"></script>
<script>




    function ModifPromo(){
        var promoId = $("#bouton_ModifierPromo").parent().attr('id');
        var promoName = $("#"+promoId).html();
        var tmp = promoName.split("<a");
        promoName = tmp[0];
        var splittedName = promoName.substr(0, promoName.length-3);
        var splittedPromo = promoName.substr(promoName.length-3, promoName.length);

        $('#promotionNameinput').attr("value", splittedName);
        $('#ANumberinput').attr("value", splittedPromo).val(splittedPromo);
        $("#modifPromo").modal({backdrop: true});

        $("#editPromo").click(function() {
            var newName=$('#promotionNameinput').val()+$('#ANumberinput').val();
            alert(newName);
            editPromo(promoName, newName);
        });
    }

    function SupprPromo(){
        var promoId = $("#bouton_SupprimerPromo").parent().attr('id');
        $("#supprPromo").modal({backdrop: true});

        $("#deletePromoOnly").click(function() {
            delPromo(promoId, "remove");
        });

        $("#deletePromoAndFiles").click(function() {
            delPromo(promoId, "removeAll");
        });
    }

    active_li();


    Dropzone.options.myAwesomeDropzone = {
  maxFilesize:50, // MB
    acceptedFiles: "application/pdf"

};


    /*TREE JS*/
    $(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Vous pouvez fermer cette arborescence');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Vous pouvez ouvrir cette arborescence').addClass('glyphicon-folder-close').removeClass('glyphicon-folder-open');
        } else {
            children.show('fast');
            $(this).attr('title', 'Vous pouvez fermer cette arborescence').addClass('glyphicon-folder-open').removeClass('glyphicon-folder-close');
        }
        e.stopPropagation();
    });
        $('.tree li.parent_li .file').on('click', function (e) {
            if($(this).offsetParent().hasClass("A12")){
                $(".A345 li").hide('fast');
                 $(".generic").hide('fast');
                $(".A12 li").show('fast');
            }
            else if($(this).offsetParent().hasClass("A345")){
                 $(".A12 li").hide('fast');
                $(".generic").hide('fast');
                $(".A345 li").show('fast');
            }
            else {
                $(".A12 li").hide('fast');
                 $(".A345 li").hide('fast');
                $(".PDF>li").show('fast');

            }

        });

});


//DRAG AND DROP
    $(function() {
        $( "#sortable" ).sortable({
            axis: "y",
            cursor: "move",
            opacity: 0.9,
            change: function( event, ui ) {

            }

        });
        $( "#sortable" ).disableSelection();
  });

    function saveRank(){
        value = redoRank();
        $.ajax({
            type: "POST",
            url: "<?=url_for('/admin/BDD_file_rank'); ?>",
            data: {list:value},
        }).success(function(data){
                $("#register").show();
            }).error(function(){
                alert(tdpersonnalised.errorMsgFunction);
            });
    }

   function redoRank(){
       var rank =0;
       var value ='[';
        $("#suppr_modif_file_div li").each(function(index , element){
            if($(element).css("display") != 'none'){
                rank++;
                value += '{';
                value += '"name":"';
                value += $(element).children().children(".name_file").text() + '",';

                value += '"rank":"';
                value += rank + '"';
                $(element).children().children(".rank").text("");
                $(element).children().children(".rank").append("  "+rank);
                value += '},';
            }
        });
       value = value.substring(0, value.length-1);
       value +="]";
       return value;
   }
$("#register").hide();
$("#documentsList").click();

    function modifiedpromoname(elem){

        id = $(elem).parent().parent().children(".IdFile").text();
        $(elem).hide();
        $(elem).parent().children(".deletefileprom").hide();

        $(".modified_button_promo").attr('disabled', 'disabled');
        $(".deletefileprom").attr('disabled', 'disabled');
        $(elem).parent().children(".save_button_promo").show();
        $(elem).parent().children(".cancelmodifpromoinput").show();
        $(elem).parent().children().removeAttr("disabled");

        $(elem).parent().parent().children().children(".selestProm").removeAttr("disabled");


        select = $(elem).parent().parent().children().children(".selestProm").val();

        value = $(elem).parent().parent().children().children(".name_file").text();
       $(elem).parent().parent().children().children(".name_file").text("");
        $(elem).parent().parent().children().children(".name_file").append("<input class='form-control' value='"+ value +"'>");




    }

    function savemodifpromo(elem){
        $(".modified_button_promo").show();
        $(".deletefileprom").show();
         $(".deletefileprom").removeAttr("disabled");
        $(".modified_button_promo").removeAttr("disabled");
        $(".save_button_promo").hide();

        $(elem).parent().parent().children().children(".selestProm").attr('disabled', 'disabled');
        var temp='';
        $(".cancelmodifpromoinput").hide();
        value = '';
        value += $(elem).parent().parent().children().children(".file_path").text() + $(elem).parent().parent().children().children(".name_file").children().val();
        temp +=$(elem).parent().parent().children().children(".name_file").children().val();
        $(elem).parent().parent().children().children(".name_file").text("");
        $(elem).parent().parent().children().children(".name_file").append(temp);
        select = $(elem).parent().parent().children().children(".selestProm").val();


         $.ajax({
            type: "POST",
            url: "<?=url_for('/admin/file_update'); ?>",
            data: "value="+value+"&select="+select + "&id="+id,
        }).success(function(data){
               $(elem).parent().parent().animate({backgroundColor:'#9cd69c'}, 400 );
             $(elem).parent().parent().animate({backgroundColor:''}, 400 );
            }).error(function(){
                alert(tdpersonnalised.errorMsgFunction);
            });


        value ='';
        select ='';
        id = '';
        temp='';


    }

    function cancelmodifpromo(elem){
        $(".modified_button_promo").show();
        $(".deletefileprom").show();
         $(".deletefileprom").removeAttr("disabled");
        $(".modified_button_promo").removeAttr("disabled");
        $(".save_button_promo").hide();
        $(".cancelmodifpromoinput").hide();
        $(elem).parent().parent().children().children(".selestProm").attr('disabled', 'disabled');

        if($(elem).parent().parent().children().children(".selestProm").val() != select){
            $(elem).parent().parent().children().children(".selestProm").children("selected").removeAttr("selected");
            $(elem).parent().parent().children().children(".selestProm").val(select).attr("selected");
        }

        $(elem).parent().parent().children().children(".name_file").text("");
        $(elem).parent().parent().children().children(".name_file").append(value);
        value ='';
        select ='';
        id = '';


    }

    function deletefilepromo(elem){

        $("#supprFile").modal({backdrop: true});

        $(elem).parent().parent().addClass("toSuppr");



    }

    function supprConfirm(){
        value ='';
        elem = $('.toSuppr').children("td").children("button.deletefileprom");
        value += $(elem).parent().parent().children().children(".file_path").text() + $(elem).parent().parent().children().children(".name_file").text();
        id = $(elem).parent().parent().children(".IdFile").text();

        $.ajax({
            type: "POST",
            url: "<?=url_for('/admin/file_suppr'); ?>",
            data: "id="+id+"&value="+value,
        }).success(function(data){

            }).error(function(){
                alert(tdpersonnalised.errorMsgFunction);
        });
        $('.toSuppr').removeClass("toSuppr");
        $(elem).parent().parent().hide("fast");
        value='';
        id='';
    }
    $(".save_button_promo").hide();
    $(".cancelmodifpromoinput").hide();
</script>

<?php end_content_for();?>
