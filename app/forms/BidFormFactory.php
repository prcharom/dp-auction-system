<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class BidFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Product ID */
		private $id_product;

		/* User ID */
		private $id_user;

		/* Error */
		private $error = null;

	public function __construct(Model\Database $database) {
		$this->database = $database;
	}

	/**
	 * @return Form
	 */
	public function create($id_product = null, $id_user = null) {

		// nacteni id produktu a uzivatele
		$this->id_product = $id_product;
		$this->id_user = $id_user;

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

        $form->addText('deposit', 'Přihazovaná částka:')
	        ->setType('number')
	        ->setRequired('Prosím vložte částku, o kterou chcete navýšit současnou cenu.')
	        ->setAttribute('placeholder', 'Nevyplněno')
	        ->setAttribute('class', 'form-control')
	        ->setAttribute('step', '1')
	        ->addRule(Form::RANGE, 'Přihazovaná částka musí být vyšší než 0.', array(1, null));

		// uchovani kvuli pozdejsimu presmerovani
		$form->addText('id_product')->setValue($this->id_product);

		$form->addSubmit('send', 'Koupit')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {

		// provedu prihoz 
		$product = $this->database->findById('product', $this->id_product);
		if ($product) {
			$auction_manager = new Model\Auction($this->database);
			if ($product->id_type_auction == 1) { // aukce "kup hned"
				$this->error = $auction_manager->bidBuyNow($product, $this->id_user); 
			}
		} 

		// zjistim, zda vse probehlo v poradku
		if ($this->error != null) {
			$form->getPresenter()->flashMessage($this->error);
		} else {
			$form->getPresenter()->flashMessage('Zakoupili jste si produkt '. $product->name .'.');
		}

		// presmeruji
		$form->getPresenter()->redirect('Homepage:product', $this->id_product);
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('bid');
		}
	}

}
