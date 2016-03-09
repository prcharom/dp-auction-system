<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/profile.latte

class Template88acd6049c672fa17881b9ac67988fbf extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3f3ef950a7', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbe2bde45101_content')) { function _lbe2bde45101_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('profile') ?>"><?php call_user_func(reset($_b->blocks['_profile']), $_b, $template->getParameters()) ?>
</div><?php
}}

//
// block _profile
//
if (!function_exists($_b->blocks['_profile'][] = '_lb14066de27c__profile')) { function _lb14066de27c__profile($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('profile', FALSE)
?>		<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["userForm"], array()) ?>

				<div class="row">
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
		               	<table class="table table-my-grid profile-table">
			                <tbody>
			                    <tr>
			                        <td>Celé jméno:</td>
			                        <td>
			                        	<?php echo Latte\Runtime\Filters::escapeHtml($profile->name, ENT_NOQUOTES) ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Datum registrace:</td>
			                        <td>
			                        	<?php echo Latte\Runtime\Filters::escapeHtml($template->date($profile->registered_since, 'd/m/Y,  H:i \h\o\d.'), ENT_NOQUOTES) ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Datum posl. přihlášení:</td>
			                        <td>
			                        	<?php echo Latte\Runtime\Filters::escapeHtml($template->date($profile->last_login, 'd/m/Y,  H:i \h\o\d.'), ENT_NOQUOTES) ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Pohlaví:</td>
			                        <td>
			          					<?php echo Latte\Runtime\Filters::escapeHtml($profile->gender->name, ENT_NOQUOTES) ?>

			                        </td>
			                    </tr>
			                    <tr>
			                        <td>Adresa bydliště:</td>
			                        <td><?php echo Latte\Runtime\Filters::escapeHtml($profile->address, ENT_NOQUOTES) ?></td>
			                    </tr>
			                    <tr>
			                        <td>E-mail:</td>
			                        <td><?php echo Latte\Runtime\Filters::escapeHtml($profile->email, ENT_NOQUOTES) ?></td>
			                    </tr>
			                    <tr>
			                        <td>Telefonní číslo:</td>
			                        <td><?php echo Latte\Runtime\Filters::escapeHtml($profile->phone, ENT_NOQUOTES) ?></td>
			                    </tr>
			                </tbody>
		                </table>
		            </div>
		       	</div>
		<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb80793ec66e_head')) { function _lb80793ec66e_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	div.flash, ul.errors { margin: 0 1em 1em 1em;}
	.profile-table td:nth-child(2) { font-weight: 700;}
</style>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars()) ; 
}}