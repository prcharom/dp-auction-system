<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Admin/category.latte

class Template5fbcf0c74f47e2b8c65f89196479fe72 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('9422824160', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbc936312be0_content')) { function _lbc936312be0_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb757190cdd7_head')) { function _lb757190cdd7_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>

</style>
<?php
}}

//
// end of blocks
//

// template extending

$_l->extends = "../@layout-admin.latte"; $_g->extended = TRUE;

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