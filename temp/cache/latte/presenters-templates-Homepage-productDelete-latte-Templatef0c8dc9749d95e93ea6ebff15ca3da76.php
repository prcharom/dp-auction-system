<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Homepage/productDelete.latte

class Templatef0c8dc9749d95e93ea6ebff15ca3da76 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9fd4b7b006', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbfb37c309bd_content')) { function _lbfb37c309bd_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('productDelete') ?>"><?php call_user_func(reset($_b->blocks['_productDelete']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _productDelete
//
if (!function_exists($_b->blocks['_productDelete'][] = '_lbfe75a9272c__productDelete')) { function _lbfe75a9272c__productDelete($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('productDelete', FALSE)
?>        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["productDeleteForm"], array()) ?>

 		  	<!--- Modal-header -->
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h2 class="modal-title">Mazání produktu</h2>
			</div>
			<!-- Modal-body -->
			<div class="modal-body panel-body">
				<div class="row" id="content">
				    <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>			        <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>			            <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
			        </ul> 
<?php } ?>
		            <div class="col-md-12 col-lg-12"> 
		            	<p class="warn-info">
		               		Jste si jistý, že chcete smazat <?php echo Latte\Runtime\Filters::escapeHtml($product->name, ENT_NOQUOTES) ?>?
		               	</p>
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
if (!function_exists($_b->blocks['head'][] = '_lb22f9f23d11_head')) { function _lb22f9f23d11_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
    div.flash, ul.errors { margin: 0 1em 1em 1em;}
    div.hidden { display: none;}
<?php if (isset($product)) { ?>
    .panel-heading { background: #<?php echo Latte\Runtime\Filters::escapeCss($product->category->color) ?>; }
<?php } ?>
    h2.modal-title { color: #222;}
    p.warn-info { padding: 1em .5em .5em .5em;}
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