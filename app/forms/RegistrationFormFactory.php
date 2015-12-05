<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;
use Nette\Security\User;


class RegistrationFormFactory extends Nette\Object {
	
		/** @var User */
		private $user;

		/** @var Nette\Database\Context */
		private $database;


	public function __construct(User $user, Nette\Database\Context $database) {
		$this->user = $user;
		$this->database = $database;
	}


	/**
	 * @return Form
	 */
  	public function create() {
	    $form = new Form;
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
	      
	    $form->addText('name', 'Celé jméno')
	    	->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
	      	->setRequired('Zadejte prosím celé jméno i s tituly.');

	    $sex = array('1' => 'muž', '2' => 'žena');
	    $form->addRadioList('id_gender', 'Pohlaví', $sex)
	    	->getSeparatorPrototype()->setName(NULL)
	      	->setAttribute('class', 'radio')
	      	->setRequired('Vyberte prosím pohlaví.');

	    $form->addText('address', 'Adresa')
	    	->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
	      	->setRequired('Zadejte prosím adresu trvalého bydliště.');

	    $form->addText('email', 'E-mail', 35)
		    ->setType('email')
	    	->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
		    ->setRequired('Vložte prosím vaši emailovou adresu.')
		    ->addCondition(Form::FILLED)
		    ->addRule(Form::EMAIL, 'Vložte prosím platnou emailovou adresu.');
	      
	    $form->addText('phone', 'Telefon')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte Váš nick.');     
	      
		$form->addSubmit('send', 'Registrovat')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		return $form;
	}


	public function formSucceeded(Form $form, $values) {
		try {
			$userManager = new Model\UserManager($this->user, $this->database); 
			$userManager->register($values);
		} catch (Nette\Security\AuthenticationException $e) {
			$form->addError($e->getMessage());
		}
	}

}
