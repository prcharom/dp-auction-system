<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\AdminCategoryFormFactory;
use App\Forms\AdminDeleteCategoryFormFactory;
use App\Forms\AdminDurationFormFactory;
use App\Forms\AdminDeleteDurationFormFactory;


class AdminPresenter extends BasePresenter {

		/** @var AdminCategoryFormFactory @inject */
		public $adminCategoryFactory;

		/** @var AdminDeleteCategoryFormFactory @inject */
		public $adminDeleteCategoryFactory;

		/** @var AdminDurationFormFactory @inject */
		public $adminDurationFactory;

		/** @var AdminDeleteDurationFormFactory @inject */
		public $adminDeleteDurationFactory;

	/* --- --- Categories --- --- */

	public function renderCategories() {
		$this->template->cats = $this->database->findAll('category');
	}

	public function renderCategory($id = null) {
		$this->template->id = $id;
		$form = $this['adminCategoryForm'];
		if ($id != null) { // pokud edituji
			$this->template->category = $this->database->findById('category', $id);
			if (!$this->template->category) {
				$this->flashMessage('Kategorie nebyla nalezena. Je možné, že ji někdo smazal.');
				$this->redirect('Admin:categories');
			}
			$form->setDefaults($this->template->category);
		} else {
			$form['btnedit']->caption = 'Přidat novou';
		}
	}

	/* --- --- Durations --- --- */

	public function renderDurations() {
		$this->template->durs = $this->database->findAll('duration_auction');
	}

	public function renderDuration($id = null) {
		$this->template->id = $id;
		$form = $this['adminDurationForm'];
		if ($id != null) { // pokud edituji
			$this->template->dur = $this->database->findById('duration_auction', $id);
			if (!$this->template->dur) {
				$this->flashMessage('Doba trvání aukce nebyla nalezena. Je možné, že ji někdo smazal.');
				$this->redirect('Admin:durations');
			}
			$form->setDefaults($this->template->dur);
		} else {
			$form['btnedit']->caption = 'Přidat novou';
		}
	}

	/* --- --- Factories --- --- */

	/**
	 * Category form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentAdminCategoryForm() {	
		$id = (int) $this->getParameter('id'); 	
		$form = $this->adminCategoryFactory->create($id);
		return $form;
	}

	/**
	 * Delete category form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentAdminDeleteCategoryForm() {	
		$form = $this->adminDeleteCategoryFactory->create();
		$form->onSuccess[] = function ($form) {	
			$this->flashMessage('Vybrané kategorie byly smazány.');
			$this->redirect('Admin:categories');
		};
		return $form;
	}

	/**
	 * Duration form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentAdminDurationForm() {	
		$id = (int) $this->getParameter('id'); 	
		$form = $this->adminDurationFactory->create($id);
		return $form;
	}

	/**
	 * Delete duration form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentAdminDeleteDurationForm() {	
		$form = $this->adminDeleteDurationFactory->create();
		$form->onSuccess[] = function ($form) {	
			$this->flashMessage('Vybrané doby trvání aukce byly smazány.');
			$this->redirect('Admin:durations');
		};
		return $form;
	}

}