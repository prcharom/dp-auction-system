<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\ProductFormFactory;


class AlertPresenter extends BasePresenter {

		/** @var ProductFormFactory @inject */
		public $productFactory;


	/* --- --- Default --- --- */	

	public function renderAlerts($kat = null, $page = null) {

		// nastaveni paginatoru
		$this->template->paginator = new Nette\Utils\Paginator;
        $this->template->paginator->setItemsPerPage(12); // def počtu položek na stránce
        $this->template->paginator->setPage($page); // def stranky

        // selekce upozorneni
		$alerts = $this->database->findAll('alert')->where('id_user', $this->user->id);
		if ($kat == 'read') { 	// prectene
			$alerts = $alerts->where('visited', 1);
		} else {				// neprectene
			$alerts = $alerts->where('visited', 0);
		}
		$alerts = $alerts->order('added DESC')->order('id DESC');

		// prideleni produktu na stranku
		$this->template->paginator->setItemCount($alerts->count('*'));
        $this->template->alerts = $alerts->limit($this->template->paginator->getLength(), $this->template->paginator->getOffset());	
	}

	/* --- --- Factories --- --- */

	/**
	 * Product form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentProductForm() {		
		$form = $this->productFactory->create($this->user->id);
		$form->onSuccess[] = function ($form) {
			$values = $form->getValues();
			if ($values['id'] == null) {
				$this->flashMessage('Produkt byl úspěšně vytvořen.');
				$this->redirect('Homepage:default');
			} else {
				$this->flashMessage('Produkt byl úspěšně upraven.');
				$this->redirect('Homepage:product', $values['id']);
			}
		};
		return $form;
	}

}