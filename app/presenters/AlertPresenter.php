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

		// predam template kategorii
		$this->template->kat = $kat;

		// nastaveni paginatoru
		$this->template->paginator = new Nette\Utils\Paginator;
        $this->template->paginator->setItemsPerPage(12); // def počtu položek na stránce
        $this->template->paginator->setPage($page); // def stranky

        // selekce upozorneni
		$t_alerts = $this->database->findAll('alert')->where('id_user', $this->user->id);
		if ($kat == 'read') { 	// prectene
			$t_alerts = $t_alerts->where('visited', 1);
		} else {				// neprectene
			$t_alerts = $t_alerts->where('visited', 0);
		}
		$t_alerts = $t_alerts->order('added DESC')->order('id DESC');

		// prideleni produktu na stranku
		$this->template->paginator->setItemCount($t_alerts->count('*'));
        $this->template->t_alerts = $t_alerts->limit($this->template->paginator->getLength(), $this->template->paginator->getOffset());	
	}

	public function renderDetail($id = null) {
		$this->template->t_alert = $this->database->findById('alert', $id);
		if (!$this->template->t_alert) {
			$this->flashMessage('Oznámení nebylo nalezeno. Je možné, že jej někdo smazal.');
			$this->redirect('Alert:alerts', 'unread');	
		}
		$val['visited'] = 1;
		$this->template->t_alert->update($val);
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