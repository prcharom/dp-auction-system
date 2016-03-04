<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class AdminDeleteCategoryFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Selected Categories */
		private $categories = null;

	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create() {

		// nahrani kategorii
		$this->categories = $this->database->findAll('category');

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

        foreach($this->categories as $c) {
            $form->addCheckbox($c->id); 
        }

		$form->addSubmit('send', 'Smazat vybrané')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		$category_manager = new Model\Category($this->database);
		if ($this->categories != null) {
			$category_manager->deleteGroup($values, $this->categories);
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('categories');
		}
	}

}
