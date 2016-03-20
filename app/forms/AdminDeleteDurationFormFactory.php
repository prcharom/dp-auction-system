<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class AdminDeleteDurationFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Selected Durations */
		private $durs = null;

	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create() {

		// nahrani kategorii
		$this->durs = $this->database->findAll('duration_auction');

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

        foreach($this->durs as $d) {
            $form->addCheckbox($d->id); 
        }

		$form->addSubmit('send', 'Smazat vybrané')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		$auction_manager = new Model\Auction($this->database);
		if ($this->durs != null) {
			$auction_manager->deleteGroupDur($values, $this->durs);
		}
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('durs');
		}
	}

}
