<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;
use Nette\Security\User;


class UserFormFactory extends Nette\Object {
	
		/** @var User */
		private $user;

		/** @var Nette\Database\Context */
		private $database;

		/* Edit User Id */
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
	   	if($this->id == null) { 
		    $form->addText('nick', 'Nick')
				->setAttribute('class', 'form-control')
				->setAttribute('placeholder', 'Nevyplněno')
				->setRequired('Prosím vyplňte Váš nick.');
	     
		    $form->addPassword('password', 'Heslo', 20)
		    	->setAttribute('class', 'form-control')
				->setAttribute('placeholder', 'Nevyplněno')
		      	->setRequired('Vyplňte prosím heslo.')
		      	->addRule(Form::MIN_LENGTH, 'Zadejte prosím heslo obsahující alespoň %d znaků.', 6);
		      
		    $form->addPassword('password2', 'Heslo znovu', 20)
		    	->setAttribute('class', 'form-control')
				->setAttribute('placeholder', 'Nevyplněno')
		      	->setRequired('Zadejte prosím znovu heslo pro kontrolu.')
		      	->addConditionOn($form['password'], Form::VALID)
		      	->addRule(Form::EQUAL, 'Hesla se neshodují. Zadejte a ověřte heslo znovu.', $form['password']);
	    }
	      
	    $form->addText('name', 'Celé jméno')
	    	->setAttribute('class', 'form-control form-control-active')
			->setAttribute('placeholder', 'Nevyplněno')
	      	->setRequired('Zadejte prosím celé jméno i s tituly.');

	    $sex = array('1' => 'muž', '2' => 'žena');
	    $form->addRadioList('id_gender', 'Pohlaví', $sex)
	    	->getSeparatorPrototype()->setName(NULL)
	      	->setAttribute('class', 'radio')
	      	->setRequired('Vyberte prosím pohlaví.');

	    $form->addText('address', 'Adresa')
	    	->setAttribute('class', 'form-control form-control-active')
			->setAttribute('placeholder', 'Nevyplněno')
	      	->setRequired('Zadejte prosím adresu trvalého bydliště.');

	    $form->addText('email', 'E-mail', 35)
		    ->setType('email')
	    	->setAttribute('class', 'form-control form-control-active')
			->setAttribute('placeholder', 'Nevyplněno')
		    ->setRequired('Vložte prosím vaši emailovou adresu.')
		    ->addCondition(Form::FILLED)
		    ->addRule(Form::EMAIL, 'Vložte prosím platnou emailovou adresu.');
	      
	    $form->addText('phone', 'Telefon')
			->setAttribute('class', 'form-control form-control-active')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte Váš nick.');     
	      
		$form->addSubmit('send', 'Registrovat')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}


	public function formSucceeded(Form $form, $values) {
		if($this->id == null) {
			try {
				$userManager = new Model\UserManager($this->user, $this->database); 
				try {
		 			$new_user = $userManager->register($values);
	              	if(!$new_user) {
	                	$form->addError('Registrace z neznámého důvodu selhala. Zkuste se prosím zaregistrovat znovu a pokud problémy přetrvají, kontaktujete helpdesk.');
	              	}
	            }
	            catch(\PDOException $e) {
	                if($e->getCode()==23000) {
	                  	$form->addError('Zájemce s tímto nickem už je zaregistrován, zvolte prosím jiný nick.');
	                } else {
	                  	$form->addError($e->getMessage());
	                }
	            }
			} catch (Nette\Security\AuthenticationException $e) {
				$form->addError($e->getMessage());
			}
		} else {
			$database = new Model\Database($this->database);
			$user = $database->findById('user', $this->id);
			if($user){
				$user->update($values);
				$this->user->identity->name = $values->name;
			} else {
				$form->addError('Uživatel, kterého se snažíte upravit, neexistuje. Je možné, že ho někdo smazal.');
			}
		}
	}

}
