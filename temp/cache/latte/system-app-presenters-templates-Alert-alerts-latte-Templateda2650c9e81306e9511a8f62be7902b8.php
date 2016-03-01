<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Alert/alerts.latte

class Templateda2650c9e81306e9511a8f62be7902b8 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('6fea23ea5c', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb2cf5f6c2c6_content')) { function _lb2cf5f6c2c6_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>        <div class="row row-center row-header">
            <ul class="pagination">
                <li <?php if ($kat == 'unread') { ?>class="active"<?php } ?>>
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:alerts", array('unread')), ENT_COMPAT) ?>
">Nepřečtená</a>
                </li>
                <li <?php if ($kat == 'read') { ?>class="active"<?php } ?>>
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:alerts", array('read')), ENT_COMPAT) ?>
">Přečtená</a>
                </li>
            </ul>            
        </div>
<?php ob_start() ?>
        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["alertForm"], array()) ?>

            <div class="row">
                <ul class="alerts">
<?php $iterations = 0; foreach ($t_alerts as $alert) { ?>
                        <li class="message-preview">
                            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:detail", array($alert->id)), ENT_COMPAT) ?>
">
                                <div class="media">
                                    <span class="pull-left">
                                        <?php $_input = is_object($alert->id) ? $alert->id : $_form[$alert->id]; echo $_input->getControl() ?>

                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>
                                                <?php echo Latte\Runtime\Filters::escapeHtml($alert->type_alert->name, ENT_NOQUOTES) ?>

                                            </strong>
                                        </h5>
                                        <p class="small text-muted">
                                            <i class="fa fa-clock-o"></i> 
                                            <?php echo Latte\Runtime\Filters::escapeHtml($template->mydate($alert->added), ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($template->date($alert->added, 'H:i'), ENT_NOQUOTES) ?>

                                        </p>
                                        <p><?php echo Latte\Runtime\Filters::escapeHtml($template->truncate($alert->body, 230), ENT_NOQUOTES) ?></p>
                                    </div>
                                </div>
                            </a>
                        </li>               
<?php $iterations++; } ?>
                </ul>
                <?php echo $_form["btndel"]->getControl() ?>

                <?php echo $_form["btnvis"]->getControl() ?>

            </div>
        <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

        <!-- Pagination -->
        <div class="row row-center">
            <ul class="pagination">
                <li>
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:alerts", array($kat, 1)), ENT_COMPAT) ?>
">&laquo;</a>
                </li>
<?php for ($i = max(1,$paginator->page-2); $i <= $paginator->page-1; $i++) { ?>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:alerts", array($kat, $i)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($i, ENT_NOQUOTES) ?></a>
                    </li>
<?php } ?>
                <li class="active">
                    <a href="#"><?php echo Latte\Runtime\Filters::escapeHtml($paginator->page, ENT_NOQUOTES) ?></a>
                </li>
<?php for ($i = $paginator->page+1; $i <= min($paginator->page+2, $paginator->getPageCount()); $i++) { ?>
                    <li>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:alerts", array($kat, $i)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($i, ENT_NOQUOTES) ?></a>
                    </li>
<?php } ?>
                <li>
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:alerts", array($kat, $paginator->getLastPage())), ENT_COMPAT) ?>
">&raquo;</a>
                </li>
            </ul>
        </div>
<?php ob_start() ?>
        <div class="row row-center">
<?php if ($kat == 'read') { ?>
                Nemáte žádná přečtená upozornění.
<?php } else { ?>
                Nemáte žádná nepřečtená upozornění.
<?php } ?>
        </div>
    <?php if (isset($alert)) { ob_end_clean(); ob_end_flush(); } else { $_l->else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_l->else; } ?>


<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb5071b1f794_head')) { function _lb5071b1f794_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<style>
		.caption { overflow: hidden; padding: 9px; color: #333;}
		h4, h4 a, h4 a:hover { white-space: nowrap; color: #222;}
		h4.pull-right { margin-right: 9px;}
        .row-center { text-align: center; padding: 1em;}
        ul.alerts { list-style-type: none;}
        .alerts .message-preview { width: 100%;}
        .alerts a { display: block; color: #333; text-decoration: none; padding: 1em;}
        .alerts li a:hover, .alerts li a:focus { color: #262626; text-decoration: none; background-color: #f5f5f5;}
        .row-center { text-align: center; padding: 1em;}
        .row-header { padding-top: 0;}
        .row-header ul.pagination { margin-top: 0;}
        .row-header .pagination>li>a, .row-header .pagination>li>span { color: #555; width: 130px;}
        .row-header .pagination>li.active>a, .row-header .pagination>li.active>span { color: #fff;}
        .row .btn-primary { margin-left: 40px;}
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars()) ; 
}}