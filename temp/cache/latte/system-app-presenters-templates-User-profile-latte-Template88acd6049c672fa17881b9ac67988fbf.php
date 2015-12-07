<?php
// source: C:\Users\prcharom\Desktop\EasyPHP-DevServer-14.1VC9\data\localweb\dp-auction-system\app\presenters/templates/User/profile.latte

class Template88acd6049c672fa17881b9ac67988fbf extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3f3ef950a7', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIRuntime::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["userForm"], array()) ?>

  	<!--- Modal-header -->
	<div class="modal-header panel-heading">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
        <?php echo $_form["name"]->getControl() ?>

	</div>
	<!-- Modal-body -->
	<div class="modal-body panel-body">
		<div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> 
            	<img alt="<?php echo Latte\Runtime\Filters::escapeHtml($profile->nick, ENT_COMPAT) ?>
" src="images/web/icons/user_<?php if ($profile->id_gender == 2) { ?>fe<?php } ?>male.png" class="img-circle img-responsive"> 
            </div>
            	<!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>	            <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>	                <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
	            </ul> 
<?php } ?>
            <div class=" col-md-9 col-lg-9 "> 
               	<table class="table table-user-information">
	                <tbody>
	                    <tr>
	                        <td>Nick:</td>
	                        <td>
	                        	<input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($profile->nick, ENT_COMPAT) ?>" readonly>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td>Datum registrace:</td>
	                        <td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($template->date($profile->registered_since, 'd/m/Y  H:i'), ENT_COMPAT) ?>" readonly></td>
	                    </tr>
	                    <tr>
	                        <td>Datum posl. přihlášení:</td>
	                        <td><input type="text" class="form-control" value="<?php echo Latte\Runtime\Filters::escapeHtml($template->date($profile->last_login, 'd/m/Y  H:i'), ENT_COMPAT) ?>" readonly></td>
	                    </tr>
	                    <tr>
	                        <td>Pohlaví:</td>
	                        <td>
<?php $iterations = 0; foreach ($form['id_gender']->items as $key => $label) { ?>
					            <div class="col-xs-6">
						            <div class="reg-radio input-group">
						              	<span class="input-group-addon">
						                	<input<?php $_input = $_form["id_gender"]; echo $_input->getControlPart($key)->attributes() ?>>
						              	</span>
						              	<input type="text" value="<?php echo Latte\Runtime\Filters::escapeHtml($label, ENT_COMPAT) ?>" class="form-control" readonly>
						            </div>
						        </div>
<?php $iterations++; } ?>
	                        </td>
	                    </tr>
	                    <tr>
	                        <td>Adresa bydliště:</td>
	                        <td><?php echo $_form["address"]->getControl() ?></td>
	                    </tr>
	                    <tr>
	                        <td>E-mail:</td>
	                        <td><?php echo $_form["email"]->getControl() ?></td>
	                    </tr>
	                    <tr>
	                        <td>Telefonní číslo:</td>
	                        <td><?php echo $_form["phone"]->getControl() ?></td>
	                    </tr>
	                </tbody>
                </table>
            </div>
       	</div>
	</div>
	<!-- Modal footer -->
	<div class="modal-footer panel-footer">
		<?php echo $_form["send"]->getControl() ?>

	  	<input type="button" class="btn btn-default" data-dismiss="modal" value="Zavřít">
	</div>
<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ;
}}