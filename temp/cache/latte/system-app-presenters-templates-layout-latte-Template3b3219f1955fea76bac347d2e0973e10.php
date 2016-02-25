<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/@layout.latte

class Template3b3219f1955fea76bac347d2e0973e10 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f4051d300c', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb681d77e7dd_head')) { function _lb681d77e7dd_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lb40a8740310_scripts')) { function _lb40a8740310_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<!-- jQuery -->
    <script type="text/javascript" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/assets/js/jquery-1.11.3.min.js"></script>

    <!-- Nette Ajax -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>

    <!-- My Custome JavaScript -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/dp-js-functions.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/assets/js/bootstrap.min.js"></script>

    <!-- Bootstrap Galleries -->
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/assets/js/jquery.blueimp-gallery.min.js"></script>
    <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/assets/js/bootstrap-image-gallery.js"></script>

<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Roman Prchal">

	<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } echo Latte\Runtime\Filters::escapeHtml($systemName->value, ENT_NOQUOTES) ?></title>

	<!-- Favicon -->
	<link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico" rel="shortcut icon">

	<!-- Bootstrap Core CSS -->
    <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/dp-css-format.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
<?php $iterations = 0; foreach ($categories as $c) { ?>
            .product-category-<?php echo Latte\Runtime\Filters::escapeCss($c->id) ?>
 { background-color: #<?php echo Latte\Runtime\Filters::escapeCss($c->color) ?>;}
<?php $iterations++; } ?>
    </style>

	<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>
	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default"), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($systemName->value, ENT_NOQUOTES) ?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
<?php if ($user->loggedIn) { ?>
            	<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Zobrazit všechna upozornění</a>
                        </li>
                    </ul>
                </li>              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo Latte\Runtime\Filters::escapeHtml($user->identity->name, ENT_NOQUOTES) ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a data-toggle="modal" data-target="#profile_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:myProfile"), ENT_COMPAT) ?>
">
                                <i class="fa fa-fw fa-user"></i> Můj profil
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#password_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:profilePhoto"), ENT_COMPAT) ?>
">
                                <i class="fa fa-fw fa-photo"></i> Změnit foto
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#profilePhoto_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:password"), ENT_COMPAT) ?>
">
                                <i class="fa fa-fw fa-edit"></i> Změnit heslo
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a data-toggle="modal" data-target="#addProduct_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:productAddEdit"), ENT_COMPAT) ?>
">
                                <i class="fa fa-fw fa-plus"></i> Přidat aukci
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:myProducts", array('rp')), ENT_COMPAT) ?>
">
                            	<i class="fa fa-fw fa-dashboard"></i> Moje aukce
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:logout"), ENT_COMPAT) ?>
"><i class="fa fa-fw fa-power-off"></i> Odhlásit se</a>
                        </li>
                    </ul>
                </li>
<?php } else { ?>
                <li>
                    <a data-toggle="modal" data-target="#login_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:login"), ENT_COMPAT) ?>
">Přihlásit</a>
                </li>
                <li>
                    <a data-toggle="modal" data-target="#register_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:registration"), ENT_COMPAT) ?>
">Registrovat</a>
                </li>
<?php } ?>
            </ul>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Podmínky</a>
                    </li>
                    <li>
                        <a href="#">Kontakt</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Kategorie</p>
                <div class="list-group">
<?php $iterations = 0; foreach ($categories as $category) { if ($category->id == $id_category) { ?>
                    	    <a class="list-group-item active" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default", array($category->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($category->name, ENT_NOQUOTES) ?></a>
<?php } else { ?>
                            <a class="list-group-item" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default", array($category->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($category->name, ENT_NOQUOTES) ?></a>
<?php } $iterations++; } ?>
                </div>
            </div>

            <div class="col-md-9">

<?php $iterations = 0; foreach ($flashes as $flash) { ?>                <div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="', Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT), '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>

	        </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; <?php echo Latte\Runtime\Filters::escapeHtml($systemName->value, ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml(date('Y'), ENT_NOQUOTES) ?></p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- PopUp pomoci bootstrap, pro profile.latte -->
    <div id="profile_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!-- PopUp pomoci bootstrap, pro profilePhoto.latte -->
    <div id="profilePhoto_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!-- PopUp pomoci bootstrap, pro password.latte -->
    <div id="password_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!-- PopUp pomoci bootstrap, pro login.latte -->
    <div id="login_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

    <!-- PopUp pomoci bootstrap, pro register.latte -->
    <div id="register_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

    <!-- PopUp pomoci bootstrap, pro product.latte -->
    <div id="addProduct_modal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

    <!-- PopUp pomoci bootstrap, pro product.latte -->
    <div id="product_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
    </div>


<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
</body>
</html>
<?php
}}