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
?>                <div class="row">

<?php $iterations = 0; foreach ($products as $p) { ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="product product-category-<?php echo Latte\Runtime\Filters::escapeHtml($p->id_category, ENT_COMPAT) ?>">
                        	<h4 class="pull-right"><?php echo Latte\Runtime\Filters::escapeHtml($template->number($p->cost), ENT_NOQUOTES) ?> Kč</h4>
                            <div class="image">
<?php if ($img = $p->related('image.id_product')->fetch()) { $img = $p->related('image.id_product')->order('order DESC')->fetch() ?>
                                    <img src="images/products/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($p->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->name), ENT_COMPAT) ?>
.<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->extension), ENT_COMPAT) ?>
" alt="<?php echo Latte\Runtime\Filters::escapeHtml($p->name, ENT_COMPAT) ?>">
<?php } else { ?>
                                    <img src="images/products/default.png" alt="<?php echo Latte\Runtime\Filters::escapeHtml($p->name, ENT_COMPAT) ?>">
<?php } ?>
                            </div>
                            <div class="caption">
                                <h4>
                                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:product", array($p->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($p->name, ENT_NOQUOTES) ?></a>
                                </h4>
                                <p><?php echo Latte\Runtime\Filters::escapeHtml($template->truncate($p->description, 85), ENT_NOQUOTES) ?></p>
                            </div>
                        </div>
                    </div>
<?php $iterations++; } ?>
                </div>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb02f68c6ec3_head')) { function _lb02f68c6ec3_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<style>
		.caption { overflow: hidden; padding: 9px; color: #333;}
		h4, h4 a, h4 a:hover { white-space: nowrap; color: #222;}
		h4.pull-right { margin-right: 9px;}
        .product { 
            display: block; 
            vertical-align: middle; 
            padding: 2px; 
            border-radius: 0px;
            margin: 0.6em; 
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.7); 
            border: none; 
            height: 260px; 
            text-align: left;
        }
        .product .image { width: 100%; height: 100px; margin: 0; padding: 0; margin-top: 1.2em; overflow-y: hidden;}
        .product .image img { width: 100%; margin-left: auto; margin-right: auto;}
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
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

<?php
}}