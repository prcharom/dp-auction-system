<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class BidFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* User ID */
		private $id_product;


	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create($id_product = null) {

		// nacteni id produktu
		$this->id_product = $id_product;

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

		// uchovani kvuli pozdejsimu presmerovani
		$form->addText('id_product')->setValue($this->id_product);

		$form->addSubmit('send', 'Koupit')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {
		$product = $this->database->findById('product', $this->id_product);
		if ($product) {
			$auction_manager = new Model\Auction($this->database);
			if ($product->id_type_auction == 1) {
				$auction_manager->bidBuyNow($product); // pokus o prihoz
			}
		} 
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('bid');
		}
	}

}
