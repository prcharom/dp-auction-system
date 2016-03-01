<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/login.latte

class Template70263e7a2dc57df01af2317023c336ea extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('d9db5f0ca4', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb980562ddc4_content')) { function _lb980562ddc4_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('sign') ?>"><?php call_user_func(reset($_b->blocks['_sign']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _sign
//
if (!function_exists($_b->blocks['_sign'][] = '_lb68cbcaaf7d__sign')) { function _lb68cbcaaf7d__sign($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('sign', FALSE)
?>    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["signInForm"], array()) ?>

    	<!--- Modal-header -->
		<div class="modal-header panel-heading">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
	    	<h2 class="modal-title">Přihlášení</h2>
		</div>
		<!-- Modal-body -->
		<div class="modal-body panel-body">
			<div class="row">
		        <div class="left-panel col-md-12">
		        	<!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>				    <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>				        <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
				    </ul> 
<?php } ?>
		        	<img class="col-md-4" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/web/icons/user_success.png" style="max-width: 100%">
		        	<div class="col-md-8 mar-input">
		        		Po úspěšném přihlášení do systému se budete moci účastnit jednotlivých aukcí, nové aukce zakládat a mnoho dalšího. 
		        	</div>
		        	<div class="col-md-8">
					    <!-- vykresleni formu -->
					    <div class="mar-input input-group col-xs-12">
					       	<span class="input-group-addon" id="login-username" style="width: 8em">Nick</span>
					        <?php echo $_form["username"]->getControl() ?>

					    </div>
					    <div class="mar-input input-group col-xs-12">
					        <span class="input-group-addon" id="login-password" style="width: 8em">Heslo</span>
					        <?php echo $_form["password"]->getControl() ?>

					    </div>
					    <div class="input-group col-xs-12">
					    	<?php echo $_form["remember"]->getControl() ?>

					    </div>
			        </div>
		        </div>
	        </div>
        </div>
        <!-- Modal footer -->
		<div class="modal-footer panel-footer">
			<?php echo $_form["send"]->getControl() ?>

		  	<input type="button" class="btn btn-default" data-dismiss="modal" value="Zavřít">
		</div>
    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb841e155f9f_head')) { function _lb841e155f9f_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	div.mar-input { margin-bottom: 1em;}
	label { color: #555; font-weight: normal;}
	input[type=checkbox] { float: left; margin-right: 5px;}
</style>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = "../@layout-modal.latte"; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
// ?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars()) ; 
}}