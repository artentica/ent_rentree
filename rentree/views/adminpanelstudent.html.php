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


                <table id="tablaDatos" class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">Nro</th>
                    <th class="col-md-2">Super-Héroe</th>
                    <th class="col-md-8">Descripcin</th>
                    <th class="col-md-2">Nro</th>
                    <th class="col-md-2">Super-Héroe</th>
                    <th class="col-md-8">Descripcin</th>
                    <th class="col-md-2">Nro</th>
                    <th class="col-md-2">Super-Héroe</th>
                    <th hidden>Sexo</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Batman</td>
                    <td>Hombre murcielago. Puede pasar toda la noche sin dormir. Vive en ciudad Gotica</td>
                    <td hidden>Hombre</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Robin</td>
                    <td>Es el ayudante de Batman.</td>
                    <td hidden>Hombre</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Superman</td>
                    <td>Es un hombre comun, pero tiene super-poderes. Puede volar. Es novio de Luisa Lane</td>
                    <td hidden>Hombre</td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>El Zorro</td>
                    <td>Superheroe latinoamericano. Es en realidad Don Diego de La Vega. Es muy astuto.</td>
                    <td hidden>Hombre</td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>Chapulin colorado</td>
                    <td>Más ágil que una tortuga, más noble que una lechuga... su escudo es un corazón.</td>
                    <td hidden>Hombre</td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>Wonder Woman</td>
                    <td>Es una chica. Usa culotte muy grande y tiene un lazo.</td>
                    <td hidden>Mujer</td>
                </tr>
            </tbody>
        </table>


<?php end_content_for();?>


<?php content_for('footer')?>

<?php end_content_for();?>




<?php content_for('script')?>
<script src="js/pbTable.min.js"></script>
<script src="js/li_url.js"></script>

<script>
    $(document).ready(function(e) {
	$('#tablaDatos').pbTable({
		selectable: true,
		sortable:true,
		toolbar:{
			enabled:true,
			filterBox:true,
			tags:[
				  {
					display:'Todos',
					toSearch:''
				  },
				  {
					display:'Batman',
					toSearch:'batman'
				  },
				  {
					display:'CH',
					toSearch:'Chapulin colorado'
				  },
				  {
					display:'Hombre',
					toSearch:'Hombre'
				  },
				  {
					display:'Mujer',
					toSearch:'Mujer'
				  },
				],
			buttons:['view', 'edit', 'delete']
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
});

active_li();
</script>

<?php end_content_for();?>
