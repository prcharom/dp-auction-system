<?php

namespace App\Presenters;

use Nette;
use App\Model;
use App\Forms\AlertFormFactory;


class AdminPresenter extends BasePresenter {

		/** @var AlertFormFactory @inject */
		public $alertFactory;

	/* --- --- Category --- --- */

	public function renderCategory() {
		// presenter category
	}

	/* --- --- Factories --- --- */

	/**
	 * Product form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentAlertForm() {	
		$kat = $this->getParameter('kat');
		$page = (int) $this->getParameter('page');  	
		$form = $this->alertFactory->create($kat, $page, $this->user->id);
		$form->onSuccess[] = function ($form) {	
			// form->getValues() ...	
		};
		return $form;
	}

}