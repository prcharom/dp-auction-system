<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/prihlaseni.latte

class Template91abe8d6f7d442c4d5278f878599d144 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('992dc7f48e', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb66f52036e9_content')) { function _lb66f52036e9_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["signInForm"], array()) ?>

        <div>
            <h2>
                Přihlášení
            </h2>
        </div>
        <div>
            <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>            <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>                <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
            </ul> 
<?php } ?>
            <!-- vykresleni formu -->
            <div class="mar-input input-group col-xs-6">
                <span class="input-group-addon" id="profile_email" style="width: 7em">Nick</span>
                <?php echo $_form["username"]->getControl() ?>

            </div>
            <div class="mar-input input-group col-xs-6">
                <span class="input-group-addon" id="profile_email" style="width: 7em">Heslo</span>
                <?php echo $_form["password"]->getControl() ?>

            </div>
            <div class="input-group col-xs-6">
                <?php echo $_form["remember"]->getControl() ?>

            </div>
        </div>
        <div>
            <?php echo $_form["send"]->getControl() ?>

        </div>
    <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb2a3d3c8023_head')) { function _lb2a3d3c8023_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
div.mar-input {
    margin-bottom: 1em;
}
label > input {
    float: left;
}
label {
    color: #555;
    font-weight: normal;
}
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars()) ; 
}}