<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Homepage/default.latte

class Templatec81c0c2fae1e8a40d0333bbaed147d84 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('7dbc37fb9e', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb13520a9f1b_content')) { function _lb13520a9f1b_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="banner">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
</div>

<div id="content">
	<p><?php echo Latte\Runtime\Filters::escapeHtml($var, ENT_NOQUOTES) ?></p>
</div>
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb8280f45c18_title')) { function _lb8280f45c18_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<h1><i class="fa fa-calendar-plus-o"></i> Aukční systém</h1>
<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb02f68c6ec3_head')) { function _lb02f68c6ec3_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
	html { overflow-y: scroll; }
	body { font: 14px/1.65 Verdana, "Geneva CE", lucida, sans-serif; background: #3484d2; color: #333; margin: 38px auto; max-width: 940px; min-width: 420px; }


	img { border: none; }

	a { color: #006aeb; padding: 3px 1px; }

	a:hover, a:active, a:focus { background-color: #006aeb; text-decoration: none; color: white; }

	#banner { background: yellow; padding: 0.5em 1em; border: 1px solid #eff4f7;
    border-radius: 12px 12px 0 0;}

	#content { background: white; border: 1px solid #eff4f7; border-radius: 0 0 12px 12px; padding: 10px 4%; overflow: hidden; }
	#content > h2 { font-size: 130%; color: #666; clear: both; padding: 1.2em 0; margin: 0; }

	h2 span { color: #87A7D5; }
	h2 a { text-decoration: none; background: transparent; }

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