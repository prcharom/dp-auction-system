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
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
</head>

<body class="panel panel-info">
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
" src="images/web/icons/user_<?php if ($user->identity->id_gender == 2) { ?>fe<?php } ?>male.png"> 
            </div>
            <div class=" col-md-9 col-lg-9 "> 
               	<table class="table table-user-information">
                <tbody>
                    <tr>
                        <td>Department:</td>
                        <td>Programming</td>
                    </tr>
                    <tr>
                        <td>Hire date:</td>
                        <td>06/23/2013</td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>01/24/1988</td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>Male</td>
                    </tr>
                    <tr>
                        <td>Home Address</td>
                        <td>Metro Manila,Philippines</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com">info@support.com</a></td>
                    </tr>
                        <td>Phone Number</td>
                        <td>123-4567-890(Landline)<br><br>555-4567-890(Mobile)</td>
                    </tr>
                     
                    </tbody>
                  </table>
                  
                  <a href="#" class="btn btn-primary">My Sales Performance</a>
                  <a href="#" class="btn btn-primary">Team Sales Performance</a>
                </div>
              </div>
	</div>
	<!-- Modal footer -->
	<div class="modal-footer panel-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal" id="profile_save_and_close">Uložit a zavřít</button>
	  <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
	</div>

</body>
</html><?php
}}