<?php

namespace App\Forms;

use Nette;
use App\Model;
use Nette\Application\UI\Form;


class BidFormFactory extends Nette\Object {

		/** @var Model\Database */
		private $database;

		/* Product from db */
		private $product = null;

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

		// nacteni privatnich promennych
		$this->product = $this->database->findById('product', $id_product);
		$this->id_user = $id_user;

		// form
		$form = new Form;
		$form->getElementPrototype()->class('ajax form');

		if ($this->product->id_type_auction != 1) {
	        $form->addText('deposit', 'Přihazovaná částka:')
		        ->setType('number')
		        ->setRequired('Prosím vložte částku, o kterou chcete navýšit současnou cenu.')
		        ->setAttribute('placeholder', 'Nevyplněno')
		        ->setAttribute('class', 'form-control')
		        ->setAttribute('step', '1')
		        ->addRule(Form::RANGE, 'Přihazovaná částka musí být vyšší než 0.', array(1, null));
	    }

		// uchovani kvuli pozdejsimu presmerovani
		$form->addText('id_product')->setValue($id_product);

		$form->addSubmit('send', 'Koupit')
		->setAttribute('class', 'btn btn-primary');

		$form->onSuccess[] = array($this, 'formSucceeded');
		$form->onError[] = array($this, 'formNotSucceeded');
		return $form;
	}

	public function formSucceeded(Form $form, $values) {

		// provedu prihoz 
		if ($this->product != null) {
			$auction_manager = new Model\Auction($this->database);
			if ($this->product->id_type_auction == 1) { // aukce "kup hned"
				$this->error = $auction_manager->bidBuyNow($this->product, $this->id_user);
				$msg = 'Zakoupili jste si produkt '. $this->product->name .'.'; 
			} else { // klasická aukce
				$this->error = $auction_manager->bidClasicAuction($this->product, $this->id_user, $values['deposit']);
				$msg = 'Navýšili jste cenu u produktu '. $this->product->name .'.';
			}
		} 

		// zjistim, zda vse probehlo v poradku
		if ($this->error != null) {
			$form->getPresenter()->flashMessage($this->error);
		} else {
			$form->getPresenter()->flashMessage($msg);
		}

		// presmeruji
		$form->getPresenter()->redirect('Homepage:product', $this->product->id);
	}

	public function formNotSucceeded(Form $form) {
		if($form->getPresenter()->isAjax()) {
			$form->getPresenter()->redrawControl('bid');
		}
	}

}
