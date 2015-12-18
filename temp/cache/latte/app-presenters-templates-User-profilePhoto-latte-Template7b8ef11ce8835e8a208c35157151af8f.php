<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/profilePhoto.latte

class Template7b8ef11ce8835e8a208c35157151af8f extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6d59d80b63', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb3a9e44849c_content')) { function _lb3a9e44849c_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>		<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["uploadProfilePhotoForm"], array()) ?>

		  	<!--- Modal-header -->
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h2 class="modal-title">Změna profilové fotografie</h2>
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
		            <div class="col-md-3 col-lg-3 " align="center"> 
<?php if ($profile->photo == null) { ?>
		            		<img alt="<?php echo Latte\Runtime\Filters::escapeHtml($profile->nick, ENT_COMPAT) ?>
" src="images/web/icons/user_<?php if ($profile->id_gender == 2) { ?>fe<?php } ?>male.png" class="img-circle img-responsive"> 
<?php } else { ?>
		            		<img alt="<?php echo Latte\Runtime\Filters::escapeHtml($profile->nick, ENT_COMPAT) ?>
" src="images/profiles/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($profile->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($profile->photo), ENT_COMPAT) ?>" class="img-circle img-responsive"> 
<?php } ?>
		            </div>
		            <div class=" col-md-9 col-lg-9 "> 
		                <?php echo $_form["img"]->getControl() ?>

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
if (!function_exists($_b->blocks['head'][] = '_lbbdc68574cd_head')) { function _lbbdc68574cd_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	ul.errors { margin: 0 1em 1em 1em;}
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