<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Homepage/product.latte

class Template47ab04a7087a42caf267bf82acbf91bf extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('69d0e4a7e5', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb18920efd08_content')) { function _lb18920efd08_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>                <div class="thumbnail">
                    <img class="img-responsive" src="../../images/products/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($products['photo'][$id]), ENT_COMPAT) ?>" alt="product">
                    <div class="caption-full">
                        <h4 class="pull-right"><?php echo Latte\Runtime\Filters::escapeHtml($template->number($products['prize'][$id]), ENT_NOQUOTES) ?> Kč</h4>
                        <h4><a><?php echo Latte\Runtime\Filters::escapeHtml($products['title'][$id], ENT_NOQUOTES) ?></a></h4>
                        <p><?php echo Latte\Runtime\Filters::escapeHtml($products['body'][$id], ENT_NOQUOTES) ?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right"><?php echo Latte\Runtime\Filters::escapeHtml($products['reviews'][$id], ENT_NOQUOTES) ?> reviews</p>
                        <p>
<?php for ($j=0; $j<$products['stars'][$id]; $j++) { ?>
                                    <span class="glyphicon glyphicon-star"></span>
<?php } for ($j=5; $j>$products['stars'][$id]; $j--) { ?>
                                    <span class="glyphicon glyphicon-star-empty"></span>
<?php } ?>
                            <?php echo Latte\Runtime\Filters::escapeHtml($products['stars'][$id], ENT_NOQUOTES) ?>.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php
}}