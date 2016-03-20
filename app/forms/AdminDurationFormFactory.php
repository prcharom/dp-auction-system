<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class AdminDurationFormFactory extends Nette\Object {

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

		$form->addText('duration_days', 'Doba trvání:')
			->setAttribute('class', 'form-control')
			->setAttribute('placeholder', 'Nevyplněno')
			->setRequired('Prosím vyplňte pole Doba trvání.');

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

		// priprava managera pro praci s dobami
		$auction_manager = new Model\Auction($this->database);
		if ($this->id == null) { 						// pridavam novou dobu
			$auction_manager->addDur($values);
			$form->getPresenter()->flashMessage('Nová doba trvání aukce byla přidána.');
		} else { 
			$dur = $this->database->findById('duration_auction', $this->id);
			if ($form['btnedit']->isSubmittedBy()) { 	// upravuji dobu
				if ($dur) {
					$auction_manager->editDur($values, $dur);
					$form->getPresenter()->flashMessage('Doba trvání aukce byla upravena');
				} else {
					$form->getPresenter()->flashMessage('Dobu trvání aukce nebylo možno upravit, pravděpodobně ji někdo smazal.');
				}	
			} else { 									// mazu dobu
				if ($dur) {
					$auction_manager->deleteDur($dur);
					$form->getPresenter()->flashMessage('Doba trvání aukce byla smazána');
				} else {
					$form->getPresenter()->flashMessage('Dobu trvání aukce nebylo možno smazat, pravděpodobně ji někdo smazal.');
				}	
			}
		}
		$form->getPresenter()->redirect('Admin:durations');
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('adminDuration');
		}
	}

}
