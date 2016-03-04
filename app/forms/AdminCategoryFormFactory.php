<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class AdminCategoryFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create() {

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

		$form->addSubmit('btndelete', 'Smazat')
			->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
/*
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
		}*/
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('alerts');
		}
	}

}
