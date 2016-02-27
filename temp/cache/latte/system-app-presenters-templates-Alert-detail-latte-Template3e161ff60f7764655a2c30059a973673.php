<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Alert/detail.latte

class Template3e161ff60f7764655a2c30059a973673 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('ab6c63be5c', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbf2cf249017_content')) { function _lbf2cf249017_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>		<div class="row">
            <ul class="alerts">
                <li class="message-preview">
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Alert:detail", array($t_alert->id)), ENT_COMPAT) ?>
">
                        <div class="media">
                            <div class="media-body">
                                <h5 class="media-heading">
                                    <strong>
                                        <?php echo Latte\Runtime\Filters::escapeHtml($t_alert->type_alert->name, ENT_NOQUOTES) ?>

                                    </strong>
                                </h5>
                                <p class="small text-muted">
                                    <i class="fa fa-clock-o"></i> 
                                    <?php echo Latte\Runtime\Filters::escapeHtml($template->mydate($t_alert->added), ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($template->date($t_alert->added, 'H:i'), ENT_NOQUOTES) ?>

                                </p>
                                <p><?php echo Latte\Runtime\Filters::escapeHtml($t_alert->body, ENT_NOQUOTES) ?></p>
                            </div>
                        </div>
                    </a>
                </li>                
            </ul>                      
        </div>				
<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb6bd46f2787_head')) { function _lb6bd46f2787_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><style>
		div.flash, ul.errors { margin: 0 1em 1em 1em;}
	    .row-center { text-align: center; padding: 1em;}
        ul.alerts { list-style-type: none;}
        .alerts .message-preview { width: 100%;}
        .alerts a { display: block; color: #333; text-decoration: none; padding: 1em;}
        .alerts li a:hover, .alerts li a:focus { color: #262626; background-color: #f5f5f5;}
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