<?php

namespace App\Presenters;

use Nette;
use App\Forms\SignFormFactory;
use App\Forms\RegistrationFormFactory;


class UserPresenter extends BasePresenter {
	
	/** @var SignFormFactory @inject */
	public $signFactory;

	/** @var RegistrationFormFactory @inject */
	public $registrationFactory;


	/* --- --- Render functions --- --- */

	public function actionLogout() {
		$gender_id = $this->user->identity->id_gender;
		$this->getUser()->logout();
		if($this->user->identity->id_gender == 1) {
			$this->flashMessage('Byl jste úspěšně odhlášen.');
		} else {
			$this->flashMessage('Byla jste úspěšně odhlášena.');
		} 
		$this->redirect('Homepage:default');
	}
	

	/* --- --- Factories --- --- */

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm() {		
		$form = $this->signFactory->create();
		$form->onSuccess[] = function ($form) {
			if($this->user->identity->id_gender == 1) {
				$this->flashMessage('Byl jste úspěšně přihlášen.');
			} else {
				$this->flashMessage('Byla jste úspěšně přihlášena.');
			} 
			$this->redirect('Homepage:default');
		};
		return $form;
	}


	/**
	 * Registration form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentRegistrationForm() {		
		$form = $this->registrationFactory->create();
		$form->onSuccess[] = function ($form) {
			$values = $form->getValues();
			if($values->id_gender == 1) {
				$this->flashMessage('Byl jste úspěšně zaregistrován.');
			} else {
				$this->flashMessage('Byla jste úspěšně zaregistrována.');
			} 
			$this->redirect('Homepage:default');
		};
		return $form;
	}

}
