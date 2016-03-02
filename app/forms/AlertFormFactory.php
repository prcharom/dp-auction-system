<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class AlertFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Selected Alerts */
		private $alerts = null;

		/* kat */
		private $kat = null;

	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create($kat = null, $page = null, $id_user = null) {

		// nastaveni paginatoru
		$paginator = new Nette\Utils\Paginator;
        $paginator->setItemsPerPage(6); // def počtu položek na stránce
        $paginator->setPage($page); // def stranky

        // selekce upozorneni
		$alerts = $this->database->findAll('alert')->where('id_user', $id_user);
		if ($kat == 'read') { 	// prectene
			$alerts = $alerts->where('visited', 1);
		} else {				// neprectene
			$alerts = $alerts->where('visited', 0);
		}
		$alerts = $alerts->order('added DESC')->order('id DESC');

		// prideleni produktu na stranku
		$paginator->setItemCount($alerts->count('*'));
        $this->alerts = $alerts->limit($paginator->getLength(), $paginator->getOffset());
        $this->kat = $kat;

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

        foreach($this->alerts as $alert) {
            $form->addCheckbox($alert->id); 
        }

		$form->addSubmit('btndel', 'Smazat upozornění')
		->setAttribute('class', 'btn btn-primary');

		$form->addSubmit('btnvis', 'Označit jako přečtené')
		->setAttribute('class', 'btn btn-default');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {

		$alert_manager = new Model\Alert($this->database);
		if ($this->alerts != null) {
			if ($form['btndel']->isSubmittedBy()) { // mazani alertu
				$alert_manager->delete($values, $this->alerts);
				$form->getPresenter()->flashMessage('Vybraná upozornění byla smazána.');
				$form->getPresenter()->redirect('Alert:alerts', $this->kat);
			} else { 
				if ($this->kat == 'read') { 				// oznaceni alertu jako neprectene 
					$alert_manager->activate($values, $this->alerts);
					$form->getPresenter()->flashMessage('Vybraná upozornění byla označena jako nepřečtená.');
					$form->getPresenter()->redirect('Alert:alerts', 'unread');
				} else { 							// oznaceni alertu jako prectene
					$alert_manager->inactivate($values, $this->alerts);
					$form->getPresenter()->flashMessage('Vybraná upozornění byla označena jako přečtená.');
					$form->getPresenter()->redirect('Alert:alerts', 'read');
				}
			}
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('alerts');
		}
	}

}
