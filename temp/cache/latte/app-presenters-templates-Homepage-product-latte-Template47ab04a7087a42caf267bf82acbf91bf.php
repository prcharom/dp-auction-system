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
?>                <div class="row" id="product">
                    <div class="col-sm-12 col-lg-12 col-md-12">
                        <div class="product-detail product-category-<?php echo Latte\Runtime\Filters::escapeHtml($product->id_category, ENT_COMPAT) ?>">
                            <div class="product-header">
                                <h2>
                        			<?php echo Latte\Runtime\Filters::escapeHtml($product->name, ENT_NOQUOTES) ?>

<?php if (($product->expire <= $now) && ($product->related('bid.id_product')->count() > 0)) { ?>
                                        / PRODÁNO
<?php } ?>
                                    <a data-toggle="modal" data-target="#product_edit_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:productAddEdit", array($product->id)), ENT_COMPAT) ?>
">
                                        Upravit produkt
                                    </a>
                                    <a data-toggle="modal" data-target="#product_delete_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:productDelete", array($product->id)), ENT_COMPAT) ?>
">
                                        Smazat produkt
                                    </a>
                            	</h2>
                                <div class="pub">
                                    Publikoval: <a href="#"><?php echo Latte\Runtime\Filters::escapeHtml($product->user->name, ENT_NOQUOTES) ?></a>
                                </div>
                            </div>
                            <div class="product-category">
                                Kategorie: <?php echo Latte\Runtime\Filters::escapeHtml($product->category->name, ENT_NOQUOTES) ?>

                            </div>
                            <div class="product-galery">
                                <h3>
                                    Fotografie
                                    <a data-toggle="modal" data-target="#photo_edit_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:photoEdit", array($product->id)), ENT_COMPAT) ?>
">
                                        Změnit hlavní fotografii
                                    </a>
                                    <a data-toggle="modal" data-target="#photo_delete_modal" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:photoDelete", array($product->id)), ENT_COMPAT) ?>
">
                                        Smazat fotografii
                                    </a>
                                </h3>
<?php ob_start() ?>
                                <div id="links">
<?php $i = 0 ;$iterations = 0; foreach ($product->related('image.id_product') as $img) { ?>
                                    <a href="../../images/products/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($product->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->name), ENT_COMPAT) ?>
.<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->extension), ENT_COMPAT) ?>
" title="Obrázek <?php echo Latte\Runtime\Filters::escapeHtml(++$i, ENT_COMPAT) ?>
 z <?php echo Latte\Runtime\Filters::escapeHtml($product->related('image.id_product')->count(), ENT_COMPAT) ?>" data-gallery>
                                        <img src="../../images/products/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($product->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->id), ENT_COMPAT) ?>
_<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->name), ENT_COMPAT) ?>
.<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($img->extension), ENT_COMPAT) ?>">
                                    </a>
<?php $iterations++; } ?>
                                </div>
<?php ob_start() ?>
                                    <div>
                                        K tomuto produktu zatím nebyla nahrána žádná fotografie.
                                    </div>
                                <?php if (isset($img)) { ob_end_clean(); ob_end_flush(); } else { $_l->else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_l->else; } ?>

                            </div>
                            <div class="row product-info">
                                <div class="col-sm-6 col-md-5">
                                    <h3>
                                        Informace
                                    </h3>
                                    <table>
                                        <tr>
                                            <td>Typ aukce:</td>
                                            <td title="<?php echo Latte\Runtime\Filters::escapeHtml($product->type_auction->description, ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($product->type_auction->name, ENT_NOQUOTES) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Začátek aukce:</td>
                                            <td><?php echo Latte\Runtime\Filters::escapeHtml($template->date($product->added, 'd/m/Y, h:i \h\o\d.'), ENT_NOQUOTES) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Konec aukce:</td>
                                            <td><?php echo Latte\Runtime\Filters::escapeHtml($template->date($product->expire, 'd/m/Y, h:i \h\o\d.'), ENT_NOQUOTES) ?></td>
                                        </tr> 
<?php if ($product->expire <= $now) { ?>                                        <tr>
                                            <td>Kupec:</td>
                                            <td>
<?php if ($product->related('bid.id_product')->count() > 0) { ?>
                                                    <a href="#">
                                                        <?php echo Latte\Runtime\Filters::escapeHtml($product->related('bid.id_product')->fetch()->user->name, ENT_NOQUOTES) ?>

                                                    </a>
<?php } else { ?>
                                                    -
<?php } ?>
                                            </td>
                                        </tr> 
<?php } ?>
                                    </table>
                                </div>
                                <div class="col-sm-6 col-md-7">
                                    <h3>
                                        Popis
                                    </h3>
                                    <p>
                                        <?php echo Latte\Runtime\Filters::escapeHtml($product->description, ENT_NOQUOTES) ?>

                                    </p>
                                </div>
                            </div>
                            <div class="product-description">

                            </div>
<div id="<?php echo $_control->getSnippetId('bid') ?>"><?php call_user_func(reset($_b->blocks['_bid']), $_b, $template->getParameters()) ?>
</div>                        </div>
                    </div>                       
                </div>

                <!-- PopUp pomoci bootstrap, pro productAddEdit.latte -->
                <div id="product_edit_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>

                <!-- PopUp pomoci bootstrap, pro productDelete.latte -->
                <div id="product_delete_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>

                <!-- PopUp pomoci bootstrap, pro photoEdit.latte -->
                <div id="photo_edit_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>

                <!-- PopUp pomoci bootstrap, pro photoDelete.latte -->
                <div id="photo_delete_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        </div>
                    </div>
                </div>

                <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
                <div id="blueimp-gallery" class="blueimp-gallery">
                    <!-- The container for the modal slides -->
                    <div class="slides"></div>
                    <!-- Controls for the borderless lightbox -->
                    <h3 class="title"></h3>
                    <a class="prev">‹</a>
                    <a class="next">›</a>
                    <a class="close">×</a>
                    <a class="play-pause"></a>
                    <ol class="indicator"></ol>
                    <!-- The modal dialog, which will be used to wrap the lightbox content -->
                    <div class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title"></h4>
                                </div>
                                <div class="modal-body next"></div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left prev">
                                        <i class="glyphicon glyphicon-chevron-left"></i>
                                        Zpět
                                    </button>
                                    <button type="button" class="btn btn-primary next">
                                        Další
                                        <i class="glyphicon glyphicon-chevron-right"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php
}}

//
// block _bid
//
if (!function_exists($_b->blocks['_bid'][] = '_lb96c678b3de__bid')) { function _lb96c678b3de__bid($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('bid', FALSE)
?>                                <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["bidForm"], array()) ?>

                                <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>                                <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>                                    <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
                                </ul> 
<?php } ?>
                                <div class="product-prize">
<?php if ($product->expire > $now) { ?>
                                        <?php echo $_form["send"]->getControl() ?>

<?php } ?>
                                    <div class="input-group">
                                        <span class="input-group-addon">Cena</span>
                                            <input readonly="" type="text" class="form-control" name="value" value="<?php echo Latte\Runtime\Filters::escapeHtml($template->number($product->cost), ENT_COMPAT) ?> Kč"> 
                                    </div>
                                </div>
                                <div class="hidden">
                                    <?php echo $_form["id_product"]->getControl() ?>

                                </div>
                                <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb1af9f19163_head')) { function _lb1af9f19163_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/assets/css/blueimp-gallery.min.css">
    <link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/assets/css/bootstrap-image-gallery.css">
	<style>
        .product-info .col-md-5, .product-info .col-md-7 { margin: 0; padding: 0;}
        .product-info table { margin: .5em 0 0 0; }
        .product-info table td { padding: 3px 6px;}
        .product-info table td:first-child { padding-left: 0;}
		.product-info p { overflow: hidden; padding: .5em 0 0 0; margin: 0;}
		h2, h3 { white-space: nowrap; color: #222;}
        .product-detail { height: auto; box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.7); border: none; font-size: 15px; padding: 1em; border-radius: 0px;}
        .product-detail h2 { font-size: 25px; font-weight: 700; margin: 0.5em 0 0 0;}
        .product-detail h2 a, .product-detail h2 a:hover, .product-detail h3 a, .product-detail h3 a:hover { font-size: 13px; padding: 0 0.2em; font-weight: normal; text-decoration: underline;}
        .product-detail h2 a:hover, .product-detail h3 a:hover { text-decoration: none;}
        .product-detail h3 { font-size: 20px; font-weight: 700; padding: 0; margin: 1em 0 0 0;}
        .product-detail div { margin: 0.5em 0 0 0; }
        .product-prize div.input-group span.input-group-addon { width: 7em; font-weight: 700; background: #EEE; border-color: #333;}
        .product-prize input[type=text], .product-prize input[type=submit] { background: transparent; color: #333; border-color: #333;}
        .product-prize input[type=submit] { font-weight: 700;}
        .product-prize input[type=submit]:hover { background: #eee;}
<?php if ($product->expire > $now) { ?>
            .product-prize .input-group { float: left; margin: 0 .5em 0 0;}
<?php } ?>
        .product-prize { padding: 0 0 1em 0;}
        .product-header { border-bottom: 1px solid #666;}
        .product-header, .product-galery, .product-description { 
            padding: 0 0 1em 0; 
            margin: 0 0 1em 0;
        }
        #links { margin: 0;}
        #links a, #links a:hover { display: inline-block; }
        #links img { max-height: 100px; margin-top: 1em; width: auto;}
        div.hidden { display: none;}
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