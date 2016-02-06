<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Homepage/productAddEdit.latte

class Template174b878c50ee698c325ab15d6ed7d83f extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('72986dd5df', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbf14f26e814_content')) { function _lbf14f26e814_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('product') ?>"><?php call_user_func(reset($_b->blocks['_product']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _product
//
if (!function_exists($_b->blocks['_product'][] = '_lb89cc03a1d3__product')) { function _lb89cc03a1d3__product($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('product', FALSE)
?>        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["productForm"], array()) ?>

 		  	<!--- Modal-header -->
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h2 class="modal-title">Produkt</h2>
			</div>
			<!-- Modal-body -->
			<div class="modal-body panel-body">
				<div class="row">
				    <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>			        <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>			            <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
			        </ul> 
<?php } ?>
		            <div class="col-md-12 col-lg-12"> 
		               	<table class="table table-prod-information">
			                <tbody>
			                 	<tr>
			                        <td>Název:</td>
			                        <td>
			                        	<?php echo $_form["name"]->getControl() ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Kategorie:</td>
			                        <td>
			                        	<?php echo $_form["id_category"]->getControl() ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Fotografie:</td>
			                        <td>
			                        	<?php echo $_form["img"]->getControl() ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Popis:</td>
			                        <td>
			                        	<?php echo $_form["description"]->getControl() ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Cena:</td>
			                        <td>
			                        	<?php echo $_form["cost"]->getControl() ?>

			                        </td>
			                    </tr>
			                </tbody>
		                </table>
		            </div>
		       	</div>
			</div>
			<div class="hidden">
				<?php echo $_form["id"]->getControl() ?>

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
if (!function_exists($_b->blocks['head'][] = '_lb9073966982_head')) { function _lb9073966982_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
    div.flash, ul.errors { margin: 0 1em 1em 1em;}
    div.hidden { display: none;}
<?php if (isset($product)) { ?>
    .panel-heading { background: #<?php echo Latte\Runtime\Filters::escapeCss($product->category->color) ?>; }
<?php } ?>
    h2.modal-title { color: #222;}
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