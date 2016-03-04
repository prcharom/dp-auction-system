<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/Admin/categories.latte

class Template2404d4808928adfebc9e1199683466a9 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('bd6ade508b', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb424f28fce8_content')) { function _lb424f28fce8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;ob_start() ?>

            <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["adminDeleteCategoryForm"], array()) ?>

                <div class="row category">
                    <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>                    <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>                        <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
                    </ul>
<?php } ?>
                    <!-- vykresleni tabulky -->
                    <table class="category">
                    <tr>
                        <th></th>
                        <th>Kategorie</th>
                        <th colspan="2">RGB barva</th>
                    </tr>
<?php $iterations = 0; foreach ($cats as $cat) { ?>
                            <tr>
                                <td>
                                    <?php $_input = is_object($cat->id) ? $cat->id : $_form[$cat->id]; echo $_input->getControl() ?>

                                </td>
                                <td>
                                	<?php echo Latte\Runtime\Filters::escapeHtml($cat->name, ENT_NOQUOTES) ?>

                                </td>
                                <td>
                                    #<?php echo Latte\Runtime\Filters::escapeHtml($cat->color, ENT_NOQUOTES) ?>

                                </td>
                                <td>	
                                	<a data-toggle="modal" data-target="#admin_category" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Admin:category", array($cat->id)), ENT_COMPAT) ?>
">
                                        Upravit
                                    </a>
                                </td>
                            </tr>               
<?php $iterations++; } ?>
                    </table>   
                    <a class="btn btn-primary" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Admin:category"), ENT_COMPAT) ?>
">Přidat novou</a>   
                    <?php echo $_form["send"]->getControl() ?>

                </div>
            <?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>


        <!-- PopUp pomoci bootstrap, pro register.latte -->
        <div id="admin_category" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
            </div>
          </div>
        </div>

<?php ob_start() ?>
        <div class="row row-center">
        	Nemáte v systému žádné kategorie.
        </div>
    <?php if (isset($cat)) { ob_end_clean(); ob_end_flush(); } else { $_l->else = ob_get_contents(); ob_end_clean(); ob_end_clean(); echo $_l->else; } ?>

<?php
}}

//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb46ea06c22e_head')) { function _lb46ea06c22e_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<style>
		div.category { margin-left: 40px; display: block;}
        table.category { width: 100%; margin: 0 0 1em;}
        table.category td:first-child { width: 50px; text-align: center;}
		table.category td:nth-child(2), table.category td:nth-child(3) { width: 150px;}
		table.category td { padding: 3px 6px;}
        table.category th { background: #555; color: #fff; font-weight: normal; padding: 6px;}
        table.category th:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 5px;}
        table.category th:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 5px;}
        table.category tr:nth-child(2n+1) td {
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