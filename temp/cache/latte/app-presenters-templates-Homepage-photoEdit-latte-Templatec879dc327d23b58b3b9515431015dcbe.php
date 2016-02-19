<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Homepage/photoEdit.latte

class Templatec879dc327d23b58b3b9515431015dcbe extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c1c8ebd743', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbbb2340e6d0_content')) { function _lbbb2340e6d0_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('photoEdit') ?>"><?php call_user_func(reset($_b->blocks['_photoEdit']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _photoEdit
//
if (!function_exists($_b->blocks['_photoEdit'][] = '_lb28185c166a__photoEdit')) { function _lb28185c166a__photoEdit($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('photoEdit', FALSE)
?>        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["photoEditForm"], array()) ?>

 		  	<!--- Modal-header -->
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h2 class="modal-title">Změna hlavní fotografie</h2>
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
		               	<table id="photos_setmainphoto">
<?php $counter = 0 ;$iterations = 0; foreach ($photos as $photo) { ?>
								<tr class="required">
								    <td><?php $_input = is_object($photo->id) ? $photo->id : $_form[$photo->id]; echo $_input->getControl() ?></td>
								    <td style="background-image: url(../../images/products/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($product->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($photo->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($photo->name), ENT_COMPAT) ?>
.<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($photo->extension), ENT_COMPAT) ?>);  background-position: 50% 0%; background-size: auto 120px; background-repeat: no-repeat;">
<?php if ($main_photo_id == 0) { if ($counter == 0) { ?>
								    	        <img class="icon-selected" src="../../images/icons/blue//118.png" style="display: inline-block;">
<?php } else { ?>
					                            <img class="icon-selected" src="../../images/icons/blue//118.png">
<?php } } else { if ($main_photo_id == $photo->id) { ?>
					                            <img class="icon-selected" src="../../images/icons/blue//118.png" style="display: inline-block;">
<?php } else { ?>
					                            <img class="icon-selected" src="../../images/icons/blue//118.png">
<?php } } $counter = $counter + 1 ?>
								    </td>
								</tr>
<?php $iterations++; } ?>
						</table>
						<div class="hidden">
							<?php echo $_form["id_product"]->getControl() ?>

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
if (!function_exists($_b->blocks['head'][] = '_lbce0f97ef7a_head')) { function _lbce0f97ef7a_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
    div.flash, ul.errors { margin: 0 1em 1em 1em;}
    div.hidden { display: none;}
<?php if (isset($product)) { ?>
    .panel-heading { background: #<?php echo Latte\Runtime\Filters::escapeCss($product->category->color) ?>; }
<?php } ?>
    h2.modal-title { color: #222;}

    #content table { margin: 1em auto; }
    #content td img { width: 120px; margin: 0; padding: 0; border: 0;}
    #content tr td:first-child { display:none; border-radius: 10px 0 0 10px;}
    #content input { cursor: pointer;}
    #content table tr { display: inline-block; margin: 2px; }
    #content table tr td { vertical-align: middle; text-align: center; padding: 0; width: 137px; height: 137px; }
    #content table tr.required { cursor: pointer; }
    #content table tr.required td input { vertical-align: middle; }
    #content img.icon-selected {
    	width: 50px;
    	display: none;
    }
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