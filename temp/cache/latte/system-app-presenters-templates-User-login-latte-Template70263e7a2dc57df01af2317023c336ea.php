<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/login.latte

class Template70263e7a2dc57df01af2317023c336ea extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('d9db5f0ca4', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb980562ddc4_content')) { function _lb980562ddc4_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["signInForm"], array()) ?>

        <div class="left-panel col-md-6">
        		<img class="col-md-4" src="../images/web/icons/user_success.png" style="max-width: 100%">
        		<p class="col-md-8">
        			Po úspěšném přihlášení do systému se budete moci účastnit jednotlivých aukcí, nové aukce zakládat a mnoho dalšího. 
        		</p>
        		<p class="col-md-8">
        			Nemáte ještě účet? Založte si ho <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("User:registration"), ENT_COMPAT) ?>
">zde</a>. 
        		</p>
        </div>
        <div class="col-md-6">
        	<div>
	            <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>	            <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>	                <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
	            </ul> 
<?php } ?>
	            <!-- vykresleni formu -->
	            <div class="mar-input input-group col-md-9">
	                <span class="input-group-addon" id="profile_email" style="width: 7em">Nick</span>
	                <?php echo $_form["username"]->getControl() ?>

	            </div>
	            <div class="mar-input input-group col-md-9">
	                <span class="input-group-addon" id="profile_email" style="width: 7em">Heslo</span>
	                <?php echo $_form["password"]->getControl() ?>

	            </div>
	            <div class="input-group col-md-9 pad-input">
	                <?php echo $_form["remember"]->getControl() ?>

	            </div>
	        </div>
	        <div class="input-group col-md-9">
            	<?php echo $_form["send"]->getControl() ?>

        	</div>
        </div>
    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb841e155f9f_head')) { function _lb841e155f9f_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
div.mar-input { margin-bottom: 1em;}
div.pad-input { padding: 0 0 5px 0;}
label > input { float: left;}
label { color: #555; font-weight: normal;}
div .btn-primary { width: 100%;}
.left-panel img { height: 160px;}
.left-panel p { padding: 1em;}
</style>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = "../@layout-login.latte"; $_g->extended = TRUE;

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