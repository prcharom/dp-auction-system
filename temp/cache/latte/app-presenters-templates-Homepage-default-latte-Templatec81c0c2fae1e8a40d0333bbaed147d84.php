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
?>                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="images/posters/poster1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/posters/poster2.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="images/posters/poster3.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">

<?php for ($i=0; $i<count($products['title']); $i++) { ?>
                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="images/products/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($products['photo'][$i]), ENT_COMPAT) ?>
" alt="<?php echo Latte\Runtime\Filters::escapeHtml($products['title'][$i], ENT_COMPAT) ?>">
                            <div class="caption">
                                <h4 class="pull-right"><?php echo Latte\Runtime\Filters::escapeHtml($template->number($products['prize'][$i]), ENT_NOQUOTES) ?> CZK</h4>
                                <h4>
                                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:product", array($i+1)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($products['title'][$i], ENT_NOQUOTES) ?></a>
                                </h4>
                                <p><?php echo Latte\Runtime\Filters::escapeHtml($products['body'][$i], ENT_NOQUOTES) ?></p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right"><?php echo Latte\Runtime\Filters::escapeHtml($products['reviews'][$i], ENT_NOQUOTES) ?> reviews</p>
                                <p>
<?php for ($j=0; $j<$products['stars'][$i]; $j++) { ?>
                                    <span class="glyphicon glyphicon-star"></span>
<?php } for ($j=5; $j>$products['stars'][$i]; $j--) { ?>
                                    <span class="glyphicon glyphicon-star-empty"></span>
<?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
<?php } ?>

                    <div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                        <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

<?php
}}