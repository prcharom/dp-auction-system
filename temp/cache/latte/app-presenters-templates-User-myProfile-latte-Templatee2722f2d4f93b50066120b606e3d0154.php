<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/myProfile.latte

class Templatee2722f2d4f93b50066120b606e3d0154 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('83430b0916', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbcf49f7c7bf_content')) { function _lbcf49f7c7bf_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('profile') ?>"><?php call_user_func(reset($_b->blocks['_profile']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _profile
//
if (!function_exists($_b->blocks['_profile'][] = '_lb75cf60604d__profile')) { function _lb75cf60604d__profile($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('profile', FALSE)
?>		<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["userForm"], array()) ?>

		  	<!--- Modal-header -->
			<div class="modal-header panel-heading">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h2 class="modal-title">Můj profil</h2>
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
" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/images/web/icons/user_<?php if ($profile->id_gender == 2) { ?>fe<?php } ?>male.png" class="img-circle img-responsive"> 
<?php } else { ?>
		            		<img alt="<?php echo Latte\Runtime\Filters::escapeHtml($profile->nick, ENT_COMPAT) ?>
" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/images/profiles/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($profile->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($profile->photo), ENT_COMPAT) ?>" class="img-circle img-responsive"> 
<?php } ?>
		            </div>
		            <div class=" col-md-9 col-lg-9 "> 
		               	<table class="table table-my-grid">
			                <tbody>
			                    <tr>
			                        <td>Nick:</td>
			                        <td>
			                        	<input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($profile->nick, ENT_COMPAT) ?>" readonly>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Celé jméno:</td>
			                        <td>
			                        	<?php echo $_form["name"]->getControl() ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Datum registrace:</td>
			                        <td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($template->date($profile->registered_since, 'd/m/Y  H:i'), ENT_COMPAT) ?> hod." readonly></td>
			                    </tr>
			                    <tr>
			                        <td>Datum posl. přihlášení:</td>
			                        <td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($template->date($profile->last_login, 'd/m/Y  H:i'), ENT_COMPAT) ?> hod." readonly></td>
			                    </tr>
			                    <tr>
			                        <td>Pohlaví:</td>
			                        <td>
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
			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Adresa bydliště:</td>
			                        <td><?php echo $_form["address"]->getControl() ?></td>
			                    </tr>
			                    <tr>
			                        <td>E-mail:</td>
			                        <td><?php echo $_form["email"]->getControl() ?></td>
			                    </tr>
			                    <tr>
			                        <td>Telefonní číslo:</td>
			                        <td><?php echo $_form["phone"]->getControl() ?></td>
			                    </tr>
			                </tbody>
		                </table>
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
if (!function_exists($_b->blocks['head'][] = '_lb508df5e238_head')) { function _lb508df5e238_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	div.flash, ul.errors { margin: 0 1em 1em 1em;}
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