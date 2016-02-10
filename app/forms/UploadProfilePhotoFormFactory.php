<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class UploadProfilePhotoFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Edit User Id */
		private $id;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}


	/**
	 * @return Form
	 */
	public function create($id = null) {
		$this->id = $id;
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');
		$form->addUpload('img', 'Fotografie:', FALSE)
	        ->setRequired('Vyberte prosím fotografii, kterou chcete nahrát.')
	        ->addRule(Form::IMAGE, 'Fotografie musí být ve formátu JPEG, PNG nebo GIF.')
	        ->addRule(Form::MAX_FILE_SIZE, 'Maximální velikost fotografie je 2 MB.', 2 * 1024 * 1024 /* v bytech */);

		$form->addSubmit('send', 'Nahrát obrázek')
			->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}


	public function formSucceeded(Form $form, $values) {
		$photo = new Model\Photo($this->database); 
		$error = $photo->uploadProfileImage($values->img, $this->id);
		if($error) {
			$form->addError($error);
		}
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('profileImage');
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('profileImage');
		}
	}

}
