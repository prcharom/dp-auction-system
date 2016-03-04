<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class AdminCategoryFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Id Category */
		private $id;

	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create($id = null) {

		// predani id do tridy
		$this->id = $id;

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

		$form->addText('name', 'Název:')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte pole Název.');

		$form->addText('color', 'Barva:')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte pole Barva.');

		$form->addSubmit('btnedit', 'Upravit')
			->setAttribute('class', 'btn btn-primary');

		if ($this->id != null) {
			$form->addSubmit('btndelete', 'Smazat')
				->setAttribute('class', 'btn btn-primary');
		}

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {

		// priprava managera pro praci s kategoriemi
		$category_manager = new Model\Category($this->database);
		if ($this->id == null) { 						// pridavam novou kategorii
			$category_manager->add($values);
			$form->getPresenter()->flashMessage('Nová kategorie byla přidána.');
		} else { 
			$category = $this->database->findById('category', $this->id);
			if ($form['btnedit']->isSubmittedBy()) { 	// upravuji kategorii
				if ($category) {
					$category_manager->edit($values, $category);
					$form->getPresenter()->flashMessage('Kategorie byla upravena');
				} else {
					$form->getPresenter()->flashMessage('Kategorii nebylo možno upravit, pravděpodobně ji někdo smazal.');
				}	
			} else { 									// mazu kategorii
				if ($category) {
					$category_manager->delete($category);
					$form->getPresenter()->flashMessage('Kategorie byla smazána');
				} else {
					$form->getPresenter()->flashMessage('Kategorii nebylo možno smazat, pravděpodobně ji někdo smazal.');
				}	
			}
		}
		$form->getPresenter()->redirect('Admin:categories');
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('adminCategory');
		}
	}

}
