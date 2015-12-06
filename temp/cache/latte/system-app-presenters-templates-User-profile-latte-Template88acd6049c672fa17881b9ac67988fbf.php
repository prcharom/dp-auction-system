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
?>
  	<!--- Modal-header -->
	<div class="modal-header panel-heading">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
        <h3 class="panel-title"><?php echo Latte\Runtime\Filters::escapeHtml($user->identity->name, ENT_NOQUOTES) ?></h3>
	</div>
	<!-- Modal-body -->
	<div class="modal-body panel-body">
		<div class="row">
            <div class="col-md-3 col-lg-3 " align="center"> 
            	<img alt="<?php echo Latte\Runtime\Filters::escapeHtml($user->identity->nick, ENT_COMPAT) ?>
" src="images/web/icons/user_<?php if ($user->identity->id_gender == 2) { ?>fe<?php } ?>male.png" class="img-circle img-responsive"> 
            </div>
            <div class=" col-md-9 col-lg-9 "> 
               	<table class="table table-user-information">
	                <tbody>
	                    <tr>
	                        <td>Nick:</td>
	                        <td><?php echo Latte\Runtime\Filters::escapeHtml($user->identity->nick, ENT_NOQUOTES) ?></td>
	                    </tr>
	                    <tr>
	                        <td>Datum registrace:</td>
	                        <td><?php echo Latte\Runtime\Filters::escapeHtml($template->date($user->identity->registered_since, 'd/m/Y  H:i'), ENT_NOQUOTES) ?></td>
	                    </tr>
	                    <tr>
	                        <td>Datum posl. přihlášení:</td>
	                        <td><?php echo Latte\Runtime\Filters::escapeHtml($template->date($user->identity->last_login, 'd/m/Y  H:i'), ENT_NOQUOTES) ?></td>
	                    </tr>
	                    <tr>
	                        <td>Pohlaví:</td>
	                        <td><?php if ($user->identity->id_gender == 1) { ?>Muž<?php } else { ?>
Žena<?php } ?></td>
	                    </tr>
	                    <tr>
	                        <td>Adresa bydliště:</td>
	                        <td><?php echo Latte\Runtime\Filters::escapeHtml($user->identity->address, ENT_NOQUOTES) ?></td>
	                    </tr>
	                    <tr>
	                        <td>E-mail:</td>
	                        <td><a href="mailto:<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($user->identity->email), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($user->identity->email, ENT_NOQUOTES) ?></a></td>
	                    </tr>
	                    <tr>
	                        <td>Telefonní číslo:</td>
	                        <td><?php echo Latte\Runtime\Filters::escapeHtml($user->identity->phone, ENT_NOQUOTES) ?></td>
	                    </tr>
	                </tbody>
                </table>
            </div>
       	</div>
       	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $_form = $_control["userForm"], array()) ?>

       	<div class="col-xs-9 col-md-6">
        	<div>
	            <!-- vykreslení chyb -->
<?php if ($form->hasErrors()) { ?>	            <ul class="errors">
<?php $iterations = 0; foreach ($form->errors as $error) { ?>	                <li><?php echo Latte\Runtime\Filters::escapeHtml($error, ENT_NOQUOTES) ?></li>
<?php $iterations++; } ?>
	            </ul> 
<?php } ?>
	            <!-- vykresleni formu -->
	            <div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-nick" style="width: 8em">Nick</span>
	                <?php echo $_form["nick"]->getControl() ?>

	            </div>
	           	<div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-name" style="width: 8em">Celé jméno</span>
	                <?php echo $_form["name"]->getControl() ?>

	            </div>
	           	<!-- radio gender -->
	            <div class="mar-input-2x row">
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
		        </div>
		        <!-- / radio gender -->
	           	<div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-address" style="width: 8em">Adresa</span>
	                <?php echo $_form["address"]->getControl() ?>

	            </div>
	           	<div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-phone" style="width: 8em">Telefon</span>
	                <?php echo $_form["phone"]->getControl() ?>

	            </div>
	           	<div class="mar-input input-group col-xs-12">
	                <span class="input-group-addon" id="reg-email" style="width: 8em">E-mail</span>
	                <?php echo $_form["email"]->getControl() ?>

	            </div>
	        </div>
	        <div class="input-group col-xs-6 col-xs-offset-6 col-md-4 col-md-offset-8">
            	<?php echo $_form["send"]->getControl() ?>

        	</div>
        </div>
       	<?php echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd($_form) ?>

	</div>
	<!-- Modal footer -->
	<div class="modal-footer panel-footer">
		<input type="button" class="btn btn-primary" value="Editovat profil">
	  	<input type="button" class="btn btn-default" data-dismiss="modal" value="Zavřít">
	</div><?php
}}