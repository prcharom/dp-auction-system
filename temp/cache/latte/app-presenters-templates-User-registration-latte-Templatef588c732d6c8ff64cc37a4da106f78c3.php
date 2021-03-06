<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/registration.latte

class Templatef588c732d6c8ff64cc37a4da106f78c3 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('39b946b71d', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lba80d47a2f8_content')) { function _lba80d47a2f8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('registration') ?>"><?php call_user_func(reset($_b->blocks['_registration']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _registration
//
if (!function_exists($_b->blocks['_registration'][] = '_lbe67f738358__registration')) { function _lbe67f738358__registration($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('registration', FALSE)
?>    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["userForm"], array()) ?>

        <!--- Modal-header -->
		<div class="modal-header panel-heading">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
	    	<h2 class="modal-title">Registrace</h2>
		</div>
		<!-- Modal-body -->
		<div class="modal-body panel-body">
			<div class="row pad-input-2s">
	            <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>	            <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>	                <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
	            </ul> 
<?php } ?>
	            <!-- vykresleni formu -->
	            <div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-nick" style="width: 8em">Nick</span>
	                <?php echo $_form["nick"]->getControl() ?>

	            </div>
	            <div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-password" style="width: 8em">Heslo</span>
	                <?php echo $_form["password"]->getControl() ?>

	            </div>
	            <div class="mar-input-2x input-group col-xs-12">
	            	<span class="input-group-addon" id="reg-password-2" style="width: 8em">Heslo znovu</span>
	                <?php echo $_form["password2"]->getControl() ?>

	            </div>
	           	<div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-name" style="width: 8em">Celé jméno</span>
	                <?php echo $_form["name"]->getControl() ?>

	            </div>
	           	<!-- radio gender -->
	            <div class="mar-input-2x row">
<?php $iterations = 0; foreach ($form['id_gender']->items as $key => $label) { ?>
		            <div class="col-xs-6">
			            <div class="reg-radio input-group">
			              	<span class="input-group-addon">
			                	<input<?php $_input = $_form["id_gender"]; echo $_input->getControlPart($key)->attributes() ?>>
			              	</span>
			              	<input type="text" value="<?php echo Latte\Runtime\Filters::escapeHtml($label, ENT_COMPAT) ?>" class="form-control" readonly>
			            </div>
			        </div>
<?php $iterations++; } ?>
		        </div>
		        <!-- / radio gender -->
	           	<div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-address" style="width: 8em">Adresa</span>
	                <?php echo $_form["address"]->getControl() ?>

	            </div>
	           	<div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-phone" style="width: 8em">Telefon</span>
	                <?php echo $_form["phone"]->getControl() ?>

	            </div>
	           	<div class="input-group col-xs-12">
	                <span class="input-group-addon" id="reg-email" style="width: 8em">E-mail</span>
	                <?php echo $_form["email"]->getControl() ?>

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
if (!function_exists($_b->blocks['head'][] = '_lb78b0d38cc5_head')) { function _lb78b0d38cc5_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	div.mar-input { margin-bottom: 1em;}
	div.mar-input-2x { margin-bottom: 2.5em;}
	div.pad-input-2s { padding: 0 1em;}
	div.pad-input { padding: 0 0 5px 0;}
	.reg-radio .input-group-addon { padding: 9px 12px 5px 12px;}
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