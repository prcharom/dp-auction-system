<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;
use Nette\Security\User;


class PasswordFormFactory extends Nette\Object {
	
		/** @var User */
		private $user;

		/** @var Nette\Database\Context */
		private $database;

		/* User Id */
		private $id;


	public function __construct(User $user, Nette\Database\Context $database) {
		$this->user = $user;
		$this->database = $database;
	}


	/**
	 * @return Form
	 */
	public function create($id = null) {
		$this->id = $id;
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');
		$form->addPassword('oldpassword', 'Současné heslo:')
      		->setRequired('Prosím zadejte vaše současné heslo.')
      		->setAttribute('class', 'form-control')
      		->setAttribute('placeholder', 'Nevyplněno');
    	
    	$form->addPassword('password', 'Nové heslo:')
      		->setRequired('Prosím zadejte nové heslo.')
      		->setAttribute('class', 'form-control')
      		->setAttribute('placeholder', 'Nevyplněno');
    	
    	$form->addPassword('password2', 'Nové heslo znovu:')
      		->setRequired('Zadejte prosím znovu heslo pro kontrolu.')
      		->setAttribute('class', 'form-control')
      		->setAttribute('placeholder', 'Nevyplněno');

		$form->addSubmit('send', 'Změnit heslo')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}


	public function formSucceeded(Form $form, $values) {
		$userManager = new Model\UserManager($this->user, $this->database); 
		$error = $userManager->changePassword($this->id, $values);
		if ($error != null) {
			$form->addError($error);
		}
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('password');
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('password');
		}
	}

}
