<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\SignFormFactory;
use App\Forms\UserFormFactory;
use App\Forms\UploadProfilePhotoFormFactory;
use App\Forms\PasswordFormFactory;


class UserPresenter extends BasePresenter {
	
		/** @var SignFormFactory @inject */
		public $signFactory;

		/** @var UserFormFactory @inject */
		public $userFactory;

		/** @var UploadProfilePhotoFormFactory @inject */
		public $uploadProfilePhotoFactory;

		/** @var PasswordFormFactory @inject */
		public $passwordFactory;


	/* --- --- myProfile --- --- */
	
	public function actionMyProfile() {
		if (!$this->user->loggedIn)
            throw new Nette\Application\ForbiddenRequestException();
	}

	public function renderMyProfile() {
		$form = $this['userForm'];
		$form['send']->caption = 'Upravit profil';
		$this->template->profile = $this->database->findById('user', $this->user->id);
		$form->setDefaults($this->template->profile);
	}

	/* --- --- Profile --- --- */
	public function renderProfile($id = null) {
		$this->template->profile = $this->database->findById('user', $id);
		if (!$this->template->profile) {
			$this->flashMessage('Hledaného uživatele nelze zobrazit.');
			$this->redirect('Homepage:default');
		}
	}


	/* --- --- Profile Photo --- --- */
	
	public function actionProfilePhoto() {
		if (!$this->user->loggedIn)
            throw new Nette\Application\ForbiddenRequestException();
	}

	public function renderProfilePhoto() {
		$this->template->profile = $this->database->findById('user', $this->user->id);	
	}


	/* --- --- Password --- --- */
	
	public function actionPassword() {
		if (!$this->user->loggedIn)
            throw new Nette\Application\ForbiddenRequestException();
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
		if($this->user->loggedIn) {	// pro update
			$form = $this->userFactory->create($this->user->id);
		} else {					// pro insert
			$form = $this->userFactory->create();	
		}
		$form->onSuccess[] = function ($form) {
			$values = $form->getValues();
			if($this->user->loggedIn) {
				$this->flashMessage('Váš profil byl úspěšně upraven.');
			} else {
				if($values->id_gender == 1) {
					$this->flashMessage('Byl jste úspěšně zaregistrován.');
				} else {
					$this->flashMessage('Byla jste úspěšně zaregistrována.');
				} 
			}
			$this->redirect('Homepage:default');
		};
		return $form;
	}

	/**
	 * Upload profile img factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentUploadProfilePhotoForm() {		
		$form = $this->uploadProfilePhotoFactory->create($this->user->id);
		$form->onSuccess[] = function ($form) {
			$this->flashMessage('Váše profilová fotografie byla upravena.');
			$this->redirect('User:profile', $this->user->id);
		};
		return $form;
	}

	/**
	 * Password form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentPasswordForm() {		
		$form = $this->passwordFactory->create($this->user->id);
		$form->onSuccess[] = function ($form) {
			$this->flashMessage('Vaše heslo bylo úspěšně změněno.');
			$this->redirect('User:profile', $this->user->id);
		};
		return $form;
	}

}
