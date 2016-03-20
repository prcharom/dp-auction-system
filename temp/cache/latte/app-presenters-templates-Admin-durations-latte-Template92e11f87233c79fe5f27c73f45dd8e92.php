<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Admin/durations.latte

class Template92e11f87233c79fe5f27c73f45dd8e92 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('ae0485e0a4', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbe30e9e5efc_content')) { function _lbe30e9e5efc_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;ob_start() ?>
        <div class="flash">
            Zde se definují jednotlivé doby trvání aukce. Tyto doby pak smí uživatelé aukčního systému využívat. 
        </div>
            <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["adminDeleteDurationForm"], array()) ?>

                <div class="row dur">
                    <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>                    <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>                        <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
                    </ul>
<?php } ?>
                    <!-- vykresleni tabulky -->
                    <table class="dur">
                    <tr>
                        <th></th>
                        <th>Název</th>
                        <th colspan="3">Doba trvání</th>
                    </tr>
<?php $iterations = 0; foreach ($durs as $d) { ?>
                            <tr>
                                <td>
                                    <?php $_input = is_object($d->id) ? $d->id : $_form[$d->id]; echo $_input->getControl() ?>

                                </td>
                                <td>
                                	<?php echo Latte\Runtime\Filters::escapeHtml($d->name, ENT_NOQUOTES) ?>

                                </td>
                                <td>
                                    <?php echo Latte\Runtime\Filters::escapeHtml($d->duration_days, ENT_NOQUOTES) ?> dní
                                </td>
                                <td>	
                                	<a data-toggle="modal" data-target="#admin_reload" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Admin:duration", array($d->id)), ENT_COMPAT) ?>
">
                                        Upravit
                                    </a>
                                </td>
                            </tr>               
<?php $iterations++; } ?>
                    </table>   
                    <a data-toggle="modal" data-target="#admin_reload" class="btn btn-primary" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Admin:duration"), ENT_COMPAT) ?>
">
                        Přidat novou
                    </a>   
                    <?php echo $_form["send"]->getControl() ?>

                </div>
            <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>


        <!-- PopUp pomoci bootstrap, pro register.latte -->
        <div id="admin_reload" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
            </div>
          </div>
        </div>

<?php ob_start() ?>
        <div class="row row-center">
        	Nemáte v systému žádné časy.
        </div>
    <?php if (isset($d)) { ob_end_clean(); ob_end_flush(); } else { $_l->else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_l->else; } ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb91a44faec7_head')) { function _lb91a44faec7_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<style>
		div.dur, div.flash { margin-left: 40px; display: block;}
        .row, div.flash { margin-right: 0;}
        table.dur { width: 100%; margin: 0 0 1em;}
        table.dur td:first-child { width: 50px; text-align: center; border-radius: 5px 0 0 5px;}
		table.dur td:nth-child(2) { width: 170px;}
        table.dur td:nth-child(3) { width: 150px;}
		table.dur td { padding: 3px 6px;}
        table.dur th { background: #444; color: #fff; font-weight: normal; padding: 6px;}
        table.dur th:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 5px;}
        table.dur th:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 5px;}
        table.dur tr:nth-child(2n+1) td {
            background: #EEE;
        }
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars()) ; 
}}