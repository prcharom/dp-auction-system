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


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create($alerts = null) {

		// predani upozorneni
		$this->alerts = $alerts;

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
		if ($this->alerts != null) {
			//$photo_manager = new Model\Photo($this->database);
			//$photo_manager->deleteProductPhotos($values, $this->photos);
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('alerts');
		}
	}

}
