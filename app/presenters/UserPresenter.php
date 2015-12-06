<?php

namespace App\Presenters;

use Nette;
use App\Forms\SignFormFactory;
use App\Forms\UserFormFactory;


class UserPresenter extends BasePresenter {
	
		/** @var SignFormFactory @inject */
		public $signFactory;

		/** @var UserFormFactory @inject */
		public $userFactory;


	/* --- --- Edit Profile --- --- */
	public function actionProfile() {
		if (!$this->user->loggedIn)
            throw new Nette\Application\ForbiddenRequestException();
	}

	public function renderProfile() {
		$form = $this['userForm'];
		$form->setDefaults($this->user->identity->data);
	}


	/* --- --- Logout --- --- */
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
	 * User form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentUserForm() {		
		$form = $this->userFactory->create($this->user->id);
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
