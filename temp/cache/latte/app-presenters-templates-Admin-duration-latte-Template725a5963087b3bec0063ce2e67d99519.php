<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Admin/duration.latte

class Template725a5963087b3bec0063ce2e67d99519 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('38c12db511', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbafaca1603a_content')) { function _lbafaca1603a_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('adminDuration') ?>"><?php call_user_func(reset($_b->blocks['_adminDuration']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _adminDuration
//
if (!function_exists($_b->blocks['_adminDuration'][] = '_lb03a9130df0__adminDuration')) { function _lb03a9130df0__adminDuration($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('adminDuration', FALSE)
?>	    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["adminDurationForm"], array()) ?>

			<!--- Modal-header -->
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		    	<h2 class="modal-title">Doba trvání aukce</h2>
			</div>
			<!-- Modal-body -->
			<div class="modal-body panel-body">
				<div class="row">
			        <div class="left-panel col-md-12">
			        	<!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>					    <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>					        <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
					    </ul> 
<?php } ?>
			        	<div class="col-md-12">
						    <!-- vykresleni formu -->
						    <table class="table table-my-grid">
				                <tbody>
				                    <tr>
				                        <td>Název:</td>
				                        <td>
				                        	<?php echo $_form["name"]->getControl() ?>

				                        </td>
				                    </tr>
				                    <tr>
				                        <td>Doba trvání:</td>
				                        <td>
								        	<div class="input-group">
												<?php echo $_form["duration_days"]->getControl() ?>

												<span class="input-group-addon">dní</span>
											</div>
				                        </td>
				                    </tr>
				                </tbody>
				            </table>
				        </div>
			        </div>
		        </div>
	        </div>
	        <!-- Modal footer -->
			<div class="modal-footer panel-footer">
				<?php echo $_form["btnedit"]->getControl() ?>

				<?php if ($id != null) { echo $_form["btndelete"]->getControl() ;} ?>

			  	<input type="button" class="btn btn-default" data-dismiss="modal" value="Zavřít">
			</div>
	    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb537493b9fb_head')) { function _lb537493b9fb_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	div.mar-input { margin-bottom: 1em; width: 100%;}
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