<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Auction/bid.latte

class Templatefc99af43cd811411ccba062fbccf03c6 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('edc58e86f4', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb8fe0d79c60_content')) { function _lb8fe0d79c60_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('bid') ?>"><?php call_user_func(reset($_b->blocks['_bid']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _bid
//
if (!function_exists($_b->blocks['_bid'][] = '_lb1635280e77__bid')) { function _lb1635280e77__bid($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('bid', FALSE)
?>        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["bidForm"], array()) ?>

 		  	<!--- Modal-header -->
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h2 class="modal-title">Aukce</h2>
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
<?php if ($product->id_type_auction == 1) { ?>
		            		<table class="auction">
		            			<tr>
		            				<td>Název produktu:</td>
		            				<td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($product->name, ENT_COMPAT) ?>" readonly=""></td>
		            			</tr>
		            			<tr>
		            				<td>Cena produktu:</td>
		            				<td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($template->number($product->cost), ENT_COMPAT) ?>" readonly=""> Kč</td>
		            			</tr>
		            		</table>
<?php } else { ?>
		            		<table class="auction">
		            			<tr>
		            				<td>Název produktu:</td>
		            				<td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($product->name, ENT_COMPAT) ?>" readonly=""></td>
		            			</tr>
		            			<tr>
		            				<td>Současná cena:</td>
		            				<td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($template->number($product->cost + $product->related('bid.id_product')->sum('deposit')), ENT_COMPAT) ?>" readonly=""> Kč</td>
		            			</tr>
		            			<tr>
		            				<td>Navýšit cenu o:</td>
		            				<td><?php echo $_form["deposit"]->getControl() ?> Kč</td>
		            			</tr>
		            		</table>
<?php } ?>
		            </div>
		       	</div>
			</div>
			<div class="hidden">
				<?php echo $_form["id_product"]->getControl() ?>

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
if (!function_exists($_b->blocks['head'][] = '_lba9fdbe0beb_head')) { function _lba9fdbe0beb_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	b { margin: 0; padding: 0; font-weight: 700;} 
    div.flash, ul.errors { margin: 0 1em 1em 1em;}
    div.hidden { display: none;}
<?php if (isset($product)) { ?>
    .panel-heading { background: #<?php echo Latte\Runtime\Filters::escapeCss($product->category->color) ?>; }
<?php } ?>
    h2.modal-title { color: #222;}
    table.auction input { width: 240px;}
    table.auction td { padding: 3px 6px;}
    table.auction td:first-child { padding-left: 0;}
    table.auction td:nth-child(2) input { display: inline-block;}
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