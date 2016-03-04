<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\AdminCategoryFormFactory;
use App\Forms\AdminDeleteCategoryFormFactory;


class AdminPresenter extends BasePresenter {

		/** @var AdminCategoryFormFactory @inject */
		public $adminCategoryFactory;

		/** @var AdminDeleteCategoryFormFactory @inject */
		public $adminDeleteCategoryFactory;

	/* --- --- Categories --- --- */

	public function renderCategories() {
		$this->template->cats = $this->database->findAll('category');
	}

	/* --- --- Category --- --- */

	public function renderCategory($id = null) {
		$form = $this['adminCategoryForm'];
		$this->template->category = $this->database->findById('category', $id);
		if (!$this->template->category) {
			$this->flashMessage('Kategorie nebyla nalezena. Je možné, že ji někdo smazal.');
			$this->redirect('Admin:categories');
		}
		$form->setDefaults($this->template->category);
	}

	/* --- --- Factories --- --- */

	/**
	 * Category form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentAdminCategoryForm() {	
		$id = (int) $this->getParameter('id'); 	
		$form = $this->adminCategoryFactory->create($id);
		$form->onSuccess[] = function ($form) {	
			// form->getValues() ...	
		};
		return $form;
	}

	/**
	 * Delete category form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentAdminDeleteCategoryForm() {	
		$form = $this->adminDeleteCategoryFactory->create();
		$form->onSuccess[] = function ($form) {	
			// form->getValues() ...	
		};
		return $form;
	}

}