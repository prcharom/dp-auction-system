<?php

namespace App\Presenters;

use Nette;
use App\Forms\SignFormFactory;


class UserPresenter extends BasePresenter {
	
	/** @var SignFormFactory @inject */
	public $factory;


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
		$form = $this->factory->create();
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

}
