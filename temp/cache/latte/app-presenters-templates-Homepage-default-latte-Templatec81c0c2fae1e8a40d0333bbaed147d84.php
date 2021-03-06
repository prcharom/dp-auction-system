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
?>    
<?php ob_start() ?>
        <div class="row">
<?php $iterations = 0; foreach ($products as $p) { ?>
                <div class="col-sm-4 col-lg-4 col-md-4">
                    <div class="product product-category-<?php echo Latte\Runtime\Filters::escapeHtml($p->id_category, ENT_COMPAT) ?>">
                        <h4 class="pull-right"><?php echo Latte\Runtime\Filters::escapeHtml($template->number($p->cost + $p->related('bid.id_product')->sum('deposit')), ENT_NOQUOTES) ?> Kč</h4>
<?php if ($img = $p->related('image.id_product')->fetch()) { $img = $p->related('image.id_product')->order('order DESC')->fetch() ?>
                            <div class="image" style="background-image: url(images/products/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($p->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($img->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($img->name), ENT_COMPAT) ?>
.<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::escapeCss($img->extension), ENT_COMPAT) ?>);  background-position: 50% 0%; background-size: 242px auto; background-repeat: no-repeat;"></div>
<?php } else { ?>
                            <div class="image">
                                <img src="images/products/default.png" alt="<?php echo Latte\Runtime\Filters::escapeHtml($p->name, ENT_COMPAT) ?>">
                            </div>
<?php } ?>
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
        <!-- Pagination -->
        <div class="row row-center">
            <ul class="pagination">
                <li>
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default", array($id_category, 1)), ENT_COMPAT) ?>
">&laquo;</a>
                </li>
<?php for ($i = max(1,$paginator->page-2); $i <= $paginator->page-1; $i++) { ?>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default", array($id_category, $i)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($i, ENT_NOQUOTES) ?></a>
                    </li>
<?php } ?>
                <li class="active">
                    <a href="#"><?php echo Latte\Runtime\Filters::escapeHtml($paginator->page, ENT_NOQUOTES) ?></a>
                </li>
<?php for ($i = $paginator->page+1; $i <= min($paginator->page+2,$paginator->getPageCount()); $i++) { ?>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default", array($id_category, $i)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($i, ENT_NOQUOTES) ?></a>
                    </li>
<?php } ?>
                <li>
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:default", array($id_category, $paginator->getLastPage())), ENT_COMPAT) ?>
">&raquo;</a>
                </li>
            </ul>
        </div>
<?php ob_start() ?>
        <div class="row row-center">
<?php if ($id_category == null) { ?>
                Nebyly nalezeny žádné produkty.
<?php } else { ?>
                V této kategorii nejsou zatím žádné produkty.
<?php } ?>
        </div>
    <?php if (isset($p)) { ob_end_clean(); ob_end_flush(); } else { $_l->else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_l->else; } ?>


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
        .product .image img { width: 100%; margin: 0; padding: 0; border: 0;}
        .row-center { text-align: center; padding: 1em;}
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

<?php
}}