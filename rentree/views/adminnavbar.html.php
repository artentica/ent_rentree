<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
<div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav ">
        <li id="gest_promo"><a  href="<?= url_for('/adminpanel'); ?>">Gestion des documents et des promotions</a></li>
        <li id="gest_student"><a  href="<?= url_for('/adminpanelstudent'); ?>">Gestion des informations des étudiants</a></li>
      </ul>
      <a href="<?= url_for('/'); ?>" type="button" class="btn btn-danger navbar-btn navbar-right">Quitter</a>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
