<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/password.latte

class Template0f0749e829b904ae681e57cac05ff03e extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('910b5fd62c', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb37d1c883e0_content')) { function _lb37d1c883e0_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('password') ?>"><?php call_user_func(reset($_b->blocks['_password']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _password
//
if (!function_exists($_b->blocks['_password'][] = '_lbdbdeb250ac__password')) { function _lbdbdeb250ac__password($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('password', FALSE)
?>    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["passwordForm"], array()) ?>

    	<!--- Modal-header -->
		<div class="modal-header panel-heading">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
	    	<h2 class="modal-title">Změna hesla</h2>
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
		        	<div class="col-md-12">
					    <!-- vykresleni formu -->
					    <div class="mar-input input-group col-xs-12">
					       	<span class="input-group-addon" id="pw-oldpassword" style="width: 10em">Současné heslo</span>
					        <?php echo $_form["oldpassword"]->getControl() ?>

					    </div>
					    <div class="mar-input input-group col-xs-12">
					        <span class="input-group-addon" id="pw-password" style="width: 10em">Nové heslo</span>
					        <?php echo $_form["password"]->getControl() ?>

					    </div>
					    <div class="input-group col-xs-12">
					    	<span class="input-group-addon" id="pw-password2" style="width: 10em">Nové heslo znovu</span>
					    	<?php echo $_form["password2"]->getControl() ?>

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
if (!function_exists($_b->blocks['head'][] = '_lb72581375b6_head')) { function _lb72581375b6_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	div.mar-input { margin-bottom: 1em;}
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